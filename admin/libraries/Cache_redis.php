<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Open Software License version 3.0
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is
 * bundled with this package in the files license.txt / license.rst.  It is
 * also available through the world wide web at this URL:
 * http://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 3.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * CodeIgniter Redis Caching Class
 *
 * @package	   CodeIgniter
 * @subpackage Libraries
 * @category   Core
 * @author	   Anton Lindqvist <anton@qvister.se>
 * @link
 */
class Cache_redis
{
	/**
	 * Default config
	 *
	 * @static
	 * @var	array
	 */
	protected static $_default_config = array(
		'host' => '127.0.0.1',
		'password' => NULL,
		'port' => 6379,
		'timeout' => 0
	);

	/**
	 * Redis connection(write)
	 *
	 * @var	Redis
	 */
	protected $_master = null;

	/**
	 * Redis connection(read)
	 *
	 * @var	Redis
	 */
	//protected $_slave = null;

	// ------------------------------------------------------------------------

	public function __construct()
	{
		$this->_master_connect();
	}

	/**
	 * Get cache
	 *
	 * @param	string	Cache key identifier
	 * @return	mixed
	 */
	public function get( $key )
	{
		return $this->_master->get($key);
	}

	public function keys($key )
	{
		return $this->_master->keys($key);
	}

	public function type($key)
	{
		return $this->_master->type($key);
	}

	// ------------------------------------------------------------------------


	/**
	 * Save cache
	 *
	 * @param	string	Cache key identifier
	 * @param	mixed	Data to save
	 * @param	int	Time to live
	 * @return	bool
	 */
	public function save($key, $value, $ttl = NULL)
	{
		//$this->add_keys_list($key);
		return ($ttl)
			? $this->_master->setex($key, $ttl, $value)
			: $this->_master->set($key, $value);
	}


	// ------------------------------------------------------------------------

	public function set($key, $value)
	{
		//$this->add_keys_list($key);
		return $this->_master->set($key, $value);
	}


	// ------------------------------------------------------------------------

	/**
	 * Delete from cache
	 *
	 * @param	string	Cache key
	 * @return	bool
	 */
	public function delete($key)
	{
		return ($this->_master->delete($key) === 1);
	}


	// ------------------------------------------------------------------------

	/**
	 * 往redis中设置缓存数据,如果redis中己经存在该key的数据了，则会设置失败
	 * @param String $key 缓存数据的key
	 * @param $value 缓存数据的值
	 * @return bool
	 */
	public function setnx( $key , $value )
	{
		//$this->add_keys_list($key);
		return $this->_master->setnx( $key , $value );
	}

	// ------------------------------------------------------------------------

	/**
	 * 对指定的KEY的值自增1。如何填写了第二个参数，将把第二个参数自增给KEY的值。
	 * @param String $key
	 * @return int
	 */
	public function incr( $key , $value = 1 )
	{
		return $this->_master->incr( $key , $value );
		//$this->add_keys_list($key);
	}

	// ------------------------------------------------------------------------

	/**
	 * 得到一个key的剩余生命周期
	 * @param String $key
	 * @return int
	 */
	public function ttl( $key )
	{
		return $this->_master->ttl( $key );
	}

	// ------------------------------------------------------------------------

	/**
	 * 给一个KEY设置一个生命周期，单位是UNIX的时间戳
	 * @param String $key
	 * @param int $timestamp
	 * @return int
	 */
	public function expireAt( $key, $timestamp )
	{
		return $this->_master->expireAt( $key, $timestamp );
	}
	
	/**
	 * 给一个KEY设置一个生命周期，单位秒
	 * @param String $key
	 * @param int $timestamp
	 * @return int
	 */
	public function expire( $key, $timeout )
	{
		return $this->_master->expire( $key, $timeout );
	}

	// ------------------------------------------------------------------------

	/**
	 * 判断一个key是否存在
	 * @param String $key
	 * @return bool
	 */
	public function exists( $key )
	{
		return $this->_master->exists( $key );
	}

	/**
	 * 事务开始 只在主服务器上执行
	 */
	public function multi()
	{
		return $this->_master->multi();
	}

	/**
	 * 事务结束，执行
	 */
	public function exec()
	{
		return $this->_master->exec();
	}

	// ------------------------------------------------------------------------

	/**
	 * 在队列的头部添加一个键值对
	 * @category list类型操作
	 * @param String $key 要添加的缓存key
	 * @param $value 要缓存数据的值
	 * @return int 成功返回新队列当前的长度，失败返回false
	 */
	public function lPush( $key , $value )
	{
		//$this->add_keys_list($key);
		return $this->_master->lPush( $key , $value );
	}

