<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 12:44:53
         compiled from "admin\views\admin\resource\add.html" */ ?>
<?php /*%%SmartyHeaderCode:490458fed37bb35204-92470092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad0860cb8431ebe665c947e10d8b16ac51477327' => 
    array (
      0 => 'admin\\views\\admin\\resource\\add.html',
      1 => 1493095455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '490458fed37bb35204-92470092',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58fed37bb9e9b7_91056436',
  'variables' => 
  array (
    'view' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fed37bb9e9b7_91056436')) {function content_58fed37bb9e9b7_91056436($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<script type="text/javascript">
	<!--
	$(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
		$("#language").formValidator({onshow:"请输入对应的中文语言名称",onfocus:"请输入对应的中文语言名称",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入对应的中文语言名称"});
		$("#name").formValidator({onshow:"请输入菜单英文名称",onfocus:"请输入菜单英文名称",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入菜单英文名称"});
		$("#m").formValidator({onshow:"请输入模块名",onfocus:"请输入模块名",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入模块名"});
		/*$("#c").formValidator({onshow:"请输入文件名",onfocus:"请输入文件名",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入文件名"});*/
		/*$("#a").formValidator({tipid:'a_tip',onshow:"请输入方法名",onfocus:"请输入方法名",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"请输入方法名"});*/
	})
	//-->
</script>
<div class="common-form">
	<form method="post" action="/<?php echo $_smarty_tpl->tpl_vars['view']->value['uri'];?>
" id="myform" name="myform">
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
						<input type="text" class="input-text" id="title" name="info[title]" max-length="40" /><div id="languageTip" class="onShow">请输入对应的中文语言名称</div>
					</td>
				</tr>
				<tr>
					<th>菜单英文名称：</th>
					<td>
						<input type="text" class="input-text" id="name" name="info[name]" max-length="40" /><div id="nameTip" class="onShow">请输入菜单英文名称。<font color="red">唯一</font></div>
					</td>
				</tr>
				<tr>
					<th>模块名：</th>
					<td>
						<input type="text" class="input-text" id="m" name="info[m]" /><div id="mTip" class="onShow">请输入模块名</div>
					</td>
				</tr>
				<tr>
					<th>文件名：</th>
					<td>
						<input type="text" class="input-text" id="c" name="info[c]" /><div id="cTip" class="onShow" />请输入文件名</div>
					</td>
				</tr>
				<tr>
					<th>方法名：</th>
					<td>
						<input type="text" class="input-text" id="a" name="info[a]" />&nbsp;<span id="a_tip" class="onShow">请输入方法名</span>通过AJAX 传递的方法，请使用 ajax_开头，方法为修改或删除操作时，请对应写成，ajax_edit_myaction/ajax_delete_myaction
					</td>
				</tr>
				<tr>
					<th>附加参数：</th>
					<td>
						<input type="text" class="input-text" name="info[data]" />
					</td>
				</tr>
				<tr>
					<th>是否显示菜单：</th>
					<td>
						<input type="radio" checked="" value="1" name="info[display]" />&nbsp;是
						<input type="radio" value="0" name="info[display]" />&nbsp;否
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