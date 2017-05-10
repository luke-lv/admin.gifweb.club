<?php /* Smarty version Smarty-3.1.12, created on 2017-04-28 13:22:22
         compiled from "admin/views/admin/include/_header.inc.html" */ ?>
<?php /*%%SmartyHeaderCode:3243047375902c435e0d239-98093728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2af8ed54d113bfc67d05c85d952b0be7a2e5130' => 
    array (
      0 => 'admin/views/admin/include/_header.inc.html',
      1 => 1493356252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3243047375902c435e0d239-98093728',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5902c435e17de0_30315350',
  'variables' => 
  array (
    'charset' => 0,
    'submenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902c435e17de0_30315350')) {function content_5902c435e17de0_30315350($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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