	// ------------------------------------------------------------------------

	/**
	 * 在队列的尾部添加一个键值对
	 * @category list类型操作
	 * @param String $key 要添加的缓存key
	 * @param $value 要缓存数据的值
	 * @return int 成功返回新队列当前的长度，失败返回false
	 */
	public function rPush( $key , $value )
	{
		//$this->add_keys_list($key);
		return $this->_master->rPush( $key , $value );
	}

	// ------------------------------------------------------------------------

	/**
	 * 输出名称为key的list的第一个元素，删除该元素
	 * @category list类型操作
	 * @param String $key
	 * @return
	 */
	public function lPop( $key )
	{
		return $this->_master->lPop( $key );
	}

	// ------------------------------------------------------------------------

	/**
	 * 输出名称为key的list的最后一个元素，删除该元素
	 * @category list类型操作
	 * @param String $key
	 * @return
	 */
	public function rPop( $key )
	{
		return $this->_master->rPop( $key );
	}

	// ------------------------------------------------------------------------

	/**
	 * 在队列的头部添加一个键值对,如果key己经存在，则不添加
	 * @category list类型操作
	 * @param String $key 要添加的缓存key
	 * @param $value 要缓存数据的值
	 * @return int 成功返回新队列当前的长度，失败返回false
	 */
	public function lPushx( $key , $value )
	{
		//$this->add_keys_list($key);
		return $this->_master->lPushx( $key , $value );
	}

	// ------------------------------------------------------------------------

	/**
	 * 在队列的尾部添加一个键值对,如果key己存在，则不添加
	 * @category list类型操作
	 * @param String $key 要添加的缓存key
	 * @param $value 要缓存数据的值
	 * @return int 成功返回新队列当前的长度，失败返回false
	 */
	public function rPushx( $key , $value )
	{
		//$this->add_keys_list($key);
		return $this->_master->rPushx( $key , $value );
	}

	// ------------------------------------------------------------------------

	/**
	 * 获取某一个key的队列中元素的个数
	 * @category list类型操作
	 * @param String $key
	 * @return int 如果有元素，则返回元素个数，没有元素返回false
	 */
	public function lSize( $key )
	{
		return $this->_master->lSize( $key );
	}

	// ------------------------------------------------------------------------

	/**
	 * 获取名称为key的队列中第index位的元素
	 * @category list类型操作
	 * @param String $key 元素的key
	 * @param int $index 要取第几位的元素
	 * @return
	 */
	public function lIndex( $key , $index )
	{
		return $this->_master->lIndex( $key , $index );
	}

	// ------------------------------------------------------------------------

	/**
	 * 在名称为key的队列中，把value放在第index位
	 * @category list类型操作
	 * @param String $key 元素的key
	 * @param int $index 元素值在队列中要放置的位置
	 * @param $value 要放置的元素的值
	 * @return bool
	 */
	public function lSet( $key , $index , $value )
	{
		//$this->add_keys_list($key);
		return $this->_master->lSet( $key , $index , $value );
	}

	// ------------------------------------------------------------------------

	/**
	 * 返回名称为key的队列中start至end之间的元素(end为 -1 ，返回所有)
	 * @category list类型操作
	 * @param String $key 元素的key
	 * @param int $start 返回元素的起始索引
	 * @param int $end 返回元素的结束索引
	 * @return array
	 */
	public function lRange( $key , $start , $end )
	{
		return $this->_master->lRange( $key , $start , $end );
	}

	// ------------------------------------------------------------------------

	/**
	 * 截取名称为key的队列，保留start至end之间的元素
	 * @category list类型操作
	 * @param String $key 元素的key
	 * @param int $start 保留元素开始索引
	 * @param int $end 保留元素结束索引
	 * @return array
	 */
	public function lTrim( $key , $start , $end )
	{
		return $this->_master->lTrim( $key , $start , $end );
	}
	
	// ------------------------------------------------------------------------

	/**
	 * 取名称为key的队列的长度
	 * @category list类型操作
	 * @param String $key 元素的key
	 * @return array
	 */
	public function lLen( $key )
	{
		return $this->_master->lLen( $key );
	}
	
	
	// --------------------------------set数据类型操作------------------------

	/**
	 * 向名称为key的set中添加元素value,如果value存在，不写入，return false
	 * @category set类型操作
	 * @param String $key 元素的key
	 * @param $value 元素的value
	 * @return bool
	 */
	public function sAdd( $key , $value )
	{
		//$this->add_keys_list($key);
		return $this->_master->sAdd( $key , $value );
	}

	// ------------------------------------------------------------------------

