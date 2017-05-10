<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 12:45:14
         compiled from "admin\views\admin\resource\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:117158fed45a2d1a34-47740328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87a43e35d4deffb4f9c7a8c42ced4dc12c8f362e' => 
    array (
      0 => 'admin\\views\\admin\\resource\\edit.html',
      1 => 1493095463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117158fed45a2d1a34-47740328',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58fed45a3f2ba3_72960669',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fed45a3f2ba3_72960669')) {function content_58fed45a3f2ba3_72960669($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
<!--
	$(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
		$("#language").formValidator({onshow:"请输入对应的中文语言名称",onfocus:"请输入对应的中文语言名称",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入对应的中文语言名称"});
		$("#name").formValidator({onshow:"请输入菜单英文名称",onfocus:"请输入菜单英文名称",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入菜单英文名称"});
		$("#m").formValidator({onshow:"请输入模块名",onfocus:"请输入模块名",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入模块名"});
//		$("#c").formValidator({onshow:"请输入文件名",onfocus:"请输入文件名",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入文件名"});
//		$("#a").formValidator({tipid:'a_tip',onshow:"请输入方法名",onfocus:"请输入方法名",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入方法名"});
	})
//-->
</script>
<div class="common-form">
	<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['view']->value['uri'];?>
" id="myform" name="myform">
		<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['id'];?>
" name="id" />
		<table width="100%" class="table_form contentWrap">
			<tbody>
				<tr>
					<th width="200">上级菜单：</th>
					<td>
						<select name="info[parentid]">
							<option value="0">作为一级菜单</option>
							<?php echo $_smarty_tpl->tpl_vars['view']->value['categorys'];?>

						</select>
					</td>
				</tr>
				<tr>
					<th> 对应的中文语言名称：</th>
					<td>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['title'];?>
" class="input-text" id="title" name="info[title]" max-length="40" /><div id="languageTip" class="onShow">请输入对应的中文语言名称</div>
					</td>
				</tr>
				<tr>
					<th>菜单英文名称：</th>
					<td>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['name'];?>
" class="input-text" id="name" name="info[name]" max-length="40" /><div id="nameTip" class="onShow">请输入菜单英文名称。<font color="red">唯一</font></div>
					</td>
				</tr>
				<tr>
					<th>模块名：</th>
					<td>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['m'];?>
" class="input-text" id="m" name="info[m]" /><div id="mTip" class="onShow">请输入模块名</div>
					</td>
				</tr>
				<tr>
					<th>文件名：</th>
					<td>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['c'];?>
" class="input-text" id="c" name="info[c]" /><div id="cTip" class="onShow" />请输入文件名</div>
					</td>
				</tr>
				<tr>
					<th>方法名：</th>
					<td>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['a'];?>
" class="input-text" id="a" name="info[a]" />&nbsp;<span id="a_tip" class="onShow">请输入方法名</span>通过AJAX 传递的方法，请使用 ajax_开头，方法为修改或删除操作时，请对应写成，ajax_edit_myaction/ajax_delete_myaction
					</td>
				</tr>
				<tr>
					<th>附加参数：</th>
					<td>
						<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data']['data'];?>
" class="input-text" name="info[data]" />
					</td>
				</tr>
				<tr>
					<th>是否显示菜单：</th>
					<td>
						<input type="radio" <?php if ($_smarty_tpl->tpl_vars['view']->value['data']['display']){?>checked="checked"<?php }?> value="1" name="info[display]" />&nbsp;是
						<input type="radio" <?php if ($_smarty_tpl->tpl_vars['view']->value['data']['display']=='0'){?>checked="checked"<?php }?> value="0" name="info[display]" />&nbsp;否
					</td>
				</tr>
			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
			<input type="hidden" name="token" value="" />
			<input type="submit" value="提交" name="dosubmit" class="button" id="dosubmit" />
		</div>
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>