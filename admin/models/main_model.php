<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @Name      MainModel.php
 */

class Main_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getlist($limit, $per_page)
    {
    	$this->db->limit(20, 0);//相当于sql语句中的limit 0,20，也可以使用$this->db->limit(10)，相当于limit 10;
			$query = $this->db->get("pp_admin");//获取pp_admin表的游标为0开始的20条记录，帮助手册的Active Record中有更多用法
      $result = $query->result_array();//获取的结果集为对象，通过此方法将结果集转为数组格式
      
     	$count = $this->db->count_all_results('pp_admin');//获取pp_admin表的记录总数
     	$list['count'] = $count;
     	$list['list'] = $result;

      return !empty($result) ? $list : FALSE;
    }
    
    function getOne($where)
    {
    	$where = (array) $where;
			$query = $this->db->get_where("pp_admin", array('id'=>10));//获取pp_admin表中id为10的记录
			if ($query->num_rows() > 0)//num_rows()返回执行结果返回条数
			{
			   $result = $query->row_array();//返回结果集中第一条记录，也可以输入一个整型值N，相当于元素下标，返回第N+1条记录,要区分与result_array();
			}

      return !empty($result) ? $result : FALSE;
    }

	public function edit($id, $update_fields)
	{
		if(!is_array($update_fields))
			return false;
			
		if(isset($update_fields['password']))
		{
			$encryption_key = $this->config->item('encryption_key');//获取application/config/config.php中key为encryption_key的值
			$update_fields['password'] = sha1($update_fields['password'].$encryption_key);
		}

		$id = intval($id);
		$query = $this->db->update("pp_admin", $update_fields, array("userid"=>$id));//更新pp_admin表中user_id=$id的字段值，$update_fields可以是一个数组也可以是一个对象，所有值都会被安全转义
		
		return $query;
	}

	public function add($data)
	{
		if(!is_array($data))
			return false;

		$query = $this->db->insert("pp_admin", $data);//向pp_admin表中插入一条记录，与update一样，$data可以是数组也可以是对象，内容为字段名和要插入的值
		$ret = $this->db->affected_rows();//返回insert，update等操作影响的行数

		return $ret > 0 ? true : false;
	}

	public function del($id)
	{
		$this->db->limit(1);//若del方法确定每次值删除一条记录，可以使用limit来设置
		$query = $this->db->delete("pp_admin", array('userid'=>$id));//删除pp_admin表中user_id=$id的一条记录。
		/**
		 * 	想要删除多个表中记录，如下操作
		 * 	$tables = array('table1', 'table2', 'table3');
		 *	$this->db->where('id', '5');
		 *	$this->db->delete($tables);
		 *	以上操作删除table1,table2,table3中id为5的记录。
		 **/

		return $query ? true : false;
	}

}