<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  cache key --- 配置在config下
 * 	为了减少维护成本，方便开发
 *  version 1.0
 *  @date 20160724
 *  @author liule1
 *
 * // 调用方法
 * $cache_key1 = $this->cache_key->get('key1', 'x1', 'y2');
 * list($cache_key2, $hash_key2) = $this->cache_key->get_arr('sign2', array('x', 'y'), array('z'));
 * $expire = $this->cache_key->get_expire('sign2');
 */
class Cache_key{
    private $_CI;
    private $_key_pre;
    private $_keys;
    private $_persistent_key_pre;
    private $_persistent_keys;
	public function __construct($params)
	{
        if ( ! function_exists('dump')) {
        	function dump(){
        		header("Content-type:text/html;charset=utf-8");
        		echo '<pre>';
        		$arr = func_get_args();
        		if (count($arr) <= 1) {
        			var_export(array_shift($arr));
        		} else {
        			var_export($arr);
        		}
        		echo '</pre>';
        	}
        }

		$this->_CI  = & get_instance();

        // 后台通过网络请求，从项目接口获取
        $config = $this->repeat_curl_post(5, 1, $params['config'], array(), 20);

        if (!$config) {
            exit('cache_key miss');
        }
        $this->_key_pre = $config['key_pre'];
        $this->_keys = $config['keys'];
        $this->_persistent_key_pre = $config['persistent_key_pre'];
        $this->_persistent_keys = $config['persistent_keys'];
	}

    public function curl_post($url,$data = array(),$ttl=20, $ip=null) {
		$curl = curl_init();

		if ($ip) {
			$pattern = "/(http[s]?\:\/\/)?([^\/]+)(.+)/";
			$c =array();
			preg_match($pattern, $url, $c);
			if (empty($c[2])) {
				return false;
			}
			$host = $c[2];
			$url = $c[1] . $ip . $c[3];

			preg_replace('//', $ip, $url);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Host: ' . $host));
		} else {
			curl_setopt($curl, CURLOPT_URL, $url);
		}

		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_TIMEOUT, $ttl);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;

	}

	// ================================================== 公共 GO =============================================== //
	function repeat_curl_post($repeat_max,$is_json = 1, $url,$data = array(),$ttl=20, $ip=null) {

		$return = false;
		while($repeat_max-- > 0 && $return === false) {
			$return = $this->curl_post($url,$data,$ttl, $ip);
			if ($is_json) {
				if ($return) {
					$return = json_decode($return, true);
					if (is_array($return)) {
						break;
					} else {

						$return = false;
					}
				} else {
					$return = false;
				}
				$return && $return = json_decode($return, true);
				if (is_array($return)) {
					break;
				}
			}
		}

		return $return;
	}
    // ----------------------------- 一般缓存 -----------------------------------
    /**
     * 获取string类型缓存key
     * @param  [type]     $sign [config 的标志]
     * @param ...       string  [sprintf的参数]
     * @return [type]           [description]
     * @author liule1
     * @date   2016-07-24
     */
    public function get($sign) {
        $func_params = func_get_args();
        array_shift($func_params);

        $key_config = isset($this->_keys[$sign]) ? $this->_keys[$sign] : array();

        if (!$key_config || !$key_config['key'] || is_array($key_config['key'])) {
            exit('cache_key: get function key must be string . ' . $sign . ':' . var_export($key_config['key'], true));
        }


        $parameters = array_merge(array($key_config['key']), $func_params);
        return $this->_key_pre . call_user_func_array('sprintf', $parameters);
    }

    /**
     * 获取数组类型缓存key
     * @param  [type]     $sign [config 的标志]
     * @param ...       array()  [对应数组key的各个sprintf的参数]
     * @return [type]           [description]
     * @author liule1
     * @date   2016-07-24
     */
    public function get_arr($sign) {
        $func_params = func_get_args();
        array_shift($func_params);

        $key_config = isset($this->_keys[$sign]) ? $this->_keys[$sign] : array();

        if (!$key_config || !$key_config['key'] || !is_array($key_config['key'])) {
            exit('cache_key: get function key must be array . ' . $sign . ':' . var_export($key_config['key'], true));
        }
        $return = array();
        $key_pre = $this->_key_pre;
        foreach ($func_params as $func_param) {
            $parameters = array_merge(array(array_shift($key_config['key'])), $func_param);
            $return[] = $key_pre . call_user_func_array('sprintf', $parameters);
            $key_pre = '';
        }

        return $return;
    }
    /**
     * 获取缓存过期时间
     * @param  [type]     $sign [description]
     * @return [type]           [description]
     * @author liule1
     * @date   2016-07-24
     */
    public function get_expire($sign) {
        $key_config = isset($this->_keys[$sign]) ? $this->_keys[$sign] : array();

        if (!$key_config) {
            exit('cache_key: get function key must be string . ' . $sign . ':' . var_export($key_config['key'], true));
        }
        $return = $key_config['expire'] > 0 ? (int) $key_config['expire'] : 60;
        return $return;
    }


    // ------------------------- 持久性缓存 ----------------------------------------------//
    /**
     * 获取string类型缓存key
     * @param  [type]     $sign [config 的标志]
     * @param ...       string  [sprintf的参数]
     * @return [type]           [description]
     * @author liule1
     * @date   2016-07-24
     */
    public function p_get($sign) {
        $func_params = func_get_args();
        array_shift($func_params);

        $key_config = isset($this->_persistent_keys[$sign]) ? $this->_persistent_keys[$sign] : array();

        if (!$key_config || !$key_config['key'] || is_array($key_config['key'])) {
            exit('cache_key: get function key must be string . ' . $sign . ':' . var_export($key_config['key'], true));
        }


        $parameters = array_merge(array($key_config['key']), $func_params);
        return $this->_persistent_key_pre . call_user_func_array('sprintf', $parameters);
    }

    /**
     * 获取数组类型缓存key
     * @param  [type]     $sign [config 的标志]
     * @param ...       array()  [对应数组key的各个sprintf的参数]
     * @return [type]           [description]
     * @author liule1
     * @date   2016-07-24
     */
    public function p_get_arr($sign) {
        $func_params = func_get_args();
        array_shift($func_params);

        $key_config = isset($this->_persistent_keys[$sign]) ? $this->_persistent_keys[$sign] : array();

        if (!$key_config || !$key_config['key'] || !is_array($key_config['key'])) {
            exit('cache_key: get function key must be array . ' . $sign . ':' . var_export($key_config['key'], true));
        }
        $return = array();
        $key_pre = $this->_persistent_key_pre;
        foreach ($func_params as $func_param) {
            $parameters = array_merge(array(array_shift($key_config['key'])), $func_param);
            $return[] = $key_pre . call_user_func_array('sprintf', $parameters);
            $key_pre = '';
        }

        return $return;
    }


    // ----------------- private function --------------------------------------------//

}
?>
