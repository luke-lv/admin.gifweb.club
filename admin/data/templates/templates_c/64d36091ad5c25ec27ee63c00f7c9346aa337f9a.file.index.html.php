<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 10:31:10
         compiled from "admin\views\admin\resource\index.html" */ ?>
<?php /*%%SmartyHeaderCode:46458feb4ee31f037-25058707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64d36091ad5c25ec27ee63c00f7c9346aa337f9a' => 
    array (
      0 => 'admin\\views\\admin\\resource\\index.html',
      1 => 1479376147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46458feb4ee31f037-25058707',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uri' => 0,
    'categorys' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58feb4ee384937_76023693',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58feb4ee384937_76023693')) {function content_58feb4ee384937_76023693($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<form name="myform" action="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
" method="post">
	<div class="pad-lr-10">
		<div class="table-list">
			<table width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="30px" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('ids[]');" /></th>
						<th width="80">排序</th>
						<th width="100">id</th>
						<th>菜单名称</th>
						<th>key</th>
						<th>管理操作</th>
					</tr>
				</thead>
				<tbody>
					<?php echo $_smarty_tpl->tpl_vars['categorys']->value;?>

				</tbody>
			</table>
			<div class="btn">
				<label for="check_box">全选/取消</label>&nbsp;&nbsp;
				<input type="submit" value="排序" name="dosubmit" class="button" />
			</div>
		</div>
	</div>
</form>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>