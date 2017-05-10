<?php

/**
 * Index.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	14:28:26 2012-12-13
 * @version	$Id: Index.php 202 2013-01-17 02:58:23Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class Index extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		//$this->load->helper('url');
		header('Location:/admin/index/index');
		exit(0);
	}
}
?>