<?php require_once 'session_check.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>文件管理系统</title>
    <script src="../js/check_form.js"></script>
    
    <!-- Bootstrap -->
    <link href="../css/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
     <link href="../css/in_style.css" rel="stylesheet">
    <link href="../css/showindex.css" rel="stylesheet">
    <script src="laydate/laydate.js"></script>
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
        <table align="center" style="td{padding-top: 20px;}" >
          <form name="form1" method="post" action="file_add_check.php" style="margin: 350px;margin-top:400px; " enctype="multipart/form-data" onsubmit="return myCheck()">
              <tr>
                <td >文件标题&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td ><input style="margin-top: 8px;" class="form-control" type="text" name="file_title"></td>
              </tr>
              <tr>
                <td style="padding-top: 10px;">行文部门&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td style="padding-top: 10px;">
	                <select name="division_id" >
	                	<?php require_once 'select_option.php'; ?>
	                </select>
              </tr>
              <tr>
                <td style="padding-top: 20px;">文号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td ><input style="margin-top: 12px;"  class="form-control" type="text" name="file_donum"></td>
              </tr>
              <tr>
                <td style="padding-top: 20px;">行文时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td ><input style="margin-top: 12px;"  class="form-control" type="text" name="file_litime" onclick="laydate()"></td>
              </tr>
              <tr>
                <td style="padding-top: 20px;">上传人员&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td ><input style="margin-top: 12px;"  class="form-control" type="text" value=<?php echo $_SESSION['admin']['admin_name'];?> name="file_uperson"></td>
              </tr>
              <tr>
                <td style="padding-top: 20px;">文件摘要&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td ><textarea style="margin-top: 12px;width: 280px;" name="file_remark"></textarea>
              </tr>
              <tr>
                <td style="padding-top: 10px;">上传附件&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td ><input   type="file" name="file"></td>
              </tr>
              <tr>
                <td style="padding-top: 20px;">发布时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td ><input style="margin-top: 15px;"  class="form-control" type="text" value =<?php echo date('Y-m-d');?> name="file_retime"></td>
              </tr>
              <tr>
                <td colspan="2"><button type="submit" class="btn btn-primary" style="margin-left: 180px;margin-top: 20px;">添加</button></td>
              </tr>
          </form>
          </table>
      </div>
    </div>
    <div>
    <script src="../js/bootstrap-3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>