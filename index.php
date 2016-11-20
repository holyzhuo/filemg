<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>文件管理系统</title>

     <!-- <link rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" /> -->
     <!-- <script type="text/javascript" src="http://www.sucaihuo.com/Public/js/other/jquery.js"></script> --> 
    
    <!-- Bootstrap -->
    <link href="css/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
     <link href="css/in_style.css" rel="stylesheet">
     <link href="css/page.css" rel="stylesheet">
  </head>
  <body >
  <!--头部导航条-->
    <header>
      <nav class="navbar navbar-default">
        <h1 align="center"><span class="glyphicon glyphicon-folder-open" style="font-size: 30px;"></span>&nbsp;&nbsp;欢迎进入文件管理系统</h1>
      </nav>
    </header>
    <div>
    <!--左侧列表-->
    <div class="left-body">
          <ul class="nav nav-sidebar">
            <?php  require "left-body.php";?>
          </ul>
      </div>
      <!--右侧列表-->
    <div class="">
      <div class="top-search">
        <button class="btn btn-primary btn-sm" style="margin-right: 150px;" onclick="location.href='?d=all'">文件总览</button>
         <form method="post" action="">
             <input type="text" name="search"/>
             <button class="btn btn-info btn-sm" type="submit" >搜索</button>
         <form>
      </div>
      <div class="rigth-body">
        <table class="table table-hover table-striped text-center">
              <thead>
                <tr>
                  <th width="300px;">文件标题</th>
                  <th width="100px;">文件编号</th>
                  <th width="100px;">行文单位</th>
                  <th width="100px;">行文时间</th>
                  <th width="100px;" >上传时间</th>
                  <th width="100px">文件格式</th>
                  <th width="100px">浏览次数</th>
                  <th>操作</th>
                </tr>
              </thead>
                 <?php require 'table.php';?>
         </table>
      </div>
    </div>
    <div>
    <script src="js/bootstrap-3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>