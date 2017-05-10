<?php /* Smarty version Smarty-3.1.12, created on 2017-04-28 12:25:25
         compiled from "admin/views/admin/user/public_edit_pwd.html" */ ?>
<?php /*%%SmartyHeaderCode:4490820715902c435dd4e93-32710860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8b8f2e51542b16d6a3bb57d284c682e1f38957a' => 
    array (
      0 => 'admin/views/admin/user/public_edit_pwd.html',
      1 => 1493095010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4490820715902c435dd4e93-32710860',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5902c435e0a665_53472200',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902c435e0a665_53472200')) {function content_5902c435e0a665_53472200($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<div class="pad_10">
	<div class="common-form">
		<form id="myform" method="post" action="/<?php echo $_smarty_tpl->tpl_vars['view']->value['uri'];?>
" name="myform">
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['user']['userid'];?>
" name="info[userid]">
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['user']['username'];?>
" name="info[username]">
			<table width="100%" class="table_form contentWrap">
				<tbody>
					<tr>
						<td width="80">用户名</td>
						<td><strong><?php echo $_smarty_tpl->tpl_vars['view']->value['user']['username'];?>
</strong></td>
					</tr>
					<tr>
						<td width="80">真实姓名</td>
						<td><?php echo $_smarty_tpl->tpl_vars['view']->value['user']['realname'];?>
</td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td><?php echo $_smarty_tpl->tpl_vars['view']->value['user']['email'];?>
</td>
					</tr>

					<tr>
						<td>旧密码</td>
						<td><input type="password" class="input-text" id="old_password" name="old_password" /><div id="old_passwordTip" class="onShow">不修改密码请留空。</div></td>
					</tr>

					<tr>
						<td>新密码</td>
						<td><input type="password" class="input-text" id="new_password" name="new_password" /><div id="new_passwordTip" class="onShow">不修改密码请留空。</div></td>
					</tr>
					<tr>
						<td>重复新密码</td>
						<td><input type="password" class="input-text" id="new_pwdconfirm" name="new_pwdconfirm" /><div id="new_pwdconfirmTip" class="onShow">不修改密码请留空。</div></td>
					</tr>
				</tbody>
			</table>
			<div class="bk15"></div>
			<input type="submit" id="dosubmit" class="button" value="提交" name="dosubmit" />
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
		$("#old_password").formValidator({empty:true,onshow:"不修改密码请留空。",onfocus:"密码应该为6-20位之间",oncorrect:"旧密码输入正确"}).inputValidator({min:6,max:20,onerror:"密码应该为6-20位之间"}).ajaxValidator({
			type : "post",
			url : "/admin/user/public_password_ajx",
			data :"",
			datatype : "html",
			async:'false',
			success : function(data){
				if( data == "1" )
				{
					return true;
				}
				else
				{
					return false;
				}
			},
			buttons: $("#dosubmit"),
			onerror : "旧密码输入错误",
			onwait : "请稍候..."
		});
		$("#new_password").formValidator({empty:true,onshow:"不修改密码请留空。",onfocus:"密码应该为6-20位之间"}).inputValidator({min:6,max:20,onerror:"密码应该为6-20位之间"});
		$("#new_pwdconfirm").formValidator({empty:true,onshow:"不修改密码请留空。",onfocus:"请输入两次密码不同。",oncorrect:"密码输入一致"}).compareValidator({desid:"new_password",operateor:"=",onerror:"请输入两次密码不同。"});
	})
</script>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>