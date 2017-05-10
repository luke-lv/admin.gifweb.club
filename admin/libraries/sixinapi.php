<?php

/**
 * SiXinApi.php
 * 
 * Copyright (c) 2015 SINA Inc. All rights reserved.
 * 
 * @author	zhimiao
 * @date	
 * @version	
 * @desc	
 */
//error_reporting(E_ALL);
class SiXinApi{
	
	//私信接口URL
    //主内部池 【仅主站独占使用】
	//private $apiUrl = 'http://i.api.weibo.com/direct_messages/new.json';
    //次级内部池 【供其他部门使用，非主站项目请使用本接口池】
	private $apiUrl = 'http://i2.api.weibo.com/2/direct_messages/new.json';
	
	//官博信息
	private $appkey = '3612596821';
	private $wb_user = '游戏编辑部';
	private $wb_pass = 'youxibianjibu';
	private $wb_uid = '1255795640';

	//接口请求
	/**
	 * curl -u "游戏编辑部:youxibianjibu" -d "source=3612596821&uid=2384735762&text=test" "http://i.api.weibo.com/direct_messages/new.json"
	 * @param unknown $uid
	 * @param unknown $text
	 * @return unknown
	 */
	
	public function send($uid,$text)
	{
		if (empty($uid) || empty($text)){
			exit('参数不能为空');
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$aParam = array();
		$aParam['source'] = $this->appkey;
		$aParam['uid'] = $uid;
		$aParam['text'] = urlencode($text);
		$sQuery = http_build_query($aParam);
		//echo "strA:" . $sQuery .PHP_EOL;
		curl_setopt($ch, CURLOPT_POST, 1);
		//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $sQuery);
		curl_setopt($ch, CURLOPT_USERPWD, $this->wb_user . ":" . $this->wb_pass);
		curl_setopt($ch, CURLOPT_URL,$this->apiUrl);
		$result = curl_exec($ch);
		$rearr=json_decode($result,true);
		curl_close($ch);
		return $rearr;
	}
}