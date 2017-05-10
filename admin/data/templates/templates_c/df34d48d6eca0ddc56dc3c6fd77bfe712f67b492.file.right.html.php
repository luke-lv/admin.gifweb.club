<?php /* Smarty version Smarty-3.1.12, created on 2017-05-10 10:40:39
         compiled from "admin/views/admin/index/right.html" */ ?>
<?php /*%%SmartyHeaderCode:10402686965902c349d34d91-91379684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df34d48d6eca0ddc56dc3c6fd77bfe712f67b492' => 
    array (
      0 => 'admin/views/admin/index/right.html',
      1 => 1494383973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10402686965902c349d34d91-91379684',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5902c349e02977_09334002',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902c349e02977_09334002')) {function content_5902c349e02977_09334002($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="/admin/statics/styles/reset.css" rel="stylesheet" type="text/css" />
		<link href="/admin/statics/styles/system.css" rel="stylesheet" type="text/css" />
		<link href="/admin/statics/styles/dialog.css" rel="stylesheet" type="text/css" />
		<script language="javascript" type="text/javascript" src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
		<style>
			/*
			root element for the scrollable.  when scrolling occurs this
			element stays still.
			*/
			.scrollable {
			  /* required settings */
			  position:relative;
			  overflow:hidden;
			  width: 660px;
			  height:90px;
			}
			 
			/*
			root element for scrollable items. Must be absolutely positioned
			and it should have a extremely large width to accommodate scrollable
			items.  it's enough that you set width and height for the root element
			and not for this element.
			*/
			.scrollable .items {
			  /* this cannot be too large */
			  width:20000em;
			  position:absolute;
			}
			 
			/*
			a single item. must be floated in horizontal scrolling.  typically,
			this element is the one that *you* will style the most.
			*/
			.items div {
			  float:left;
			}
			
			/* this makes it possible to add next button beside scrollable */
			.scrollable {
			    float:left;
			}
			
			/* prev, next, prevPage and nextPage buttons */
			a.browse {
			    background:url(http://jquerytools.org/media/img/scrollable/arrow/hori_large.png) no-repeat;
			    display:block;
			    width:30px;
			    height:30px;
			    float:left;
			    margin:40px 10px;
			    cursor:pointer;
			    font-size:1px;
			}
			
			/* right */
			a.right { background-position: 0 -30px; clear:right; margin-right: 0px;}
			a.right:hover { background-position:-30px -30px; }
			a.right:active { background-position:-60px -30px; }
			
			
			/* left */
			a.left { margin-left: 0px; }
			a.left:hover  { background-position:-30px 0; }
			a.left:active { background-position:-60px 0; }
			
			/* up and down */
			a.up, a.down  {
			    background:url(http://jquerytools.org/media/img/scrollable/arrow/vert_large.png) no-repeat;
			    float: none;
			    margin: 10px 50px;
			}
			
			/* up */
			a.up:hover { background-position:-30px 0; }
			a.up:active { background-position:-60px 0; }
			
			/* down */
			a.down { background-position: 0 -30px; }
			a.down:hover { background-position:-30px -30px; }
			a.down:active { background-position:-60px -30px; }
			
			
			/* disabled navigational button */
			a.disabled {
			    visibility:hidden !important;
			}			
			/* get rid of those system borders being generated for A tags */
			a:active {
			    outline:none;
			}
			
			:focus {
			    -moz-outline-style:none;
			}

			/*
			  root element for the scrollable.
			  when scrolling occurs this element stays still.
			  */
			.scrollable {
			
			    /* required settings */
			    position:relative;
			    overflow:hidden;
			    width: 550px;
			    height:120px;
			
			    /* custom decorations */
			    border:1px solid #ccc;
			    background:url(/media/img/gradient/h300.png) repeat-x;
			}
			
			/*
			   root element for scrollable items. Must be absolutely positioned
			   and it should have a extremely large width to accomodate scrollable
			   items.  it's enough that you set the width and height for the root
			   element and not for this element.
			*/
			.scrollable .items {
			    /* this cannot be too large */
			    width:20000em;
			    position:absolute;
			    clear:both;
			}
			
			.items div {
			    float:left;
			    width:680px;
			}
			
			/* single scrollable item */
			.scrollable img {
			    float:left;
			    margin:20px 5px 20px 21px;
			    background-color:#fff;
			    padding:2px;
			    border:1px solid #ccc;
			    width:100px;
			    height:75px;
			
			    -moz-border-radius:4px;
			    -webkit-border-radius:4px;
			}
			
			/* active item */
			.scrollable .active {
			    border:2px solid #000;
			    position:relative;
			    cursor:default;
			}			

</style>
	</head>
	<script language="javascript" type="text/javascript">
	
		 
		$(document).ready(function () {			
			setInterval(flicker,1000);			
			function flicker(){
				$('#flicker').fadeOut(500).fadeIn(500);
			}
		})
	
	
	</script>
	
	<body>
		<div id="flicker" class="red">&nbsp;&nbsp;<b>搞笑网管理后台</b></div>
		<div>&nbsp;&nbsp;宋庆禄</div>
		<div style="margin:0 auto; width: 634px; height:120px;">
		<!-- "previous page" action -->
		<a class="prev browse left"></a>
		 
		<!-- root element for scrollable -->
		<div class="scrollable" id="scrollable">
		 
		  <!-- root element for the items -->
		  <div class="items">
		 
		    <!-- 1-5 -->
		    <div>
		      
		    </div>
		 
		    <!-- 5-10 -->
		    <div>
		     
		    </div>
		 
		    <!-- 10-15 -->
		    <div>
		      
		    </div>
		 
		  </div>
		 
		</div>
		 
		<!-- "next page" action -->
		<a class="next browse right"></a>
		</div>
	</body>
	
	<script>		
	   $("#scrollable").scrollable();	 
	</script>
</html>
<?php }} ?>