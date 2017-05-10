<?php

/**
 * Index.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	15:23:10 2012-12-10
 * @version	$Id: Index.php 11 2012-12-19 03:24:50Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */
class Index extends MY_Controller
{

	protected $_mResource;
	protected $show_submenu = false;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/resourceModel');
		$this->_mResource = $this->resourceModel;
		
	}

	public function index()
	{	
		$this->_checkAdmin();
		$this->_checkPrivilege();
		$view = array();
		$view['top_menu'] = $this->_mResource->adminResource(0);

		$user = $this->session->userdata('loginuser');
		$view += (array) $user;

		$this->_view->assign('view', $view);
		$this->_render('index/index.html');
		exit(0);
	}
	
	public function right()
	{
		$this->_view->assign('menu', $menu = '');
		$this->_render();		
	}
	
	public function public_current_pos()
	{
		$menuid = $this->input->get('menuid');
		echo rtrim($this->_mResource->currentResource($menuid), ' >');
		return false;
	}

	public function public_menu_left()
	{
		$menuid = intval($this->input->get('menuid'));
		$datas = $this->_mResource->adminResource($menuid);
		$parentid = $this->input->get('parentid');
		if (null != $parentid && (($parentid = intval($parentid)) || ($parentid = 10))) {
			
			foreach ($datas as $_value) {
				if ($parentid == $_value['id']) {
					echo '<li id="_M' . $_value['id'] . '" class="on top_menu"><a href="javascript:_M(' . $_value['id'] . ',\'?m=' . $_value['m'] . '&c=' . $_value['c'] . '&a=' . $_value['a'] . '\')" hidefocus="true" style="outline:none;">' . $_value['title'] . '</a></li>';
				} else {
					echo '<li id="_M' . $_value['id'] . '" class="top_menu"><a href="javascript:_M(' . $_value['id'] . ',\'?m=' . $_value['m'] . '&c=' . $_value['c'] . '&a=' . $_value['a'] . '\')"  hidefocus="true" style="outline:none;">' . $_value['title'] . '</a></li>';
				}
			}
		} else {
			foreach ($datas as &$row) {
				$row['child'] = (array) $this->_mResource->adminResource($row['id']);
			}
			unset($row);
			$this->_view->assign('left_menu', $datas);
			echo $this->_render('index/left.html');
		}
		return false;
	}

	//后台站点地图
	public function public_map()
	{
		$this->show_header = false;
		$array = $this->_mResource->adminResource(0);
		$menu = array();
		foreach ($array as $k => $v) {
			$menu[$v['id']] = $v;
			$child = $this->_mResource->adminResource($v['id']);
			foreach ($child as &$row) {
				$row['child'] = $this->_mResource->adminResource($row['id']);
			}
			$menu[$v['id']]['child'] = $child;
		}
		unset($row);
		$this->_view->assign('menu', $menu);
		$this->_render();
	}

}

?>