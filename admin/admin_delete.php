<?php
	require_once('../conn/conn.php');
	require 'session_check.php';
	header("Content-type:text/html;charset='utf-8'");

	$admin_id = $_GET['id'];

	$sql = "delete from admin where admin_id='".$result->escapeString($admin_id)."'";
	$query = $result->query($sql);

	if($query){
		$result->_alert('删除成功！','admin_show.php');
	}else{
		$result->_alert('删除失败！','admin_show.php');
	}