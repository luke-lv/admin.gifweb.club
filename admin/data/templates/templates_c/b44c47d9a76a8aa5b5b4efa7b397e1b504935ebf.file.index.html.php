<?php /* Smarty version Smarty-3.1.12, created on 2017-05-02 11:08:53
         compiled from "admin\views\gifweb\gifcontent\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1121258ff00ca839347-56471029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b44c47d9a76a8aa5b5b4efa7b397e1b504935ebf' => 
    array (
      0 => 'admin\\views\\gifweb\\gifcontent\\index.html',
      1 => 1493694350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1121258ff00ca839347-56471029',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58ff00ca98d0c7_00885192',
  'variables' => 
  array (
    'option' => 0,
    'type_list' => 0,
    'item' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ff00ca98d0c7_00885192')) {function content_58ff00ca98d0c7_00885192($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<script language="javascript" type="text/javascript" src="/admin/statics/scripts/My97DatePicker/calendar.js"></script>
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/My97DatePicker/WdatePicker.js"></script>
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
		
		
		<form id="myform" method="get" action="/gifweb/gifcontent/index" name="myform">
			<div class="explain-col search-form">
				
				关键字：
				
				<input type="text" size="20" placeholder="关键字（标题）" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['search_key'];?>
"  name="search_key" >
				&nbsp;&nbsp;
				标签类型：
				<select name="type" id="type" style="width: 200px;">
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['option']->value['type']==$_smarty_tpl->tpl_vars['item']->value['id']){?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
					<?php } ?>
				</select>
				
				&nbsp;&nbsp;
				
				创建时间：
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['s_create_time'];?>
"  name="s_create_time" id="s_create_time" onClick="setDay(this);">-
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['e_create_time'];?>
"  name="e_create_time" id="e_create_time" onClick="setDay(this);">
				
				<input type="submit" class="button" value="搜索" />
				
				<a href='/gifweb/gifcontent/add'>新增</a>
			</div>
		</form>
			
		
		<form method="post" action="/gifweb/gifcontent/index" name="myform2">
			<table cellspacing="0" width="100%">
				<thead>
					<tr>
						<th align="center" width="5%">ID</th>
						<th align="center" width="10%">标题</th>
						<th align="center" width="10%">创建时间</th>
						<th width="5%">收藏数</th>
						<th width="5%">分享数</th>
						<th width="5%">状态</th>
						<th width="18%">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['gif_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<tr>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>
</td>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['follow_count'];?>
</td>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['share_count'];?>
</td>
						<td align="center" widtd="5%"><?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='0'){?>未审核<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='1'){?>已审核<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='2'){?>已关闭<?php }?></td>
						<td align="center" widtd="18%"><div><a href="add/?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
">编辑</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="btn text-r"></div>
			<div id="pages"><?php echo $_smarty_tpl->tpl_vars['data']->value['pages'];?>
</div>
		</form>
	</div>
</div>
<script>

function set_manager_user(id)
{
	if(confirm('确定？'))
	{
		//ajax
	 $.ajax({
	 	type: "POST",
	 	data: {uid:id,act:'open'},
        dataType: "json",
	    url: '/gifweb/gifcontent/set',
	    success: function(data){
	    	if(data.message=='无权限')
	    	{
	    		
	    	}else
	    	{
	    		$('#set_m'+id).attr('onclick',"").click(function(){close_manager_user(id);}).attr('onclick',"").html('<img width="15" height="15" src="/admin/statics/images/y.png" />');
	    	}
	     alert(data.message);
	     
	    }
	  });	
	}
}

</script>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>