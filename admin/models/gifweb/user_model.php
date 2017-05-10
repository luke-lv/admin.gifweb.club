<?php

/**
 * User.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	songqinglu <qinglu@staff.sina.com.cn>
 * @date	1:14:18 2017-04-25
 * @version	$Id: User.php 13 2012-12-19 07:10:10Z songqinglu $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class User_model extends MY_Model
{

	protected $_table = 'gifweb_user';
	protected $_pk = 'uid';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('func');
		$this->load->database('default');
	}
	

	/**
	 * 返回表名儿
	 * @return String
	 */
	public function getTable()
	{
		return $this->_table;
	}
	
	/**
	 * 
	 * 根据条件查询数据
	 * @param array
	 * @return Array
	 */
	public function findData($conditons)
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
	
	public function updateData($uid,$data)
	{
		$sql = $this->update($uid,$data,$this->_table);
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
		$result = $rs->row_array();
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
	
	/**
	 * Count result
	 *
	 * @param string $where
	 * @param string $table
	 * @return int
	 */
	public function count($where, $table = null)
	{
		if (null == $table) $table = $this->_table;
	
		try {
			$sql = "select count(1) as cnt from $table where $where";
			$rs = $this->db->query_read($sql);
			$result = $rs->result_array();
			$result = $result[0];
			return empty($result['cnt']) ? 0 : $result['cnt'];
		} catch (Exception $e) {
			$this->error(array('code' => self::SYSTEM_ERROR, 'msg' => $e->getMessage()));
			return false;
		}
	}
	
	/**
	 * 根据用户经验值获取用户等级
	 * 
	 */
	public function getLevel($exps){
		$level = 0;
		$exps = intval($exps);
		if($exps < 50){
			$level = 0;
		}elseif($exps >= 50 && $exps < 100){
			$level = 1;
		}elseif($exps >= 100 && $exps < 200){
			$level = 2;
		}elseif($exps >= 200 && $exps < 400){
			$level = 3;
		}elseif($exps >= 400 && $exps < 800){
			$level = 4;
		}elseif($exps >= 800 && $exps < 1500){
			$level = 5;
		}elseif($exps >= 1500 && $exps < 3000){
			$level = 6;
		}elseif($exps >= 3000 && $exps < 6000){
			$level = 7;
		}elseif($exps >= 6000 && $exps < 15000){
			$level = 8;
		}elseif($exps >= 15000 && $exps < 30000){
			$level = 9;
		}elseif($exps >= 30000){
			$level = 10;
		}

		return $level;
	}

	
	/**
	 * 根据用户等级获取用户经验值
	 * 所有的start&end 对应的值都是包含状态 >= or <=
	 */
	public function getExps($level){
		$exps_arr = array();
		$level = intval($level);
		switch($level)
		{
			case 0:
				$exps_arr['start'] = 0;
				$exps_arr['end'] = 49;
				break;
			case 1:
				$exps_arr['start'] = 50;
				$exps_arr['end'] = 99;
				break;
			case 2:
				$exps_arr['start'] = 100;
				$exps_arr['end'] = 199;
				break;
			case 3:
				$exps_arr['start'] = 200;
				$exps_arr['end'] = 399;
				break;
			case 4:
				$exps_arr['start'] = 400;
				$exps_arr['end'] = 799;
				break;
			case 5:
				$exps_arr['start'] = 800;
				$exps_arr['end'] = 1499;
				break;
			case 6:
				$exps_arr['start'] = 1500;
				$exps_arr['end'] = 2999;
				break;
			case 7:
				$exps_arr['start'] = 3000;
				$exps_arr['end'] = 5999;
				break;
			case 8:
				$exps_arr['start'] = 6000;
				$exps_arr['end'] = 14999;
				break;
			case 9:
				$exps_arr['start'] = 15000;
				$exps_arr['end'] = 29999;
				break;
			case 10:
				$exps_arr['start'] = 30000;
				$exps_arr['end'] = 1000000;
				break;
			default:
				break;
		}
		
		return $exps_arr;
	}
}

?>