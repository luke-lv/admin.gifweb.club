<?php

/**
 * Privilege.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	23:08:19 2012-12-11
 * @version	$Id: Privilege.php 13 2012-12-19 07:10:10Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

class PrivilegeModel extends MY_Model
{
	protected $_table = 'gifweb_admin_privilege';
	
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
	
	public function updateData($id,$data)
	{
		$sql = $this->update($id,$data,$this->_table);
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
		$result = $rs->result_array();
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
	
	
}
?>