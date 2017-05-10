<?php

/**
 * Gifcontent_image_model.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	songqinglu <qinglu@staff.sina.com.cn>
 * @date	1:14:18 2017-04-25
 * @version	$Id: User.php 13 2012-12-19 07:10:10Z songqinglu $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class Gifcontent_image_model extends MY_Model
{

	protected $_table = 'gifweb_content_image';
	protected $_pk = 'id';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('func');
		$this->load->database('default');
	}
	

	/**
	 * 返回表名儿
	 * @return String
	 */
	public function getTable()
	{
		return $this->_table;
	}
	
	/**
	 * 
	 * 根据条件查询数据
	 * @param array
	 * @return Array
	 */
	public function findData($conditons)
	{
		$sql = $this->find($conditons);
		$rs = $this->db->query_read($sql);
		$result = $rs->result_array();
		return $result;		
	}

	/**
	 *  更新数据信息
	 *  @param $id 
	 *  @param $data
	 *  @return true/false
	 */
	
	public function updateData($uid,$data)
	{
		$sql = $this->update($uid,$data,$this->_table);
		$rs = $this->db->query_write($sql);
		return $rs;
	}
	
	/**
	 * 
	 * 查询信息数据
	 * @param unknown_type $id
	 * @param unknown_type $col
	 */
	public function loadData($id, $col = null)
	{
		$sql = $this->load($id,$col);
		$rs = $this->db->query_read($sql);
		$result = $rs->row_array();
		return  $result;
	}
	
	public function deleteData($id, $col = null)
	{
		$sql = $this->delete($id,$col);
		$rs = $this->db->query_write($sql);
		return $rs;
	}
	
	public function insertData($data, $table = null)
	{
		$sql = $this->insert($data, $table = null);
		$rs  = $this->db->query_write($sql);
		return $rs;
		
	}
	
	/**
	 * Count result
	 *
	 * @param string $where
	 * @param string $table
	 * @return int
	 */
	public function count($where, $table = null)
	{
		if (null == $table) $table = $this->_table;
	
		try {
			$sql = "select count(1) as cnt from $table where $where";
			$rs = $this->db->query_read($sql);
			$result = $rs->result_array();
			$result = $result[0];
			return empty($result['cnt']) ? 0 : $result['cnt'];
		} catch (Exception $e) {
			$this->error(array('code' => self::SYSTEM_ERROR, 'msg' => $e->getMessage()));
			return false;
		}
	}
	
	
}

?>