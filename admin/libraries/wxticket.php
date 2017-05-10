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
class WxTicket{
	
	private $token;
	
	public function __construct(){
		$this->token = $this->getToken();
		
	}
	
	private function  getToken(){
		
		$mc_token_key = 'wx_newcard_token';
		$mc_token_val = $this->cache->redis->get($mc_token_key);
		if($mc_token_val){
			$this->token = $mc_token_val;
			//print_r('mem->:'.$this->token);
		}else{
			$token_interface = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".self::WX_APPID."&secret=".self::WX_APPSECRET;
			$token_return = json_decode($this->psocket->httpGet($token_interface),true);
			if(!empty($token_return['access_token']) && !empty($token_return['expires_in'])){
				$this->token = $token_return['access_token'];
				$this->cache->redis->set($mc_token_key,$token_return['access_token'],$token_return['expires_in']);
				//$this->responseText('new->:'.$this->token);
			}else{
				if($this->debug) exit('创建自定义菜单错误');
			}
		}
	}
	
	
	
	
	
	
	
	
	
}
