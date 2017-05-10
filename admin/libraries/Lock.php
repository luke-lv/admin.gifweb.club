<?php

/**
 * Lock.php
 * 排他锁
 * 防止 Cron 在执行期间，避免过多任务计划堆积
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	17:56:07 2012-12-21
 * @version	$Id: Lock.php 28 2012-12-21 11:17:21Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class Lock
{

	protected $_lockFile;
	protected $_waitTime;
	protected $_fileHandle;

	/**
	 * @param string $lockFile 用来锁定的文件
	 * @param int $waitTime 等待时间，为避免过多任务计划堆积
	 */
	public function __construct($lockFile='lockseq.tmp', $waitTime = 5)
	{
		$this->_lockFile = $lockFile;
		$this->_waitTime = $waitTime;
	}

	/**
	 * 执行锁
	 */
	public function lock($exit = true)
	{
		while (!($fHandle = fopen($this->_lockFile, 'w+'))) {
			sleep(1);
			$this->_waitTime--;
			if ($this->_waitTime <= 0) {
				if ($exit)
					exit();
				else
					return false;
			}
		}
		$this->_fileHandle = $fHandle;

		while (!(flock($fHandle, LOCK_EX))) {
			sleep(1);
			$this->_waitTime--;
			if ($this->_waitTime <= 0) {
				if ($exit)
					exit();
				else
				{
					return false;
				}
			}
		}
		return true;
	}

	/**
	 * 保持锁定，可能由于php优化器的原因，在还没执行unlock的时候php就释放了锁
	 * （他可能认为我们的锁定没有任何意义：没有写入），所以在unlock之前运行
	 * 这个方法，以防止php提前释放锁定
	 */
	public function keep()
	{
		$arrTime = microtime();
		$date = date('Y-m-d H:i:s', $arrTime[0]) . '.' . substr($arrTime[1], 0, 4);
		@fwrite($this->_fileHandle, $date);
	}

	/**
	 * 执行解锁
	 */
	public function unlock()
	{
		flock($this->_fileHandle, LOCK_UN);
		fclose($this->_fileHandle);
	}

}

?>