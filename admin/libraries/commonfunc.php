<?php
/**
* 文件名：commonfunc.php
* ==============================================
* 版权所有 2015
* ----------------------------------------------
* 这不是一个自由软件，未经授权不许任何使用和传播。
* ==============================================
* @date: 2015年10月19日
* @author: zhimiao
* @charset:UTF-8
*/
class Commonfunc {
    /**
     * utf-8字符串截取
     * @param unknown $str
     * @param unknown $start
     * @param unknown $len
     */
    static public function subStrUTF8($str, $start, $len) {
        $totalLen  = strlen($str);
        if ($start > $totalLen) {
            return '';
        }
        $count     = 0;
        if ($start == 0) {
            $newStart  = $start;
            $newLen    = $len;
            $len       = $totalLen >= $len ? $len : $totalLen;
            for ($i = 0; $i < $totalLen; ) {
                $cur    = $i;
                $char   = substr($str, $i, 1);
                $ascii  = ord($char);
                if ($ascii > 127) {
                    if ($ascii>=192 && $ascii<=223) {
                        $i = $cur + 2;
                        $count  = $count + 1;
                    } else {
                        $i = $cur + 3;
                        $count  = $count + 2;
                    }
                } else {
                    $i = $cur + 1;
                    $count ++;
                }
                if ($count >= $len) {
                    break;
                }
            }
            $newLen = $i;
        } else {
            $checkLen = $start + $len - 1;
            for ($i=0; $i<$totalLen; ) {
                $cur    = $i;
                $char   = substr($str, $i, 1);
                if ($char === '') {
                    break;
                }

                if (ord($char) > 127) {
                    $i = $cur + 3;
                    $addIndex = 2;
                    if (isset($newStart)) {
                        $count  = $count + $addIndex;
                    }
                } else {
                    $i = $cur + 1;
                    $addIndex = 1;
                    if (isset($newStart)) {
                        $count ++;
                    }
                }
                //处理开始
                if (!isset($newStart) && $i > $start) {
                    $newStart  = $cur;
                    $count     += $addIndex;
                }
                if ($count >= $len) {
                    break;
                }
            }
            $newLen = $i - $newStart;
        }
        return substr($str, $newStart, $newLen);
    }
    
