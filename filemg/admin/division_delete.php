<?php
	require_once('../conn/conn.php');
	require 'session_check.php';
	header("Content-type:text/html;charset='utf-8'");

	$divisionid = $_GET['id'];

	$sql = "delete from division where division_id='".$result->escapeString($divisionid)."'";
	$query = $result->query($sql);

	if($query){
		$result->_alert('删除成功！','division_show.php');
	}else{
		$result->_alert('删除失败！','division_show.php');
	}