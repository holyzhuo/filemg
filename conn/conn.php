<?php

	require_once 'MYSQLDB.class.php';
	$config = array(  //配置链接数据库信息
		'host' =>'localhost' ,
		'username' =>'root',
		'password' =>'diaobaole',
		'charset'  =>'utf8',
		'dbname'  => 'filemg'
 		 );
	//实例化数据库对象
	$result = MYSQLDB :: getInstance($config);


	
	