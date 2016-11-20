<?php
	@session_start();
  if(!isset($_SESSION['admin'])){
    echo "<script >alert('请先登录！');location.href='index.php'</script>";
  }