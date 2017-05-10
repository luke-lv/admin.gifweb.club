<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 10:31:21
         compiled from "admin\views\sinagame\complaint\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2738858feb4f98d50f7-54536156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6f475cb744a0f5c13d5ef9191e1580d943f1670' => 
    array (
      0 => 'admin\\views\\sinagame\\complaint\\index.html',
      1 => 1479376147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2738858feb4f98d50f7-54536156',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'option' => 0,
    'data' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58feb4f9b51d72_54965093',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58feb4f9b51d72_54965093')) {function content_58feb4f9b51d72_54965093($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/My97DatePicker/calendar.js"></script>
<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/My97DatePicker/WdatePicker.js"></script>
<link href="/gameadmin/statics/styles/dialog.css" rel="stylesheet" type="text/css" />
<style>
	.a_button{ background-color:#3c86c5; color: white; border: 5px solid #3c86c5;border-radius: 3px;}
	.a_button2{ background-color:#3c86c5; color: white; border: 5px solid #3c86c5;border-radius: 3px;}
</style>
<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/dialog.js"></script>
<div class="pad_10">
	<div class="table-list">
		<form id="myform" method="get" action="/sinagame/complaint/index" name="myform">
			<div class="explain-col search-form">
				
				&nbsp;&nbsp;
				举报时间：
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['s_create_time'];?>
"  name="s_create_time" id="s_create_time" onClick="setDay(this);">-
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['e_create_time'];?>
"  name="e_create_time" id="e_create_time" onClick="setDay(this);">
				
				&nbsp;&nbsp;
				举报类型：
				<select name="report">
					<option value="" <?php if ($_smarty_tpl->tpl_vars['option']->value['report']==''){?> selected<?php }?> >-全部-</option>
					<option value="广告" <?php if ($_smarty_tpl->tpl_vars['option']->value['report']=='广告'){?> selected<?php }?> >广告</option>
					<option value="色情" <?php if ($_smarty_tpl->tpl_vars['option']->value['report']=='色情'){?> selected<?php }?> >色情</option>
					<option value="反动" <?php if ($_smarty_tpl->tpl_vars['option']->value['report']=='反动'){?> selected<?php }?> >反动</option>
					<option value="头像" <?php if ($_smarty_tpl->tpl_vars['option']->value['report']=='头像'){?> selected<?php }?> >头像</option>
				</select>
				
				&nbsp;&nbsp;
				帖子状态：
				<select name="status">
					<option value="" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']==''){?> selected<?php }?> >-全部-</option>
					<option value="-1" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']=='-1'){?> selected<?php }?> >未删除</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']=='2'){?> selected<?php }?> >后台删除</option>
					<option value="3" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']=='3'){?> selected<?php }?> >用户删除</option>
				</select>
				
				<input type="text" size="20" placeholder="输入帖子内容关键字" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['search_key'];?>
"  name="search_key" >
				
				&nbsp;&nbsp;&nbsp;<input type="submit" class="button" value="查 询" />
			
			</div>
		</form>
			
		<form method="post" action="/sinagame/complaint/index" name="myform2" onsubmit="return checkForm();">
			<table cellspacing="0" width="100%">
				<thead>
					<tr>
						<th align="center" width="5%"><input type="checkbox" onclick="selectall('ids[]');" id="check_box" value="">全选</th>
						<th align="center" width="6%">举报人UID</th>
						<th align="center" width="6%">发帖人UID</th>
						<th align="center" width="6%">帖子ID</th>
						<th align="center"  width="12%">发帖人昵称</th>
						<th align="center"  width="12%">举报人昵称</th>
						<th align="center"  width="10%">举报时间</th>
						<th align="center"  width="25%">标题</th>
						<th align="center"  width="15%">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['complaints']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<tr>
						<td align="center" width="5%"><input type="checkbox" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
						<td align="center" width="6%"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_info']['id'];?>
</td>
						<td align="center" width="6%"><?php echo $_smarty_tpl->tpl_vars['item']->value['uid'];?>
</td>
						<td align="center" width="6%"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
						<td align="center" width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['fatieren']['sina_weibo_name'];?>
</td>
						<td align="center"  width="12%"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_info']['sina_weibo_name'];?>
</td>
						<td align="center"  width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['c_t'];?>
</td>
						<td align="center"  width="25%"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
						<td align="center"  width="15%"><a href='/sinagame/card/info?cid=<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
'>查看详情</a> | <?php if ($_smarty_tpl->tpl_vars['item']->value['c_status']!=3&&$_smarty_tpl->tpl_vars['item']->value['c_status']!=2){?> <a href="javascript:;" onclick="del(<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
)">删除帖子</a><?php }else{ ?> <span style="TEXT-DECORATION: line-through"><font color='red'>已删除</font></span><?php }?></td>	
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="btn text-l">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="check_box">全选/取消</label>
				&nbsp;&nbsp;
				<select name="op" id="op">
					<option value="">&nbsp;请选择操作&nbsp;</option>
					<option value="1">&nbsp;批量删除&nbsp;</option>
				</select>
				&nbsp;&nbsp;
				<input type="submit" value="确定" onclick="document.myform2.action='batchUpdateStatus'" name="do_options" class="button" />
			</div>
			<div id="pages"><?php echo $_smarty_tpl->tpl_vars['data']->value['pages'];?>
</div>
		</form>
	</div>
</div>
<script type="text/javascript">
function del(id)
{
	if(confirm('确认删除？'))
	{
		location.href="/sinagame/card/delete_card?cid="+id;
	}
}

function checkForm() {
	if ($('#op').val()) {
		if(confirm('确认删除？'))
	{
		return true;
	}
		return false;
	} else {
		alert("请选择操作")
		return false;
	}
}
</script>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>