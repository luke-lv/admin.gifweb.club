<?php

/**
 * Resource.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	16:51:58 2012-12-10
 * @version	$Id: Resource.php 50 2012-12-28 02:12:55Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class Resource extends MY_Controller
{

	protected $_mResource;
	
	protected $_cTree;


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/resourceModel');
		$this->load->library('tree');
		
		$this->_mResource = $this->resourceModel;		
		$this->_cTree = $this->tree;
	}
	
	public function index()
	{
		$this->_cTree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$this->_cTree->nbsp = '&nbsp;&nbsp;&nbsp;';
		
		$result = $this->_mResource->findData(array('where'=>array('is_hide'=>0)));
		
		if (is_array($result)) {
			$array = array();
			$menuid = isset($_GET['menuid']) ? $_GET['menuid'] : '';
			empty($_GET['menuid']) || $menuid = '&menuid=' . $menuid;
			foreach($result as $r) {
				$r['cname'] = $r['title'];
				$r['str_manage'] = '<a href="/admin/resource/add?parentid=' . $r['id'] . $menuid . '">添加子菜单'
						. '</a> | <a href="/admin/resource/edit?id=' . $r['id'] . $menuid . '">修改'
						. '</a> | <a href="javascript:confirmurl(\'/admin/resource/delete?id=' . $r['id'] . $menuid . '\',\'确认要删除【' . $r['title'] . '】\')">删除</a> ';
				$array[] = $r;
			}

			$str = "<tr>
						<td align='center'><input type='checkbox' name='ids[]' value='\$id' /></td>
						<td align='center'><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input-text-c' /></td>
						<td align='center'>\$id</td>
						<td>\$spacer\$cname</td>
						<td align='left'>\$name</td>
						<td align='center'>\$str_manage</td>
					</tr>";
			$this->_cTree->init($array);
			$categorys = $this->_cTree->get_tree(0, $str);

			$this->_view->assign('categorys', $categorys);
		}
		$this->_view->assign('uri', '/admin/resource/listorder');
		echo $this->_render('resource/index.html');
	}
	
	public function add()
	{
		$view = array();
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/resource/add/';
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$arg = $this->input->post('info');
			if (empty($arg['name'])) {
				$this->error();
			}
			
			empty($arg['m']) or ($arg['m'] = strtolower($arg['m']));
			empty($arg['c']) or ($arg['c'] = strtolower($arg['c']));
			empty($arg['a']) or ($arg['a'] = strtolower($arg['a']));
			
			$ret = $this->_mResource->insertData($arg);
			$message = $ret ? '添加资源成功' : '添加资源失败';
			$this->showmessage($message);
		} else {
			$view['uri'] = $uri;
			$parentid = intval($this->input->get('parentid', 0));
			$result = $this->_mResource->findData();
			$array = array();
			foreach($result as $r) {
				$r['cname'] = $r['title'];
				$r['selected'] = $r['id'] == $parentid ? 'selected' : '';
				$array[] = $r;
			}
			$str = "<option value='\$id' \$selected>\$spacer \$cname</option>";
			$this->_cTree->init($array);
			$view['categorys'] = $this->_cTree->get_tree(0, $str);
			$this->_view->assign('view', $view);
			echo $this->_render('resource/add.html');
		}
		return false;
	}

	public function edit()
	{
		$view = array();
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/resource/edit/';
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$id = intval($this->input->post('id'));
			$ret = false;
			$data = $this->input->post('info');
			if($id > 0 && !empty($data['name'])) {
				$ret = $this->_mResource->updateData($id, $data);
			}
			$func = $ret ? 'success' : 'error';
			$this->$func(null, '/admin/resource/index');
		} else {			
			$view['uri'] = $uri;
			$id = intval($this->input->get('id'));
			$data = $this->_mResource->loadData($id);
			$data = $data[0];
			$result = $this->_mResource->findData();
			$array = array();
			$parentid = isset($data['parentid']) ? $data['parentid'] : 0;
			foreach($result as $r) {
				$r['cname'] = $r['title'];
				$r['selected'] = $r['id'] == $parentid ? 'selected' : '';
				$array[] = $r;
			}
			$str = "<option value='\$id' \$selected>\$spacer \$cname</option>";
			$this->_cTree->init($array);
			$categorys = $this->_cTree->get_tree(0, $str);

			$view['categorys'] = $categorys;
			$view['data'] = $data;
			$this->_view->assign('view', $view);
			echo $this->_render();
		}
		return false;
	}

	public function delete()
	{
		$id = intval($this->input->get('id'));
		$ret = false;
		$id && $ret = $this->_mResource->deleteData($id);
		$func = $ret ? 'success' : 'error';
		$this->$func();
	}

	public function listorder()
	{
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/resource/listorder/';
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$data = $this->input->post('listorders');
			$ids = $this->input->post('ids');
			if (is_array($data) && is_array($ids)) {
				foreach ($ids as $id) {
					isset($data[$id]) && ($listorder = intval($data[$id])) && $this->_mResource->updateData($id, array('listorder' => $listorder));
				}
			}
			$this->success(null, '/admin/resource/index');
		} else {
			$this->error(null, '/admin/resource/index');
		}
		return false;
	}

	public function dns(){
		$this->_render();
	}
	
	/*******************************************
	*** 通过DCM API修改域名指向,修改后实时生效
	*** 因修改有风险，限定只有haibo8账号可进行修改
	***
	*** 接口授权IP为10.79.104.28,10.79.104.31
	********************************************/
	public function dnschange(){
		$domain = trim( $this->input->post('domain',true) );
		$from	= trim( $this->input->post('from',true) );
		$to		= trim( $this->input->post('to',true) );
		$type	= intval( $this->input->post('type',true) );
		
		// A记录
		if($type == 1){
			if(!filter_var($to, FILTER_VALIDATE_IP) || empty($to)){
				echo "<script>alert('IP地址有误');window.history.go(-1);</script>";
				return;
			}
		}elseif($type == 2){ // cname
			if(substr($to,-1) != "." || empty($to)){
				echo "<script>alert('CNAME地址有误');window.history.go(-1);</script>";
				return;
			}
		}else{
			echo "<script>alert('请正确填写！');window.history.go(-1);</script>";
			return;
		}
		
		// 限定只有haibo8用户可操作
		$user = $this->session->userdata('loginuser');
		if($user['username'] != 'haibo8'){
			$msg = '无操作权限,请联系haibo8@staff.sina.com.cn';
			echo "<script>var msg='{$msg}';alert(msg);setTimeout(function(){window.history.go(-1);},1000);</script>";
			die();
		}


		$apiUrl = "http://dnschange.intra.sina.com.cn/api";
		$postData['key'] = "9035beec2dd7f2da7bc8eb01";
		$postData['change'][0]['domain'] = $domain;
		$postData['change'][0]['group'] = "";
		$postData['change'][0]['from'] = $from;
		$postData['change'][0]['to'] = $to;

		$header = array ("Accept:application/json");

		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $apiUrl );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POST, 1);
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($postData) );
		// 执行
		$res = curl_exec ( $ch );
		if ($res == FALSE) {
			echo "error:" . curl_error ( $ch );
		}
		// 关闭
		curl_close ( $ch );
		
		$res = json_decode($res, true);
		if($res['code'] == 0 && $res['taskId'] > 0){
			$msg = '修改成功,可到DCM系统查看详情';
			$r['where'] = '/admin/resource/dns/?t=' . time();
			echo "<script>var url = '{$r['where']}';var msg='{$msg}';alert(msg);setTimeout(function(){window.location.href=url;},1000);</script>";
		}else{
			$msg = '修改失败,'.$res['code'].":".$res['msg'];
			echo "<script>var msg='{$msg}';alert(msg);setTimeout(function(){window.history.go(-1);},1000);</script>";
		}
		return '';
	}
	
}
?>