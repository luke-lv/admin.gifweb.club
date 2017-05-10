<?php /* Smarty version Smarty-3.1.12, created on 2017-04-28 13:25:47
         compiled from "admin/views/gifweb/public/showmessage.html" */ ?>
<?php /*%%SmartyHeaderCode:7102943205902d25b4de733-33616270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cc6cc3d75de47e165390f99c29f63dc9169c0c7' => 
    array (
      0 => 'admin/views/gifweb/public/showmessage.html',
      1 => 1493103606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7102943205902d25b4de733-33616270',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5902d25b518726_61389008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902d25b518726_61389008')) {function content_5902d25b518726_61389008($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>提示信息</title>
<style type="text/css">
<!--
html,body,div,ul,table,tr,td,h1,h2,h3,h4,h5{ padding:0; margin:0; font-size:12px}
a:link,a:visited{text-decoration:none;color:#0068a6}
a:hover,a:active{color:#ff6600;text-decoration: underline}
.showMsg{border: 1px solid #1e64c8; zoom:1; width:450px; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
.showMsg h5{background-image: url("/statics/images/admin_img/msg.png");background-repeat: no-repeat; color:#fff; padding-left:35px; height:25px; line-height:26px;_line-height:28px; overflow:hidden; font-size:14px; text-align:left}
.showMsg .content{ padding:46px 12px 10px 45px; font-size:14px; height:64px; text-align:left}
.showMsg .bottom{ background:#e4ecf7; margin: 0 1px 1px 1px;line-height:26px; _line-height:30px; height:26px; text-align:center}
.showMsg .ok,.showMsg .guery{background: url("/statics/images/admin_img/msg_bg.png") no-repeat 0px -560px;}
.showMsg .guery{background-position: left -460px;}
-->
</style>
<script type="text/javaScript" src="/admin/statics/scripts/jquery.min.js"></script>
<script language="JavaScript" src="/admin/statics/scripts/admin_common.js"></script>
</head>
<body>
<div class="showMsg" style="text-align:center">
	<h5>提示信息</h5>
	<div class="content guery" style="display:inline-block;display:-moz-inline-stack;zoom:1;_display:inline;max-width:330px"><?php echo $_smarty_tpl->tpl_vars['view']->value['message'];?>
</div>
	<div class="bottom">
		<a href="<?php echo $_smarty_tpl->tpl_vars['view']->value['url'];?>
">如果您的浏览器没有自动跳转，请点击这里</a>
		<script type="text/javascript">
		<?php if ($_smarty_tpl->tpl_vars['view']->value['dialog']){?>
			//window.top.right.location.reload();window.top.art.dialog({id:"<?php echo $_smarty_tpl->tpl_vars['view']->value['dialog'];?>
"}).close();
			setTimeout("close_dialog();",<?php echo $_smarty_tpl->tpl_vars['view']->value['timeout'];?>
);
		<?php }else{ ?>
			setTimeout("redirect('<?php echo $_smarty_tpl->tpl_vars['view']->value['url'];?>
');",<?php echo $_smarty_tpl->tpl_vars['view']->value['timeout'];?>
);
		<?php }?>
		</script>
		<?php if ($_smarty_tpl->tpl_vars['view']->value['returnjs']){?><script type="text/javascript"><?php echo $_smarty_tpl->tpl_vars['view']->value['returnjs'];?>
</script><?php }?>
	</div>
</div>
<script type="text/javascript">
	function close_dialog() {
		window.top.right.location.reload();
		window.top.art.dialog({id:"<?php echo $_smarty_tpl->tpl_vars['view']->value['dialog'];?>
"}).close();
	}
</script>
</body>
</html><?php }} ?>