<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/**
 * APP $envrion
 */
define('APP_ENVRION', 'development');

/**
 * 目录分隔符别名
 */
define('DS', DIRECTORY_SEPARATOR);

/**
 * 根目录
 */
define('PATH_ROOT', dirname(__FILE__));

/**
 * 基础目录
 */
define('PATH_BASE', dirname(PATH_ROOT));
/**
 * 项目路径
 */
define('APPLICATION_PATH', PATH_BASE . DS );
define('PATH_APPLICATION', APPLICATION_PATH);

/**
 * 配置目录
 */
define('PATH_CONFIG', PATH_APPLICATION . DS . 'configs');

define('SYS_TIME',			time());
define('HTTP_REFERER',		isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
define('MAGIC_QUOTES_GPC',	get_magic_quotes_gpc());
define('PATH_APPLOG',		'/data1/www/applogs/admin.games.sina.com.cn');
define('PATH_UPLOADS',		PATH_BASE . DS . 'data' . DS . 'uploads');
define('PAGE_LIST_SIZE',	25);

define('PATH_GDB_DOTA2_AVATAR', APPPATH . 'uploads/gamedb/dota2/avatar');
define('PATH_GDB_BNS_PIC', APPPATH . 'uploads/gamedb/bns/pic');


define('UPLOADS',		FCPATH . '/shop/uploads/');

/* End of file constants.php */
/* Location: ./application/config/constants.php */