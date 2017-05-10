<?php

/**
 * Role.php
 * 
 * Copyright (c) 2012 SINA Inc. All rights reserved.
 * 
 * @author	ligangzong <gangzong@staff.sina.com.cn>
 * @date	22:55:47 2012-12-11
 * @version	$Id: Role.php 43 2012-12-24 06:49:00Z gangzong $
 * @desc	This guy is so lazy that he doesn't leave anything.
 */
class Role extends MY_Controller
{

	protected $_mRole;
	protected $_mPrivilege;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/roleModel');
		$this->load->model('admin/resourceModel');
		$this->load->model('admin/privilegeModel');
		$this->_mRole = $this->roleModel;		
		$this->_mPrivilege = $this->privilegeModel;
		$this->load->library('tree');
	}

	public function index()
	{
		$view = array();
		$menuid = $this->input->get('menuid');
		if (($menuid = intval($menuid))) {
			$view['menuid'] = $menuid;
		} else {
			$condition = array(
				'where' => array(
					'm' => strtolower($this->router->modulename),
					'c' => strtolower($this->router->fetch_class()),
					'a' => strtolower($this->router->fetch_method()),
				),
			);
			$r = $this->resourceModel->findData($condition);
			isset($r[0]['id']) && $view['menuid'] = $r[0]['id'];
			unset($mResouce, $condition);
		}
		$data = $this->_mRole->findData(array('order' => 'listorder DESC, roleid DESC'));
		$view['roles'] = is_array($data) ? $data : array();

		$this->_view->assign('view', $view);
		$this->_render();
		return false;
	}

	public function add()
	{
		$view = array();
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/role/add/';
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$data = $this->input->post('info');
			if (!is_array($data) || empty($data['rolename'])) {
				$this->showmessage('角色名称不能为空！');
			}
			if ($this->_mRole->checkRoleName($data['rolename'])) {
				$this->showmessage('角色名称已经存在！');
			}
			$ret = $this->_mRole->insertData($data);
			//$this->_cache();
			if ($ret) {
				$this->success('添加角色成功！', '/admin/role/index');
			} else {
				$this->error('添加角色失败！');
			}
		} else {
			$view['uri'] = $uri;

			$this->_view->assign('view', $view);
			$this->_render();
		}
		return false;
	}

	public function edit()
	{
		$view = array();
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/role/edit/';
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$data = $this->input->post('info');
			$roleid = intval($this->input->post('roleid'));
			if ($roleid <= 1 || !is_array($data) || empty($data['rolename'])) {
				$this->error(null, '/admin/role/index');
			}
			$this->_mRole->updateData($roleid, $data);
			//$this->_cache();
			$this->success(null, '/admin/role/index');
		} else {
			$view['uri'] = $uri;
			$roleid = intval($this->input->get('roleid'));
			$roleid && $data = $this->_mRole->loadData($roleid);
			if (empty($roleid) || !is_array($data)) {
				$this->error(null, '/admin/role/index');
			}
			$view['data'] = $data[0];;
			$this->_view->assign('view', $view);
			$this->_render();
		}
		return false;
	}

	public function delete()
	{
		$roleid = intval($this->input->get('roleid'));
		if ($roleid > 1) {
			$this->_mRole->deleteData($roleid);
			//$this->priv_db->delete(array('roleid' => $roleid));
			//$this->_cache();
			$this->success('删除角色成功！');
		} else {
			$this->showmessage('该角色不允许删除！');
		}
	}

	public function listorder()
	{
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post') {
			$data = $this->input->post('listorders');
			is_array($data) or $data = array();
			foreach ($data as $roleid => $listorder) {
				$roleid = intval($roleid);
				$roleid && $this->_mRole->updateData($roleid, array('listorder' => $listorder));
			}
			$this->success('操作成功！');
		} else {
			$this->error('操作失败！');
		}
	}

	public function change_status()
	{
		$roleid = intval($this->input->get('roleid', 0));
		$disabled = intval($this->input->get('disabled', 0));
		$roleid && $this->_mRole->updateData($roleid, array('disabled' => $disabled));
		//$this->_cache();
		$this->showmessage('操作成功', '/admin/role/index');
	}

	public function privilege()
	{
		$view = array();
		//$this->_mResouce = Yaf_Registry::get('resource');
		$uri = $this->uri->uri_string;
		$defaultUri = '/admin/role/privilege/';
		$roleid = intval($this->input->post('roleid'));
		$rq_method = strtolower($this->input->server('REQUEST_METHOD'));
		if ($rq_method == 'post' && (strstr($defaultUri,$uri))) {
			$arrMenuid = $this->input->post('menuid', array());
			if (is_array($arrMenuid) && count($arrMenuid) > 0) {
				$r = $this->_mPrivilege->deleteData($roleid, 'roleid');
				if (false !== $r) {
					$menuinfo = $this->resourceModel->findData(array('fields' => '`id`,`m`,`c`,`a`,`data`'));
					$menu_info = array();
					foreach ($menuinfo as $_v)
						$menu_info[$_v['id']] = $_v;
					unset($menuinfo, $_v);
					$rr = array();
					foreach ($arrMenuid as $menuid) {
						$info = array();
						$info = $this->_mRole->get_menuinfo($roleid, intval($menuid), $menu_info);
						$rr[] = $this->_mPrivilege->insertData($info);
					}
				}
			} else {
				$this->_mPrivilege->delete($roleid, 'roleid');
			}
			//$this->_cache();
			$this->success('操作成功！');
		} else {
			$view['uri'] = $uri;
			$roleid = intval($this->input->get('roleid'));
			if ($roleid) {
				$menu = $this->tree;
				$menu->icon = array('│ ', '├─ ', '└─ ');
				$menu->nbsp = '&nbsp;&nbsp;&nbsp;';
				$result = $this->resourceModel->findData();
				is_array($result) or $result = array();
				$priv_data = $this->_mPrivilege->findData(array('fields' => 'm,c,a,data,siteid,roleid'));
				is_array($priv_data) or $priv_data = array();
				foreach ($result as $n => $t) {
					$result[$n]['cname'] = $t['title'];
					$result[$n]['checked'] = ($this->_mRole->is_checked($t, $roleid, $t['id'], $priv_data)) ? ' checked' : '';
					$result[$n]['level'] = $this->_mRole->get_level($t['id'], $result);
					$result[$n]['parentid_node'] = ($t['parentid']) ? ' class="child-of-node-' . $t['parentid'] . '"' : '';
				}
				$str = "<tr id='node-\$id' \$parentid_node>
							<td style='padding-left:30px;'>\$spacer<input type='checkbox' name='menuid[]' value='\$id' level='\$level' \$checked onclick='javascript:checknode(this);'> \$cname</td>
						</tr>";
				$menu->init($result);
				$view['roleid'] = $roleid;
				$view['categorys'] = $menu->get_tree(0, $str);
				unset($result, $priv_data);
				$this->_view->assign('view', $view);
			}
			$this->_render();
		}
		return false;
	}
	
	public function member_manage()
	{
		$arg = $this->input->get();
		$query = http_build_query($arg);
		header('Location:/admin/user/index?' . $query);
	}

}

?>