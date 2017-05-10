<?php

/**
 * Sina sso client
 * @package  SSOClient
 * @filename SSOCookie.php
 * @author   lijunjie <junjie2@staff.sina.com.cn>
 * @date 	 2010-1-20
 * @version  1.4
 */

/**
 * @brief 	set & get cookie for sina.com.cn
 */
class SSOCookie {

    const COOKIE_SUE = 'SUE';   //sina user encrypt info
    const COOKIE_SUP = 'SUP';   //sina user plain info
    const COOKIE_PATH = '/';
    const COOKIE_KEY_FILE = 'cookie.conf';

    private $_error;
    private $_errno = 0;
    private $_arrConf; // the infomation in cookie.conf
    private $_arrKeyMap = array("cv" => "cookieversion", "bt" => "begintime", "et" => "expiredtime", "uid" => "uniqueid", "user" => "userid", "ag" => "appgroup", "nick" => "displayname", "sex" => "gender", "ps" => "paysign", "email" => "email");
    private $_arrCookie;

    public function __construct($config = self::COOKIE_KEY_FILE) {
        if (!$this->_parseConfigFile($config)) {
            throw new Exception($this->getError());
        }
        $this->_arrCookie = $_COOKIE;
    }

    public function setCustomCookie($arrCookie) {
        if (!is_array($arrCookie)) {
            $this->_setError("custom cookie is not array");
            return false;
        }
        $this->_arrCookie = $arrCookie;
        return true;
    }

    public function getCookie(&$arrUserInfo) {
        $sup = $this->_arrCookie[self::COOKIE_SUP];
        if (!$sup)
            return false;

        parse_str($sup, $arrSUP);
        $cookieVersion = $arrSUP['cv'];
        switch ($cookieVersion) {
            case 1:
                return $this->_getCookieV1($arrUserInfo);
                break;
            default:
                return false;
        }
    }

    /**
     * delete cookie
     */
    public function delCookie() {
        // ��Ʒ����������ɾ���Լ���cookie
        return true;
    }

    private function _getCookieV1(&$arrUserInfo) {
        // ����������cookie������cookie��Ϊ��Ч
        if (!isset($this->_arrCookie[self::COOKIE_SUE]) ||
                !isset($this->_arrCookie[self::COOKIE_SUP])) {
                	echo "111";
            $this->_setError('not all cookie are exists ');
            return false;
        }
        parse_str($this->_arrCookie[self::COOKIE_SUE], $arrSUE);
        parse_str($this->_arrCookie[self::COOKIE_SUP], $arrSUP);
        foreach ($arrSUP as $key => $val) {
            if (isset($this->_arrKeyMap[$key]))
                $key = $this->_arrKeyMap[$key];
            $arrUserInfo[$key] = iconv("UTF-8", "GBk", $val);
        }
        // �ж��Ƿ�ʱ
        if ($arrUserInfo['expiredtime'] < time()) {
        	echo "222";
            $this->_setError("cookie is timeout {cookie_expire:" . $arrUserInfo['expiredtime'] . ";now:" . time() . '}');
            return false;
        }

        // ������cookie
        if ($arrSUE['es2'] != md5(rawurlencode($this->_arrCookie[self::COOKIE_SUP]) . $this->_arrConf[$arrSUE['ev']])) {
           
        	$this->_setError("encrypt string error");
            return false;
        }
        return true;
    }

    /**
     * parse cookie config file.
     * @param $config: cookie config file
     */
    private function _parseConfigFile($config) {
        $arrConf = @parse_ini_file($config);
        if (!$arrConf) {
            $this->_setError('parse file ' . $config . ' error');
            return false;
        }
        $this->_arrConf = $arrConf;
        return true;
    }

    public function _setError($error, $errno = 0) {
        $this->_error = $error;
        $this->_errno = $errno;
    }

    public function getError() {
        return $this->_error;
    }

    public function getErrno() {
        return $this->_errno;
    }

}

?>
