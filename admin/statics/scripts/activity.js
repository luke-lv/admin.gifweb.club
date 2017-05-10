function check_form() {
    $('#form1').submit();
}

//快捷修改活动排序
function EditActivitySort (id,sort) {
	var url = "/games_info/activitylist/editsort";
	var data = {id:id,sort:sort};
	$.getJSON(url, data, function(info) {
	      alert(info);
	    }
	);
}

function operation(fun,id) {
	var addurl = $('#addurl').val();
	if (fun == 'see') {

	}else if (fun == 'edit'){
		window.location.href='/games_info/activitylist/activityinfoadd/'+addurl+'/edit?id='+id;
	}else if (fun == 'show'){
		var url = "/games_info/activitylist/editshow";
		var data = {id:id,type:'1001'};
		$.getJSON(url, data, function(info) {
		      alert(info);
		      window.location.reload();
		    }
		);
	}else if (fun == 'hidden'){
		var url = "/games_info/activitylist/editshow";
		var data = {id:id,type:'1002'};
		$.getJSON(url, data, function(info) {
		      alert(info);
		      window.location.reload();
		    }
		);
	}
}