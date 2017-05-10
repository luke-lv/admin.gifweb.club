<?php /* Smarty version Smarty-3.1.12, created on 2017-04-28 13:22:25
         compiled from "admin/views/admin/user/add.html" */ ?>
<?php /*%%SmartyHeaderCode:19418828415902d191ced8f7-27277053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffcac4e0dc4a577467e54518574d99c7779a8158' => 
    array (
      0 => 'admin/views/admin/user/add.html',
      1 => 1493094924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19418828415902d191ced8f7-27277053',
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
  'unifunc' => 'content_5902d191d21395_04226220',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902d191d21395_04226220')) {function content_5902d191d21395_04226220($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<div class="pad_10">
	<div class="common-form">
		<form id="myform" method="post" action="/<?php echo $_smarty_tpl->tpl_vars['view']->value['uri'];?>
" name="myform">
			<table width="100%" class="table_form contentWrap">
				<tbody>
					<tr>
						<td width="80">用户名</td>
						<td><input type="text" id="username" class="input-text" name="info[username]" /><div id="usernameTip" class="onShow">请输入用户名</div></td>
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
							<input type="text" size="30" id="email" class="input-text" value="" name="info[email]" />
							<div id="emailTip" class="onShow">请输入E-mail</div>
						</td>
					</tr>
					<tr>
						<td>真实姓名</td>
						<td>
							<input type="text" id="realname" class="input-text" value="" name="info[realname]" />
						</td>
					</tr>
					<tr>
						<td>所属角色</td>
						<td>
							<select name="info[roleid]">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['view']->value['roles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['roleid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['rolename'];?>
</option>
								<?php } ?>
							</select>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="bk15"></div>
			<input type="submit" class="button" value="提交" name="dosubmit" />
		</form>
	</div>
</div>
<script type="text/javascript">
	<!--
	$(function(){
		$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
		$("#username").formValidator({onshow:"请输入用户名",onfocus:"用户名应该为2-20位之间"}).inputValidator({min:2,max:20,onerror:"用户名应该为2-20位之间"}).ajaxValidator({
			type : "get",
			url : "",
			data :"/admin/user/public_checkname_ajx",
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
			onerror : "用户已存在。",
			onwait : "请稍候..."
		});
		$("#password").formValidator({onshow:"请输入密码",onfocus:"密码应该为6-20位之间"}).inputValidator({min:6,max:20,onerror:"密码应该为6-20位之间"});
		$("#pwdconfirm").formValidator({onshow:"请输入确认密码",onfocus:"请输入两次密码不同。",oncorrect:"密码输入一致"}).compareValidator({desid:"password",operateor:"=",onerror:"请输入两次密码不同。"});
		$("#email").formValidator({onshow:"请输入E-mail",onfocus:"E-mail格式错误",oncorrect:"E-mail格式正确"}).regexValidator({regexp:"email",datatype:"enum",onerror:"E-mail格式错误"});
	})
	//-->
</script>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>