<?php
/*
微信卡包api SDK V1.0
!!README!!：
base_info的构造函数的参数是必填字段，有set接口的可选字段。
针对某一种卡的必填字段（参照文档）仍然需要手动set（比如团购券Groupon的deal_detail），通过card->get_card()拿到card的实体对象来set。
ToJson就能直接转换为符合规则的json。
Signature是方便生成签名的类，具体用法见示例。
注意填写的参数是int还是string或者bool或者自定义class。
更具体用法见最后示例test，各种细节以最新文档为准。
*/
class Sku{
	function __construct($quantity){
		$this->quantity = $quantity;
	}
};
class DateInfo{
	function __construct($type, $arg0, $arg1 = null) 
	{
		if (!is_int($type) )
			exit("DateInfo.type must be integer");
		$this->type = $type;
		if ( $type == 1 )  //固定日期区间
		{
			if (!is_int($arg0) || !is_int($arg1))
				exit("begin_timestamp and  end_timestamp must be integer");
			$this->begin_timestamp = $arg0;
			$this->end_timestamp = $arg1;
		}
		else if ( $type == 2 )  //固定时长（自领取后多少天内有效）
		{
			if (!is_int($arg0))
				exit("fixed_term must be integer");
			$this->fixed_term = $arg0;
		}else
			exit("DateInfo.tpye Error");
	}
};
class BaseInfo{
	function __construct($logo_url, $brand_name, $code_type, $title, $color, $notice, $service_phone,
			$description, $date_info, $sku)
	{
		if (! $date_info instanceof DateInfo )
			exit("date_info Error");
		if (! $sku instanceof Sku )
			exit("sku Error");
		//if (! is_int($code_type) )
		//	exit("code_type must be integer");
		
		$this->logo_url = $logo_url;
		$this->brand_name = $brand_name;
		$this->code_type = $code_type;
		$this->title = $title;
		$this->color = $color;
		$this->notice = $notice;
		$this->service_phone = $service_phone;
		$this->description = $description;
		$this->date_info = $date_info;
		$this->sku = $sku;
	}
	function set_sub_title($sub_title){
		$this->sub_title = $sub_title;
	}
	function set_use_limit($use_limit){
		if (! is_int($use_limit) )
			exit("use_limit must be integer");
		$this->use_limit = $use_limit;
	}
	function set_get_limit($get_limit){
		if (! is_int($get_limit) )
			exit("get_limit must be integer");
		$this->get_limit = $get_limit;
	}
	function set_use_custom_code($use_custom_code){
		$this->use_custom_code = $use_custom_code;
	}
	function set_bind_openid($bind_openid){
		$this->bind_openid = $bind_openid;
	}
	function set_can_share($can_share){
		$this->can_share = $can_share;
	}
	function set_can_give_friend($can_give_friend){
		$this->can_give_friend = $can_give_friend;
	}
	function set_location_id_list($location_id_list){
		$this->location_id_list = $location_id_list;
	}
	
	function set_custom_url_name($custom_url_name){
		$this->custom_url_name = $custom_url_name;
	}
	function set_custom_url($custom_url){
		$this->custom_url = $custom_url;
	}
};
class CardBase{
	public function __construct($base_info){
		$this->base_info = $base_info;
	}
};

class GeneralCoupon extends CardBase{
	function set_default_detail($default_detail){
		$this->default_detail = $default_detail;
	}
};
class Groupon extends CardBase{
	function set_deal_detail($deal_detail){
		$this->deal_detail = $deal_detail;
	}
};
class Discount extends CardBase{
	function set_discount($discount){
		$this->discount = $discount;
	}
};
class Gift extends CardBase{
	function set_gift($gift){
		$this->gift = $gift;
	}
};
class Cash extends CardBase{
	function set_least_cost($least_cost){
		$this->least_cost = $least_cost;
	}
	function set_reduce_cost($reduce_cost){
		$this->reduce_cost = $reduce_cost;
	}
};
class MemberCard extends CardBase{
	function set_supply_bonus($supply_bonus){
		$this->supply_bonus = $supply_bonus;
	}
	function set_supply_balance($supply_balance){
		$this->supply_balance = $supply_balance;
	}
	function set_bonus_cleared($bonus_cleared){
		$this->bonus_cleared = $bonus_cleared;
	}
	function set_bonus_rules($bonus_rules){
		$this->bonus_rules = $bonus_rules;
	}
	function set_balance_rules($balance_rules){
		$this->balance_rules = $balance_rules;
	}
	function set_prerogative($prerogative){
		$this->prerogative = $prerogative;
	}
	function set_bind_old_card_url($bind_old_card_url){
		$this->bind_old_card_url = $bind_old_card_url;
	}
	function set_activate_url($activate_url){
		$this->activate_url = $activate_url;
	}
};
class ScenicTicket extends CardBase{
	function set_ticket_class($ticket_class){
		$this->ticket_class = $ticket_class;
	}
	function set_guide_url($guide_url){
		$this->guide_url = $guide_url;
	}
};
class MovieTicket extends CardBase{
	function set_detail($detail){
		$this->detail = $detail;
	}
};

