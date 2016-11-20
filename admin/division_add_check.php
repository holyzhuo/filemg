<?php
	//引入相关文件
	require_once('../conn/conn.php');
	require 'session_check.php';
	header("Content-type:text/html;charset='utf-8'");
	

	$divisionname = $_POST['divisionname'];
	//查询division表中的division_name
	$sql = "SELECT division_name FROM division";
	$divisionrow = $result->getAll($sql);
	foreach ($divisionrow as $value) {
		if($value['division_name'] == $divisionname){
			$result->_alert('该部门已存在，请重新添加！','division_add.php');
			//echo "<script>alert('该部门已存在，请重新添加');location.href='division_add.php'</script>";
			die;
		}
	}
	//执行插入语句
	$sql = "INSERT INTO division  (division_name) VALUES('".$result->escapeString($divisionname)."')";
	$torf = $result->query($sql);

	if($torf){
		$result->_alert('添加成功！','division_show.php');
	}else{
		$result->_alert('添加失败！','division_add.php');
	}
