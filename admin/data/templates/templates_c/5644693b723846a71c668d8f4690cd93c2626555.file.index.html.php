<?php /* Smarty version Smarty-3.1.12, created on 2017-05-02 10:44:33
         compiled from "admin\views\gifweb\gifcontent_type\index.html" */ ?>
<?php /*%%SmartyHeaderCode:162825907ee1a080792-13914582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5644693b723846a71c668d8f4690cd93c2626555' => 
    array (
      0 => 'admin\\views\\gifweb\\gifcontent_type\\index.html',
      1 => 1493693071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162825907ee1a080792-13914582',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5907ee1a1ad494_20956798',
  'variables' => 
  array (
    'option' => 0,
    'data' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907ee1a1ad494_20956798')) {function content_5907ee1a1ad494_20956798($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

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
		
		
		<form id="myform" method="get" action="/gifweb/gifcontent_type/index" name="myform">
			<div class="explain-col search-form">
				
				关键字：
				
				<input type="text" size="20" placeholder="关键字（名称）" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['search_key'];?>
"  name="search_key" >
				<input type="submit" class="button" value="搜索" />
				
				<a href='/gifweb/gifcontent_type/add'>新增</a>
			</div>
		</form>
			
		
		<form method="post" action="/gifweb/gifcontent_type/index" name="myform2">
			<table cellspacing="0" width="100%">
				<thead>
					<tr>
						<th align="center" width="5%">ID</th>
						<th align="center" width="10%">名称</th>
						<th width="5%">是否显示</th>
						<th width="5%">状态</th>
						<th width="18%">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['type_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<tr>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
						<td align="center" widtd="5%"><?php if ($_smarty_tpl->tpl_vars['item']->value['is_show']==1){?>显示<?php }else{ ?>隐藏<?php }?></td>
						<td align="center" widtd="5%"><?php if ($_smarty_tpl->tpl_vars['item']->value['status']==1){?>正常<?php }else{ ?>失效<?php }?></td>
						<td align="center" widtd="18%"><div><a href="add/?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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

</script>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>