class Card{  //工厂
	private	$CARD_TYPE = Array("GENERAL_COUPON", 
				"GROUPON", "DISCOUNT",
				"GIFT", "CASH", "MEMBER_CARD",
				"SCENIC_TICKET", "MOVIE_TICKET" );
	
	function __construct($card_type, $base_info)
	{
		if (!in_array($card_type, $this->CARD_TYPE))
			exit("CardType Error");
		if (! $base_info instanceof BaseInfo )
			exit("base_info Error");
		$this->card_type = $card_type;
		switch ($card_type)
		{
			case $this->CARD_TYPE[0]:
				$this->general_coupon = new GeneralCoupon($base_info);
				break;
			case $this->CARD_TYPE[1]:
				$this->groupon = new Groupon($base_info);
				break;
			case $this->CARD_TYPE[2]:
				$this->discount = new Discount($base_info);
				break;
			case $this->CARD_TYPE[3]:
				$this->gift = new Gift($base_info);
				break;
			case $this->CARD_TYPE[4]:
				$this->cash = new Cash($base_info);
				break;
			case $this->CARD_TYPE[5]:
				$this->member_card = new MemberCard($base_info);
				break;
			case $this->CARD_TYPE[6]:
				$this->scenic_ticket = new ScenicTicket($base_info);
				break;
			case $this->CARD_TYPE[8]:
				$this->movie_ticket = new MovieTicket($base_info);
				break;
			default:
				exit("CardType Error");
		}
		return true;
	}
	function get_card()
	{
		switch ($this->card_type)
		{
			case $this->CARD_TYPE[0]:
				return $this->general_coupon;
			case $this->CARD_TYPE[1]:
				return $this->groupon;
			case $this->CARD_TYPE[2]:
				return $this->discount;
			case $this->CARD_TYPE[3]:
				return $this->gift;
			case $this->CARD_TYPE[4]:
				return $this->cash;
			case $this->CARD_TYPE[5]:
				return $this->member_card;
			case $this->CARD_TYPE[6]:
				return $this->scenic_ticket;
			case $this->CARD_TYPE[8]:
				return $this->movie_ticket;
			default:
				exit("GetCard Error");
		}
	}
	function toJson()
	{
		//return "{ \"card\":" . $this->JSON($this->ob2ar($this)) . "}";
		return "{ \"card\":" . $this->JSON(json_decode(json_encode($this), true)) . "}";
	}
	/**************************************************************
	 *
	*    使用特定function对数组中所有元素做处理
	*    @param  string  &$array     要处理的字符串
	*    @param  string  $function   要执行的函数
	*    @return boolean $apply_to_keys_also     是否也应用到key上
	*    @access public
	*
	*************************************************************/
	function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
	{
		static $recursive_counter = 0;
		if (++$recursive_counter > 1000) {
			die('possible deep recursion attack');
		}
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$this->arrayRecursive($array[$key], $function, $apply_to_keys_also);
			} else {
				$array[$key] = $function($value);
			}
	
			if ($apply_to_keys_also && is_string($key)) {
				$new_key = $function($key);
				if ($new_key != $key) {
					$array[$new_key] = $array[$key];
					unset($array[$key]);
				}
			}
		}
		$recursive_counter--;
	}
	
	/**************************************************************
	 *
	*    将数组转换为JSON字符串（兼容中文）
	*    @param  array   $array      要转换的数组
	*    @return string      转换得到的json字符串
	*    @access public
	*
	*************************************************************/
	function JSON($array) {
		$this->arrayRecursive($array, 'urlencode', false);
		$json = json_encode($array);
		return urldecode($json);
	}
	
	function ob2ar($obj) {
	    if(is_object($obj)) {
	        $obj = (array)$obj;
	        $obj = $this->ob2ar($obj);
	    } elseif(is_array($obj)) {
	        foreach($obj as $key => $value) {
	            $obj[$key] = $this->ob2ar($value);
	        }
	    }
	    return $obj;
	}
};

class Signature{
	function __construct(){
		$this->data = array();
	}
	function add_data($str){
		array_push($this->data, (string)$str);
	}
	function get_signature(){
		sort( $this->data, SORT_STRING );
		return sha1( implode( $this->data ) );
	}
};
?>