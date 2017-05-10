<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 10:31:00
         compiled from "admin\views\admin\index\left.html" */ ?>
<?php /*%%SmartyHeaderCode:366658feb4e4113935-14580627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0587efca680519f121ebfe492cd0523b171c4093' => 
    array (
      0 => 'admin\\views\\admin\\index\\left.html',
      1 => 1479376147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '366658feb4e4113935-14580627',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'left_menu' => 0,
    'item' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58feb4e41f23b7_94839130',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58feb4e41f23b7_94839130')) {function content_58feb4e41f23b7_94839130($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['left_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<h3 class="f14"><span title="展开与收缩" class="switchs cu"></span><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</h3>
<ul style="display:none">
	<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
	<li class="sub_menu" id="_MP<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"><a style="outline:none;" hidefocus="true" href="javascript:_MP(<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
,'/<?php echo $_smarty_tpl->tpl_vars['child']->value['m'];?>
/<?php echo $_smarty_tpl->tpl_vars['child']->value['c'];?>
/<?php echo $_smarty_tpl->tpl_vars['child']->value['a'];?>
<?php if ($_smarty_tpl->tpl_vars['child']->value['data']){?>?<?php echo $_smarty_tpl->tpl_vars['child']->value['data'];?>
<?php }?>');"><?php echo $_smarty_tpl->tpl_vars['child']->value['title'];?>
</a></li>
	<?php } ?>
</ul>
<?php } ?>
<script type="text/javascript">
$("#leftMain .f14").each(function(i){
	var ul = $(this).next();
	var span = $(this).find("span");
	$(this).click(
	function(){
		if(ul.is(':visible')){
			ul.hide();
			span.removeClass('on');
				}else{
			ul.show();
			span.addClass('on');
		}
	})
});
</script><?php }} ?>