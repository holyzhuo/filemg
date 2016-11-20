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
	$file_id = $_POST['file_id'];
	//实例化上传文件的类
	$t_upload = new Upload();
	$t_upload->upload_path = 'uploadfile/';
	$upload_path = 'uploadfile/';
	//$t_upload->prefix = 'goods_ori_';
	//判断是否提交了文件，如果提交就保存新的路径，如果没有提交 就保存原来的路径
	if($_FILES['file']['error']>0){
			$file_url = $_POST['file_name'];
	}else{
		 $file_url = 	$upload_path.$t_upload->uploadOne($_FILES['file']);
		}

	$sql = "update file set file_title='".$result->escapeString($file_title)."',division_id='".$result->escapeString($division_id)."',file_donum='".$result->escapeString($file_donum)."',file_litime='".$result->escapeString($file_litime)."',file_retime='".$result->escapeString($file_retime)."',file_uperson='".$result->escapeString($file_uperson)."',file_remark='".$result->escapeString($file_remark)."',file_ori='".$result->escapeString($file_url)."' where file_id='".$result->escapeString($file_id)."'";
	 $query = $result->query($sql);
	 if($query){
	 	$result->_alert('修改文件成功！','file_show.php');
	 }else{
	 	$result->_alert('修改文件失败！','file_add.php');
	 }