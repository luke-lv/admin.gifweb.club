<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 15:11:18
         compiled from "admin\views\gifweb\user\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2580158fef37ecab917-69320837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '382b0955aa0906b430a4a704f817aa0be296c95f' => 
    array (
      0 => 'admin\\views\\gifweb\\user\\index.html',
      1 => 1493104275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2580158fef37ecab917-69320837',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58fef37f0ad569_64124617',
  'variables' => 
  array (
    'option' => 0,
    'data' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fef37f0ad569_64124617')) {function content_58fef37f0ad569_64124617($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

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
		
		
		<form id="myform" method="get" action="/gifweb/user/index" name="myform">
			<div class="explain-col search-form">
				
				关键字：
				
				<input type="text" size="20" placeholder="关键字（手机号or昵称）" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['search_key'];?>
"  name="search_key" >
				&nbsp;&nbsp;
				注册时间：
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['s_create_time'];?>
"  name="s_create_time" id="s_create_time" onClick="setDay(this);">-
				<input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'});" readonly="readonly" size="12" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['e_create_time'];?>
"  name="e_create_time" id="e_create_time" onClick="setDay(this);">
				
				<input type="submit" class="button" value="搜索" />
			</div>
		</form>
			
		
		<form method="post" action="/gifweb/user/index" name="myform2">
			<table cellspacing="0" width="100%">
				<thead>
					<tr>
						<th align="center" width="5%">账号ID</th>
						<th align="center" width="10%">手机号</th>
						<th align="center" width="10%">昵称</th>
						<th align="center" width="10%">注册时间</th>
						<th width="10%">最近登录时间</th>
						<th width="5%">收藏数</th>
						<th width="5%">分享数</th>
						<th width="5%">状态</th>
						<th width="18%">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<tr>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['uid'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['login_time'];?>
</td>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['like_num'];?>
</td>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['share_num'];?>
</td>
						<td align="center" widtd="5%"><?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='1'){?>正常<?php }else{ ?><font color="red">封停</font><?php }?></td>
						<td align="center" widtd="18%"><div><a href="edit/<?php echo $_smarty_tpl->tpl_vars['item']->value['uid'];?>
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
	    url: '/gifweb/user/set',
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