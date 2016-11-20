<?php 
	require_once 'conn/conn.php';
  	$sql = "SELECT file_title,file_ori FROM file where file_id ='".$result->escapeString($_GET['id'])."'";
  	$file_ori = $result->getAll($sql); 

//检查文件是否存在    
 preg_match('/(png)|(gif)|(jpg)|(jpeg)|(pdf)|(doc)|(xlsx)|(docx)$/',$file_ori[0]['file_ori'],$match); 
$out_filename = $file_ori[0]['file_title'].".".$match[0];//下载文件重命名
$filename = 'admin/'.$file_ori[0]['file_ori'];//文件路径
if(!file_exists($filename)){
	echo 'Not Found'.$filename;
	exit;
}
//实现文件下载
if(!file_exists($filename)){
	echo 'Not Found '.$filename;
	exit;
}else {
	header('Accept-Ranges: bytes');
	header('Accept-Length:'.filesize($filename));
	header('Content-Transfer-Encoding: binary');
    header('Content-type: application/octet-stream');

    //文件名乱码解决
    $ua = $_SERVER["HTTP_USER_AGENT"];
    $encoded_filename = urlencode($out_filename);
	$encoded_filename = str_replace("+", "%20", $encoded_filename);
		  //if (preg_match("/MSIE/", $ua)) {        
		//兼容IE11
		if(preg_match("/MSIE/", $ua) || preg_match("/Trident\/7.0/", $ua)){
			header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
		} else if (preg_match("/Firefox/", $ua)) {
			header('Content-Disposition: attachment; filename*="utf8\'\'' . $out_filename . '"');
		} else {
			header('Content-Disposition: attachment; filename="' . $out_filename . '"');
		}
    //header('Content-Type: application/octet-stream;name='.$out_filename);
   if(is_file($filename) && is_readable($filename)){
		$file = fopen($filename, "r");
		echo fread($file, filesize($filename));
　　　　fclose($file);
   }
　　exit;
}


