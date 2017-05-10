<?php

#-------------------------------------------------
/*
================================== 
POST /publish HTTP/1.1 
Content-Type: application/x-www-form-urlencoded 
Host: 172.16.108.79 
Content-Length: 293 
Connection: close 

&module=news 
&files= 
mod/expires.html 10fe9d2ec4e93433f4ad8ac536fd06dd 
mod/rewrite.html 24267d2b4a20a64e9c518f94bbd4d354 
mod/proxy.html ddd1a908a6a48b7316e4c75e8cd46355 
*/


#usage
# phh delivery_alone.php xxxxxxxxx.gif

if(count($argv) != 2)
    exit("Error: --parama error\n");

$pub_file = trim($argv[1], DIRECTORY_SEPARATOR);
if(!file_exists($pub_file))
{
    $errorstr = "Error: '$pub_file' isn't exist.\n";
    exit("$errorstr");
}

$host = "dist03-int.sina.com.cn";
$url = "http://dist03-int.sina.com.cn/publish";
$module = "img_games";

//$rsync_cmd = "rsync -vtup -R $pub_file $host::img_mbimg";
$rsync_cmd = "rsync -vtup -R $pub_file $host::img_games";
//echo $rsync_cmd;
exec($rsync_cmd);


$md5 = md5_file($pub_file);
$postfield="module=$module&files=$pub_file \t $md5";
//echo $postfield;

$str=curlRequest($url,$postfield);
var_dump($str);


function curlRequest($url,$postfield)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_PORT, 80); 
    curl_setopt($ch, CURLOPT_POST, 'application/x-www-form-urlencoded');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfield); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 15); 

    $document = curl_exec($ch); 
    $info=curl_getinfo($ch); 
    //print_r($info);
    curl_close($ch);
    return $document;
}




