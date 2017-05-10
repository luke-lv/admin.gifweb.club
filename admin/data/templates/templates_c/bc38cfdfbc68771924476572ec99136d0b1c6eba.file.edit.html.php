<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 12:34:29
         compiled from "admin\views\admin\role\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:2408358fec23bd3c6d5-37210641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc38cfdfbc68771924476572ec99136d0b1c6eba' => 
    array (
      0 => 'admin\\views\\admin\\role\\edit.html',
      1 => 1493094851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2408358fec23bd3c6d5-37210641',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58fec23be134b8_18277869',
  'variables' => 
  array (
    'view' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fec23be134b8_18277869')) {function content_58fec23be134b8_18277869($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<script type="text/javascript">
	<!--
	$(function(){
		$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
		$("#rolename").formValidator({onshow:"请输入角色名称",onfocus:"角色名称不能为空。"}).inputValidator({min:1,max:999,onerror:"角色名称不能为空。"});
	})
	//-->
</script>
<div class="pad_10">
	<div class="common-form">
		<form id="myform" method="post" action="/<?php echo $_smarty_tpl->tpl_vars['view']->value['uri'];?>
" name="myform">
			<table width="100%" class="table_form contentWrap">
				<tbody>
					<tr>
						<td><label for="rolename">角色名称</label></td>
						<td><input type="text" id="rolename" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['rolename'];?>
" name="info[rolename]" /><div id="rolenameTip" class="onShow">请输入角色名称</div></td>
					</tr>
					<tr>
						<td><label for="description">角色描述</label></td>
						<td><textarea style="height:100px;width:500px;" class="inputtext" id="description" cols="20" rows="2" name="info[description]"><?php echo $_smarty_tpl->tpl_vars['view']->value['data']['description'];?>
</textarea></td>
					</tr>
					<tr>
						<td>是否启用</td>
						<td>
							<input type="radio" <?php if ($_smarty_tpl->tpl_vars['data']->value['disabled']!=1){?>checked="checked"<?php }?> value="0" name="info[disabled]" />&nbsp;启用
							<input type="radio" <?php if ($_smarty_tpl->tpl_vars['data']->value['disabled']==1){?>checked="checked"<?php }?> value="1" name="info[disabled]" />&nbsp;禁止
						</td>
					</tr>
					<tr>
						<td>排序</td>
						<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['listorder'];?>
" class="input-text" size="3" name="info[listorder]" /></td>
					</tr>
				</tbody>
			</table>
			<div class="bk15"></div>
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['roleid'];?>
" name="roleid" />
			<input type="submit" class="button" value="提交" name="dosubmit" />
		</form>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>