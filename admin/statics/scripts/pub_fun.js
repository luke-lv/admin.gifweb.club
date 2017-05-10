function width_check(str, max_len,id_val){
	limitLength(str.value,max_len,'',id_val);
}

function limitLength(value, byteLength, title, attribute) { 
	var newvalue = value.replace(/[^\x00-\xff]/g, "**"); 
	var length = newvalue.length; 

	//当填写的字节数小于设置的字节数 
	if (length * 1 <= byteLength * 1){ 
		return; 
	} 
	var limitDate = newvalue.substr(0, byteLength); 
	var count = 0; 
	var limitvalue = ""; 
	
	for (var i = 0; i < limitDate.length; i++) { 
		var flat = limitDate.substr(i, 1); 
		if (flat == "*") { 
			count++; 
		} 
	} 
	var size = 0; 
	var istar = newvalue.substr(byteLength * 1 - 1, 1);//校验点是否为“×” 

	//if 基点是×; 判断在基点内有×为偶数还是奇数  
	if (count % 2 == 0) { 
		//当为偶数时 
		size = count / 2 + (byteLength * 1 - count); 
		limitvalue = value.substr(0, size); 
	} else { 
		//当为奇数时 
		size = (count - 1) / 2 + (byteLength * 1 - count); 
		limitvalue = value.substr(0, size); 
	} 
	alert(title + "最大输入" + byteLength + "个字节（相当于"+byteLength /2+"个汉字）！"); 
	document.getElementById(attribute).value = limitvalue;
	document.getElementById(attribute).innerHTML = limitvalue; 
	return; 
}
