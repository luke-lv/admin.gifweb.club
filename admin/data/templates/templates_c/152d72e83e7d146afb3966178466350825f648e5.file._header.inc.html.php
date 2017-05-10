<?php /* Smarty version Smarty-3.1.12, created on 2017-05-02 10:19:10
         compiled from "admin\views\admin\include\_header.inc.html" */ ?>
<?php /*%%SmartyHeaderCode:2196158feb4ee3981b0-24949800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '152d72e83e7d146afb3966178466350825f648e5' => 
    array (
      0 => 'admin\\views\\admin\\include\\_header.inc.html',
      1 => 1493356252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2196158feb4ee3981b0-24949800',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58feb4ee3cecb7_07668116',
  'variables' => 
  array (
    'charset' => 0,
    'submenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58feb4ee3cecb7_07668116')) {function content_58feb4ee3cecb7_07668116($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>动态图网管理后台</title>
<link href="/admin/statics/styles/reset.css" rel="stylesheet" type="text/css" />
<link href="/admin/statics/styles/system.css" rel="stylesheet" type="text/css" />
<link href="/admin/statics/styles/table_form.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/admin_common.js"></script>
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/formvalidator.js" charset="<?php echo $_smarty_tpl->tpl_vars['charset']->value;?>
"></script>
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/formvalidatorregex.js" charset="<?php echo $_smarty_tpl->tpl_vars['charset']->value;?>
"></script>
<style type="text/css">
	html{ _overflow-y:scroll }
</style>
</head>
<body>
<div class="subnav">
<?php if ($_smarty_tpl->tpl_vars['submenu']->value!=''){?>
    <div class="content-menu ib-a blue line-x">
        <?php echo $_smarty_tpl->tpl_vars['submenu']->value;?>

	</div>
<?php }?>
</div>
<?php }} ?>