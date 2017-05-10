<?php

/**
 * EnvelopeApi.php
 * 
 * Copyright (c) 2015 SINA Inc. All rights reserved.
 * 
 * @author	zhimiao
 * @date	
 * @version	
 * @desc	
 */
//error_reporting(E_ALL);
class EnvelopeApi{
	
	//签名密钥
	private $key = 'c935202338f9543576ac';
	//接口地址
	//创建或充值地址
	private $create_url = 'http://api.sc.weibo.com/v2/bonus/v/charge';
	//发放红包地址
	private $receive_url = 'http://api.sc.weibo.com/v2/bonus/v/recvasync';
	//查询地址
	private $select_url = 'http://api.sc.weibo.com/v2/bonus/v/query/set';
	
	//创建或充值红包
	public function create($out_set_id,$type=8,$title='',$amount,$ali_trade_id,$owner_uid){

		if (empty($out_set_id) || empty($amount) || empty($ali_trade_id) || empty($owner_uid)){
			//echo $out_set_id.','.$amount.','.$ali_trade_id.','.$owner_uid;
			return array('result' => false, 'msg' => '参数错误');
		}
		$data = array();
		$data['out_set_id'] = $out_set_id;
		$data['type'] = $type;
		$data['amount'] = $amount;
		$data['ali_trade_id'] = $ali_trade_id;
		$data['owner_uid'] = $owner_uid;
		if (!empty($title)){
			$data['title'] = $out_set_id;
		}
		//var_dump($data);	
		$res = $this->send($this->create_url,$data,$sMethod = 'GET');
		//记录日志
		//var_dump($res);
		if($res['code'] == '100000'){
			return array('result'=> true);
		} else {	
			return array('result' => false,'msg' => $res['msg']);
		}
	}
	
	//发放红包
	/*
	 * out_bonus_id 是int 业务方小红包id, 全局唯一
	 * out_set_id 是int 小红包对应的业务方红包集ID
	 * amount 是int 领取金额, 单位分
	 * recv_uid 是int 红包接收者uid
	 * sign_type 是string 签名类型，目前仅支持md5
	 * sign 是string 签名内容
	 */
	
	public function give($out_bonus_id ,$out_set_id ,$amount ,$recv_uid){
		
		if (empty($out_bonus_id) || empty($out_set_id) || empty($amount) || empty($recv_uid)){
			//echo $out_set_id.','.$amount.','.$ali_trade_id.','.$owner_uid;
			return array('result' => false, 'msg' => '参数错误');
		}
		$data = array();
		$data['out_bonus_id'] = $out_bonus_id;
		$data['out_set_id'] = $out_set_id;
		$data['amount'] = $amount;
		$data['recv_uid'] = $recv_uid;
		$res = $this->send($this->receive_url,$data,$sMethod = 'POST');
		if($res['code'] == '100000' && $res['data']['sub_code'] == '1' ){
			return array('result'=> true,'out_bonus_id' => $res['data']['out_bonus_id'] );
		} else {
			return array('result' => false,'data' => $res);
		}
	}

	/**
	 * 查询红包集信息
	 * 
	 * owner_uid 否int64 所属者uid
	 * creater_uid 否int64 支付者uid
	 * start_time 否int 起始创建时间戳，1416900291，默认所有
	 * end_time 否int 结束创建时间戳，1416900291，默认所有
	 * time_desc 否int 1：按创建时间倒序，0：升序(默认)
	 * page 否int 页码,默认1
	 * page_size 否int 每页数量, 默认10
	 * sign_type 是string 签名类型，目前仅支持md5
	 * sign 是string 签名内容
	 * 
	 */
	
	public function select($owner_uid , $creater_uid , $start_time , $end_time , $time_desc = 1 , $page=1 , $page_size=10 ){
		$data = array();
		if (!empty($owner_uid)) 
			$data['owner_uid'] = $owner_uid;
		if (!empty($creater_uid))
			$data['creater_uid'] = $creater_uid;
		if (!empty($start_time))
			$data['start_time'] = $start_time;
		if (!empty($end_time))
			$data['end_time'] = $end_time;
		if (!empty($time_desc))
			$data['time_desc'] = $time_desc;
		if (!empty($page))
			$data['page'] = $page;
		if (!empty($page_size))
			$data['page_size'] = $page_size;
		
		$res = $this->send($this->select_url,$data,$sMethod = 'POST');
		
		if($res['code'] == '100000'){
			return array('result'=> true,'data' => $res['data']);
		} else {
			return array('result' => false,'msg' => $res['msg']);
		}
		
	}
	
	//接口请求
	private function send($url,$aParam,$sMethod = '')
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		
		if (is_array($aParam)) {
			ksort($aParam);
			$sQuery = http_build_query($aParam);	//获得strA
		} else {
			$sQuery = $aParam;		//获得strA
		}
		
		//echo "strA:" . $sQuery .PHP_EOL;
		
		$strQuery = $sQuery.$this->key;	//获得strB
		$sign = md5($strQuery);			//获得sign
		
		if(isset($aParam['title'])){
			$aParam['title'] = urlencode($aParam['title']);
		}
		$aParam['sign'] = $sign;
		$aParam['sign_type'] = 'md5';
		
		if ($sMethod == "POST") {
			curl_setopt($ch, CURLOPT_POST, 1);
			//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($aParam));
		} else {
			curl_setopt($ch, CURLOPT_POST, 0);
			$url = $url . "?" .http_build_query($aParam);
		}
		
		//echo "URL:" . $url.PHP_EOL;
		//echo "参数" . http_build_query($aParam).PHP_EOL;
		
		curl_setopt($ch, CURLOPT_URL,$url);
		$result = curl_exec($ch);
		$rearr=json_decode($result,true);
		curl_close($ch);
		return $rearr;
	}
	
	
	
	
}
