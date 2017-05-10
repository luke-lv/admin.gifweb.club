<?php /* Smarty version Smarty-3.1.12, created on 2017-04-28 15:34:33
         compiled from "admin\views\gifweb\include\_header.inc.html" */ ?>
<?php /*%%SmartyHeaderCode:2247858fef3a6515f75-63537499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b95717d3cbe3ca446f1d8e45df8965d69f024e5f' => 
    array (
      0 => 'admin\\views\\gifweb\\include\\_header.inc.html',
      1 => 1493356392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2247858fef3a6515f75-63537499',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58fef3a657b892_25746728',
  'variables' => 
  array (
    'charset' => 0,
    'submenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fef3a657b892_25746728')) {function content_58fef3a657b892_25746728($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	.tipsbox{width:0;height:0;position:relative;}
	.tips{top:-30px;left:20px;width:55px;height:18px;border:3px solid #3CC43C;line-height:18px;text-align:center;position:absolute;display:none;background:white;cursor:pointer;}
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