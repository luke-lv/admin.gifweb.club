<?php

/*
 * Created on 2012-8-21
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class CurrentUser {

    private $sso;
    private $weibo;
    private $callback;

    function __construct() {
    	$CI = &get_instance();
    	$CI->load->library('sso/SSOClient.php','','sso');
    	$CI->load->library('weibo/WeiboApi.php','','weibo');

        $this->sso = $CI->sso;
        $this->weibo = $CI->weibo;
        //$this->callback = isset($_REQUEST["callback"]) ? myspecialchars($_REQUEST["callback"]) : false;
    }

    function status() {
        return $this->sso->isLogined();
    }

    function ssoUserInfo() {
        $weiboInfo = $this->weiboUserInfo();
//			echo "<pre>";
//			var_dump($weiboInfo);
//			echo "</pre>";
        $ssoInfo = $this->sso->getUserInfo();
        if (isset($weiboInfo["data"]["screen_name"])) {
            $ssoInfo["displayname"] = $weiboInfo["data"]["screen_name"];
        }
        return $ssoInfo;
    }

    function getuid() {
        return $this->sso->getUniqueid();
    }

    function weiboUserInfo() {
        if ($this->status()) {
            $uid = $this->getuid();
            $weiboUser = $this->weibo->user_show_inner($uid);
            if (!isset($weiboUser) || !$weiboUser || empty($weiboUser) || isset($weiboUser["error"]) || isset($weiboUser["error_code"])) {
                $ret = array();
                $ret["error"] = 110;
                $ret["errorMsg"] = "该用户不是微博用户";
                return $ret;
            } else {
                $ret = array();
                $ret["error"] = 0;
                $ret["data"] = $weiboUser;
                return $ret;
            }
        } else {
            $ret = array();
            $ret["error"] = 100;
            $ret["errorMsg"] = "未登录";
            return $ret;
        }
    }

//    function friendlist($nums = 20, $page = 1) {
//        if ($this->status()) {
//            $uid = $this->getuid();
//            $page = isset($_REQUEST["page"]) ? myspecialchars($_REQUEST["page"]) : $page;
//            $nums = (isset($_REQUEST["nums"])) ? myspecialchars($_REQUEST["nums"]) : $nums;
//            $nums = ($nums < 0 || $nums > 200) ? 30 : $nums;
//            
//            $friendsArray = $this->weibo->friends_follow_bilateral($uid, $nums, $page);
//            if (!$friendsArray || isset($friendsArray["error"]) || isset($friendsArray["error_code"])) {
//                $friendsArray = $this->weibo->friends_follow_active($uid, $nums);
//                //$friendsArray = $this->weibo->friendships_friends($uid,$nums);
//            }
//            if (isset($friendsArray["error_code"])) {
//                $code = $friendsArray["error_code"];
//                $error = errorConfig::$EVENT_GAMES_WEIBO_ERROR["$code"];
//                $array = array();
//                $array["code"] = 111;
//                $array["msg"] = $error;
//                output(false, $array, __CLASS__, true, $this->callback);
//            }
//            $friendsList = $friendsArray["users"];
//            $array = array();
//            foreach ($friendsList as $key => $value) {
//                $array[$key]["id"] = $value["id"];
//                $array[$key]["profile_image_url"] = $value["profile_image_url"];
//                $array[$key]["screen_name"] = $value["screen_name"];
//            }
//            output(true, $array, __CLASS__, true, $this->callback);
//        } else {
//            $ret = array();
//            $ret["error"] = 100;
//            $ret["errorMsg"] = "未登录";
//            output(false, $ret, __CLASS__, true, $this->callback);
//        }
//    }   
    
}

?>
