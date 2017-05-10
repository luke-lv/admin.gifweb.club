<?php

/**
 * Resource.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	16:56:40 2012-12-10
 * @version	$Id: Resource.php 44 2012-12-24 10:46:26Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class ResourceModel extends MY_Model
{
	protected $_table = 'gifweb_admin_resource';
	private $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',true);
	}
	
	/**
	 * 按父ID查找菜单子项
	 * @param integer $parentid   父菜单ID
	 * @param integer $with_self  是否包括他自己
	 */
	public function adminResource($parentid, $with_self = 0)
	{
		$parentid = intval($parentid);
		//$menudb = load_model('admin', 'menu');
		$condition = array();
		$condition['table'] = $this->_table;
		$condition['where'] = array('parentid' => $parentid, 'display' => 1);
		$condition['order'] = 'listorder ASC';
		$con_sql = $this->find($condition);
		$rs = $this->db->query_read($con_sql);
		foreach ($rs->result_array() as $row)
		{
			$result[] = $row;
		}
		if($with_self && $parentid) {
			$rs2_sql = $this->load($parentid);
			$rs2 = $this->db->query_read($rs2_sql);
			foreach ($rs2->result_array() as $row2)
			{
				$result2[] = $row2;
			}
			$result = array_merge($result2, $result);
		}
		//权限检查
		$loginuser = $this->session->userdata('loginuser');
		//if($loginuser['roleid'] == '1') {
		//	return $result;
		//}
		
		if(in_array(1, explode(",", $loginuser['roleid']))){
		    return $result;
		}

		$array = array();
		//$privdb = new Admin_PrivilegeModel();
		//$siteid = param::get_cookie('siteid');
		foreach($result as $v) {
			$action = $v['a'];
			if(preg_match('/^public_/', $action)) {
				$array[] = $v;
			} else {
				if(preg_match('/^ajax_([a-z]+)_/', $action, $_match)) {
					$action = $_match[1];
				}
				//Com_Func::dump($v);exit;
				$where = "roleid in ({$loginuser['roleid']}) AND siteid='{$v['id']}' AND m='{$v['m']}' AND c='{$v['c']}' AND a='{$v['a']}'";
				$r_sql = $this->find(array('where'=>$where,'table'=>'gifweb_admin_privilege'));
				$rs = $this->db->query_read($r_sql);
				$result = $rs->num_rows();
				if($result > 0) {
					$array[] = $v;
				}
			}
		}
//		var_dump($array);
//		exit(0);
		return $array;
	}

	/**
	 * 获取菜单 头部菜单导航
	 *
	 * @param $parentid 菜单id
	 */
	public function subResource($request, $parentid = '', $big_menu = false)
	{
		$m = strtolower($request->modulename);
		$c = strtolower($request->class);
		$a = strtolower($request->method);
		if(empty($parentid)) {
			//$menudb = load_model('admin', 'menu');
			$condition = array(
				'table' => $this->_table,
				'where' => $this->where(array(
					'm' => $m,
					'c' => $c,
					'a' => $a,
				)),
			);
			$r_sql = $this->find($condition);
			$result = $this->db->query_read($r_sql);
			$r = $result->result_array();
			isset($r[0]['id']) && ($parentid = $_GET['menuid'] = $r[0]['id']);
		}
		$array = $this->adminResource($parentid, 1);
		$numbers = count($array);
		if($numbers == 1 && !$big_menu) {
			return '';
		}

		$string = '';
		//$le_hash = $_SESSION['pc_hash'];
		foreach($array as $_value) {
			empty($_value['data']) || $_value['data'] = '&' . $_value['data'];
			if(!isset($_GET['s'])) {
				$classname = $m == $_value['m'] && $c == $_value['c'] && $a == $_value['a'] ? 'class="on"' : '';
			} else {
				$_s = !empty($_value['data']) ? str_replace('=', '', strstr($_value['data'], '=')) : '';
				$classname = $m == $_value['m'] && $c == $_value['c'] && $a == $_value['a'] && $_GET['s'] == $_s ? ' class="on"' : '';
			}
			if($_value['parentid'] == 0 || $_value['m'] == '')
				continue;
			if($classname) {
				$string .= "<a href='javascript:;'$classname><em>" . $_value['title'] . "</em></a><span>|</span>";
			} else {
				//$string .= "<a href='?m=" . $_value['m'] . "&c=" . $_value['c'] . "&a=" . $_value['a'] . "&menuid=$parentid&le_hash=$le_hash" . '&' . $_value['data'] . "' $classname><em>" . $_value['title'] . "</em></a><span>|</span>";
				$string .= "<a href='/" . $_value['m'] . "/" . $_value['c'] . "/" . $_value['a'] . "?menuid=$parentid" . $_value['data'] . "'$classname><em>" . $_value['title'] . "</em></a><span>|</span>";
			}
		}
		$string = substr($string, 0, -14);
		return $string;
	}
	
	/**
	 * 当前位置
	 *
	 * @param $id 菜单id
	 */
	public function currentResource($id)
	{
		$id = intval($id);
		$r = $this->load($id);
		$rs = $this->db->query_read($r);
		$result = $rs->result_array();
		$r = empty($result) ? array() : $result[0];
		$str = '';
		if($r['parentid']) {
			$str = self::currentResource($r['parentid']);
		}
		return $str . $r['title'] . ' > ';
	}
	
	
	public function checkRolePrivilege($roleid, array $where = array())
	{
		$condition = array(
			'table' => 'gifweb_admin_privilege',
			'where' => array(
				'roleid' => $roleid,
			),
		);
		empty($where) or $condition['where'] += $where;
		
		$r_sql = $this->find($condition);
		$result = $this->db->query_read($r_sql);
		$r = $result->result_array();

		return (is_array($r) && !empty($r)) ? true : false;
	}
	
	/**
	 * 
	 * 根据条件查询数据
	 * @param array
	 * @return Array
	 */
	public function findData($conditons=array())
	{
		$sql = $this->find($conditons);
		$rs = $this->db->query_read($sql);
		$result = $rs->result_array();
		return $result;		
	}

	/**
	 *  更新数据信息
	 *  @param $id 
	 *  @param $data
	 *  @return true/false
	 */
	
	public function updateData($id,$data)
	{
		$sql = $this->update($id,$data,$this->_table);
		$rs = $this->db->query_write($sql);
		return $rs;
	}
	
	/**
	 * 
	 * 查询信息数据
	 * @param unknown_type $id
	 * @param unknown_type $col
	 */
	public function loadData($id, $col = null)
	{
		$sql = $this->load($id,$col);
		$rs = $this->db->query_read($sql);
		$result = $rs->result_array();
		return  $result;
	}
	
	public function deleteData($id, $col = null)
	{
		$sql = $this->delete($id,$col);
		$rs = $this->db->query_write($sql);
		return $rs;
	}
	
	public function insertData($data, $table = null)
	{
		$sql = $this->insert($data, $table = null);
		$rs  = $this->db->query_write($sql);
		return $rs;
		
	}
}
?>