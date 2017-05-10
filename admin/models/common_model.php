<?php
/**
 * 一般MODEL
 * @author liule1
 *
 */
class Common_model extends MY_Model {
	private $_trans_flag = false;
	function __construct($database = null) {
		parent::__construct ();
//		$this->load->library ( 'Shop_cache_redis', '', 'redis' );
	}
	public function get_data_by_sql($sql) {
		$res = $this->db->query_read ( $sql );
		
		if (empty ( $res )) {
			return array ();
		} else {
			return $res->result_array ();
		}
	}
	public function get_one_data_by_sql($sql) {
		$res = $this->db->query_read ( $sql );
		if (empty ( $res )) {
			return array ();
		} else {
			return $res->row_array ();
		}
	}
	
	//by songqinglu for script.php
	public function read_db_sql($sql) {
		$this->db->query_read ( $sql );
	}
	
	public function execute_by_sql($sql) {
		$return = $this->db->query_write ( $sql );
		if (stripos ( $sql, 'insert' ) !== false) {
			$return = $this->insert_id ();
		}
		return $return;
	}
	
	/**
	 * 返回上条SQL的影响行数
	 */
	public function get_affected_row_count() {
		// $sql = "SELECT ROW_COUNT() as c";
		// if ($this->db->conn_write) {
		// $rs = $this->db->query_write($sql);
		// } else {
		// $rs = $this->db->query_read($sql);
		// }
		// P.S. PHP5.5.0之前可以使用!!
		if ($this->db->conn_write) {
			$r = mysql_affected_rows ( $this->db->conn_write );
		} else {
			$r = mysql_affected_rows ( $this->db->conn_id );
		}
		
		return $r;
	}
	public function insert_id() {
		if ($this->db->conn_write) {
			return mysql_insert_id ( $this->db->conn_write );
		} else {
			return mysql_insert_id ( $this->db->conn_id );
		}
	}
	
	//事物
	public function trans_begin () {
		if ($this->_trans_flag) {
			$this->trans_commit();
		}

		$sql = "start transaction";
		$this->execute_by_sql($sql);
		$sql = "SET autocommit=0";
		$this->execute_by_sql($sql);

		$this->_trans_flag = true;
	}
	public function trans_commit() {
		if (!$this->_trans_flag) {
			return;
		}
		$sql = "commit";
		$this->execute_by_sql($sql);
		$sql = "SET autocommit=1";
		$this->execute_by_sql($sql);
		$this->_trans_flag = false;
	}
	public function trans_rollback() {
		if (!$this->_trans_flag) {
			return;
		}
		$sql = "rollback";
		$this->execute_by_sql($sql);
		$sql = "SET autocommit=1";
		$this->execute_by_sql($sql);
		$this->_trans_flag = false;
	}
	
	/**
	 * 得到新订单号
	 * @return  string
	 */
	 /**
     *    生成订单号
     *
     *    @author    Garbin
     *    @return    string
     */
    public function _generate_order_sn($uid, $order_type){
        /* 选择一个随机的方案 */
		$day_time = strtotime(date("Y-m-d 23:59:59"));
        mt_srand((double) microtime() * 1000000);
        $order_sn = date("YmdHis") . 
		$order_sn .= str_pad($order_type, 2, '0', STR_PAD_LEFT);	// 订单类型
		$order_sn .= str_pad(abs($uid%100), 2, '0', STR_PAD_LEFT);	// 用户uid取余
		
		$rKey = "glapp:" . ENVIRONMENT . ":pay_model:" ."order_sn";

		//判断订单号是否已存在
		$flag = 1;
		$succ = false;
		do{
			$randNum = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT); // 5位随机数
			if(!$this->redis->hExists($rKey, $order_sn.$randNum)){
				$order_sn  = $order_sn.$randNum;
				$this->redis->hSet($rKey, $order_sn, time());
				$this->redis->expire($rKey, $day_time - time());
				$succ = true;
				break;
			}
			
			$flag++;

		}while($flag < 10 && !$succ);

        return $order_sn;
    }
	
	
}
