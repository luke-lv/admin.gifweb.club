<?php /* Smarty version Smarty-3.1.12, created on 2017-04-25 10:36:15
         compiled from "admin\views\app97973\combine_album\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1508058feb61f997ff0-51498735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2314d856e2ede6866b1f4e22e86003faaf7494f4' => 
    array (
      0 => 'admin\\views\\app97973\\combine_album\\index.html',
      1 => 1493017557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1508058feb61f997ff0-51498735',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'option' => 0,
    'data' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58feb61fc43a85_41994309',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58feb61fc43a85_41994309')) {function content_58feb61fc43a85_41994309($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\www\\ohter\\gifweb_admin\\weaver\\libraries\\Smarty\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>


<script type="text/javascript" src="/gameadmin/statics/app97973/readmore/hide_paragraphs.js?2"></script>
<link href="/gameadmin/statics/styles/dialog.css" rel="stylesheet" type="text/css" />
<style>
	.a_button{ background-color:#3c86c5; color: white; border: 5px solid #3c86c5;border-radius: 3px;}
	.a_button2{ background-color:#3c86c5; color: white; border: 5px solid #3c86c5;border-radius: 3px;}
</style>
<script language="javascript" type="text/javascript" src="/gameadmin/statics/scripts/dialog.js"></script>
<div class="pad_10">
	<div class="table-list">
		<form id="myform_1" method="get" action="/app97973/combine_album/index" name="myform_1">
			<!--
			<div class="btn text-l">
			
			</div>	  -->	
		
		<div class="btn text-l">
			合辑关键字：<input type='text' value='<?php echo $_smarty_tpl->tpl_vars['option']->value['search_key'];?>
' placeholder='合辑关键字' id="search_key" name="search_key" />
			用户关键字：<input type='text' value='<?php echo $_smarty_tpl->tpl_vars['option']->value['search_user'];?>
' placeholder='用户关键字' id="search_user" name="search_user" />
			当前状态：
			<select id='showtype' name='showtype'>
				<option value="0">-状态选择-</option>
				<option value="1" <?php if ($_smarty_tpl->tpl_vars['option']->value['showtype']==1){?>selected="selected"<?php }?> >已发布</option>
				<option value="2" <?php if ($_smarty_tpl->tpl_vars['option']->value['showtype']==2){?>selected="selected"<?php }?> >草稿</option>
			</select>
			<input type='submit' name='sub' value='搜索' />
			<a style="margin-left: 400px;" href="/app97973/combine_album/add_album/" class="a_button ">新 增</a>
			<a style="margin-left: 100px;" href="/app97973/combine_album/add_album_simple/" class="a_button ">新 增(形式2)</a>&nbsp;&nbsp;
			
		</div>
		<!--
			<div class="btn text-l">
			游戏关键字：<input type='text' value='<?php echo $_smarty_tpl->tpl_vars['option']->value['search_game'];?>
' placeholder='游戏关键字' id="search_game" name="search_game" />
		</div>
		-->
		</form>
		<br>
			<form method="post" action="/app97973/combine_album/delete_all" name="myform2" onsubmit="return checkForm();">
			<table cellspacing="0" width="100%">
				<thead>
					<tr>
						<th align="center" width="5%"><input type="checkbox" onclick="selectall('aids[]');" id="check_box" value="">全选</th>
						<th align="center" width="10%">ID</th>
						<th align="center" width="15%">用户名</th>
						<th align="center" width="10%">创建时间</th>
						<th align="center" width="5%">收藏数</th>
						<!--
						<th align="center" width="5%">虚拟收藏数</th>
						-->
						<th align="center" width="15%">合辑名</th>
						<th align="center" width="25%">包含游戏</th>
						<th align="center" width="5%">已发布/草稿</th>
						<th align="center" width="10%">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($_smarty_tpl->tpl_vars['data']->value['res_data']){?>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['res_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<tr>
						<td align="center" widtd="5%"><input type="checkbox" name="aids[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
						<td align="center" width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
						<td align="center" width="5%"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_info'][0]['sina_weibo_name'];?>
</td>
						<td align="center" width="6%"><?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>
</td>
						<td align="center" width="3%"><?php echo $_smarty_tpl->tpl_vars['item']->value['favorite_count'];?>
</td>
						<!--
						<td align="center" width="3%" id="vfc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ondblclick="ShowElement(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"><?php echo $_smarty_tpl->tpl_vars['item']->value['virtual_favorite_count'];?>
</td>
						-->
						<td align="center" width="10%"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['title'],20);?>
</td>
						<td align="center" width="10%" class='game_list_content'>
                          <div class="collapsable">
                          	<?php if (mb_strlen($_smarty_tpl->tpl_vars['item']->value['game_list'])<20){?>
                          		<?php echo $_smarty_tpl->tpl_vars['item']->value['game_list'];?>

         					<?php }else{ ?>
                            <p class='tips_content' cont='<?php echo $_smarty_tpl->tpl_vars['item']->value['game_list'];?>
'>
                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['game_list'],20);?>

                              </p>

                              <p>
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['game_list'];?>

                              </p>
                          	<?php }?>
                          </div>
						</td>
						<td align="center" width="3%">
							<?php if ($_smarty_tpl->tpl_vars['item']->value['status']==4){?>
								草稿
							<?php }else{ ?>
								已发布
							<?php }?>
						</td>
						<td align="center" widtd="15%">
						
						<?php if ($_smarty_tpl->tpl_vars['item']->value['type']==2){?>
							<a href="/app97973/combine_album/add_album?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">编辑</a> | 
							<a href="/app97973/combine_album/add_album_simple?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">编辑2</a>
							<!--| <a href="javascript:;" onclick="deleteAd(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">删除</a>  --> 
						<?php }else{ ?>
						
							<a href="/app97973/combine_album/add_album_showview?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">预览</a>
						<?php }?>

						</td>
					</tr>
					<?php } ?>
					<?php }else{ ?>
					<tr>
						<td>无记录！</td></tr>

					<?php }?>
				</tbody>
			</table>
			<div class="btn text-l">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="check_box">全选/取消</label>
				&nbsp;&nbsp;
				<select name="op" id="op">
					<option value="">&nbsp;请选择操作&nbsp;</option>
					<option value="1">&nbsp;批量删除&nbsp;</option>
				</select>
				&nbsp;&nbsp;
				<input type="submit" value="批量操作"  onclick="document.myform2.action='/app97973/combine_album/delete_all'" name="do_options" class="button" /> &nbsp;
				
			</div>
			<div id="pages"><?php echo $_smarty_tpl->tpl_vars['data']->value['pages'];?>
</div>
			</form>
	</div>
</div>
<script type="text/javascript">
  $(function(){
        $(".collapsable").hideParagraphs();
  });
</script>
<script type="text/javascript">
	function checkForm() {
		if ($('#op').val()) {
			return true;
		} else {
			alert("请选择操作")
			return false;
		}
	}
	
	
	

	function ShowElement(k)
	{
		var exps_hidden = $('#exps_'+k);
		var exps_input = $('#vfc_'+k);
		exps_input.html('<input type="text" size="5" onblur="leave_edit('+k+');" id="text_'+k+'" value="'+exps_hidden.val()+'" />');
	}
	function leave_edit(k)
	{
		var exps_hidden = $('#exps_'+k);
		var exps_text = $('#text_'+k);
		var exps_input = $('#vfc_'+k);
		//ajax
		 $.ajax({
		 	type: "POST",
		 	data: {k:k, exps:exps_text.val()},
	        dataType: "json",
		    url: '/app97973/combine_album/editVfc',
		    dataType:'json',
		    success: function(data){
		     alert(data.message);
		    }
		  });
		exps_input.html(exps_text.val());
		exps_hidden.val(exps_text.val());
	}

</script>
<?php echo $_smarty_tpl->getSubTemplate ("include/_footer.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>