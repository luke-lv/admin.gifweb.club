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
class CI_Cache_redis extends CI_Driver
{
	/**
	 * Default config
	 *
	 * @static
	 * @var	array
	 */
	protected static $_default_config = array(
		'host_w' => '127.0.0.1',
		'password_w' => NULL,
		'port_w' => 7000,
		'timeout_w' => 0,
		'host_r' => '127.0.0.1',
		'password_r' => NULL,
		'port_r' => 7000,
		'timeout_r' => 0
	);

	
	/**
	 * Redis connection for write
	 *
	 * @var	Redis
	 */
	protected $_redis_write;
	
	/**
	 * Redis connection for read
	 *
	 * @var	Redis
	 */
	protected $_redis_read;
	

	// ------------------------------------------------------------------------

	/**
	 * Get cache
	 *
	 * @param	string	Cache key identifier
	 * @param	bool	weather or not for master
	 * @return	mixed
	 */
	public function get($key,$is_write = false)
	{
		if (!isset($key) || empty($key))
		{
			return false;
		}
		
		if ($is_write == false)
		{
			return $this->_redis_read->get($key);
		}
		else 
		{
			return $this->_redis_write->get($key);
		}
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
	public function set($key, $value, $ttl = NULL)
	{

		return ($ttl)
				? $this->_redis_write->setex($key, $ttl, $value)
				: $this->_redis_write->set($key, $value);
		
	}

	/**
	 * 一次存储多个值
	 * Enter description here ...
	 * @param array $key_val_arr
	 */
	public function mset($key_val_arr)
	{
		if (!is_array($key_val_arr))
		{
			return false;
		}
		
		return $this->_redis_write->mset($key_val_arr);
	}
	
	/**
	 * 一次返回多个值
	 * Enter description here ...
	 * @param array $key_arr
	 */
	public function mget($key_arr,$is_write = false)
	{
		if (!is_array($key_arr))
		{
			return false;
		}
		
		if ($is_write == false)
		{
			return $this->_redis_read->mget($key_arr);
		}
		else 
		{
			return $this->_redis_write->mget($key_arr);
		}
		
	}
	
	/**
	 * 查找符合给定模式的KEY
	 * 
	 * @param string $key
	 */
	public function keys($key)
	{
		return $this->_redis_read->keys($key);
	}
	
	/**
	 * 同时删除多个KEY值
	 * Enter description here ...
	 * @param array $key_arr
	 */
	public function mdel($key_arr)
	{
		if (!is_array($key_arr))
		{
			return false;
		}	
		
		return $this->_redis_write->del($key_arr);		
	}
	
	/**
	 * 检查给定的key是否存在
	 * Enter description here ...
	 * @param string $key
	 */
	public function exists($key,$is_write = false)
	{
		if ($is_write == false)
		{
			return $this->_redis_read->exists($key);
		}
		else 
		{
			return $this->_redis_write->exists($key);
		}
	}
	
	
	/**
	 * 排序，分页等
	 * Enter description here ...
	 * @param string $key
	 * @param array $cond = array(
	 *	'by' => 'some_pattern_*',
	 *	'limit' => array(0, 1),
	 *	'get' => 'some_other_pattern_*' or an array of patterns,
	 *	'sort' => 'asc' or 'desc',
	 *	'alpha' => TRUE,
	 *	'store' => 'external-key'
	 *	)
	 * @param boolean $is_write
	 */
	public function sort($key,$cond = NULL,$is_write = false)
	{
		if (!isset($key) || empty($key))
		{
			return false;	
		}
		
		if ($is_write == false)
		{
			if (!is_array($cond))
			{
				return $this->_redis_read->sort($key);
			}
			else 
			{
				return $this->_redis_read->sort($key,$cond);
			}
		}
		else
		{
			if (!is_array($cond))
			{
				return $this->_redis_write->sort($key);
			}
			else 
			{
				return $this->_redis_write->sort($key,$cond);
			}
		}
		
	}
	
	/**
	 * 将key中储存的数字值增一。
	 * Enter description here ...
	 * @param string $key
	 */
	public function incr($key)
	{
		if (!isset($key) || empty($key))
		{
			return false;
		}
		return $this->_redis_write->incr($key);
		
	}
	
	/**
	 * 将key所储存的值加上增量increment
	 * Enter description here ...
	 * @param unknown_type $key
	 * @param unknown_type $val
	 */
	public function incrby($key,$val)
	{
		if (!isset($key) || empty($key))
		{
			return false;
		}
		if (!is_numeric($val))
		{
			return false;
		}
		return $this->_redis_write->incrby($key,$val);
	}
	
	/**
	 * 将key中储存的数字值减一。
	 * Enter description here ...
	 * @param unknown_type $key
	 */
	public function decr($key)
	{
		if (!isset($key) || empty($key))
		{
			return false;
		}
		return $this->_redis_write->decr($key);
	}
	
	/**
	 * 将key所储存的值减去减量decrement
	 * Enter description here ...
	 * @param unknown_type $key
	 * @param unknown_type $val
	 */
	public function decrby($key,$val)
	{
		if (!isset($key) || empty($key))
		{
			return false;
		}
		if (!is_numeric($val))
		{
			return false;
		}
		return $this->_redis_write->decrby($key,$val);
	}
	
	/**
	 * 将哈希表key中的域field的值设为value
	 * 如果key不存在，一个新的哈希表被创建并进行HSET操作。	
	 * 如果域field已经存在于哈希表中，旧值将被覆盖
	 * Enter description here ...
	 * @param unknown_type $key
	 * @param unknown_type $field
	 * @param unknown_type $value
	 * @return 如果field是哈希表中的一个新建域，并且值设置成功，返回1。
	 * 如果哈希表中域field已经存在且旧值已被新值覆盖，返回0。
	 */
	public function hset($key,$field,$value)
	{
		if (!isset($key) || empty($key))
		{
			return false;
		}
		return $this->_redis_write->hset($key,$field,$value);
	}
	
	/**
	 * 返回哈希表key中给定域field的值
	 * Enter description here ...
	 * @param unknown_type $key
	 * @param unknown_type $field
	 */
	public function hget($key,$field,$is_write = false)
	{
		if (!isset($key) || empty($key))
		{
			return false;
		}
		if ($is_write == false)
		{
			return $this->_redis_read->hget($key,$field);
		}
		else 
		{
			return $this->_redis_write->hget($key,$field);
		}
	}
	/**
	 * 返回哈希表key中，所有的域和值
	 * Enter description here ...
	 * @param unknown_type $key
	 * @return 以列表形式返回哈希表的域和域的值。 若key不存在，返回空列表。
	 */
	public function hgetall($key,$is_write = false)
	{
		if ($is_write == false)
		{
			return $this->_redis_read->hgetall($key);
		}
		else 
		{
			return $this->_redis_write->hgetall($key);
		}
	}
	
	/**
	 * 
	 * 为一个Key添加一个值。如果这个值已经在这个Key中，则返回FALSE。
	 * @param unknown_type $key
	 * @param unknown_type $val
	 */
	public function sadd($key,$val)
	{
		return $this->_redis_write->sadd($key,$val);
	}
	
	/**
	 * 返回一个所有指定键的交集。如果只指定一个键，那么这个命令生成这个集合的成员。如果不存在某个键，则返回FALSE。
	 * Enter description here ...
	 * @param array $key
	 */
	public function sinter($key,$is_write = false)
	{
		if (!is_array($key))
		{
			return false;
		}
		$key_str = implode('","', $key);
//		
//		$key_str = '"'.$key_str.'"';
//		echo $key_str;
		if ($is_write == false)
		{				
			return $this->_redis_read->sinter($key);		
		}
		else 
		{
			return $this->_redis_write->sinter($key);
		}
	}
	
	/**
	 * 返回集合的内容
	 * Enter description here ...
	 * @param string $key
	 */
	public function smembers($key,$is_write = false)
	{
		if ($is_write == false)
		{
			return $this->_redis_read->smembers($key);
		}
		else 
		{
			return $this->_redis_write->smembers($key);
		}
		
	}

	/**
	 * 名称为key的集合中查找是否有value元素，有ture 没有 false
	 * @category set类型操作
	 * @param String $key 要查找的元素的key
	 * @param $value 要查找的元素值
	 * @return bool
	 */
	public function sismember( $key , $value , $is_write = false )
	{
		if ($is_write == false)
		{
			return $this->_redis_read->sismember($key , $value );
		}
		else 
		{
			return $this->_redis_write->sismember( $key , $value );
		}
	}

	/**
	 * 返回集合的基数（集合中元素的数量）
	 */
	
	public function scard($key,$is_write = false)
	{
		if ($is_write == false)
		{
			return $this->_redis_read->scard($key);
		}
		else 
		{
			return $this->_redis_write->scard($key);
		}		
	}
	/**
	 * 返回一个所有指定键的并集
	 * Enter description here ...
	 * @param array $key
	 * @param bool $is_write
	 */
	public function sunion($key,$is_write = false)
	{
		if ($is_write == false)
		{
			return $this->_redis_read->sunion($key);
		}
		else 
		{
			return $this->_redis_write->sunion($key);
		}
	}
	
	
	/**
	 * @desc Append specified string to the string stored in specified key.
	 * 
	 * @param unknown_type $key
	 * @param unknown_type $value
	 * @return NTEGER: Size of the value after the append
	 */
	public function append($key,$value)
	{
		return $this->_redis_write->append($key,$value);
	}
	
	
	
	/**
	 * @desc Synchronously save the dataset to disk (wait to complete)
	 * @return BOOL: TRUE in case of success, FALSE in case of failure. If a save is already running, this command will fail and return FALSE.
	 */
	public function save()
	{
		return $this->_redis_write->save();
	}
	
	
	
	/**
	 * @desc Remove all keys from all databases
	 * @return BOOL: Always TRUE.
	 */
	public function flushAll()
	{
		return $this->_redis_write->flushAll();
	}
	
	/**
	 * @desc Remove all keys from the current database.
	 * @return BOOL: Always TRUE.
	 */
	public function flushDB()
	{
		return $this->_redis_write->flushDB();
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
		return ($this->_redis_write->delete($key) === 1);
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
		return $this->_redis_write->flushDB();
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
		return $this->_redis_write->info();
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
				'expire' => time() + $this->_redis_write->ttl($key),
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
		$config = array();
		$CI =& get_instance();

		if ($CI->config->load('redis', FALSE, TRUE))
		{
			$config += $CI->config->item('redis');
		}
		
		if (count($config) == 0)
		{
			$config = self::$_default_config;
		}

		//$this->_config = $config;

		$this->_redis_write = new Redis();
		$this->_redis_read = new Redis();
		
		try
		{
			$this->_redis_write->connect($config['host_w'], $config['port_w'], $config['timeout_w']);
		}
		catch (RedisException $e)
		{
			show_error('Redis connection refused. ' . $e->getMessage());
		}

		if (isset($config['password_w']))
		{
			$this->_redis_write->auth($config['password_w']);
		}
		
		try
		{
			$this->_redis_read->connect($config['host_r'], $config['port_r'], $config['timeout_r']);
		}
		catch (RedisException $e)
		{
			show_error('Redis connection refused. ' . $e->getMessage());
		}

		if (isset($config['password_r']))
		{
			$this->_redis_read->auth($config['password_r']);
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
		if ($this->_redis_write)
		{
			$this->_redis_write->close();
		}
		if ($this->_redis_read)
		{
			$this->_redis_read->close();
		}
	}

}

/* End of file Cache_redis.php */
/* Location: ./system/libraries/Cache/drivers/Cache_redis.php */