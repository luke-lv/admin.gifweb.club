<?php

/**
 * OpenApiRpc.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	16:09:43 2012-12-17
 * @version	$Id: OpenRpc.php 11 2012-12-19 03:24:50Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class OpenRpc
{

	public static $timeout = 5000;
	public static $connect_timeout = 5000;
	public static $url = "http://i.open.t.sina.com.cn/rpcapi";
	
	public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
		$CI->load->library('request');
		
	}
	
	/**
	 * curl -v "http://i.open.t.sina.com.cn/rpcapi" -d 'name=application&func=getPayAppList&args=a:1:{i:0;a:5:{s:10:"is_gameapp";i:0;s:8:"verified";i:1;s:4:"page";i:1;s:8:"pagesize";i:20;s:5:"order";s:16:"verify_time|desc";}}';echo 
	 */
	public static function RpcCall($name, $func, $arg, $method = "POST", $debug = false)
	{

		$rpcarg['args'] = serialize($arg);
		$rpcarg['name'] = $name;
		$rpcarg['func'] = $func;
		return self::httpRequest(self::$url, $rpcarg, $method, $debug);
	}

	public static function httpRequest($url, $arg, $method = "POST", $debug = false)
	{
		$http_request = new request();
		if (strtoupper($method) == "POST" || strtoupper($method) == "GET") {
			$http_request->set_method(strtoupper($method));
		} else {
			return false;
		}
		if (is_array($arg)) {
			foreach ($arg as $key => $value) {
				$http_request->add_post_field($key, $value);
			}
		} else {
			$arg = array();
		}
		$http_request->set_url($url);
		$http_request->set_timeout(self::$timeout);
		$http_request->set_connect_timeout(self::$connect_timeout);
		$http_request->send();
		if ($debug == true) {
			var_dump($url);
			var_dump($arg);
			var_dump($http_request->get_response_content());
			var_dump(unserialize($http_request->get_response_content()));
		}
		$res = unserialize($http_request->get_response_content());
		if ($res['result'] !== false) {
			$result = $res['result'];
			return $result;
		} else {
			return false;
		}
	}

}

?>