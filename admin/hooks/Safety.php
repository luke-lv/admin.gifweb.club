<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
/**
 *
 * @name Safety
 * @author wangbo8
 *         @date 2016年5月30日
 *
 * @copyright (c) 2015 SINA Inc. All rights reserved.
 */
class Safety {
	private $thisCI;
	private $acc_arr_list;
	private $project_need_check;
	private $_mResource;
	private $_is_safehook;
	
	public function __construct() {
		//获取权限配置
		$this->thisCI = &get_instance();
		$this->thisCI->load->config('privilege.inc');
		$this->hook_safe_check = $this->thisCI->config->item('hook_safe_check');
		$this->acc_arr_list = $this->thisCI->config->item('privilege_acc');
		$this->project_need_check = $this->thisCI->config->item('project_need_check');

		$this->thisCI->load->model('admin/ResourceModel');
		$this->_mResource = $this->thisCI->ResourceModel;
	}

	public function verify() {
		//开关控制
		if(!$this->hook_safe_check['do_check']){
			return; //开关是关闭状态，不执行检测
		}

		$this->moduleName = strval($this->thisCI->router->modulename);
		$this->controllerName = strval($this->thisCI->router->class);
		$this->actionName = strval($this->thisCI->router->method);
		
		if($this->project_need_check['is_on']){
			$project_need_check_list = $this->project_need_check['project_list'];
			if(!in_array($this->moduleName, $project_need_check_list)){
				return;
			}
		}

		//拼装
		$to_check_m_b = $this->moduleName;
		$to_check_m_c = $this->moduleName . "/" . $this->controllerName;
		$to_check_str = $this->moduleName . "/" . $this->controllerName . "/" . $this->actionName;
		
		if($to_check_str != 'admin/auth/login' && $to_check_str != 'admin/auth/logout'){
			//判定是否需要检查
			if(!in_array($to_check_str, $this->acc_arr_list) && !in_array($to_check_m_c, $this->acc_arr_list) && !in_array($to_check_m_b, $this->acc_arr_list)){
				$this->_is_safehook = true;
				
				//检查用户是否登录
				$this->_checkAdmin();

				//如果登录，检测权限
				$res = $this->_checkPrivilege();
					
				if(!$res){
					$this->_safetylog(1);
					header('Content-Type:text/html;charset=utf-8');
					exit('管理后台修改了安全限制，未通过权限检测，出现调用问题。联系技术qq:290688189');
				}
			}
		}
	}
	
	private function _safetylog($type){
		//标识是否是safe限制的未登录
		$is_safehook_flag = $this->_is_safehook ? 'is_safehook'　: 'not_safehook';
		$log = $type == 1 ? "check_pri_log:" : "check_Admin_log:" . $is_safehook_flag;
		$log .= "module:" . $this->moduleName . "---controller:" . $this->controllerName. "---action:" .$this->actionName;
		$log .= "---userid:" . $this->userid . "---username:" . $this->username. "---roleid:". json_encode($this->roleid_arr);
		$log .= "---参数GET:" . json_encode($_GET) . "---参数POST:" . json_encode($_POST);
		PLog::w_DebugLog($log);
	}
	
	//登录检查
	private function _checkAdmin()
	{	
		$info = $this->thisCI->session->userdata('loginuser');
		if (empty($info) || empty($info['userid']) || empty($info['roleid']) || empty($info['username'])) {
			$this->_safetylog(2);
			header('Location:/admin/auth/login');
			exit(0);
		} else {
			$this->roleid_arr = explode(',',$info['roleid']);
			$this->userid = intval($info['userid']);
			$this->username = $info['username'];
		}
	
	}
	
	private function _checkPrivilege()
	{
		$default_allow_control = array('index', 'public', 'auth');
		if(in_array(1, $this->roleid_arr)) return true;
		if(in_array($this->thisCI->router->class, $default_allow_control)) return true;
		if(preg_match('/^public_/', $this->thisCI->router->method)) return true;

		$where = array(
				'm' => $this->thisCI->router->modulename,
				'c' => $this->thisCI->router->class,
				'a' => $this->thisCI->router->method,
		);
		
		//是否需要检查
		if(!$this->_check_is_priv($where)){
			 return true;
		}else{ //需要检查角色
			//遍历每一个角色，如果有，则通过
			if(is_array($this->roleid_arr) && count($this->roleid_arr) > 0){
				foreach($this->roleid_arr as $vroid){
					$check_data = $this->_mResource->checkRolePrivilege($vroid, $where);

					if($check_data){
						return true;
					}
				}
			}
			
		}
		
		return false;	
	}
	
	//检查当前路径是否设置权限
	private function _check_is_priv($where){
		if(!is_array($where) || empty($where)){
			exit('获取路径错误');
		}	
		
		$condition = array(
				'fields' => '*',
				'where' => $where
		);
		$Resource_data = $this->_mResource->findData($condition);

		return !empty($Resource_data) ? true : false;
	}

}
