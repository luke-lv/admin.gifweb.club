<?php

/**
 * Distatic.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	17:07:19 2013-1-23
 * @version	$Id: Distatic.php 246 2013-01-24 03:38:50Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class shop_distatic
{
	protected static $instance = null;
	
	protected $file;

	const DATA_ROOT_PATH = "/data1/www/htdocs/admin.games.sina.com.cn/gameadmin/data/uploads/";
	
	const FILE_ROOT_PATH = "/shop/uploads/";
	
	const SCRIPT_FILENAME = "dist_static.php";
	
	public function __construct()
	{
	}
	
	public static function getInstance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function file($file = null)
	{
		$this->file = $file;
		
		return $this;
	}
	
	public function dist($file = null)
	{
		empty($file) or $this->file = $file;
		if (empty($this->file)) {
			return false;
		}
		$file = self::FILE_ROOT_PATH . trim($this->file, "/");
		if (!file_exists(self::DATA_ROOT_PATH . $file)) {
			return false;
		}
		$command ="cd ".self::DATA_ROOT_PATH."; /usr/local/sinasrv2/bin/php " . self::DATA_ROOT_PATH . self::SCRIPT_FILENAME . " \"{$file}\" > /dev/null";
		exec($command);
	}
}
?>
