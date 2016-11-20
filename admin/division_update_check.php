<?php
	//引入相关文件
	require_once('../conn/conn.php');
	require 'session_check.php';
	header("Content-type:text/html;charset='utf-8'");
	

	$divisionname = $_POST['divisionname'];
	$division_id  = $_POST['division_id'];
	//查询division表中的division_name
	$sql = "SELECT division_name FROM division";
	$divisionrow = $result->getAll($sql);
	foreach ($divisionrow as $value) {
		if($value['division_name'] == $divisionname){
			$result->_alert('该部门已存在，请重新修改！','division_update.php');
			//echo "<script>alert('该部门已存在，请重新添加');location.href='division_add.php'</script>";
			die;
		}
	}
	//执行插入语句
	$sql = "UPDATE division  SET division_name = '".$result->escapeString($divisionname)."' where division_id = '".$result->escapeString($division_id)."'";
	$torf = $result->query($sql);

	if($torf){
		$result->_alert('修改成功！','division_show.php');
	}else{
		$result->_alert('修改失败！','division_update.php');
	}