	/**
	 * 删除名称为key的set中的元素value
	 * @category set类型操作
	 * @param String $key 要删除的元素key
	 * @param $value 要删除的元素值
	 * @return bool
	 */
	public function sRem( $key , $value )
	{
		return $this->_master->sRem( $key , $value );
	}

	// ------------------------------------------------------------------------

	/**
	 * 将value元素从名称为srcKey的集合移到名称为dstKey的集合
	 * @category set类型操作
	 * @param String $srcKey 源set的key
	 * @param String $dstKey 需要移到的set的key
	 * @param $value 要移动的元素的值
	 * @return bool
	 */
	public function sMove( $srcKey , $dstKey , $value )
	{
		return $this->_master->sMove( $srcKey , $dstKey , $value );
	}

	// ------------------------------------------------------------------------

	/**
	 * 名称为key的集合中查找是否有value元素，有ture 没有 false
	 * @category set类型操作
	 * @param String $key 要查找的元素的key
	 * @param $value 要查找的元素值
	 * @return bool
	 */
	public function sIsMember( $key , $value )
	{
		return $this->_master->sIsMember( $key , $value );
	}

	public function sMembers( $key )
	{
		return $this->_master->sMembers( $key );
	}

	// ------------------------------------------------------------------------

	/**
	 * 返回名称为key的set的元素个数
	 * @category set类型操作
	 * @param String $key 需要查找元素的key
	 * @return int
	 */
	public function sCard( $key )
	{
		return $this->_master->sCard( $key );
	}

	// ------------------------------------------------------------------------

	/**
	 * 随机返回并删除名称为key的set中一个元素，如果有则返回元素，没有返回false
	 * @category set类型操作
	 * @param String $key 元素的key
	 * @return
	 */
	public function sPop( $key )
	{
		return $this->_master->sPop( $key );
	}

	// ------------------------------------------------------------------------

	/**
	 * 随机返回名称为key的set中一个元素，不删除，如果set中有元素则返回元素，否则返回false
	 * @category set类型操作
	 * @param String $key
	 * @return
	 */
	public function sRandMember( $key )
	{
		return $this->_master->sRandMember( $key );
	}

	// ------------------------------------------------------------------------

	/**
	 * 求多个key的set的交集
	 * @param $key1
	 * @param $key2
	 * ...
	 * @param $keyn
	 * @return array
	 */
	public function sInter()
	{
		$args = func_get_args();
		if( empty($args) )
		{
			return false;
		}
		$str = '';
		foreach( $args as $value)
		{
			$str .= "'" . $value . "',";
		}
		$str = substr( $str , 0 , -1);
		@eval( '$arr = $this->_master->sInter( '. $str .' );' );

		return $arr;
	}

	// --------------------------------zSet数据类型操作------------------------
	/**
	 * 增加一个或多个元素，如果该元素已经存在，更新它的socre值
	 * 虽然有序集合有序，但它也是集合，不能重复元素，添加重复元素只会
	 * 更新原有元素的score值
	 *
	 */
	public function zAdd( $key, $score, $value )
	{
		//$this->add_keys_list($key);
		return $this->_master->zAdd( $key, $score, $value );
	}

	/**
	 * 返回key对应的有序集合中member的score值。
	 * 如果member在有序集合中不存在，那么将会返回nil。
	 */
	public function zScore( $key, $member )
	{
		return $this->_master->zScore( $key, $member );
	}

	/**
	 * 返回key对应的有序集合中指定区间的所有元素。
	 * 这些元素按照score从高到低的顺序进行排列。
	 */
	public function zRevRange( $key, $start = 0, $end = -1, $withscores = false )
	{
		return $this->_master->zRevRange( $key, $start, $end, $withscores );
	}

	/**
	 * 将key对应的有序集合中member元素的scroe加上increment。
	 * 如果指定的member不存在，那么将会添加该元素，并且其score的初始值为increment。
	 */
	public function zIncrBy( $key, $value, $member )
	{
		//$this->add_keys_list($key);
		return $this->_master->zIncrBy( $key, $value, $member );
	}

	/**
	 * 从有序集合中删除指定的成员。
	 */
	public function zDelete( $key, $member )
	{
		return $this->_master->zDelete( $key, $member );
	}

	/**
	 * 返回存储在key对应的有序集合中的元素的个数
	 */
	public function zSize( $key )
	{
		return $this->_master->zSize( $key );
	}

	// ------------------------------------------------------------------------
	// --------------------------------hash数据类型操作------------------------

	public function hGet( $key, $hashKey )
	{
		return $this->_master->hGet( $key, $hashKey );
	}

