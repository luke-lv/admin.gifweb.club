<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 11:19:16
         compiled from "admin\views\admin\user\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:511258fec0345ba5f8-05130965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6958d444dd49db313f11b1fd9eae213e2c0dffcf' => 
    array (
      0 => 'admin\\views\\admin\\user\\edit.html',
      1 => 1479376147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '511258fec0345ba5f8-05130965',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'roleid' => 0,
    'roles' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58fec034796fb3_61150229',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fec034796fb3_61150229')) {function content_58fec034796fb3_61150229($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<div class="pad_10">
	<div class="common-form">
		<form id="myform" method="post" action="/admin/user/edit" name="myform">
			<input type="hidden" name="info[roleid]" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['roleid'];?>
" />
			<table width="100%" class="table_form contentWrap">
				<tbody>
					<tr>
						<td width="80">用户名</td>
						<td><strong><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['username'])===null||$tmp==='' ? '<font color="red">error</font>' : $tmp);?>
</strong></td>
					</tr>
					<tr>
						<td>密码</td>
						<td><input type="password" value="" id="password" class="input-text" name="info[password]" /><div id="passwordTip" class="onShow">请输入密码</div></td>
					</tr>
					<tr>
						<td>确认密码</td>
						<td><input type="password" value="" id="pwdconfirm" class="input-text" name="info[pwdconfirm]" /><div id="pwdconfirmTip" class="onShow">请输入确认密码</div></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td>
							<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" size="30" id="email" class="input-text" name="info[email]" />
							<div id="emailTip" class="onShow">请输入E-mail</div>
						</td>
					</tr>
					<tr>
						<td>真实姓名</td>
						<td>
							<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['realname'];?>
" id="realname" class="input-text" name="info[realname]" />
						</td>
					</tr>
					<?php if (in_array(1,explode(",",$_smarty_tpl->tpl_vars['roleid']->value))){?>
					<tr>
						<td>所属角色</td>
						<td>
							<select name="info[roleid][]" multiple="multiple"  size="5">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['item']->value['roleid'],$_smarty_tpl->tpl_vars['user']->value['roleid'])){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['rolename'];?>
</option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			<div class="bk15"></div>
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
" name="info[userid]" />
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
" name="info[username]" />
			<input type="submit" name="dosubmit" value="提交" class="dialog" id="dosubmit" />
		</form>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>