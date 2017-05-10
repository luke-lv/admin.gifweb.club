<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;
// 游戏后台
$db['default']['w_hostname'] = 'm3753i.mars.grid.sina.com.cn:3753';
$db['default']['w_username'] = 'admin_games';
$db['default']['w_password'] = 'f5cFwlEMtxRVd7rS';
$db['default']['r_hostname'] = 's3753i.mars.grid.sina.com.cn:3753';
$db['default']['r_username'] = 'admin_games_r';
$db['default']['r_password'] = 'Wl69if530Kv4G7Br';
$db['default']['database'] = 'admin_games';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = FALSE;
$db['default']['stricton'] = FALSE;

// 台湾游戏网
$db['twgames']['w_hostname'] = 'm3753i.mars.grid.sina.com.cn:3753';
$db['twgames']['w_username'] = 'admin_games';
$db['twgames']['w_password'] = 'f5cFwlEMtxRVd7rS';
$db['twgames']['r_hostname'] = 's3753i.mars.grid.sina.com.cn:3753';
$db['twgames']['r_username'] = 'admin_games_r';
$db['twgames']['r_password'] = 'Wl69if530Kv4G7Br';
$db['twgames']['database'] = 'admin_games';
$db['twgames']['dbdriver'] = 'mysql';
$db['twgames']['dbprefix'] = '';
$db['twgames']['pconnect'] = FALSE;
$db['twgames']['db_debug'] = TRUE;
$db['twgames']['cache_on'] = FALSE;
$db['twgames']['cachedir'] = '';
$db['twgames']['char_set'] = 'utf8';
$db['twgames']['dbcollat'] = 'utf8_general_ci';
$db['twgames']['swap_pre'] = '';
$db['twgames']['autoinit'] = FALSE;
$db['twgames']['stricton'] = FALSE;
// 活动支持
$db['event']['w_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['event']['w_username'] = 'api_g';
$db['event']['w_password'] = 'dZo1mXaCe0233bQ9';
$db['event']['r_hostname'] = 's3752i.mars.grid.sina.com.cn:3752';
$db['event']['r_username'] = 'api_g_r';
$db['event']['r_password'] = 'Xt54oKa8we3lY51f';
$db['event']['database'] = 'api_g';
$db['event']['dbdriver'] = 'mysql';
$db['event']['dbprefix'] = '';
$db['event']['pconnect'] = FALSE;
$db['event']['db_debug'] = TRUE;
$db['event']['cache_on'] = FALSE;
$db['event']['cachedir'] = '';
$db['event']['char_set'] = 'utf8';
$db['event']['dbcollat'] = 'utf8_general_ci';
$db['event']['swap_pre'] = '';
$db['event']['autoinit'] = FALSE;
$db['event']['stricton'] = FALSE;

//dota2

$db['dota2']['w_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['dota2']['w_username'] = 'db_games_dota2';
$db['dota2']['w_password'] = 'f3u4w8n7b3h';
$db['dota2']['r_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['dota2']['r_username'] = 'db_games_dota2_r';
$db['dota2']['r_password'] = 'DAKAdfad3k4lzx';
$db['dota2']['database'] = 'db_games_dota2';
$db['dota2']['dbdriver'] = 'mysql';
$db['dota2']['dbprefix'] = '';
$db['dota2']['pconnect'] = FALSE;
$db['dota2']['db_debug'] = TRUE;
$db['dota2']['cache_on'] = FALSE;
$db['dota2']['cachedir'] = '';
$db['dota2']['char_set'] = 'utf8';
$db['dota2']['dbcollat'] = 'utf8_general_ci';
$db['dota2']['swap_pre'] = '';
$db['dota2']['autoinit'] = FALSE;
$db['dota2']['stricton'] = FALSE;


//lol

$db['lol']['w_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['lol']['w_username'] = 'api_g';
$db['lol']['w_password'] = 'dZo1mXaCe0233bQ9';
$db['lol']['r_hostname'] = 's3752i.mars.grid.sina.com.cn:3752';
$db['lol']['r_username'] = 'api_g_r';
$db['lol']['r_password'] = 'Xt54oKa8we3lY51f';
$db['lol']['database'] = 'api_g_lol';
$db['lol']['dbdriver'] = 'mysql';
$db['lol']['dbprefix'] = '';
$db['lol']['pconnect'] = FALSE;
$db['lol']['db_debug'] = TRUE;
$db['lol']['cache_on'] = FALSE;
$db['lol']['cachedir'] = '';
$db['lol']['char_set'] = 'utf8';
$db['lol']['dbcollat'] = 'utf8_general_ci';
$db['lol']['swap_pre'] = '';
$db['lol']['autoinit'] = FALSE;
$db['lol']['stricton'] = FALSE;
//

$db['pcgames']['w_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['pcgames']['w_username'] = 'api_g';
$db['pcgames']['w_password'] = 'dZo1mXaCe0233bQ9';
$db['pcgames']['r_hostname'] = 's3752i.mars.grid.sina.com.cn:3752';
$db['pcgames']['r_username'] = 'api_g_r';
$db['pcgames']['r_password'] = 'Xt54oKa8we3lY51f';
$db['pcgames']['database'] = 'api_g_games_data';
$db['pcgames']['dbdriver'] = 'mysql';
$db['pcgames']['dbprefix'] = '';
$db['pcgames']['pconnect'] = FALSE;
$db['pcgames']['db_debug'] = TRUE;
$db['pcgames']['cache_on'] = FALSE;
$db['pcgames']['cachedir'] = '';
$db['pcgames']['char_set'] = 'utf8';
$db['pcgames']['dbcollat'] = 'utf8_general_ci';
$db['pcgames']['swap_pre'] = '';
$db['pcgames']['autoinit'] = FALSE;
$db['pcgames']['stricton'] = FALSE;

//剑灵
$db['bns']['w_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['bns']['w_username'] = 'db_games_dota2';
$db['bns']['w_password'] = 'f3u4w8n7b3h';
$db['bns']['r_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['bns']['r_username'] = 'db_games_dota2_r';
$db['bns']['r_password'] = 'DAKAdfad3k4lzx';
$db['bns']['database'] = 'db_games_dota2';
$db['bns']['dbdriver'] = 'mysql';
$db['bns']['dbprefix'] = '';
$db['bns']['pconnect'] = FALSE;
$db['bns']['db_debug'] = TRUE;
$db['bns']['cache_on'] = FALSE;
$db['bns']['cachedir'] = '';
$db['bns']['char_set'] = 'utf8';
$db['bns']['dbcollat'] = 'utf8_general_ci';
$db['bns']['swap_pre'] = '';
$db['bns']['autoinit'] = FALSE;
$db['bns']['stricton'] = FALSE;


//看游戏
$db['gtv']['w_hostname'] = 'm3754i.mars.grid.sina.com.cn:3754';
$db['gtv']['w_username'] = 'gtv';
$db['gtv']['w_password'] = 'f3u4w8n7b3h';
$db['gtv']['r_hostname'] = 's3754i.mars.grid.sina.com.cn:3754';
$db['gtv']['r_username'] = 'gtv_r';
$db['gtv']['r_password'] = 'DAKAdfad3k4lzx';
$db['gtv']['database'] = 'gtv';
$db['gtv']['dbdriver'] = 'mysql';
$db['gtv']['dbprefix'] = '';
$db['gtv']['pconnect'] = FALSE;
$db['gtv']['db_debug'] = TRUE;
$db['gtv']['cache_on'] = FALSE;
$db['gtv']['cachedir'] = '';
$db['gtv']['char_set'] = 'utf8';
$db['gtv']['dbcollat'] = 'utf8_general_ci';
$db['gtv']['swap_pre'] = '';
$db['gtv']['autoinit'] = FALSE;
$db['gtv']['stricton'] = FALSE;

//微坛

$db['tgames']['w_hostname'] = 'm3375i.mars.grid.sina.com.cn:3375';
$db['tgames']['w_username'] = 'tgames';
$db['tgames']['w_password'] = 'game$^#@*468';
$db['tgames']['r_hostname'] = 's3375i.mars.grid.sina.com.cn:3375';
$db['tgames']['r_username'] = 'tgames_r';
$db['tgames']['r_password'] = 'fhe^*326';
$db['tgames']['database'] = 'tgames';
$db['tgames']['dbdriver'] = 'mysql';
$db['tgames']['dbprefix'] = '';
$db['tgames']['pconnect'] = FALSE;
$db['tgames']['db_debug'] = TRUE;
$db['tgames']['cache_on'] = FALSE;
$db['tgames']['cachedir'] = '';
$db['tgames']['char_set'] = 'utf8';
$db['tgames']['dbcollat'] = 'utf8_general_ci';
$db['tgames']['swap_pre'] = '';
$db['tgames']['autoinit'] = FALSE;
$db['tgames']['stricton'] = FALSE;

//开服
$db['kaifu']['w_hostname'] = 'm3754i.mars.grid.sina.com.cn:3754';
$db['kaifu']['w_username'] = 'gameapp';
$db['kaifu']['w_password'] = 't01uh470MVnE962g';
$db['kaifu']['r_hostname'] = 's3754i.mars.grid.sina.com.cn:3754';
$db['kaifu']['r_username'] = 'gameapp_r';
$db['kaifu']['r_password'] = 'ShjLO75EF43xiza7';
$db['kaifu']['database'] = 'gameapp';
$db['kaifu']['dbdriver'] = 'mysql';
$db['kaifu']['dbprefix'] = '';
$db['kaifu']['pconnect'] = FALSE;
$db['kaifu']['db_debug'] = TRUE;
$db['kaifu']['cache_on'] = FALSE;
$db['kaifu']['cachedir'] = '';
$db['kaifu']['char_set'] = 'utf8';
$db['kaifu']['dbcollat'] = 'utf8_general_ci';
$db['kaifu']['swap_pre'] = '';
$db['kaifu']['autoinit'] = FALSE;
$db['kaifu']['stricton'] = FALSE;

//新手卡
$db['newcard']['w_hostname'] = 'm3358i.mars.grid.sina.com.cn:3358';
$db['newcard']['w_username'] = 'newcard';
$db['newcard']['w_password'] = 'f3u4w8n7b3h';
$db['newcard']['r_hostname'] = 's3358i.mars.grid.sina.com.cn:3358';
$db['newcard']['r_username'] = 'newcard_r';
$db['newcard']['r_password'] = 'DAKAdfad3k4lzx';
$db['newcard']['database'] = 'newcard';
$db['newcard']['dbdriver'] = 'mysql';
$db['newcard']['dbprefix'] = '';
$db['newcard']['pconnect'] = FALSE;
$db['newcard']['db_debug'] = TRUE;
$db['newcard']['cache_on'] = FALSE;
$db['newcard']['cachedir'] = '';
$db['newcard']['char_set'] = 'utf8';
$db['newcard']['dbcollat'] = 'utf8_general_ci';
$db['newcard']['swap_pre'] = '';
$db['newcard']['autoinit'] = FALSE;
$db['newcard']['stricton'] = FALSE;

//网页游戏排行榜
$db['web']['w_hostname'] = '127.0.0.1:3308';
$db['web']['w_username'] = 'root';
$db['web']['w_password'] = '';
$db['web']['r_hostname'] = '127.0.0.1:3308';
$db['web']['r_username'] = 'root';
$db['web']['r_password'] = '';
$db['web']['database'] = 'top';
$db['web']['dbdriver'] = 'mysql';
$db['web']['dbprefix'] = '';
$db['web']['pconnect'] = FALSE;
$db['web']['db_debug'] = TRUE;
$db['web']['cache_on'] = FALSE;
$db['web']['cachedir'] = '';
$db['web']['char_set'] = 'utf8';
$db['web']['dbcollat'] = 'utf8_general_ci';
$db['web']['swap_pre'] = '';
$db['web']['autoinit'] = FALSE;
$db['web']['stricton'] = FALSE;


//商城
$db['shop']['w_hostname'] = 'm3754i.mars.grid.sina.com.cn:3754';
$db['shop']['w_username'] = 'gameapp';
$db['shop']['w_password'] = 't01uh470MVnE962g';
$db['shop']['r_hostname'] = 's3754i.mars.grid.sina.com.cn:3754';
$db['shop']['r_username'] = 'gameapp_r';
$db['shop']['r_password'] = 'ShjLO75EF43xiza7';
$db['shop']['database'] = 'gameapp_shop';
$db['shop']['dbdriver'] = 'mysql';
$db['shop']['dbprefix'] = 'lcn_';
$db['shop']['pconnect'] = FALSE;
$db['shop']['db_debug'] = TRUE;
$db['shop']['cache_on'] = FALSE;
$db['shop']['cachedir'] = '';
$db['shop']['char_set'] = 'utf8';
$db['shop']['dbcollat'] = 'utf8_general_ci';
$db['shop']['swap_pre'] = '';
$db['shop']['autoinit'] = FALSE;
$db['shop']['stricton'] = FALSE;

//积分商城游戏接入平台
$db['partner_center']['w_hostname'] = 'm3754i.mars.grid.sina.com.cn:3754';
$db['partner_center']['w_username'] = 'gameapp';
$db['partner_center']['w_password'] = 't01uh470MVnE962g';
$db['partner_center']['r_hostname'] = 's3754i.mars.grid.sina.com.cn:3754';
$db['partner_center']['r_username'] = 'gameapp_r';
$db['partner_center']['r_password'] = 'ShjLO75EF43xiza7';
$db['partner_center']['database'] = 'gameapp_shop';
$db['partner_center']['dbdriver'] = 'mysql';
$db['partner_center']['dbprefix'] = 'plt_';
$db['partner_center']['pconnect'] = FALSE;
$db['partner_center']['db_debug'] = TRUE;
$db['partner_center']['cache_on'] = FALSE;
$db['partner_center']['cachedir'] = '';
$db['partner_center']['char_set'] = 'utf8';
$db['partner_center']['dbcollat'] = 'utf8_general_ci';
$db['partner_center']['swap_pre'] = '';
$db['partner_center']['autoinit'] = FALSE;
$db['partner_center']['stricton'] = FALSE;


//game_event
$db['game_event']['r_hostname'] = 's3358i.mars.grid.sina.com.cn:3358';
$db['game_event']['r_username'] = 'eventgames_r';
$db['game_event']['r_password'] = 'xYVFJY9HpS_IL';
$db['game_event']['w_hostname'] = 'm3358i.mars.grid.sina.com.cn:3358';
$db['game_event']['w_username'] ='eventgames';
$db['game_event']['w_password'] = 'dsDLX3GJ88qQI';
$db['game_event']['database'] = 'eventgames';
$db['game_event']['dbdriver'] = 'mysql';
$db['game_event']['dbprefix'] = '';
$db['game_event']['pconnect'] = FALSE;
$db['game_event']['db_debug'] = TRUE;
$db['game_event']['cache_on'] = FALSE;
$db['game_event']['cachedir'] = '';
$db['game_event']['char_set'] = 'utf8';
$db['game_event']['dbcollat'] = 'utf8_general_ci';
$db['game_event']['swap_pre'] = '';
$db['game_event']['autoinit'] = TRUE;
$db['game_event']['stricton'] = FALSE;


// 活动支持


$db['event_box']['r_hostname'] = 's3358i.mars.grid.sina.com.cn:3358';
$db['event_box']['r_username'] = 'eventgames_r';
$db['event_box']['r_password'] = 'xYVFJY9HpS_IL';
$db['event_box']['w_hostname'] = 'm3358i.mars.grid.sina.com.cn:3358';
$db['event_box']['w_username'] ='eventgames';
$db['event_box']['w_password'] = 'dsDLX3GJ88qQI';
$db['event_box']['database'] = 'eventgames';
$db['event_box']['dbdriver'] = 'mysql';
$db['event_box']['dbprefix'] = '';
$db['event_box']['pconnect'] = FALSE;
$db['event_box']['db_debug'] = TRUE;
$db['event_box']['cache_on'] = FALSE;
$db['event_box']['cachedir'] = '';
$db['event_box']['char_set'] = 'utf8';
$db['event_box']['dbcollat'] = 'utf8_general_ci';
$db['event_box']['swap_pre'] = '';
$db['event_box']['autoinit'] = TRUE;
$db['event_box']['stricton'] = FALSE;



//统计链接
$db['statistic']['w_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['statistic']['w_username'] = 'api_g';
$db['statistic']['w_password'] = 'dZo1mXaCe0233bQ9';
$db['statistic']['r_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['statistic']['r_username'] = 'api_g_r';
$db['statistic']['r_password'] = 'Xt54oKa8we3lY51f';
$db['statistic']['database'] = 'api_g';
$db['statistic']['dbdriver'] = 'mysql';
$db['statistic']['dbprefix'] = '';
$db['statistic']['pconnect'] = FALSE;
$db['statistic']['db_debug'] = TRUE;
$db['statistic']['cache_on'] = FALSE;
$db['statistic']['cachedir'] = '';
$db['statistic']['char_set'] = 'utf8';
$db['statistic']['dbcollat'] = 'utf8_general_ci';
$db['statistic']['swap_pre'] = '';
$db['statistic']['autoinit'] = FALSE;
$db['statistic']['stricton'] = FALSE;




// 攻略app
$db['gl_app']['w_hostname'] = 'm3381i.mars.grid.sina.com.cn:3381';
$db['gl_app']['w_username'] = 'gl_app';
$db['gl_app']['w_password'] = '266ab372b377e4d';
$db['gl_app']['r_hostname'] = 's3381i.mars.grid.sina.com.cn:3381';
$db['gl_app']['r_username'] = 'gl_app_r';
$db['gl_app']['r_password'] = '2245f65512216c0';
$db['gl_app']['database'] = 'gl_app';
$db['gl_app']['dbdriver'] = 'mysql';
$db['gl_app']['dbprefix'] = '';
$db['gl_app']['pconnect'] = FALSE;
$db['gl_app']['db_debug'] = TRUE;
$db['gl_app']['cache_on'] = FALSE;
$db['gl_app']['cachedir'] = '';
$db['gl_app']['char_set'] = 'utf8';
$db['gl_app']['dbcollat'] = 'utf8_general_ci';
$db['gl_app']['swap_pre'] = '';
$db['gl_app']['autoinit'] = FALSE;
$db['gl_app']['stricton'] = FALSE;


// 攻略app
#$db['esports']['w_hostname'] = 'm3381i.mars.grid.sina.com.cn:3381';
#$db['esports']['w_username'] = 'esports';
#$db['esports']['w_password'] = '266ab372b377e4d';
#$db['esports']['r_hostname'] = 's3381i.mars.grid.sina.com.cn:3381';
#$db['esports']['r_username'] = 'esports_r';
#$db['esports']['r_password'] = '2245f65512216c0';
#$db['esports']['database'] = 'esports';
#$db['esports']['dbdriver'] = 'mysql';
#$db['esports']['dbprefix'] = '';
#$db['esports']['pconnect'] = FALSE;
#$db['esports']['db_debug'] = TRUE;
#$db['esports']['cache_on'] = FALSE;
#$db['esports']['cachedir'] = '';
#$db['esports']['char_set'] = 'utf8';
#$db['esports']['dbcollat'] = 'utf8_general_ci';
#$db['esports']['swap_pre'] = '';
#$db['esports']['autoinit'] = FALSE;
#$db['esports']['stricton'] = FALSE;

// 攻略app
$db['esports']['w_hostname'] = 'm3375i.apollo.grid.sina.com.cn:3375';
$db['esports']['w_username'] = 'esports';
$db['esports']['w_password'] = '8f82a2f8e553aed';
$db['esports']['r_hostname'] = 's3375i.apollo.grid.sina.com.cn:3375';
$db['esports']['r_username'] = 'esports_r';
$db['esports']['r_password'] = '200ed7c4c18c579';
$db['esports']['database'] = 'esports';
$db['esports']['dbdriver'] = 'mysql';
$db['esports']['dbprefix'] = '';
$db['esports']['pconnect'] = FALSE;
$db['esports']['db_debug'] = TRUE;
$db['esports']['cache_on'] = FALSE;
$db['esports']['cachedir'] = '';
$db['esports']['char_set'] = 'utf8';
$db['esports']['dbcollat'] = 'utf8_general_ci';
$db['esports']['swap_pre'] = '';
$db['esports']['autoinit'] = FALSE;
$db['esports']['stricton'] = FALSE;
//mall97973商城

$db['mall97973']['w_hostname'] = 'm3754i.mars.grid.sina.com.cn:3754';
$db['mall97973']['w_username'] = 'mall97973';
$db['mall97973']['w_password'] = '199b1973127c9be';
$db['mall97973']['r_hostname'] = 's3754i.atlas.grid.sina.com.cn:3754';
$db['mall97973']['r_username'] = 'mall97973_r';
$db['mall97973']['r_password'] = 'cdbe862cf8f6f5a';
$db['mall97973']['database'] = 'mall97973';
$db['mall97973']['dbdriver'] = 'mysql';
$db['mall97973']['dbprefix'] = '';
$db['mall97973']['pconnect'] = FALSE;
$db['mall97973']['db_debug'] = TRUE;
$db['mall97973']['cache_on'] = FALSE;
$db['mall97973']['cachedir'] = '';
$db['mall97973']['char_set'] = 'utf8';
$db['mall97973']['dbcollat'] = 'utf8_general_ci';
$db['mall97973']['swap_pre'] = '';
$db['mall97973']['autoinit'] = FALSE;
$db['mall97973']['stricton'] = FALSE;


$db['product']['w_hostname'] = 'm3752i.mars.grid.sina.com.cn:3752';
$db['product']['w_username'] = 'api_g';
$db['product']['w_password'] = 'dZo1mXaCe0233bQ9';
$db['product']['r_hostname'] = 's3752i.mars.grid.sina.com.cn:3752';
$db['product']['r_username'] = 'api_g_r';
$db['product']['r_password'] = 'Xt54oKa8we3lY51f';
$db['product']['database'] = 'api_g_games_data';
$db['product']['dbdriver'] = 'mysql';
$db['product']['dbprefix'] = '';
$db['product']['pconnect'] = FALSE;
$db['product']['db_debug'] = TRUE;
$db['product']['cache_on'] = FALSE;
$db['product']['cachedir'] = '';
$db['product']['char_set'] = 'utf8';
$db['product']['dbcollat'] = 'utf8_general_ci';
$db['product']['swap_pre'] = '';
$db['product']['autoinit'] = FALSE;
$db['product']['stricton'] = FALSE;

$db['wanjia']['w_hostname'] = 'm3358i.mars.grid.sina.com.cn:3358';
$db['wanjia']['w_username'] = 'wanjia';
$db['wanjia']['w_password'] = 'd6cbffaebd5f8bf';
$db['wanjia']['r_hostname'] = 's3358c.mars.grid.sina.com.cn:3358';
$db['wanjia']['r_username'] = 'wanjia_r';
$db['wanjia']['r_password'] = 'bc58857ccaaa5ea';
$db['wanjia']['database'] = 'wanjia';
$db['wanjia']['dbdriver'] = 'mysql';
$db['wanjia']['dbprefix'] = '';
$db['wanjia']['pconnect'] = FALSE;
$db['wanjia']['db_debug'] = FALSE;
$db['wanjia']['cache_on'] = FALSE;
$db['wanjia']['cachedir'] = '';
$db['wanjia']['char_set'] = 'utf8';
$db['wanjia']['dbcollat'] = 'utf8_general_ci';
$db['wanjia']['swap_pre'] = '';
$db['wanjia']['autoinit'] = TRUE;
$db['wanjia']['stricton'] = FALSE;


$db['cgwr']['w_hostname'] = 'm3376i.apollo.grid.sina.com.cn:3376';
$db['cgwr']['w_username'] = 'top';
$db['cgwr']['w_password'] = 'U3073JMZ3w1';
$db['cgwr']['r_hostname'] = 's3376i.apollo.grid.sina.com.cn:3376';
$db['cgwr']['r_username'] = 'top_r';
$db['cgwr']['r_password'] = 'RN5S6yu6s55';
$db['cgwr']['database'] = 'top';
$db['cgwr']['dbdriver'] = 'mysql';
$db['cgwr']['dbprefix'] = '';
$db['cgwr']['pconnect'] = FALSE;
$db['cgwr']['db_debug'] = FALSE;
$db['cgwr']['cache_on'] = FALSE;
$db['cgwr']['cachedir'] = '';
$db['cgwr']['char_set'] = 'utf8';
$db['cgwr']['dbcollat'] = 'utf8_general_ci';
$db['cgwr']['swap_pre'] = '';
$db['cgwr']['autoinit'] = TRUE;
$db['cgwr']['stricton'] = FALSE;


// 新浪游戏app
$db['game_app']['w_hostname'] = 'm3381i.mars.grid.sina.com.cn:3381';
$db['game_app']['w_username'] = 'game_app';
$db['game_app']['w_password'] = 'f3u4w8n7b3h';
$db['game_app']['r_hostname'] = 's3381i.mars.grid.sina.com.cn:3381';
$db['game_app']['r_username'] = 'game_app_r';
$db['game_app']['r_password'] = 'DAKAdfad3k4lzx';
$db['game_app']['database'] = 'game_app';
$db['game_app']['dbdriver'] = 'mysql';
$db['game_app']['dbprefix'] = '';
$db['game_app']['pconnect'] = FALSE;
$db['game_app']['db_debug'] = TRUE;
$db['game_app']['cache_on'] = FALSE;
$db['game_app']['cachedir'] = '';
$db['game_app']['char_set'] = 'utf8';
$db['game_app']['dbcollat'] = 'utf8_general_ci';
$db['game_app']['swap_pre'] = '';
$db['game_app']['autoinit'] = TRUE;
$db['game_app']['stricton'] = FALSE;

// 游戏产品库
$db['zqgames']['w_hostname'] = 'm3375i.mars.grid.sina.com.cn:3375';
$db['zqgames']['w_username'] = 'zqgames';
$db['zqgames']['w_password'] = 'f3u4w8n7b3h';
$db['zqgames']['r_hostname'] = 's3375i.mars.grid.sina.com.cn:3375';
$db['zqgames']['r_username'] = 'zqgames_r';
$db['zqgames']['r_password'] = 'DAKAdfad3k4lzx';
$db['zqgames']['database'] = 'zqgames';
$db['zqgames']['dbdriver'] = 'mysql';
$db['zqgames']['dbprefix'] = '';
$db['zqgames']['pconnect'] = FALSE;
$db['zqgames']['db_debug'] = TRUE;
$db['zqgames']['cache_on'] = FALSE;
$db['zqgames']['cachedir'] = '';
$db['zqgames']['char_set'] = 'gbk';
$db['zqgames']['dbcollat'] = 'gbk_chinese_ci';
$db['zqgames']['swap_pre'] = '';
$db['zqgames']['autoinit'] = FALSE;
$db['zqgames']['stricton'] = FALSE;

$db['gameinfonew']['w_hostname'] = 'm3375i.mars.grid.sina.com.cn:3375';
$db['gameinfonew']['w_username'] = 'zqgames';
$db['gameinfonew']['w_password'] = 'f3u4w8n7b3h';
$db['gameinfonew']['r_hostname'] = 's3375i.mars.grid.sina.com.cn:3375';
$db['gameinfonew']['r_username'] = 'zqgames_r';
$db['gameinfonew']['r_password'] = 'DAKAdfad3k4lzx';
$db['gameinfonew']['database'] = 'zqgames';
$db['gameinfonew']['dbdriver'] = 'mysql';
$db['gameinfonew']['dbprefix'] = '';
$db['gameinfonew']['pconnect'] = FALSE;
$db['gameinfonew']['db_debug'] = FALSE;
$db['gameinfonew']['cache_on'] = FALSE;
$db['gameinfonew']['cachedir'] = '';
$db['gameinfonew']['char_set'] = 'utf8';
$db['gameinfonew']['dbcollat'] = 'utf8_general_ci';
$db['gameinfonew']['swap_pre'] = '';
$db['gameinfonew']['autoinit'] = TRUE;
$db['gameinfonew']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */
