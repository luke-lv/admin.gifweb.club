<?php /* Smarty version Smarty-3.1.12, created on 2017-05-10 10:40:39
         compiled from "admin/views/admin/index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:14672128495902c34967fa10-49687595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '032ef50dfb3db7f3760ef0fa91af3e8ee717cd34' => 
    array (
      0 => 'admin/views/admin/index/index.html',
      1 => 1494383973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14672128495902c34967fa10-49687595',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5902c3496b8df3_84705735',
  'variables' => 
  array (
    'view' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902c3496b8df3_84705735')) {function content_5902c3496b8df3_84705735($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="off">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<title>动态图网管理后台</title>
		<link href="/admin/statics/styles/reset.css" rel="stylesheet" type="text/css" />
		<link href="/admin/statics/styles/system.css" rel="stylesheet" type="text/css" />
		<link href="/admin/statics/styles/dialog.css" rel="stylesheet" type="text/css" />
		<script language="javascript" type="text/javascript" src="/admin/statics/scripts/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="/admin/statics/scripts/dialog.js"></script>
	</head>
	<body scroll="no">
		<div class="header" style="clear: both; overflow: hidden; height: auto; width: auto;">
			<div class="logo lf">
				<a href="" target="_blank"><span class="invisible">动态图网管理后台</span></a>
			</div>
			<div class="rt">
				<div class="tab_style white cut_line text-r">
					<a href="http://www.gifweb.club" target="_blank">动图网站</a>
					<span>|</span>
				</div>
				<div class="style_but"></div>
			</div>
			<div class="col-auto" style="overflow: visible">
				<div class="log white cut_line">
					您好！<?php echo $_smarty_tpl->tpl_vars['view']->value['username'];?>
  [<?php echo $_smarty_tpl->tpl_vars['view']->value['rolename'];?>
]
					<span>|</span>
					<a href="/admin/user/public_edit_pwd" target="right">[修改密码]</a>
					<span>|</span>
					<a href="/admin/auth/logout">[退出]</a>
				</div>
				<ul class="nav white" id="top_menu">
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['view']->value['top_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<li id="_M<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="top_menu<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==1){?> on<?php }?>"><a href="javascript:_M(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,'#');"  hidefocus="true" style="outline:none;"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div id="content">
			<div class="col-left left_menu">
				<div id="Scroll" style="overflow-y:scroll"><div id="leftMain"></div></div>
				<a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium;" hideFocus="hidefocus" class="open" title="展开与关闭"><span class="hidden">展开</span></a>
			</div>
			<div class="col-1 lf cat-menu" id="display_center_id" style="display:none" height="100%">
				<div class="content">
					<iframe name="center_frame" id="center_frame" src="" frameborder="false" scrolling="auto" style="border:none" width="100%" height="auto" allowtransparency="true"></iframe>
				</div>
			</div>
			<div class="col-auto mr8">
				<div class="crumbs">
					<div class="shortcut cu-span">
						<!--
						<a href="#" target="right"><span>生成首页</span></a>
						<a href="?m=admin&c=cache_all&a=init" target="right"><span>更新缓存</span></a>
						-->
						<a href="javascript:art.dialog({id:'map',iframe:'/admin/index/public_map', title:'后台地图', width:'700', height:'500', lock:true});void(0);"><span>后台地图</span></a>
					</div>
					当前位置：<span id="current_pos"></span>
				</div>
				<div class="col-1">
					<div class="content" style="position:relative; overflow:hidden">
						<iframe name="right" id="rightMain" src="/admin/index/right" frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none;margin-bottom:2px;" width="100%" height="auto" allowtransparency="true"></iframe>
						<!--
						<div class="fav-nav">
							<div id="panellist"></div>
							<div id="paneladd"><a class="panel-add" href="javascript:add_panel();"><em>添加</em></a></div>
						</div>
						-->
					</div>
				</div>
			</div>
		</div>
		<div class="scroll">
			<a href="javascript:;" class="per" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(1);"></a>
			<a href="javascript:;" class="next" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(2);"></a>
		</div>
		<script type="text/javascript">
			if(!Array.prototype.map)
				Array.prototype.map = function(fn,scope) {
					var result = [],ri = 0;
					for (var i = 0,n = this.length; i < n; i++){
						if(i in this){
							result[ri++]  = fn.call(scope ,this[i],i,this);
						}
					}
				return result;
			};

			var getWindowSize = function(){
				return ["Height","Width"].map(function(name){
					return window["inner"+name] ||
						document.compatMode === "CSS1Compat" && document.documentElement[ "client" + name ] || document.body[ "client" + name ]
				});
			}
			window.onload = function (){
				if(!+"\v1" && !document.querySelector) { // for IE6 IE7
					document.body.onresize = resize;
				} else {
					window.onresize = resize;
				}
				function resize() {
					wSize();
					return false;
				}
			}
			function wSize(){
				//这是一字符串
				var str=getWindowSize();
				var strs= new Array(); //定义一数组
				strs=str.toString().split(","); //字符分割
				var heights = strs[0]-130,Body = $('body');
				$('#rightMain').height(heights);
				//iframe.height = strs[0]-46;
				if(strs[1]<980){
					$('.header').css('width',980+'px');
					$('#content').css('width',980+'px');
					Body.attr('scroll','');
					Body.removeClass('objbody');
				}else{
					$('.header').css('width','auto');
					$('#content').css('width','auto');
					Body.attr('scroll','no');
					Body.addClass('objbody');
				}

				var openClose = $("#rightMain").height()+39;
				$('#center_frame').height(openClose+9);
				$("#openClose").height(openClose+30);
				$("#Scroll").height(openClose-20);
				windowW();
			}
			wSize();
			function windowW(){
				if($('#Scroll').height()<$("#leftMain").height()){
					$(".scroll").show();
				}else{
					$(".scroll").hide();
				}
			}
			windowW();

			//站点下拉菜单
			$(function(){
				//默认载入左侧菜单
				var tms = $('.top_menu')
				if(tms.length) {
					var menuid = tms.first().attr('id').substr(2);
					_M(menuid, '');
				}
			})
			//左侧开关
			$("#openClose").click(function(){
				if($(this).data('clicknum')==1) {
					$("html").removeClass("on");
					$(".left_menu").removeClass("left_menu_on");
					$(this).removeClass("close");
					$(this).data('clicknum', 0);
					$(".scroll").show();
				} else {
					$(".left_menu").addClass("left_menu_on");
					$(this).addClass("close");
					$("html").addClass("on");
					$(this).data('clicknum', 1);
					$(".scroll").hide();
				}
				return false;
			});
			function _M(menuid,targetUrl) {
				$("#leftMain").load("/admin/index/public_menu_left?menuid="+menuid, {limit: 25}, function(){
					windowW();
				});
				//$("#rightMain").attr('src', targetUrl);
				$('.top_menu').removeClass("on");
				$('#_M'+menuid).addClass("on");
				$.get("/admin/index/public_current_pos?menuid="+menuid, function(data){
					$("#current_pos").html(data);
				});
				//当点击顶部菜单后，隐藏中间的框架
				$('#display_center_id').css('display','none');
				//显示左侧菜单，当点击顶部时，展开左侧
				$(".left_menu").removeClass("left_menu_on");
				$("#openClose").removeClass("close");
				$("html").removeClass("on");
				$("#openClose").data('clicknum', 0);
				$("#current_pos").data('clicknum', 1);
			}

			function _MP(menuid,targetUrl) {
				// add by 2015.1.28 liule1 | to repair cache of browser. ----- go ----------------------------
				targetUrl += (targetUrl.indexOf('?') > -1 ? '&' : '?') + Math.random(); 
				// add by 2015.1.28 liule1 | to repair cache of browser. ----- end ----------------------------
				$("#rightMain").attr('src', targetUrl);
				$('.sub_menu').removeClass("on fb blue");
				$('#_MP'+menuid).addClass("on fb blue");
				$.get("/admin/index/public_current_pos?menuid="+menuid, function(data){
					$("#current_pos").html(data);
				});
				$("#current_pos").data('clicknum', 1);
			}

			(function(){
				var addEvent = (function(){
					if (window.addEventListener) {
						return function(el, sType, fn, capture) {
							el.addEventListener(sType, fn, (capture));
						};
					} else if (window.attachEvent) {
						return function(el, sType, fn, capture) {
							el.attachEvent("on" + sType, fn);
						};
					} else {
						return function(){};
					}
				})(),
				Scroll = document.getElementById('Scroll');
				// IE6/IE7/IE8/Opera 10+/Safari5+
				addEvent(Scroll, 'mousewheel', function(event){
					event = window.event || event ;
					if(event.wheelDelta <= 0 || event.detail > 0) {
						Scroll.scrollTop = Scroll.scrollTop + 29;
					} else {
						Scroll.scrollTop = Scroll.scrollTop - 29;
					}
				}, false);

				// Firefox 3.5+
				addEvent(Scroll, 'DOMMouseScroll',  function(event){
					event = window.event || event ;
					if(event.wheelDelta <= 0 || event.detail > 0) {
						Scroll.scrollTop = Scroll.scrollTop + 29;
					} else {
						Scroll.scrollTop = Scroll.scrollTop - 29;
					}
				}, false);

			})();
			function menuScroll(num){
				var Scroll = document.getElementById('Scroll');
				if(num==1){
					Scroll.scrollTop = Scroll.scrollTop - 60;
				}else{
					Scroll.scrollTop = Scroll.scrollTop + 60;
				}
			}
		</script>
	</body>
</html>
<?php }} ?>