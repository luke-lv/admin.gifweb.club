<?php
/**
* @author guotao1, <guotao1@staff.sina.com.cn>
* @version : MY_Controller.php 2013-3-5 ����03:06:02 guotao1 
* @copyright  (c) 2012 Sina PAY Team.
*/

/**
 * MY_Router Class
 *
 * Parses URIs and determines routing
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @author		ExpressionEngine Dev Team
 * @category	Libraries
 * @link		http://codeigniter.com/user_guide/general/routing.html
 */
class MY_Controller extends CI_Controller
{
	var $_view;
	protected $show_submenu = true;
	/**
	 * 设置_view全局变量
	 * Enter description here ...
	 */
	public function __construct()
	{
		parent::__construct();
		$config['left_delimiter'] = '{_';
		$config['right_delimiter'] = "_}";
		$config['template_dir'] =  APPPATH."/views";
		$config['compile_dir'] = APPPATH."/data/templates/templates_c";
		$config['cache_dir'] =  APPPATH."/data/templates/templates_d";

		$this->load->library('adapter',$config);
		$this->_view = $this->adapter;			
		$this->load->model('admin/resourceModel');
		$module = $this->router->modulename;
		
		if ($module != 'Index') {
			$controller = $this->router->class;
			$action = $this->router->method;
			$view_directory = APPPATH . DS . 'views' . DS . $module . DS ;
			$this->_view->setScriptPath($view_directory);
			unset($module, $controller, $action, $view_directory);
		}	
		
		//访问权限判定(暂时先走hook安全检测,此处为预留)
		//$this->_check_accss();
	}
	
	protected function _assign($name, $value = NULL)
	{
		$this->_view->assign($name, $value);
	}

	protected function _render($tpl = NULL, array $parameters = NULL)
	{	
		header('Cache-Control : no-cache,must-revalidate');
		$this->_beforeRender();
		empty($tpl) && $tpl = strtolower($this->router->class) . '/' . $this->router->method . '.html';
		echo $this->_view->render($tpl, $parameters);
	}
	
	protected function _beforeRender()
	{
		$submenu = array();
		if(true === $this->show_submenu) {
			$menuid = $this->input->get('menuid', null);
			$menuid = null === $menuid ? '' : intval($menuid);
			$submenu = $this->resourceModel->subResource($this->router, $menuid);
			$this->_view->assign('submenu', $submenu);
		}
		$this->show_submenu = true;
		unset($menuid, $submenu);
	}
	
	private function _check_accss(){
		//获取权限配置
		$this->load->config('privilege.inc');
		$acc_arr_list = $this->config->item('privilege_acc');
		
		$where = array(
				'm' => $this->router->modulename,
				'c' => $this->router->class,
				'a' => $this->router->method,
		);

		//拼装
		$to_check_str = $where['m'] . "/" . $where['c'] . "/" . $where['a'];

		if($to_check_str != 'admin/auth/login' && $to_check_str != 'admin/auth/logout'){
			if(!in_array($to_check_str, $acc_arr_list)){
				//检查用户是否登录
				$this->_checkAdmin();
					
				//如果登录，检测权限
				$res = $this->_checkPrivilege2();
					
				if(!$res){
					$this->error('管理后台修改了安全限制，未通过权限检测，出现调用问题。联系qq:290688189');
					exit('管理后台修改了安全限制，未通过权限检测，出现调用问题。联系qq:290688189');
				}
			}
		}
	}
	
	public function _checkAdmin()
	{
		$info = $this->session->userdata('loginuser');
		if (empty($info) || empty($info['userid']) || empty($info['roleid']) || empty($info['username'])) {
			header('Location:/admin/auth/login');
			exit(0);
		} else {
			$this->roleid = intval($info['roleid']);
			$this->moduleName = strtolower($this->router->modulename);
			$this->controllerName = strtolower($this->router->class);
			$this->actionName = strtolower($this->router->method);
		}
		
	}
	
	public function _checkPrivilege()
	{
		$default_allow_control = array('index', 'public', 'auth');
		if($this->roleid == 1) return true;
		//if(in_array($_SESSION['xft_roleid'], array(1,5))) return true;
		if(in_array($this->router->class, $default_allow_control)) return true;
		if(preg_match('/^public_/', $this->router->method)) return true;
	
		$where = array(
				'm' => $this->router->modulename,
				'c' => $this->router->class,
				'a' => $this->router->method,
		);
		if (!($this->resourceModel->checkRolePrivilege($this->roleid, $where))) {
			$this->error('您没有权限操作该项');
		}
	}
	
	public function _checkPrivilege2()
	{
		$default_allow_control = array('index', 'public', 'auth');
		if($this->roleid == 1) return true;
		//if(in_array($_SESSION['xft_roleid'], array(1,5))) return true;
		if(in_array($this->router->class, $default_allow_control)) return true;
		if(preg_match('/^public_/', $this->router->method)) return true;

		$where = array(
			'm' => $this->router->modulename,
			'c' => $this->router->class,
			'a' => $this->router->method,
		);

		//是否需要检查
		if(!$this->_check_is_priv($where)){
			return true;
		}else{ //需要检查单签角色
			$check_data = $this->resourceModel->checkRolePrivilege($this->roleid, $where);
			if($check_data){
				return true;
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
		$Resource_data = $this->resourceModel->findData($condition);
		
		return !empty($Resource_data) ? true : false;
	}
	
	
	protected function showmessage($message, $url = '', $ms = 1250, $dialog = '', $returnjs = '')
	{
		$url = empty($url) ? HTTP_REFERER : $url;
		$ms = intval($ms);
		$view = array();
		$view['message']	= $message;
		$view['url']		= $url;
		$view['timeout']	= $ms ? $ms : 1550;
		$view['dialog']		= $dialog;
		$view['returnjs']	= $returnjs;
		$this->_view->assign('view', $view);
		echo $this->_view->render('public/showmessage.html');
		exit(0);
	}

	protected function success($message = null, $url = null)
	{
		empty($message) && $message = '操作成功！';
		return $this->showmessage($message, $url);
	}

	protected function error($message = null, $url = null)
	{
		empty($message) && $message = '操作失败！';
		return $this->showmessage($message, $url);
	}
	
}

?>