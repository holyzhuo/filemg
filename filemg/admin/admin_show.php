<?php require 'session_check.php';?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>文件管理系统</title>

      
    <!-- Bootstrap -->
    <link href="../css/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
     <link href="../css/in_style.css" rel="stylesheet">
    <link href="../css/showindex.css" rel="stylesheet">
   
  </head>
  <body >
  <!--头部导航条-->
    <header>
      <nav class="navbar navbar-default">
        <h1 align="center"><span class="glyphicon glyphicon-folder-open" style="font-size: 30px;"></span>&nbsp;&nbsp;欢迎进入文件管理系统
         </span></h1>
       <span class="return" style="font-style: 20px;"><a href="../index.php">返回首页</a>
      </nav>
    </header>
    <div>
    <!--左侧列表-->
    <div class="left-body">
          <ul class="nav nav-sidebar">
            <li><span class="glyphicon glyphicon-list"></span><a href="admin_show.php">超级管理员</a></li>
            <li><span class="glyphicon glyphicon-list"></span><a href="division_show.php">部门列表</a></li>
            <li><span class="glyphicon glyphicon-list"></span><a href="division_add.php">添加部门</a></li>
            <li><span class="glyphicon glyphicon-list"></span><a href="file_show.php">文件列表</a></li>
            <li><span class="glyphicon glyphicon-list"></span><a href="file_add.php">添加文件</a></li>
            <li><span class="glyphicon glyphicon-off"></span><a href="exit.php">退出系统</a></li>
          </ul>
      </div>
      <!--右侧列表-->
      <div class="rigth-body">
        <table class="table table-hover table-striped text-center">
              <thead>
                <tr>
                  <th width="300px;">管理员ID</th>
                  <th width="400px;">管理员账号</th>
                  <th>操作</th>
                </tr>
              </thead>
              <?php require 'admin_show_list.php';?>
         </table>
      </div>
    </div>
    <div>
    <script src="../js/bootstrap-3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>