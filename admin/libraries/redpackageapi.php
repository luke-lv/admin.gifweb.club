<?php
/**
* 文件名：redpackageapi.php
* ==============================================
* 版权所有 2015
* ----------------------------------------------
* 这不是一个自由软件，未经授权不许任何使用和传播。
* ==============================================
* @date: 2015年9月12日
* @author: zhimiao
* @charset:UTF-8
*/
//error_reporting(E_ALL);
class redPackageApi{
	
	//签名密钥
	private $key = 'bc867cd306f9153df704';
	//创建红包模板接口地址
	private $create_url = 'http://hb.e.weibo.com/v2/bonus/c/set/add';
	//发送红包接口地址
	private $send_url = 'http://hb.e.weibo.com/v2/bonus/c/create';
	//查询商户红包模板接口地址
	private $select_url = 'http://hb.e.weibo.com/v2/bonus/c/set/query';
	//更新商户红包模板接口地址
	private $update_url = 'http://hb.e.weibo.com/v2/bonus/c/set/update';
	//查询红包余额
	private $select_amount_url = 'http://hb.e.weibo.com/v2/bonus/c/query/amount';
	
	//查询当前商户UID下红包余额
	public function select_amount($firm_id){
	    if(empty($firm_id)){
	        return array('result' => false, 'msg' => '商户UID不能为空');
	    }
	    //重新构造参数
	    $parm =array(
	        'firm_id' => $firm_id
	    );
	    $res = $this->send($this->select_amount_url,$parm,$sMethod = 'POST');
	    if(isset($res['code']) && $res['code'] == '100000'){
	        return array('result'=> true, 'data' =>$res['data'] );
	    } else {
	        return array('result' => false,'msg' => json_encode($res));
	    }
	    
	}
	
	//创建或充值红包
	public function create_tpl($data){
        //必须参数
	    $require_fields = array(
            'firm_id'=> '商户微博UID',
            'title' => '红包模板名称'
        );
	    //必要参数检测
	    foreach ($require_fields as $k => $v){
	        if(!isset($data[$k]) || empty($data[$k])){
	            return array('result' => false, 'msg' => $v.'不能为空');
	        }
	    }
	    //重新构造参数
	    $parm =array(
	        'firm_id' => $data['firm_id'],
	        'show_id' => $data['show_id'],
	        'title' => $data['title'],
	        'firm_logo' => $data['firm_logo'],
	        'share_info' => $data['share_info'],
	        'share_url' => $data['share_url'],
	        'card_desc' => $data['card_desc'],
	        'card_icon' => $data['card_icon'],
	        'design_pic' => $data['design_pic'],
	        'bg_pic' => $data['bg_pic'],
	        'extra' => $data['extra']
	    );
	    //空值检测,将空值去掉
	    foreach ($parm as $pk => $pv){
	        if(empty($pv)){
	           unset($parm[$pk]); 
	        }
	    }
		$res = $this->send($this->create_url,$parm,$sMethod = 'POST');
		if(isset($res['code']) && $res['code'] == '100000'){
			return array('result'=> true, 'data' =>$res['data'] );
		} else {	
			return array('result' => false,'msg' => json_encode($res));
		}
	}
	
	//查询红包模板接口
	public function select_tpl($firm_id, $tpl_id){
	    if(empty($firm_id) || empty($tpl_id)){
	        return array('result' => false, 'msg' => '参数不能为空');
	    }
	    
	    //重新构造参数
	    $parm =array(
	        'firm_id' => $firm_id,
	        'tpl_id' => $tpl_id
	    );
	    
	    $res = $this->send($this->select_url,$parm,$sMethod = 'POST');
	    
	   if(isset($res['code']) && $res['code'] == '100000'){
			return array('result'=> true, 'data' =>$res['data'] );
		} else {	
			return array('result' => false,'msg' => json_encode($res));
		} 
	}
	
