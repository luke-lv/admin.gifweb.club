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
class Gifcontent extends MY_Controller
{
	private $image_domin='http://gifweb.oss-cn-beijing.aliyuncs.com/';
	public function __construct()
	{
		parent::__construct();
		$this->_checkAdmin();
		$this->load->model('common_model');
		$this->load->model('gifweb/gifcontent_model','gifcontent_model');
		$this->load->model('gifweb/gifcontent_image_model','gifcontent_image_model');
		$this->load->model('gifweb/upload_image_model','mUploadImage');
		$this->load->model('gifweb/gifcontent_type_model','gif_type_model');

		//标签类型

		$condition_type['where']['status'] = 1;
        $condition_type['where']['is_show'] = 1; 
        $type_list = $this->gif_type_model->findData($condition_type);
		$this->_assign('type_list',$type_list);
		
	}

	/*
	*gif列表
	*宋庆禄
	*2017-04-25
	*/
	public function index()
	{	
		$searchKey = trim($this->input->get('search_key'));
		$type = trim($this->input->get('type'));
		$option['search_key'] = $searchKey;
		$option['type'] = $type;

		$condition = array();
		if (!empty($searchKey)) {
			$condition['where']['title|gif_desc'] = array('like','%'.$searchKey.'%');//内容关键字
		}

		if($type){
			$condition['where']['type'] = $type;
		}
		
		
		$gif_list = $this->gifcontent_model->pages( $this->input->get( 'page', 1 ), PAGELIST, $condition );
		foreach($gif_list as $k=>$v)
		{
			$gif_list[$k]['create_time'] = date('Y-m-d H:i:s',$v['create_time']);
		}
		$data['gif_list'] = $gif_list;
		$data['pages'] = $this->gifcontent_model->pages;
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
	    $defaultUri = '/gifweb/gifcontent/add';
	    $rq_method = strtolower($this->input->server('REQUEST_METHOD'));
	    $id = $this->input->get('id');//编辑页面 有ID
	    if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$act = $this->input->post('act');
	        $id = $this->input->post('id');
			//content 表数据
	        $dataArr['title'] = $this->input->post('title');//标题
	        $dataArr['gif_desc'] = $this->input->post('desc');//描述
			$dataArr['status'] = $this->input->post('status');//状态 0=未审核 1= 审核 2=已关闭 3=删除
			$dataArr['type'] = $this->input->post('type');
			$dataArr['create_time'] = SYS_TIME;

			//content_image 表数据
			$dataImgArr['url'] = $this->input->post('gif_img');
			$dataImgArr['type'] = 1;//1=gif图片
			$full_path_img_url = $this->image_domin.$dataImgArr['url'];
			
			list($dataImgArr['width'],$dataImgArr['height']) = getimagesize($full_path_img_url);
			$dataImgArr['create_time'] = SYS_TIME;
			
	        
	        if($act=='add')
	        {
	        	$this->common_model->trans_begin();//事物开始；
	            $ret_id = $this->gifcontent_model->insertData($dataArr);
	            $dataImgArr['mark'] = $ret_id;//返回的content表中的id
	            $ret = $this->gifcontent_image_model->insertData($dataImgArr);
	            $this->common_model->trans_begin();//事物结束；
	            echo $ret;
	        }
	        elseif($act=='edit' && $id)
	        {
	            unset($dataArr['create_time']);
	            $ret = $this->gifcontent_model->updateData($id,$dataArr);
	        }
	
	
	        $message = $ret ? '操作成功！' : '操作失败！';
	        $this->showmessage($message, '', '', '');
	
	
	
	    }
	    else
	    {
	        if($id)//获取对应ID内容
	        {
	            $res_data = $this->gifcontent_model->loadData($id);
	            if($res_data)
	            {
					$condition['where']['status'] = 1;
					$condition['where']['type'] = 1;
					$condition['where']['mark'] = $res_data['cid'];
					$res_content_image = $this->gifcontent_image_model->findData($condition);
					//目前只有一张图片 直接赋值
					$res_data['gif_img'] = $res_content_image[0]['url'];
	                $this->_assign('r',$res_data);
	            }
	        }
	        $this->_assign('img_domin',$this->image_domin);
	        $this->_render();
	    }
	}





	//上传图片方法
	public function uploadImg($type = 'default')
	{
		//增加校验
		//增加图片宽高检测
		list($width,$height) = getimagesize($_FILES['upfile']['tmp_name']);

		$res_img_url = $this->mUploadImage->upload_img($_FILES['upfile']);
		$res_src = $this->image_domin.$res_img_url['data'];
		if($res_img_url)
		{
			$arrs = array('error'=>'1','urls'=>$res_src,'url_fix'=>$res_img_url['data'],'w'=>$res_img_url['w'],'h'=>$res_img_url['h']);
		}else
		{
			$arrs = array('error'=>'-1','urls'=>$res_src,'url_fix'=>$res_img_url['data'],'w'=>$res_img_url['w'],'h'=>$res_img_url['h']);
		}
		//print_r($arrs);
		echo json_encode($arrs);
	}
	
	

}

?>
