<?php
	require_once('../conn/conn.php');
	require 'session_check.php';
	header("Content-type:text/html;charset='utf-8'");

	$file_id = $_GET['id'];

	$sql = "delete from file where file_id='".$result->escapeString($file_id)."'";
	$query = $result->query($sql);

	if($query){
		$result->_alert('删除成功！','file_show.php');
	}else{
		$result->_alert('删除失败！','file_show.php');
	}