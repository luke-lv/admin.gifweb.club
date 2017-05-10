<?php /* Smarty version Smarty-3.1.12, created on 2017-05-02 10:25:45
         compiled from "admin\views\gifweb\gifcontent_type\add.html" */ ?>
<?php /*%%SmartyHeaderCode:206485907ee29d772a0-58927706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73858fc9179dac3c039f73ab8a8958087498adf0' => 
    array (
      0 => 'admin\\views\\gifweb\\gifcontent_type\\add.html',
      1 => 1493691350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206485907ee29d772a0-58927706',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'r' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5907ee29ede933_79478337',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907ee29ede933_79478337')) {function content_5907ee29ede933_79478337($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<link href="/admin/statics/styles/dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/My97DatePicker/calendar.js"></script>
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/My97DatePicker/WdatePicker.js"></script>

<script language="javascript" type="text/javascript" src="/admin/statics/scripts/dialog.js"></script>
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/ajaxfileupload.js"></script>
<div class="pad_10">
	<div class="common-form">
		<form id="myform" method="post" action="/gifweb/gifcontent_type/add" onsubmit="return check();" name="myform">
			<table width="100%" class="table_form contentWrap">
				<tbody>
					<tr>
						<td width="150" height="30" align="center" >类型名称：</td>
						<td><input type="text" size="30" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
" /></td>
					</tr>
					
					
					<tr>
						<td width="100" height="30" align="center" >状态：</td>
						<td><select name="status" id="status" style="width: 200px;">
								<option value="1" <?php if ($_smarty_tpl->tpl_vars['r']->value['status']==1){?>selected="selected" <?php }?>>正常</option>
								<option value="2" <?php if ($_smarty_tpl->tpl_vars['r']->value['status']==2){?>selected="selected" <?php }?>>失效</option>
							</select></td>
					</tr>
					
					<tr>
						<td width="100" height="30" align="center" >是否显示：</td>
						<td><select name="is_show" id="is_show" style="width: 200px;">
								<option value="1" <?php if ($_smarty_tpl->tpl_vars['r']->value['is_show']==1){?>selected="selected" <?php }?>>显示</option>
								<option value="2" <?php if ($_smarty_tpl->tpl_vars['r']->value['is_show']==2){?>selected="selected" <?php }?>>隐藏</option>
							</select></td>
					</tr>

					<tr>
						<td colspan="2" style="text-align: center;"><input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
" /><button id="dosubmit"><?php if ($_smarty_tpl->tpl_vars['r']->value['id']){?>修 改<?php }else{ ?>添 加<?php }?></button><input type="hidden" name="act" id="act" value="<?php if ($_smarty_tpl->tpl_vars['r']->value['id']){?>edit<?php }else{ ?>add<?php }?>" /></td>
					</tr>
	
					
				</tbody>
			</table>
			<div ></div>
		</form>
	</div>
</div>

<script>



function check()
{
	var message = "请补全：\r\n";
		var messages = '';
		if($('#title').val()=='')
		{
			messages +="类型名称\r\n";
		}
		if(messages)
		{
			alert(message+messages);
			return false;
		}
		return true;
} 
</script>
<?php }} ?>