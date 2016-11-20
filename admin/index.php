<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文件管理系统</title>

    <link rel="stylesheet" href="../css/normalize.css">
  </head>
  <body >
    <div class="login">
  <h1>文件系统后台登录</h1>
  <form method="post" action="login.php">
    <input type="text" name="username" placeholder="用户名" required="required" />
    <input type="password" name="password" placeholder="密码" required="required" />
    <input type="text" class="cache"  name='captcha' placeholder="验证码" requred="required" />
    <image src="captcha.php" class="captcha" onclick="this.src='captcha.php?'+Math.random()" />
    <button type="submit" class="btn btn-primary btn-block btn-large">登录</button>
    <button type="submit" class="btn btn-primary btn-block btn-large" onclick="location='../index.php'">返回首页</button>
  </form>
  <h3 align="center" style="color: white;">made by zhuo<h3>
</div>

  </body>
  </html>