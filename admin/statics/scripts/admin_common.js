function confirmurl(url,message)
{
	if(confirm(message)) redirect(url);
}
function redirect(url) {
	//if(url.indexOf('://') == -1 && url.substr(0, 1) != '/' && url.substr(0, 1) != '?') url = $('base').attr('href')+url;
	location.href = url;
}
//滚动条
$(function(){
	//window.onresize = function(){

	//}
	//window.onresize();
	//inputStyle
	$(":text").addClass('input-text');
})

/**
 * 全选checkbox,注意：标识checkbox id固定为为check_box
 * @param string name 列表check名称,如 uid[]
 */
function selectall(name) {
	if ($("#check_box").attr("checked")==false) {
		$("input[name='"+name+"']").each(function() {
			this.checked=false;
		});
	} else {
		$("input[name='"+name+"']").each(function() {
			this.checked=true;
		});
	}
}
function openwinx(url,name,w,h) {
	if(!w) w=screen.width;
	if(!h) h=screen.height-60;
    window.open(url,name,"top=100,left=400,width=" + w + ",height=" + h + ",toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,status=no");
}
//弹出对话框
function omnipotent(id,linkurl,title,close_type,w,h,reload=0) {
	if(!w) w=700;
	if(!h) h=500;
	window.top.art.dialog({id:id,iframe:linkurl, title:title, width:w, height:h, lock:true},
	function(){
		if(close_type==1) {
			if(reload == 1)
			{
				 wp = window.parent;
				 if(!wp)
				 {
				 	 wp = window.parent.frames['right'];
				 }
				 wp.reload(true);
			}
			window.top.art.dialog({id:id}).close();
			
		} else {
			var d = window.top.art.dialog({id:id}).data.iframe;
			var form = d.document.getElementById('dosubmit');form.click();
		}
		return false;
	},
	function(){
			window.top.art.dialog({id:id}).close()
	});void(0);
}

//弹出对话框
function omnipotent_nobtn(id,linkurl,title,close_type,w,h,reload=0) {
	if(!w) w=700;
	if(!h) h=500;
	if(!h) h=500;
	window.top.art.dialog({id:id,iframe:linkurl, title:title, width:w, height:h, lock:true, button: []});void(0);
}