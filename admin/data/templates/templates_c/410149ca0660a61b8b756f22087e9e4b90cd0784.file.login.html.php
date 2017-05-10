<?php /* Smarty version Smarty-3.1.12, created on 2017-04-28 11:20:03
         compiled from "admin/views/admin/auth/login.html" */ ?>
<?php /*%%SmartyHeaderCode:17481750565902b4e353bfc4-29013551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '410149ca0660a61b8b756f22087e9e4b90cd0784' => 
    array (
      0 => 'admin/views/admin/auth/login.html',
      1 => 1493087316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17481750565902b4e353bfc4-29013551',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5902b4e3569370_25287289',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902b4e3569370_25287289')) {function content_5902b4e3569370_25287289($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <script type="text/javascript" src="/admin/statics/scripts/jquery.min.js"></script>
    <link charset="GBK" href="/admin/statics/styles/login.css?t=1" rel="stylesheet" />

        <script type="text/javascript" language="javascript">
			$(function(){
				$('#sysmsg-error').click(function(){
					$(this).slideToggle();
				});
			});
            function CheckInfo() {
                var loginUser = document.getElementById("sgLoginName");
                //测试环境要注释
                var loginPwd = document.getElementById("sgPassword");

                var checkCode = document.getElementById("sgCheckCode");

                //var domain = document.getElementById("cbDomain");

                //序号，取当前选中选项的序号
                //var index = domain.selectedIndex;

                //var domainName = domain.options[index].text;

                //测试环境使用
                if (loginUser.value.replace(/\s/g, "") == ""
                || (checkCode != null
                && checkCode.value.replace(/\s/g, "") == "")) {
                    window.alert("请输入用户名和验证码！");
                    return false;
                }

                //正式环境使用
                //                if (loginUser.value.replace(/\s/g, "") == ""
                //                || domainName.replace(/\s/g, "") == ""
                //                || loginPwd.value.replace(/\s/g, "") == ""
                //                || (checkCode != null
                //                && checkCode.value.replace(/\s/g, "") == "")) {
                //                    window.alert("请输入用户名、密码和验证码！");
                //                    return false;
                //                }
                else {
                    var userIndex = loginUser.value.indexOf('\\');
                    if (userIndex > -1) {

                        var domainNameEx = loginUser.value.substring(0, userIndex);
                        var userNameEx = loginUser.value.replace(domainNameEx + "\\", "");

                        if (userNameEx == "") {
                            window.alert("请将\\符号及\\符号以前的内容去除,并在左边下拉框中选择！");
                            return false;
                        }

                        var isHave = false;
                        for (var i = 0; i < domain.options.length; i++) {
                            if (domain.options[i].value == domainNameEx.toUpperCase()) {
                                domain.options[i].selected = true;
                                isHave = true;
                                break;
                            }
                        }

                        if (isHave) {

                            loginUser.value = userNameEx;
                        }
                        else {
                            window.alert("请将\\符号及\\符号以前的内容去除,并在左边下拉框中选择！");
                            return false;
                        }

                    }

                    return true;
                }
            }
			function checkParent() {
				if (window.parent.length > 0) {
					window.parent.location = "/";
				}
			}
    </script>
</head>
<body class="b-login" onload="checkParent();">

    <div class="login-wrapper">
		<div id="sysmsg-error" class="sysmsgw"<?php if ($_smarty_tpl->tpl_vars['view']->value['errmsg']){?><?php }else{ ?> style="display: none;"<?php }?>>
			<div class="sysmsg">
				<p><?php echo $_smarty_tpl->tpl_vars['view']->value['errmsg'];?>
</p>
			</div>
		</div>
        <div class="content">
            <form id="user_login" class="form" method="post">
            <h1>CONTROL PANEL</h1><br />
          		<input type="text" id="sgLoginName" name="sgLoginName" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['sgLoginName'];?>
" accesskey="s" autocomplete="on" placeholder="帐号" autocorrect="off" autocapitalize="off" />
           		<input type="password" id="sgPassword" name="sgPassword" value="" placeholder="密码" />

            <div class="btn-wrapper clearfix">
                <button type="submit" id="bnLogin" class="btn-blue" onclick="return CheckInfo();">登录</button>
            </div>
            </form>
        </div>
		<div class="copyright">Copyright&nbsp;&copy;&nbsp;2012<?php echo $_smarty_tpl->tpl_vars['view']->value['lasttime'];?>
&nbsp;SINA Inc. All rights reserved.</div>
    </div>
    <!--[if lt IE 9]>
    <script type="text/javascript">
		(function($){var hasPlaceholder='placeholder'in document.createElement('input');var isOldOpera=$.browser.opera&&$.browser.version<10.5;$.fn.placeholder=function(options){var options=$.extend({},$.fn.placeholder.defaults,options),o_left=options.placeholderCSS.left;return(hasPlaceholder)?this:this.each(function(){var $this=$(this),inputVal=$.trim($this.val()),inputWidth=$this.width(),inputHeight=$this.height(),inputId=(this.id)?this.id:'placeholder'+(+new Date()),placeholderText=$this.attr('placeholder'),placeholder=$('<label for='+inputId+'>'+placeholderText+'</label>');options.placeholderCSS['width']=inputWidth;options.placeholderCSS['height']=inputHeight;options.placeholderCSS.left=(isOldOpera&&(this.type=='email'||this.type=='url'))?'11%':o_left;placeholder.css(options.placeholderCSS);if(!inputVal){$this.wrap(options.inputWrapper);$this.attr('id',inputId).after(placeholder);};$this.focus(function(){if(!$.trim($this.val())){$this.next().hide();};});$this.blur(function(){if(!$.trim($this.val())){$this.next().show();};});});};$.fn.placeholder.defaults={inputWrapper:'<div style="position:relative"></div>',placeholderCSS:{'display':'block','font-size':'16px','line-height':'21px','padding':'6px 0','color':'#bababa','position':'absolute','left':'5px','top':'0px','overflow-x':'hidden'}};})(jQuery);
		$(function(){
		  $(':input[placeholder]').placeholder();
		});
    </script>
	<![endif]-->
</body>
</html>
<?php }} ?>