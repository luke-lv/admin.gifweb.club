<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bootstrap{
	static $tr_color_index = 0;
	static $tr_color = array(
		'warning', 'success','error', 'info', 
	);

	public function __construct()
	{
		$this->_CI  = & get_instance();
	}

	static public function tr_color_rand() {
		self::$tr_color_index++;
		if (self::$tr_color_index >= count(self::$tr_color)) {
			self::$tr_color_index = 0;
		}
		return self::$tr_color[self::$tr_color_index];
	}
	
}

