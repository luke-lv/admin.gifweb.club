<?php /* Smarty version Smarty-3.1.12, created on 2017-04-28 13:22:22
         compiled from "admin/views/admin/role/index.html" */ ?>
<?php /*%%SmartyHeaderCode:9635914025902d18e696241-69277906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1187737025537ff6a19da9fddedbefbafe1cc2c' => 
    array (
      0 => 'admin/views/admin/role/index.html',
      1 => 1479376148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9635914025902d18e696241-69277906',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5902d18e6edf06_25337002',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902d18e6edf06_25337002')) {function content_5902d18e6edf06_25337002($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<div class="table-list pad-lr-10">
	<form method="post" action="/admin/role/listorder" name="myform">
		<table cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="10%">排序</th>
					<th width="10%">ID</th>
					<th align="left" width="15%">角色名称</th>
					<th align="left" width="265">角色描述</th>
					<th align="left" width="5%">状态</th>
					<th class="text-c">管理操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['view']->value['roles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<tr>
					<td align="center" width="10%"><input type="text" class="input-text-c input-text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['listorder'];?>
" size="3" name="listorders[<?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
]" /></td>
					<td align="center" width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
</td>
					<td width="15%"><?php echo $_smarty_tpl->tpl_vars['item']->value['rolename'];?>
</td>
					<td width="265"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
					<td width="5%">
						<a href="/admin/role/change_status?roleid=<?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
&amp;disabled=<?php if ($_smarty_tpl->tpl_vars['item']->value['disabled']){?>0<?php }else{ ?>1<?php }?>"><?php if ($_smarty_tpl->tpl_vars['item']->value['disabled']){?><font color="blue">×</font><?php }else{ ?><font color="red">√</font><?php }?></a>
					</td>
					<td class="text-c">
					<?php if ($_smarty_tpl->tpl_vars['item']->value['roleid']>1){?>
						<a href="javascript:setting_role(<?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
, '<?php echo $_smarty_tpl->tpl_vars['item']->value['rolename'];?>
')">权限设置</a> |
						<a href="/admin/role/member_manage?roleid=<?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
&amp;menuid=<?php echo $_smarty_tpl->tpl_vars['view']->value['menuid'];?>
">成员管理</a> |
						<a href="/admin/role/edit?roleid=<?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
&amp;menuid=<?php echo $_smarty_tpl->tpl_vars['view']->value['menuid'];?>
">修改</a> |
						<a href="javascript:confirmurl('/admin/role/delete?roleid=<?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
', '是否删除?')">删除</a>
					<?php }else{ ?>
						<font color="#cccccc">权限设置</font> |
						<a href="/admin/role/member_manage?roleid=<?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
&amp;menuid=<?php echo $_smarty_tpl->tpl_vars['view']->value['menuid'];?>
">成员管理</a> |
						<font color="#cccccc">修改</font> | <font color="#cccccc">删除</font>
					<?php }?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="btn"><input type="submit" value="排序" name="dosubmit" class="button" /></div>
	</form>
</div>
<script type="text/javascript">
<!--
function setting_role(id, name) {

	window.top.art.dialog({title:'设置《'+name+'》',id:'edit',iframe:'/admin/role/privilege?roleid='+id,width:'700',height:'500'});
}
//-->
</script>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>