<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 12:52:51
         compiled from "admin\views\admin\role\privilege.html" */ ?>
<?php /*%%SmartyHeaderCode:212858fed62328e4c3-05318704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b239d748d6ae8986a33ad7a24c03c14acbdaecef' => 
    array (
      0 => 'admin\\views\\admin\\role\\privilege.html',
      1 => 1479376148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212858fed62328e4c3-05318704',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58fed62332e743_63363798',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fed62332e743_63363798')) {function content_58fed62332e743_63363798($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="/statics/styles/jquery.treeTable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/statics/scripts/jquery.treetable.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#dnd-example").treeTable({
			indent: 20
		});
	});
	function checknode(obj)
	{
		var chk = $("input[type='checkbox']");
		var count = chk.length;
		var num = chk.index(obj);
		var level_top = level_bottom =  chk.eq(num).attr('level')
		for (var i=num; i>=0; i--)
		{
			var le = chk.eq(i).attr('level');
			if(eval(le) < eval(level_top))
			{
				chk.eq(i).attr("checked",true);
				var level_top = level_top-1;
			}
		}
		for (var j=num+1; j<count; j++)
		{
			var le = chk.eq(j).attr('level');
			if(chk.eq(num).attr("checked")==true) {
				if(eval(le) > eval(level_bottom)) chk.eq(j).attr("checked",true);
				else if(eval(le) == eval(level_bottom)) break;
			}
			else {
				if(eval(le) > eval(level_bottom)) chk.eq(j).attr("checked",false);
				else if(eval(le) == eval(level_bottom)) break;
			}
		}
	}
</script>
<?php if ($_smarty_tpl->tpl_vars['view']->value['roleid']){?>
<div class="table-list" id="load_priv">
	<table width="100%" cellspacing="0">
		<thead>
			<tr>
				<th style="padding-left:30px;" class="text-l cu-span"><span onclick="javascript:$('input[name=menuid[]]').attr('checked', true)">全选</span>/<span onclick="javascript:$('input[name=menuid[]]').attr('checked', false)">取消</span></th>
			</tr>
		</thead>
	</table>
	<form name="myform" action="<?php echo $_smarty_tpl->tpl_vars['view']->value['uri'];?>
" method="post">
		<input type="hidden" name="roleid" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['roleid'];?>
" />
		<table width="100%" cellspacing="0" id="dnd-example">
			<tbody>
				<?php echo $_smarty_tpl->tpl_vars['view']->value['categorys'];?>

			</tbody>
		</table>
		<div class="btn"><input type="submit" value="提交" id="dosubmit" name="dosubmit" class="button" /></div>
	</form>
</div>
<?php }else{ ?>
<style type="text/css">
.guery{background: url(/statics/images/msg_bg.png) no-repeat 0px -560px;padding:10px 12px 10px 45px; font-size:14px; height:100px; line-height:96px}
.guery{background-position: left -460px;}
</style>
<div style="margin:0 auto;text-align:center;">
	<div style="display:inline-block;display:-moz-inline-stack;zoom:1;_display:inline;" class="guery">
	请选择角色！
	</div>
</div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>