	/**
	 * 添加一个VALUE到HASH中。如果VALUE已经存在于HASH中，覆盖原值
	 */
	public function hSet( $key, $hashKey, $value )
	{
		//$this->add_keys_list($key);
		return $this->_master->hSet( $key, $hashKey, $value );
	}

	/**
	 * 删除指定的元素。
	 */
	public function hDel( $key, $hashKey )
	{
		return $this->_master->hDel( $key, $hashKey );
	}

	/**
	 * 取得整个HASH表的信息，返回一个以KEY为索引VALUE为内容的数组。
	 */
	public function hGetAll( $key )
	{
		return $this->_master->hGetAll( $key );
	}

	/**
	 * 取得key的长度。
	 */
	public function hLen( $key )
	{
		return $this->_master->hLen( $key );
	}

	/**
	 * 验证HASH表中是否存在指定的KEY-VALUE
	 */
	public function hExists( $key, $memberKey )
	{
		return $this->_master->hExists( $key, $memberKey );
	}

	/**
	 * 验证HASH表中是否存在指定的KEY-VALUE
	 * @param unknown_type $key
	 */
	public function hKeys($key, $memberKey)
	{
		return $this->_master->hExists($key, $memberKey);
	}
	/**
	 * 批量填充HASH表
	 * @param unknown_type $key
	 * @param unknown_type $array
	 */
	public function hMSet($key, $array)
	{
		//$this->add_keys_list($key);
		return $this->_master->hMSet($key, $array);
	}
	/**
	 * 批量取得HASH表中的VALUE。
	 */
	public function hMGet( $key, $memberKeys )
	{
		return $this->_master->hMGet( $key, $memberKeys );
	}

	
	/**
	 * 取得HASH表中所有的VALUE，以数组形式返回。
	 */
	public function hVals( $key )
	{
		return $this->_master->hVals( $key );
	}

	// ------------------------------------------------------------------------

	/**
	 * Clean cache
	 *
	 * @return	bool
	 * @see		Redis::flushDB()
	 */
	public function clean()
	{
		return $this->_master->flushDB();
	}

	// ------------------------------------------------------------------------

	/**
	 * Get cache driver info
	 *
	 * @param	string	Not supported in Redis.
	 *			Only included in order to offer a
	 *			consistent cache API.
	 * @return	array
	 * @see		Redis::info()
	 */
	public function cache_info($type = NULL)
	{
		return $this->_master->info();
	}


	// ------------------------------------------------------------------------


	/**
	 * Get cache metadata
	 *
	 * @param	string	Cache key
	 * @return	array
	 */
	public function get_metadata($key)
	{
		$value = $this->get($key);


		if ($value)
		{
			return array(
				'expire' => time() + $this->_master->ttl($key),
				'data' => $value
			);
		}


		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Check if Redis driver is supported
	 *
	 * @return	bool
	 */
	public function is_supported()
	{
		if (extension_loaded('redis'))
		{
			$this->_setup_redis();
			return TRUE;
		}
		else
		{
			log_message('error', 'The Redis extension must be loaded to use Redis cache.');
			return FALSE;
		}
	}


	// ------------------------------------------------------------------------

	/**
	 * add keys list
	 *
	 * @return	bool
	 */
	protected function add_keys_list($memberKey)
	{
		return $this->_master->zIncrBy( 'gtv:keys:list', 1, $memberKey );
	}
	
	// ------------------------------------------------------------------------


	/**
	 * Setup Redis config and connection
	 *
	 * Loads Redis config file if present. Will halt execution
	 * if a Redis connection can't be established.
	 *
	 * @return	bool
	 * @see		Redis::connect()
	 */
	protected function _setup_redis()
	{
		$this->_master_connect();
	}

	// ------------------------------------------------------------------------

	/**
	 * master connect
	 *
	 */
	protected function _master_connect()
	{
		$config = array();
		$CI =& get_instance();


		if ($CI->config->load('redis', TRUE, TRUE))
		{
			$config += $CI->config->item('redis');
		}

		$config = isset( $config['master'] ) ? $config['master'] : self::$_default_config;

		$this->_master = new Redis();

		try
		{
			$this->_master->connect($config['host'], $config['port'], $config['timeout']);
		}
		catch (RedisException $e)
		{
			show_error('Redis connection refused. ' . $e->getMessage());
		}


		if (isset($config['password']))
		{
			$this->_master->auth($config['password']);
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Class destructor
	 *
	 * Closes the connection to Redis if present.
	 *
	 * @return	void
	 */
	public function __destruct()
	{
		if ($this->_master)
		{
			$this->_master->close();
		}
	}


}


/* End of file Cache_redis.php */
/* Location: ./system/libraries/Cache/drivers/Cache_redis.php */