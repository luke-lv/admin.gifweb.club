<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| REDIS CONFIG
| -------------------------------------------------------------------
|
*/

$config['master'] = array(
			'host'	=> 'rm8009.eos.grid.sina.com.cn',
			'port'		=> 8009,
			'timeout'	=> 1
			);
/**
$config['slave'] = array(
			'host'	=> 'rs8009.hebe.grid.sina.com.cn',
			'port'		=> 8009,
			'timeout'	=> 1
			);
*/

/* End of file redis.php */
/* Location: ./application/config/redis.php */