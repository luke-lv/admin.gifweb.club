<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 10:31:34
         compiled from "admin\views\sinagame\comment\index.html" */ ?>
<?php /*%%SmartyHeaderCode:476858feb506930150-09878816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f46c85342cc4a49ee3cfb0138a854f8a94e537a3' => 
    array (
      0 => 'admin\\views\\sinagame\\comment\\index.html',
      1 => 1479376147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '476858feb506930150-09878816',
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
  'unifunc' => 'content_58feb506bb0c54_29012171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58feb506bb0c54_29012171')) {function content_58feb506bb0c54_29012171($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

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
		<form id="myform" method="get" action="/sinagame/comment/index" name="myform">
			<div class="explain-col search-form">
				
				&nbsp;
				发布时间：
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['s_create_time'];?>
"  name="s_create_time" id="s_create_time" onClick="setDay(this);">-
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['e_create_time'];?>
"  name="e_create_time" id="e_create_time" onClick="setDay(this);">
				
				&nbsp;&nbsp;
				评论状态：
				<select name="status">
					<option value="" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']==''){?> selected<?php }?> >-全部-</option>
					<option value="-1" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']=='-1'){?> selected<?php }?> >未删除</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']=='2'){?> selected<?php }?> >删除</option>
				</select>
				
				&nbsp;&nbsp;&nbsp;<input type="text" size="20" placeholder="评论内容关键字" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['search_key'];?>
"  name="search_key" >&nbsp;&nbsp;&nbsp;<input type="submit" class="button" value="查 询" />
				
				
			</div>
			
		</form>
			
		<form method="post" action="/sinagame/comment/index" name="myform2"  onsubmit='return checkForm()' >
			<table cellspacing="0" width="100%">
				<thead>
					<tr>
						<th align="center" width="5%"><input type="checkbox" onclick="selectall('ids[]');" id="check_box" value="">全选</th>
						<th align="center" width="10%">评论时间</th>
						<th align="center" width="6%">发布者UID</th>
						<th align="center" width="10%">发布者昵称</th>
						<th align="center" width="10%">帖子ID</th>
						<th align="center" width="37%">评论内容</th>
						
						<th align="center" width="5%">对应表</th>
						<th align="center"  width="10%">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['res_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<tr>
						<td align="center" width="5%"><input type="checkbox" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>
</td>
						<td align="center" widtd="6%"><?php echo $_smarty_tpl->tpl_vars['item']->value['uid'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_info']['sina_weibo_name'];?>
</td>
						<td align="center" widtd="10%"><a href='/sinagame/card/info?cid=<?php echo $_smarty_tpl->tpl_vars['item']->value['mark'];?>
'><?php echo $_smarty_tpl->tpl_vars['item']->value['mark'];?>
</a></td>
						<td align="center" widtd="37%"><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</td>
						<td align="center" width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['which_table'];?>
</td>
						<td align="center"  widtd="15%"><?php if ($_smarty_tpl->tpl_vars['item']->value['status']!=3&&$_smarty_tpl->tpl_vars['item']->value['status']!=2){?> <a href="javascript:;" onclick="del(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['mark'];?>
)">删除评论</a><?php }else{ ?> <span style="TEXT-DECORATION: line-through"><font color='red'>已删除</font></span><?php }?></td>	
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

function del(id,mark)
{
	if(confirm('确认删除？'))
	{
		location.href="/sinagame/comment/delete_comment?id="+id+"&mark="+mark;
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