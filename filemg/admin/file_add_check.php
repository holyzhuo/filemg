<?php 
	require_once '../conn/conn.php';
	require_once 'session_check.php';
	require_once  'Upload.class.php';

	header("Content-type:text/html;charset='utf-8'");
	$file_title = $_POST['file_title'];
	$division_id= $_POST['division_id'];
	$file_donum = $_POST['file_donum'];
	$file_litime = $_POST['file_litime'];
	$file_retime = $_POST['file_retime'];
	$file_uperson = $_POST['file_uperson'];
	$file_remark = $_POST['file_remark'];

	$t_upload = new Upload();
	$t_upload->upload_path = 'uploadfile/';
	$upload_path = 'uploadfile/';
	//$t_upload->prefix = 'goods_ori_';
	if(!$file_url = $upload_path.$t_upload->uploadOne($_FILES['file'])){
		//上传失败
		$result->_jump('file_add.php','上传失败,<br>'.$t_upload->getError()."，请上传合法文件！");
	}
	/*
	测试
	echo $file_url;
	var_dump($_FILES['file']);
	die;*/
	$sql = "INSERT INTO file (file_title,division_id,file_donum,file_litime,file_retime,file_uperson,file_remark,file_ori) values('".$result->escapeString($file_title)."','".$result->escapeString($division_id)."','".$result->escapeString($file_donum)."','".$result->escapeString($file_litime)."','".$result->escapeString($file_retime)."','".$result->escapeString($file_uperson)."','".$result->escapeString($file_remark)."','".$result->escapeString($file_url)."')";
	
	 $query = $result->query($sql);
	 if($query){
	 	$result->_alert('添加文件成功！','file_show.php');
	 }else{
	 	$result->_alert('添加文件失败！','file_add.php');
	 }