	//更新红包模板接口
	public function update_tpl($tpl_id, $data){
	    //必须参数
	    $require_fields = array(
	        'firm_id'=> '商户微博UID',
	        'tpl_id' => '红包模板ID',
	        'title' => '红包模板名称'
	    );
	    //必要参数检测
	    foreach ($require_fields as $k => $v){
	        if(!isset($data[$k]) || empty($data[$k])){
	            return array('result' => false, 'msg' => $v.'不能为空');
	        }
	    }
	    //重新构造参数
	    $parm =array(
	        'firm_id' => $data['firm_id'],
	        'tpl_id' => $tpl_id,
	        'show_id' => $data['show_id'],
	        'title' => $data['title'],
	        'firm_logo' => $data['firm_logo'],
	        'share_info' => $data['share_info'],
	        'share_url' => $data['share_url'],
	        'card_desc' => $data['card_desc'],
	        'card_icon' => $data['card_icon'],
	        'design_pic' => $data['design_pic'],
	        'bg_pic' => $data['bg_pic'],
	        'extra' => $data['extra']
	    );
	    //空值检测,将空值去掉
	    foreach ($parm as $pk => $pv){
	        if(empty($pv)){
	            unset($parm[$pk]);
	        }
	    }
	    $res = $this->send($this->update_url,$parm,$sMethod = 'POST');
	    if(isset($res['code']) && $res['code'] == '100000'){
	        return array('result'=> true, 'msg' =>'更新成功' );
	    } else {
	        return array('result' => false,'msg' =>'更新失败');
	    }
	}
	
	//发送红包
	public function send_money($data){
	    
	    //必须参数
	    $require_fields = array(
	        'firm_id'=> '商户微博UID',
	        'out_order_id' => '红包模板ID',
	        'tpl_id' => '红包模板名称',
	        'amount' => '红包金额',
	        'uid' => '红包接受人'
	    );
	    
	    //必要参数检测
	    foreach ($require_fields as $k => $v){
	        if(!isset($data[$k]) || empty($data[$k])){
	            return array('result' => false, 'msg' => $v.'不能为空');
	        }
	    }
	    
        //重新构造参数
	    $parm =array(
	        'firm_id'=> $data['firm_id'],
	        'out_order_id' => $data['out_order_id'],
	        'tpl_id' => $data['tpl_id'],
	        'amount' => $data['amount'],
	        'uid' => $data['uid'],
	    );
	    
	    //空值检测,将空值去掉
	    foreach ($parm as $pk => $pv){
	        if(empty($pv)){
	            unset($parm[$pk]);
	        }
	    }
	    $res = $this->send($this->send_url,$parm,$sMethod = 'POST');
	    //p($res);
	    if(isset($res['code']) && $res['code'] == '100000'){
	        return array('result'=> true, 'data' => $res['data']);
	    } else {
	        return array('result' => false,'msg' =>'发送失败');
	    }
	}
	
	//接口请求
	private function send($url,$aParam,$sMethod = '')
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		
		if (is_array($aParam)) {
			ksort($aParam);
			//获得strA
			$sQuery = '';
			foreach ($aParam as $ak => $av){
			    if(empty($sQuery)){
			        $sQuery .= $ak.'='.$av;
			    } else{
			        $sQuery .= '&'.$ak.'='.$av;
			    }
			}
		} else {
			$sQuery = $aParam;		//获得strA
		}
		
		$strQuery = $sQuery.$this->key;	//获得strB
		$sign = md5($strQuery);			//获得sign
		
		$aParam['sign'] = $sign;
		$aParam['sign_type'] = 'md5';
		//echo http_build_query($aParam).PHP_EOL;
		if ($sMethod == "POST") {
			curl_setopt($ch, CURLOPT_POST, 1);
			//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($aParam));
		} else {
			curl_setopt($ch, CURLOPT_POST, 0);
			$url = $url . "?" .http_build_query($aParam);
		}
		
		//echo "URL:" . $url.PHP_EOL;
		//echo "参数" . http_build_query($aParam).PHP_EOL;
		
		curl_setopt($ch, CURLOPT_URL,$url);
		$result = curl_exec($ch);
		$rearr=json_decode($result,true);
		curl_close($ch);
		return $rearr;
	}
}
