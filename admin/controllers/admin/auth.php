<?php

/*
 * Auth.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	15:59:03 2012-12-9
 * @version	$Id: Auth.php 51 2012-12-28 02:59:55Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */

/**
 * Description of Auth
 *
 * @author sina
 */
class Auth extends MY_Controller
{
	protected $show_submenu = false;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/userModel');
		$this->load->model('admin/roleModel');
	}
	
	public function login()
	{
		//global $SEC;
		$view = array();
		(($year = date('Y')) > 2012) && ($view['lasttime'] = '-' . $year);
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/auth/login/';
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$username = $this->input->post('sgLoginName');
			$username = htmlspecialchars($username);
			
			//$username = $SEC->xss_clean($username);
			$password = $this->input->post('sgPassword');
			$view['sgLoginName'] = $username;
			if (empty($username) || empty($password)) {
				$view['errmsg'] = '用户名和密码不能为空';
			} else {
				$mUser = $this->userModel;
				$user_sql = $mUser->find(array('where'=>array('username'=>$username)));
				$user_rs = $this->db->query_read($user_sql);
				$user = $user_rs->result_array();
				//$user = $mUser->load($username, 'username');
				//echo $mUser->lastSql();exit;
				if (isset($user[0]) && ($user = current($user)) && ($user['username'] == $username)) {
					$password = $mUser->password($password, $user['encrypt']);
					if ($password == $user['password']) {
					    $session = array();
					    
					    $mRole = $this->roleModel;
					    
					    $roleIds = explode(",", $user['roleid']);
					    if(count($roleIds) > 1){
					        foreach ($roleIds as $v){
					            $role_sql = $mRole->load($v);
					            $role_rs = $this->db->query_read($role_sql);
					            $roleData = $role_rs->result_array();
					            $role = $roleData[0];
					            $session['rolename'][] = $role['rolename'];
					        }
					    } else{
					        $role_sql = $mRole->load($user['roleid']);
    						$role_rs = $this->db->query_read($role_sql);
    						$roleData = $role_rs->result_array();
    						$role = $roleData[0];
					        $session['rolename'] = $role['rolename'];
					    }
					    
					    if(is_array($session['rolename'])){
					        $session['rolename'] = implode("|", $session['rolename']);
					    }
						
						$data = array();
						$data['lastloginip'] = $this->input->ip_address();
						$data['lastlogintime'] = SYS_TIME;
						$tab = $mUser->getTable();
						$up_sql = $mUser->update($user['userid'], $data,$tab);
						$this->db->query_write($up_sql);
						
						$session['userid'] = $user['userid'];
						$session['roleid'] = $user['roleid'];
						$session['username'] = $user['username'];
						$this->session->set_userdata("loginuser", $session);
						unset($mUser, $mRole, $user, $role, $session);
						header('Location:/admin/index/index');
						return false;
					} else {
						$view['errmsg'] = '密码错误';
					}
				} else {
					$view['errmsg'] = '用户不存在';
				}
			}
		}
		$view['uri'] = $uri;
		$this->_view->assign('view', $view);
		$tpl = strtolower($this->router->fetch_class()) . '/' . $this->router->fetch_method() . '.html';
		echo $this->_view->render($tpl);		
		return false;
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		session_destroy();
		$this->showmessage('安全退出！', '/admin/auth/login');
	}
}

?>
