<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 10:31:34
         compiled from "admin\views\sinagame\card\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1769958feb506845af3-49918217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c3351db1f997af081e636bbb9e5041bd43c9af1' => 
    array (
      0 => 'admin\\views\\sinagame\\card\\index.html',
      1 => 1479376146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1769958feb506845af3-49918217',
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
  'unifunc' => 'content_58feb506b56eb3_27482338',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58feb506b56eb3_27482338')) {function content_58feb506b56eb3_27482338($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/My97DatePicker/calendar.js"></script>
<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/My97DatePicker/WdatePicker.js"></script>
<style>
	.box_relative
	{
	  position:absolute;
	  right: -16px;
	  top: 8px;
	  background-color: gainsboro;
	  width: 142px;
	  z-index: 1;
	}
	.td_rel{position: relative;}
	
</style>
<div class="pad_10">
	<div class="table-list">
		
		
		<form id="myform" method="get" action="/sinagame/card/index" name="myform">
			<div class="explain-col search-form">
				创建时间：
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['s_create_time'];?>
"  name="s_create_time" id="s_create_time" onClick="setDay(this);">-
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['e_create_time'];?>
"  name="e_create_time" id="e_create_time" onClick="setDay(this);">
				&nbsp;&nbsp;
				帖子状态：
				<select name="status">
					<option value="" >-全部-</option>
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']=='0'){?> selected<?php }?> >未审核</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']=='1'){?> selected<?php }?> >已审核</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']=='2'){?> selected<?php }?> >后台关闭</option>
					<option value="3" <?php if ($_smarty_tpl->tpl_vars['option']->value['status']=='3'){?> selected<?php }?> >用户删除</option>
				</select>
				&nbsp;&nbsp;
				帖子类型：
				<select name="type">
					<option value="" >-全部-</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['option']->value['type']=='1'){?> selected<?php }?> >综合</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['option']->value['type']=='2'){?> selected<?php }?> >交易</option>
					<option value="3" <?php if ($_smarty_tpl->tpl_vars['option']->value['type']=='3'){?> selected<?php }?> >灌水</option>
				</select>
				&nbsp;&nbsp;
				关键字：
				<input type="text" size="20" placeholder="输入帖子内容关键字" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['search_key'];?>
"  name="search_key" >
				&nbsp;&nbsp;
				
				<input type="submit" class="button" value="搜索" />
			</div>
		</form>
			
		
		<form method="post" action="/sinagame/card/index" name="myform2" onsubmit='return checkForm()'>
			<table cellspacing="0" width="100%">
				<thead>
					<tr>
						<th align="center" width="5%"><input type="checkbox" onclick="selectall('ids[]');" id="check_box" value="">全选</th>
						<th align="center" width="5%">帖子ID</th>
						<th align="center" width="10%">发帖时间</th>
						<th align="center" width="10%">发帖人ID</th>
						<th align="center" width="10%">发帖人昵称</th>
						<th align="center" width="30%">帖子标题</th>
						<th align="center" width="10%">状态</th>
						<th width="20%">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['card_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<tr>
						<td align="center" width="5%"><input type="checkbox" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
" /></td>
						<td align="center" width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
</td>
						<td align="center" width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>
</td>
						<td align="center" width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['uid'];?>
</td>
						<td align="center" width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['fatieren_name'];?>
</td>
						<td align="center" width="30%"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
						<td align="center" width="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['status_name'];?>
</td>
						
						<td align="center" width="20%"><div><span id="is_top_<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
" ><a href="javascript:void(0);" <?php if ($_smarty_tpl->tpl_vars['item']->value['is_top']==1){?>onclick="isTop('<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
',2)"<?php }else{ ?>onclick="isTop('<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
',1)"<?php }?>><?php if ($_smarty_tpl->tpl_vars['item']->value['is_top']==1){?>取消置顶<?php }else{ ?>置顶<?php }?></a></span> | <a href="info/?cid=<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
">查看详情</a> | <?php if ($_smarty_tpl->tpl_vars['item']->value['c_status']!=3&&$_smarty_tpl->tpl_vars['item']->value['c_status']!=2){?> <a href="JavaScript:;" onclick="del(<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
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
<script>
function del(id)
{
	if(confirm('确认删除？'))
	{
		location.href="/sinagame/card/delete_card?cid="+id;
	}
}

function isTop(id,type)
{
	if(confirm('确认操作嚒？'))
	{
		$.ajax({
			type:"POST",
			dataType:'json',
			url:"/sinagame/card/is_top",
			data:{cid: id, act: type},
			success:function(res){
				if(res.error == 0){
					if(type ==1){
						$("#is_top_"+id).html('<a href="javascript:void(0);" onclick="isTop('+id+',2)">取消置顶</a>');
					}else{
						$("#is_top_"+id).html('<a href="javascript:void(0);" onclick="isTop('+id+',1)">置顶</a>');
					}
					alert(res.msg);
				}else{
					alert(res.msg);
				}
			}
		});
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