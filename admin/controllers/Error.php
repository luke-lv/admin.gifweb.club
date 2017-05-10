<?php

/*
 * Error.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	15:30:51 2012-12-9
 * @version	$Id: Error.php 11 2012-12-19 03:24:50Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

/**
 * Description of Error
 *
 * @author sina
 */
class ErrorController extends Yaf_Controller_Abstract
{
	public function init()
	{
		Yaf_Dispatcher::getInstance()->disableView();
	}

	public function errorAction($exception)
	{
		/* error occurs */
		switch($exception->getCode()) {
			case YAF_ERR_NOTFOUND_MODULE:
			case YAF_ERR_NOTFOUND_CONTROLLER:
			case YAF_ERR_NOTFOUND_ACTION:
			case YAF_ERR_NOTFOUND_VIEW:
				echo 404, ":", $exception->getMessage();
				break;
			default :
				$message = $exception->getMessage();
				echo 0, ":", $exception->getMessage();
				break;
		}
	}
}

?>
