<?php

/**
 * User.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	1:13:21 2012-12-12
 * @version	$Id: User.php 53 2012-12-28 03:23:17Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */
class User extends MY_Controller
{

	protected $_mUser;
	protected $_mRole;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('validate');
		$this->load->model('admin/userModel');
		$this->_mUser = $this->userModel;
		$this->load->model('admin/roleModel');
		$this->_mRole = $this->roleModel;
	}

	public function index()
	{
		$roleid = $this->input->get('roleid', null);
		$condition = array();
		if (($roleid = intval($roleid))) {
			$condition['where']['roleid'] = $roleid;
		}
		$view = array();
		$roles = $this->_mRole->findData();
		$users = $this->_mUser->findData($condition);
		$array = array();
		foreach ($roles as $r) {
			$array[$r['roleid']] = $r['rolename'];
		}
		$roles = $array;
		unset($array, $r);

		foreach ($users as &$row) {
		    $roleIds = explode(",", $row['roleid']);
		    if(count($roleIds) > 1){
		        foreach ($roleIds as $v){
		            $row['rolename'][] = $roles[$v];
		        }
		    } else{
		        $row['rolename'] = $roles[$row['roleid']];
		    }
		    
		    if(is_array($row['rolename'])){
		        $row['rolename'] = implode("|", $row['rolename']);
		    }
		}
		unset($row);

		$this->_view->assign('users', $users);
		$this->_render();
	}

	public function add()
	{
		
		if (in_array('XMLHttpRequest', $this->input->request_headers())) {
			$this->public_checkname_ajx();
		}
		$view = array();
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/user/add';
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$arg = $this->input->post('info');
			$info = array();
			if ($this->_mUser->checkName($arg['username'])) {
				$this->showmessage('用户已存在！');
			}
			$info = $this->_checkuserinfo($arg);
			if (!validate::range($info['password'], array(6, 20))) {
				$this->showmessage('密码应该为6-20位之间！');
			}
			$passwordinfo = $this->_mUser->password($info['password']);
			$info['password'] = $passwordinfo['password'];
			$info['encrypt'] = $passwordinfo['encrypt'];
			$info['lastupdatetime'] = SYS_TIME;

			$admin_fields = array('username', 'email', 'password', 'encrypt', 'roleid', 'realname', 'lastupdatetime');
			foreach ($info as $k => $value) {
				if (!in_array($k, $admin_fields)) {
					unset($info[$k]);
				}
			}
			$ret = $this->_mUser->insertData($info);
			if (false !== $ret) {
				$this->success('添加用户成功！', '/admin/user/index');
			} else {
				$this->error('添加用户失败！');
			}
		} else {
			$view['uri'] = $uri;
			$roles = $this->_mRole->findData(array('where' => array('disabled' => '0')));
			$view['roles'] = is_array($roles) ? $roles: array();
			$this->_view->assign('view', $view);
			$this->_render();
		}
		return false;
	}

	public function edit()
	{
		$view = array();
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/user/edit';
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
		    $arg = $this->input->post('info');
		    
			$info = array();  
			
			$info = $this->_checkuserinfo($arg);
			$info['roleid'] = implode(",", $arg['roleid']);
			$userid = intval($info['userid']);
			if ($userid) {
				if (isset($info['password']) && !empty($info['password'])) {
					if (!validate::range($info['password'], array(6, 20))) {
						$this->showmessage('密码应该为6-20位之间！');
					}
					$passwordinfo = $this->_mUser->password($info['password']);
					$userid && $this->_mUser->updateData($userid, $passwordinfo);
				}
				$info['lastupdatetime'] = SYS_TIME;
				$admin_fields = array('username', 'email', 'roleid', 'realname', 'lastupdatetime');
				foreach ($info as $k => $value) {
					if (!in_array($k, $admin_fields)) {
						unset($info[$k]);
					}
				}
				$ret = $this->_mUser->updateData($userid, $info);
			} else {
				$ret = FALSE;
			}
			$message = $ret ? '操作成功！' : '操作失败！';
			$this->showmessage($message, '', '', 'edit');
		} else {
			$this->show_header = false;
			$userid = intval($this->input->get('userid'));
			$user = $roles = array();
			if ($userid > 0) {
				$user = $this->_mUser->loadData($userid);
				$user = $user[0];
				$roles = $this->_mRole->findData(array('where' => array('disabled' => '0')));
			}
			//p($roles);
			$loginInfo = $this->session->userdata('loginuser');
			$this->_view->assign('roleid', $loginInfo['roleid']);
			$user['roleid'] = explode(",", $user['roleid']);
			//p($user);
			$this->_view->assign('user', $user);
			$this->_view->assign('roles', $roles);
			$this->_render();
		}
		return false;
	}

	public function delete()
	{
		$userid = intval($this->input->get('userid', 0));
		if($userid <= 1) {
			$this->error();
		}
		$ret = $this->_mUser->deleteData($userid);
		$func = (bool) $ret ? 'success' : 'error';
		$this->$func();
	}

	/**
	 * 异步检测用户名
	 */
	public function public_checkname_ajx()
	{
		$username = trim($this->input->get('username', ''));
		if ($username && $this->_mUser->checkName($username)) {
			exit('0');
		}
		exit('1');
	}
	
	public function public_password_ajx()
	{
		$user = $this->session->userdata('loginuser');
		$userid = $user['userid'];
		$r = array();
		$r = $this->_mUser->loadData($userid);
		$r = $r[0];
			if($this->_mUser->password($this->input->get('old_password'), $r['encrypt']) == $r['password']) {
			exit('1');
		}
		exit('0');
	}

	public function public_edit_pwd()
	{
		$view = array();
		$this->show_submenu = false;
		$user = $this->session->userdata('loginuser');
		$userid = $user['userid'];
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/user/public_edit_pwd';
		$userData = $this->_mUser->loadData($userid);
		$user = $userData[0];	
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$arg = $this->input->Post();
			if($this->_mUser->password($arg['old_password'], $user['encrypt']) !== $user['password']) {				
				$this->error('旧密码错误！', HTTP_REFERER);
			}
			if(isset($arg['new_password']) && !empty($arg['new_password'])) {
				if (!validate::range($arg['new_password'], array(6, 20))) {
					$this->showmessage('密码应该为6-20位之间！');
				}
				$ret = false;
				$passwordinfo = $this->_mUser->password($arg['new_password']);
				$userid && ($ret = $this->_mUser->updateData($userid, $passwordinfo));
				if (false !== $ret) {
					$this->success('修改密码成功！', '/admin/auth/logout');
					return false;
				}
			}
			$this->error('修改密码失败！');
		} else {
			$view['uri'] = $uri;
			$view['user'] = $user;
			$this->_view->assign('view', $view);
			$this->_render();
		}
		return false;
	}
	
	/**
	 * 检查管理员名称
	 * @param array $data 管理员数据
	 */
	private function _checkuserinfo($data)
	{
		if (!is_array($data)) {
			$this->showmessage('数据错误！');
			return false;
		} elseif (!validate::username($data['username'])) {
			$this->showmessage('用户名错误！');
			return false;
		} elseif (empty($data['email']) || !validate::email($data['email'])) {
			$this->showmessage('邮箱错误！');
			return false;
		} elseif (empty($data['roleid'])) {
			return false;
		}
		return $data;
	}

}

?>