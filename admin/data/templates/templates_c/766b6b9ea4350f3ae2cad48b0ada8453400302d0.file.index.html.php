<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 10:31:39
         compiled from "admin\views\app97973\starting_up_ad\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2415358feb50befe8f7-14653019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '766b6b9ea4350f3ae2cad48b0ada8453400302d0' => 
    array (
      0 => 'admin\\views\\app97973\\starting_up_ad\\index.html',
      1 => 1479376153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2415358feb50befe8f7-14653019',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    'img_domin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58feb50c0e5368_09156890',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58feb50c0e5368_09156890')) {function content_58feb50c0e5368_09156890($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/My97DatePicker/calendar.js"></script>
<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/My97DatePicker/WdatePicker.js"></script>
<link href="/gameadmin/statics/styles/dialog.css" rel="stylesheet" type="text/css" />
<style>
	.a_button{ background-color:#3c86c5; color: white; border: 5px solid #3c86c5;border-radius: 3px;}
	.a_button2{ background-color:#3c86c5; color: white; border: 5px solid #3c86c5;border-radius: 3px;}
</style>
<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/dialog.js"></script>
<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/ajaxfileupload.js"></script>
<div class="pad_10">
	<div class="table-list">
			<div class="btn text-l">
				<a style="margin-left: 400px;" href="javascript:;" onclick="addAd();" class="a_button ">新 增</a>
			</div>
		<br>
		<form method="post" action="/app97973/starting_up_ad/index" name="myform2" onsubmit="return checkForm();">
			<table cellspacing="0" width="100%">
				<thead>
					<tr>
						<th align="center" width="5%">编号</th>
						<th align="center" width="10%">图320*480</th>
						<th align="center" width="10%">广告标题</th>
						<th align="center" width="10%">投放起始时间</th>
						<th align="center" width="10%">投放结束时间</th>
						<th align="center" width="5%">投放平台</th>
						<th align="center" width="5%">广告状态</th>
						<th align="center" width="15%">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($_smarty_tpl->tpl_vars['data']->value['ads']){?>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['ads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<tr>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
						<td align="center" widtd="10%"><img src="<?php if ($_smarty_tpl->tpl_vars['item']->value['img_320480']){?><?php echo $_smarty_tpl->tpl_vars['img_domin']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['img_320480'];?>
<?php }?>" width="150" height="80" /></td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['start_put_time'];?>
</td>
						<td align="center" widtd="10%"><?php echo $_smarty_tpl->tpl_vars['item']->value['end_put_time'];?>
</td>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['platFormName'];?>
</td>
						<td align="center" widtd="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
						<td align="center" widtd="15%"> <a href="javascript:;" onclick="addAd(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">编辑</a> | <a href="javascript:;" onclick="deleteAd(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">删除</a></td>
					</tr>
					<?php } ?>
					<?php }else{ ?>
					<tr>
						<td>无记录！</td></tr>
					
					<?php }?>
				</tbody>
			</table>
			
			<div id="pages"><?php echo $_smarty_tpl->tpl_vars['data']->value['pages'];?>
</div>
		</form>
	</div>
</div>
<script type="text/javascript">

	function addAd(id)
	{
		omnipotent('addAd','/app97973/starting_up_ad/addAd?id='+id,'添加97973开机广告',2,900,900);
		
	}
	function deleteAd(id)
	{
		if(confirm('确定删除么？'))
		{
			location.href='/app97973/starting_up_ad/deleteAd/?id='+id;
		}
		
	}

</script>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>