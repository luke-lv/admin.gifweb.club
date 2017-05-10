<?php
function is_full_img_url($path) {
    $str = substr($path, 0 , 7);
    $arr = array(
        'http://',
        'https:/'
    );
    return in_array($str, $arr);
}

function gl_img_url($path) {
    $old_img_domin='http://store.games.sina.com.cn/';
    $url = '';
    if (!empty($path)) {
        $url = is_full_img_url($path) ? $path : $old_img_domin . $path;
    }
    return $url;
}

function roll_sort($a, $b){
    if($a['sort'] <= $b['sort'] ){
        return 1;
    } else{
        return 0;
    }
}


if(! function_exists('clearbom')){
    /**
     * UTF8 去掉文本中的 bom头
     * @param unknown $contents
     * @return mixed
     */
    function clearbom($contents){
        $BOM = chr(239).chr(187).chr(191);
        return str_replace($BOM,'',$contents);
    }
}

if(! function_exists('curl')){
    /**
     * curl抓取远程文件
     *
     * @param string $url  远程地址
     * @return  $output   返回远程请求结果
     */
    function curl($url, $post = FALSE, $array = array()) {
        $cu = curl_init();
        curl_setopt($cu, CURLOPT_URL, $url);
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cu, CURLOPT_HEADER, 0);
        curl_setopt($cu, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($cu,CURLOPT_FOLLOWLOCATION,true);
        if ($post) {
            curl_setopt($cu, CURLOPT_POST, 1);
            //curl_setopt($cu, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt($cu, CURLOPT_POSTFIELDS, $array);
        }
        $output = curl_exec($cu);
        curl_close($cu);

        return $output;
    }
}
