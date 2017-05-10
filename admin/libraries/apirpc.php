<?php

/**
 * ApiRpc.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	16:09:23 2012-12-17
 * @version	$Id: ApiRpc.php 11 2012-12-19 03:24:50Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class ApiRpc
{

	public static $timeout = 5000;
	public static $connect_timeout = 5000;
	private static $_hr;
	
	public function __construct()
	{
		$CI = &get_instance();
		$CI->load->library('request');
		self::$_hr = $CI->request;		
	}
	
	public static function RpcCall($url, $arg)
	{
		
	}

	public static function httpRequest($url, $arg, $method = "POST", $debug = false)
	{
		$http_request = self::$_hr;
		if (strtoupper($method) == "POST" || strtoupper($method) == "GET") {
			$http_request->set_method(strtoupper($method));
		} else {
			return false;
		}
		if (is_array($arg)) {
			foreach ($arg as $key => $value) {
				if ($http_request->get_method() == "GET") {
					$http_request->add_query_field($key, $value);
				} else {
					$http_request->add_post_field($key, $value);
				}
			}
		} else {
			$arg = array();
		}
		$http_request->set_url($url);
		$http_request->set_timeout(self::$timeout);
		$http_request->set_connect_timeout(self::$connect_timeout);
		$http_request->send();
		$res = $http_request->get_response_content();
		if ($debug == true) {
			var_dump($arg, $url, $res);
		}

		return $res;
	}

}
?>