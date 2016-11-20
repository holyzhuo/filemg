<?php
	//引入相关文件
	require_once('../conn/conn.php');
	require 'session_check.php';
	header("Content-type:text/html;charset='utf-8'");
	

	$admin_name = $_POST['admin_name'];
	$admin_password = $_POST['admin_password'];
	//查询admin表中的admin_name,admin_password
	$sql = "SELECT admin_name,admin_password FROM admin";
	$adminrow = $result->getAll($sql);
	foreach ($adminrow as $value) {
		if($value['admin_name'] == $admin_name){
			$result->_alert('该管理员已存在，请重新添加！','admin_add.php');
			//echo "<script>alert('该部门已存在，请重新添加');location.href='division_add.php'</script>";
			die;
		}
	}
	//执行插入语句
	$sql = "INSERT INTO admin  (admin_name,admin_password) VALUES('".$result->escapeString($admin_name)."','".md5($result->escapeString($admin_password))."')";
	$torf = $result->query($sql);

	if($torf){
		$result->_alert('添加成功！','admin_show.php');
	}else{
		$result->_alert('添加失败！','admin_add.php');
	}
