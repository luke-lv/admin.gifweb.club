<?php

/**
 * Gifcontent_type.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	songqinglu <songqinglu@staff.sina.com.cn>
 * @date	15:23:10 2017-05-01
 * @version	$Id: Index.php 11 2017-05-01 03:24:50Z songqinglu $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */
class Gifcontent_type extends MY_Controller
{
	private $image_domin='http://glapp.oss-cn-beijing.aliyuncs.com/';
	public function __construct()
	{
		parent::__construct();
		$this->_checkAdmin();
		$this->load->model('common_model');
		$this->load->model('gifweb/gifcontent_model','gifcontent_model');
		$this->load->model('gifweb/gifcontent_image_model','gifcontent_image_model');
		$this->load->model('gifweb/gifcontent_type_model','gif_type_model');
		
	}

	/*
	*gif类型列表
	*宋庆禄
	*2017-05-01
	*/
	public function index()
	{	
		$searchKey = trim($this->input->get('search_key'));
		
		$option['search_key'] = $searchKey;
		$condition = array();
		if (!empty($searchKey)) {
			$condition['where']['name'] = array('like','%'.$searchKey.'%');//名称关键字
		}
		
		
		$type_list = $this->gif_type_model->pages( $this->input->get( 'page', 1 ), PAGELIST, $condition );
		$data['type_list'] = $type_list;
		$data['pages'] = $this->gif_type_model->pages;
		$this->_assign('option', $option);
		$this->_assign('data', $data);
		$this->_render();
	}


	/*
	*添加动态图片内容
	*宋庆禄
	*2017-04-25
	*/
	public function add(){
	    $uri = $this->uri->uri_string;
	    $defaultUri = '/gifweb/gifcontent_type/add';
	    $rq_method = strtolower($this->input->server('REQUEST_METHOD'));
	    $id = $this->input->get('id');//编辑页面 有ID
	    if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$act = $this->input->post('act');
	        $id = $this->input->post('id');
			//content_type 表数据
	        $dataArr['name'] = $this->input->post('name');//类型名称
	        $dataArr['is_show'] = $this->input->post('is_show');//1显示 2隐藏
	        $dataArr['status'] = $this->input->post('status');//1正常 2失效
	        if($act=='add')
	        {
	            $ret_id = $this->gif_type_model->insertData($dataArr);
	        }
	        elseif($act=='edit' && $id)
	        {
	            $ret = $this->gif_type_model->updateData($id,$dataArr);
	        }
	
	
	        $message = $ret ? '操作成功！' : '操作失败！';
	        $this->showmessage($message, '', '', '');
	
	
	
	    }
	    else
	    {
	        if($id)//获取对应ID内容
	        {
	            $res_data = $this->gif_type_model->loadData($id);
	            $this->_assign('r',$res_data);
	        }
	        $this->_assign('img_domin',$this->image_domin);
	        $this->_render();
	    }
	}



}

?>
