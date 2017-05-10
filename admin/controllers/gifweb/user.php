<?php

/**
 * Index.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	songqinglu <songqinglu@staff.sina.com.cn>
 * @date	15:23:10 2017-04-25
 * @version	$Id: Index.php 11 2012-12-19 03:24:50Z songqinglu $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */
class User extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->_checkAdmin();
		$this->load->model('gifweb/user_model','user_model');
		
	}

	/*
	*用户列表
	*宋庆禄
	*2017-04-25
	*/
	public function index()
	{	
		$searchKey = trim($this->input->get('search_key'));
		
		$option['search_key'] = $searchKey;
		$condition = array();
		if (!empty($searchKey)) {
			$condition['where']['nickname'] =  array('like',"%$searchKey%");
		}
		
		
		$users = $this->user_model->pages( $this->input->get( 'page', 1 ), PAGELIST, $condition );
		foreach($users as $k=>$v)
		{
			
		}
		$data['users'] = $users;
		$data['pages'] = $this->user_model->pages;
		$this->_assign('option', $option);
		$this->_assign('data', $data);
		$this->_render();
	}
	
	

}

?>