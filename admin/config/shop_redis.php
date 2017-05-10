<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| REDIS CONFIG
| -------------------------------------------------------------------
|
*/

// $config['master'] = array(
// 			'host'	=> 'rm8009.eos.grid.sina.com.cn',
// 			'port'		=> 8009,
// 			'timeout'	=> 1
// 			);
/**
$config['slave'] = array(
			'host'	=> 'rs8009.hebe.grid.sina.com.cn',
			'port'		=> 8009,
			'timeout'	=> 1
			);
*/
$config['master'] = array(
		'host'	=> 'rm7304.eos.grid.sina.com.cn',
		'port'		=> 7304,
		'timeout'	=> 2
);

$config['slave'] = array(
		'host'	=> 'rs7304.hebe.grid.sina.com.cn',
		'port'		=> 7304,
		'timeout'	=> 2
);


/* End of file redis.php */
/* Location: ./application/config/redis.php */