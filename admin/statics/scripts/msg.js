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
	if (fun == 'see') {

	}else if (fun == 'edit'){
		window.location.href='/shop/msg/msg_edit?id='+id;
	}else if (fun == 'show'){
		var url = "/games_info/activitylist/editshow";
		var data = {id:id,type:'1001'};
		$.getJSON(url, data, function(info) {
		      alert(info);
		      window.location.reload();
		    }
		);
	}else if (fun == 'send'){
		var url = "/shop/msg/send_message";
		var data = {id:id};
		$.getJSON(url, data, function(info) {
		      alert(info);
		      window.location.reload();
		    }
		);
	}
}