<?php /* Smarty version Smarty-3.1.12, created on 2017-05-02 11:03:12
         compiled from "admin\views\gifweb\gifcontent\add.html" */ ?>
<?php /*%%SmartyHeaderCode:2740458ff0332a07409-89302186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ec73e330bbba89b5167e00a2aa32aafa1aafd8e' => 
    array (
      0 => 'admin\\views\\gifweb\\gifcontent\\add.html',
      1 => 1493694045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2740458ff0332a07409-89302186',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58ff0332e1a535_92637190',
  'variables' => 
  array (
    'r' => 0,
    'type_list' => 0,
    'item' => 0,
    'img_domin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ff0332e1a535_92637190')) {function content_58ff0332e1a535_92637190($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/_header.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>((string)$_smarty_tpl->tpl_vars['title']->value)), 0);?>

<link href="/admin/statics/styles/dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/My97DatePicker/calendar.js"></script>
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/My97DatePicker/WdatePicker.js"></script>

<script language="javascript" type="text/javascript" src="/admin/statics/scripts/dialog.js"></script>
<script language="javascript" type="text/javascript" src="/admin/statics/scripts/ajaxfileupload.js"></script>
<div class="pad_10">
	<div class="common-form">
		<form id="myform" method="post" action="/gifweb/gifcontent/add" onsubmit="return check();" name="myform">
			<table width="100%" class="table_form contentWrap">
				<tbody>
					<tr>
						<td width="150" height="30" align="center" >标题：</td>
						<td><input type="text" size="30" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['title'];?>
" /></td>
					</tr>
					
					<tr>
						<td width="150" height="30" align="center" >描述：</td>
						<td>
							<textarea id='desc' name='desc' cols='40'><?php echo $_smarty_tpl->tpl_vars['r']->value['gif_desc'];?>
</textarea>
						</td>
					</tr>
					
					<tr>
						<td width="100" height="30" align="center" >类型：</td>
						<td><select name="type" id="type" style="width: 200px;">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['r']->value['type']==$_smarty_tpl->tpl_vars['item']->value['id']){?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
								<?php } ?>
							</select></td>
					</tr>
					
					
					<tr>
						<td width="100" height="30" align="center" >状态：</td>
						<td><select name="status" id="status" style="width: 200px;">
								<option value="0" <?php if ($_smarty_tpl->tpl_vars['r']->value['status']==0){?>selected="selected" <?php }?>>未审核</option>
								<option value="1" <?php if ($_smarty_tpl->tpl_vars['r']->value['status']==1){?>selected="selected" <?php }?>>审核通过</option>
								<option value="2" <?php if ($_smarty_tpl->tpl_vars['r']->value['status']==2){?>selected="selected" <?php }?>>关闭</option>
							</select></td>
					</tr>
					
					<tr>
						<td colspan='2' width="100" height="30" align="center" ><font color="red"><font size='4'><strong>动态图片</strong></font></font><br></td>
					</tr>
					
					<tr>
						<td width="100" height="30" align="center" >图片：<br><font color="red">100*100</font></td>
						<td>
							<input type="hidden" id="gif_img" name="gif_img" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['gif_img'];?>
" />
							<a href="javascript:;" id="onclicks">(点击图片添加/修改)</a><br>
							<img src="<?php if ($_smarty_tpl->tpl_vars['r']->value['gif_img']){?><?php echo $_smarty_tpl->tpl_vars['img_domin']->value;?>
<?php echo $_smarty_tpl->tpl_vars['r']->value['gif_img'];?>
<?php }else{ ?>/admin/statics/images/upload.png<?php }?>"  id="upload" />&nbsp;
							<input id="fileToUpload" style="display: none" type="file" name="upfile">
						</td>
					</tr>
					

					<tr>
						<td colspan="2" style="text-align: center;"><input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['cid'];?>
" /><button id="dosubmit"><?php if ($_smarty_tpl->tpl_vars['r']->value['cid']){?>修 改<?php }else{ ?>添 加<?php }?></button><input type="hidden" name="act" id="act" value="<?php if ($_smarty_tpl->tpl_vars['r']->value['cid']){?>edit<?php }else{ ?>add<?php }?>" /></td>
					</tr>
	
					
				</tbody>
			</table>
			<div ></div>
		</form>
	</div>
</div>

<script>

$(function(){  
    //点击打开文件选择器  
    $("#upload,#onclicks").click(function() {  
        $('#fileToUpload').click();
    });  
      
});  

//选择文件之后执行上传  
$('#fileToUpload').live('change',function() {
	$('#onclicks').html('上传中...');
    $.ajaxFileUpload({  
        url:'/gifweb/gifcontent/uploadImg/',  
        secureuri:false,  
        fileElementId:'fileToUpload',//file标签的id  
        dataType: 'json',//返回数据的类型  
        data:{},//一同上传的数据  
        success: function (data, status) {  
            //把图片替换  
            if(data.error=='1')
            {
            	$("#upload").attr("src", data.urls); 
            	$('#gif_img').val(data.url_fix);
            	$('#onclicks').html('(上传成功，点击修改)');
            }else{
				$('#onclicks').html('(上传失败，点击修改)');
			}
        },  
        error: function (data, status, e) {  
			$('#onclicks').html('(上传失败，点击修改)');
			 console.log(data);
            alert(e);  
        }  
    });  
}); 



function check()
{
	var message = "请补全：\r\n";
		var messages = '';
		if($('#title').val()=='')
		{
			messages +="标题\r\n";
		}
		if($('#desc').val()=='')
		{
			messages +="描述\r\n";
		}
		
		if($('#gif_img').val()=='')
		{
			messages +="图片\r\n";
		}
		if(messages)
		{
			alert(message+messages);
			return false;
		}
		return true;
} 
</script>
<?php }} ?>