    /**
     * 邮箱格式验证
     * @param string $email
     * @return boolean
     */
    static public function pregMail($email=''){
        if (preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$email)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 电话号码格式验证
     * @param string $phone
     */
    static public function pregPhone($phone=''){
    	if (preg_match("/^1[34578][0-9]{9}$/",$phone)) {
    		return true;
    	} else {
    		return false;
    	}
    }
	
    /**
     * 获取用户IP
     * @return Ambigous <string, unknown>
     */
	static public function getUserIP(){ 
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
			$ip = getenv("HTTP_CLIENT_IP");
		else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
			$ip = getenv("REMOTE_ADDR");
		else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
			$ip = $_SERVER['REMOTE_ADDR'];
		else
			$ip = "unknown";
		return($ip);
	}
        
        
    /**
     * 判断字符某个位置是中文字符的左半部分还是右半部分，或不是中文
     * 返回 1 是左边 0 不是中文 -1是右边
     * @return int
     * @param string $str 开始位置
     * @param int $location 位置
     */
    private static function _isCnString ($str, $location){
    	$result = 1;
    	$i = $location;
    	while (ord($str{$i}) > 127 && $i >= 0)
    	{
    		$result *= - 1;
    		$i --;
    	}
    
    	if ($i == $location)
    	{
    		$result = 0;
    	}
    	return $result;
    }
        
    /**
     * GBK 转 UTF8
     *
     * @param string $str gbk编码字串
     * @return string $ret utf8编码字串
     */
    public static function gbk2utf8 ($str){
    	if (function_exists("mb_convert_encoding"))
    	{
    		$ret = mb_convert_encoding($str, "UTF-8", "GBK,GB2312");
    	}
    	elseif (function_exists("iconv"))
    	{
    		$ret = iconv("GBK", "UTF-8", $str);
    	}
    	else
    	{
    		$ret = $str;
    	}
    	return $ret;
    }
        


    /**
     * 处理截取中文字符串的操作
     *
     * @return string
     * @param string $str 要处理的字符
     * @param string $start 开始位置
     * @param string $offset 偏移量
     * @param string $t_str 字符结果尾部增加的字符串，默认为空
     * @param boolen $ignore $start位置上如果是中文的某个字后半部分是否忽略该字符，默认true
     * @return string  返回截取的子串
     */
    public static function utfSubstr ($str, $start, $offset, $t_str = '', $ignore = true)
    {
        $length = strlen($str);
        if ($length <= $offset && $start == 0)
        {
            return $str;
        }
        if ($start > $length)
        {
            return $str;
        }
        $r_str = "";
        for ($i = $start; $i < ($start + $offset); $i ++)
        {
            if (ord($str{$i}) > 127)
            {
                if ($i == $start) //检测头一个字符的时候，是否需要忽略半个中文
                {
                    if ($this->_isCnString($str, $i) == 1)
                    {
                        if ($ignore){
                            continue;
                        }else{
                            $r_str .= $str{($i - 1)} . $str{$i};
                        }
                    }
                    else
                    {
                        $r_str .= $str{$i} . $str{++ $i};
                    }
                }
                else
                {
                    $r_str .= $str{$i} . $str{++ $i};
                }
            }
            else
            {
                $r_str .= $str{$i};
                continue;
            }
        }
        return $r_str . $t_str;
    }
    
    /**
     * 获取格式化后的数据结果
     **/
    static public function getReturnInfo($returnArray, $type = 'json', $is_ch = false)
    {
        $returnInfo = '';
        if($type == 'json')
        {
            $returnArray = $is_ch ? $this->arrParamToUrlencode($returnArray) : $returnArray;
            $returnInfo = json_encode($returnArray);
        }
        else
        {
            $returnInfo = '<?xml version="1.0" encoding="gbk"?>';
            $returnInfo .= "<response>";
            if(count($returnArray) > 1)
            {
                foreach($returnArray as $key => $value)
                {
                    $returnInfo .= "<".$key.">".$value."</".$key.">";
                }
            }
            $returnInfo .= "</response>";
        }
    
        if($is_ch)
        {
            $returnInfo = urldecode($returnInfo);
        }
    
        return $returnInfo;
    }
    
    /**
     *如果魔术字符没有开启则调用系统函数对字符串过滤
     **/
    static public function str_filter($str){
        $str = trim($str);
        if(!get_magic_quotes_gpc()){        //get_magic_quotes_gpc()判断魔术字符是否开启
            $str=addslashes($str);
        }
        return $str;
    }
    
    /**
     *过滤XSS攻击可能用到的敏感字符
     **/
    static public function xss_clean($str)
    {
        $str = rawurldecode($str);
        $str = str_replace(array('>', '<', '\\', ';', '*'), array('&gt;', '&lt;', '\\\\', '', ''), $str);
        if (strpos($str, "\t") !== FALSE)
        {
            $str = str_replace("\t", ' ', $str);
        }
        $str = str_replace(array('<?', '?'.'>'),  array('&lt;?', '?&gt;'), $str);
        $str = preg_replace('#(alert|cmd|passthru|eval|exec|expression|system|fopen|fsockopen|file|file_get_contents|readfile|unlink|admin)(\s*)\((.*?)\)#si', "\\1\\2&#40;\\3&#41;", $str);
        return $str;
    }
    
    /**
     * 在调用json_encode()之前，将数组中的中文元素处理一下，这样在输出时不会错误
     * @param unknown_type $array
     * @param unknown_type $rows
     * @param unknown_type $row
     * @param unknown_type $type
     */
    static public function arrParamToUrlencode($arr)
    {
        foreach($arr as $key => $value)
        {
            if(is_array($value))
            {
                $arr[$key] = $this->arrParamToUrlencode($value);
            }
            else
            {
                $arr[$key] = urlencode($value);
            }
        }
        return $arr;
    }
    
    /**
     * 邮箱地址混淆处理
     * @param unknown $mail
     */
    static public function mailxing($mail){
        $mailarr = explode('@', $mail);
        $str = $mailarr[0];
        $len = strlen($str)/2;
        $newstr = substr_replace($str,str_repeat('*',$len),ceil(($len)/2),$len);
        return $newstr.'@'.$mailarr[1];
    }
    
    /**
     * 手机号码混淆处理
     * @param unknown $mail
     */
    static public function phonexing($mail){
        return substr_replace($mail, '****', -8, -4);
    }
    
    /**
     * 判断是否为手机客户端
     */
    static public function isMobileClient() {
    
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])){
            return true;
        }
        //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA'])) {
            //找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        //判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array (
                'nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        //协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * url base64编码      
     * 为解决base64编码中有“/” “=”等符号     
     * zhimiao@staff.sina.com.cn 
     * 2015-01-30
     * @param unknown $string
     * @return mixed
     */
    static public function urlsafe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }
    
    /**
     * url base64解码
     * @param unknown $string
     * @return string
     */
    static public function urlsafe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
    
    /**
     * 中文字符串截取
     * @param unknown $string
     * @param unknown $length
     * @param string $dot
     * @param string $charset
     * @return unknown|string
     */
    static public function strcut($string, $length, $dot = '...', $charset = 'utf-8') {
        if(strlen($string) <= $length) {
            return $string;
        }
        $string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);
        $strcut = '';
        if(strtolower($charset) == 'utf-8') {
            $n = $tn = $noc = 0;
            while($n < strlen($string)) {
    
                $t = ord($string[$n]);
                if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                    $tn = 1; $n++; $noc++;
                } elseif(194 <= $t && $t <= 223) {
                    $tn = 2; $n += 2; $noc += 2;
                } elseif(224 <= $t && $t < 239) {
                    $tn = 3; $n += 3; $noc += 2;
                } elseif(240 <= $t && $t <= 247) {
                    $tn = 4; $n += 4; $noc += 2;
                } elseif(248 <= $t && $t <= 251) {
                    $tn = 5; $n += 5; $noc += 2;
                } elseif($t == 252 || $t == 253) {
                    $tn = 6; $n += 6; $noc += 2;
                } else {
                    $n++;
                }
                if($noc >= $length) {
                    break;
                }
            }
            if($noc > $length) {
                $n -= $tn;
            }
            $strcut = substr($string, 0, $n);
        } else {
            for($i = 0; $i < $length; $i++) {
                $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
            }
        }
        $strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);
        return $strcut.$dot;
    }
    
    /**
     * 获取当前请求URL地址
     * @return Ambigous <string, unknown>
     */
    static public function GetCurUrl(){
        $host = $_SERVER["SERVER_NAME"];
        if(!empty($_SERVER["REQUEST_URI"])){
            $scrtName = $_SERVER["REQUEST_URI"];
            $nowurl = $scrtName;
        } else {
            $scrtName = $_SERVER["PHP_SELF"];
            if(empty($_SERVER["QUERY_STRING"])){
                $nowurl = $scrtName;
            } else {
                $nowurl = $scrtName."?".$_SERVER["QUERY_STRING"];
            }
        }
        
        return 'http://'.$host.$nowurl;
    }
    
    /**
     * 获得一个随机字符串
     * @param unknown $num
     * @return string
     */
    static public function getRand($num = '5'){
        $randpwd = "";
        for($i = 0; $i < $num; $i++){
            $randpwd .= chr(mt_rand(97, 122));
        }
        return  $randpwd;
    }
    
    //打印分页导航条
    /**
     * $url = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
     * $c = (strpos($url , '?') === false) ? '?' : '&';
     * $url .= $c;
     * $url .= "gtype=".$gv;
     *
     *
     * @param unknown $url
     * @param unknown $totalNum
     * @param number $curPage
     * @param number $pageSize
     * @param number $navShowNum
     * @return string
     */
    static public function getPageBar($url, $totalNum, $curPage = 1, $pageSize = 20, $navShowNum = 7){
        if(0 == $totalNum || $totalNum <= $pageSize){
            $html = '';
        }
        else{
            $totalPages = intval((ceil($totalNum / $pageSize)));
            $curPage = intval($curPage);
            //if(preg_match('/^https/', $_SERVER['HTTP_REFERER'])){   //考虑线上https
            //      $url = 'https://'. $url;
            // }elseif(!preg_match('/^http/', $url)){
            //  	$url = 'http://'. $url;
            // }
    
            $url = 'http://'. $url;
             
            $c = (strpos($url, '?') === false) ? '?' : '&';
            $url .= $c;
    
            $curPage = ($curPage >= $totalPages) ?  $totalPages : $curPage;
            $curPage = ($curPage < 1 ) ?  1 : $curPage;
    
            $preUrl = $url . 'p='.($curPage -1);
            $nextUrl = $url . 'p='.($curPage + 1);
    
            $html= '<div class="pagination " style="text-align:center;"><ul class="center">';
            $span = '<li><a target="_self" href="javascript:void(0);">. . .</a></li>';
            $prePage =  '<li><a target="_self"  href="'.$preUrl.'">上一页</a></li>';
            $nextPage = '<li><a target="_self"  href="'.$nextUrl.'">下一页</a></li>';
             
            if($curPage < ($navShowNum - 1)){
                if(1 !== $curPage){
                    $html = $html.$prePage;
                }
                for($i=0; $i < $navShowNum && $i < $totalPages; $i++){
                    $page = $i+1;
                    if($page == $navShowNum && ($page + 1) !== $totalPages){
                        $html .= $span;
                    }else{
                        if($page == $curPage){
                            $html .= '<li class="active"><a target="_self"  href="javascript:void(0);">'.$page.'</a></li>';
                        }else{
                            $html .='<li><a target="_self"  href="'.$url.'p='.$page.'">'.$page.'</a></li>';
                        }
                    }
                }
                if($page < $totalPages){
                    $html .='<li><a target="_self"  href="'.$url.'p='.$totalPages.'">'.$totalPages.'</a></li>';
                }
                if($totalPages !== $curPage){
                    $html .= $nextPage;
                }
            }
            else if($curPage >= ($navShowNum -1) && $curPage <= ($totalPages - ($navShowNum - 1) +1)){
                $min = floor($curPage - ($navShowNum -3)/ 2);
                $max = ceil($curPage + ($navShowNum -3)/ 2);
                $html .= $prePage.'<li><a target="_self"  href="'.$url.'p=1">1</a></li>'. $span;
                for($page = $min; $page <= $max;  $page++){
                    if($page == $curPage){
                        $html .= '<li class="active"><a target="_self"  href="javascript:void(0);">'.$page.'</a></li>';
                    }else{
                        $html .='<li><a target="_self"  href="'.$url.'p='.$page.'">'.$page.'</a></li>';
                    }
                }
                $html .= $span.'<li><a  target="_self" href="'.$url.'p='.$totalPages.'">'.$totalPages.'</a></li>'. $nextPage;
            }
            else{
                if(1 !== $curPage){
                    $html = $html.$prePage;
                }
                $html .= '<li><a target="_self"  href="'.$url.'p=1">1</a></li>';
                if(($totalPages - $navShowNum +1) > 1){
                    $html .= $span;
                }
                $min = ($totalPages - ($navShowNum - 1) +1);
                for($page = $min; $page <= $totalPages; $page++){
                    if($page == $curPage){
                        $html .= '<li class="active"><a target="_self" href="javascript:void(0);">'.$page.'</a></li>';
                        //$html .= '<a class="current" href="javascript:void(0);">'.$page.'</a>';
                    }else{
                        $html .='<li><a target="_self"  href="'.$url.'p='.$page.'">'.$page.'</a></li>';
                        //$html .='<a href="'.$url.'p='.$page.'" >'.$page.'</a>';
                    }
                }
                if($totalPages !== $curPage){
                    $html .= $nextPage;
                }
            }
             
            $html .='</ul></div>';
        }
        return $html;
    }
    
    static public function getMixSqlStr($format,$k,$v){
        if(is_int($v)){
            $v = '#d' ;
        }else{
            $v = "'#s'" ;
        }
        $format = str_replace('{v}',$v,$format);
        $format = str_replace('{k}',"`$k`",$format);
        return $format ;
    }
    
    //错误返回提示
    static public function error_back($msg){
        header("Content-type:text/html;charset=utf-8");
        echo "<script>alert('{$msg}');history.back();</script>";
        exit();
    }
    
    static public function formatStr($str) {
        $formatStr = str_replace("\n\r", "<br />", $str);
        $formatStr = str_replace("\n", "<br />", $formatStr);
        $strArr = explode('<br />', $formatStr);
        $newStr = '';
        if(count($strArr)>0){
            foreach ($strArr as $v){
                $v = trim($v);
                if(empty($v)){
                    continue;
                }
                $newStr .= $v."<br />";
            }
        }
        return $newStr;
    }
    
    static public function formatReturnStr($str) {
        $formatStr = str_replace("<br />", PHP_EOL, $str);
        return $formatStr;
    }
    
}