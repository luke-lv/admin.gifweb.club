<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Ajaxformat {
    public function succ($data, $callback=false){
        $ret = array();
        $ret['k'] = true;
        $ret['data'] = $data;
        if (!$callback) {
	    echo json_encode($ret);
		} else {
		    echo $callback . "(" . json_encode($ret) . ")";
		}
        exit();
    }
    
    public function fail($errCode, $errorMsg, $callback=false ){
        $ret = array();
        $ret['k'] = false;
        $ret['code'] = $errCode;
        if($errorMsg){
            $ret['msg'] = $errorMsg;
        }
        if (!$callback) {
		    echo json_encode($ret);
		} else {
		    echo $callback . "(" . json_encode($ret) . ")";
		}
        exit();
    }
}


?>