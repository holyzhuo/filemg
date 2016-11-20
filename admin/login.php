<meta charset="utf-8">
<?php
	require_once '../conn/conn.php';
	require_once 'Captcha.class.php';
	session_start();

	$username =  $_POST['username'];
	$password =  $_POST['password'];
	$captcha  =  $_POST['captcha'];

	//验证码是否正确
	$t_captcha = new Captcha();
	if(!$t_captcha->checkCaptcha($captcha)){
			//验证错误
		$result->_jump('index.php','验证码错误,3秒后跳转到登录页面！',3);
	}

	//从数据库中验证管理员信息是否存在合法
	$tablename = 'admin';
	if($admin_info = $result->check($tablename,$username,$password)){
		//验证通过，合法
		//设置登录标志,session
		$_SESSION['admin'] = $admin_info;//登录标志，管理员信息
		//new SessionDB();
		//跳转
		$result->_jump('file_show.php');
	}else{
		//非法
		$result->_jump('index.php','管理员信息非法！3秒后跳转到登录页面！');
	}