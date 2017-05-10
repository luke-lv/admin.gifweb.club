<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 11:00:58
         compiled from "admin\views\admin\user\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2751458febbea472d22-98652760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c35217884d213197e535f54bd3eb2cfd41afb07a' => 
    array (
      0 => 'admin\\views\\admin\\user\\index.html',
      1 => 1479376148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2751458febbea472d22-98652760',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'users' => 0,
    'item' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58febbea71e6a0_60544735',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58febbea71e6a0_60544735')) {function content_58febbea71e6a0_60544735($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\www\\ohter\\gifweb_admin\\weaver\\libraries\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<div class="pad_10">
	<div class="table-list">
		<form method="post" action="/admin/user/listorder" name="myform">
			<table cellspacing="0" width="100%">
				<thead>
					<tr>
						<th width="10%">序号</th>
						<th align="left" width="10%">用户名</th>
						<th align="left" width="10%">所属角色</th>
						<th align="left" width="10%">最后登录IP</th>
						<th align="left" width="20%">最后登录时间</th>
						<th align="left" width="15%">E-mail</th>
						<th width="10%">真实姓名</th>
						<th width="15%">管理操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<tr>
						<td align="center" width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
</td>
						<td width="10%"><strong><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
</strong></td>
						<td width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['rolename'];?>
</td>
						<td width="10%"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['lastloginip'])===null||$tmp==='' ? '--' : $tmp);?>
</td>
						<td width="20%"><?php if ($_smarty_tpl->tpl_vars['item']->value['lastlogintime']>0){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['lastlogintime'],'%Y-%m-%d %H:%M:%S');?>
<?php }else{ ?>从不<?php }?></td>
						<td width="15%"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
						<td align="center" width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['realname'];?>
</td>
						<td align="center" width="15%">
							<a href="javascript:edit(<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
, '<?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
')">修改</a>
							<span>|</span>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['userid']>1){?>
							<a href="javascript:confirmurl('/admin/user/delete?userid=<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
', '是否删除该用户?')">删除</a>
							<?php }else{ ?>
							<font color="#cccccc">删除</font>
							<?php }?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="btn"></div>
			<div id="pages"><?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	<!--
	function edit(id, name) {
		window.top.art.dialog({title:'修改--'+name, id:'edit', iframe:'/admin/user/edit?userid='+id ,width:'500px',height:'400px'}, 	function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;
			var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
	}
	//-->
</script>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>