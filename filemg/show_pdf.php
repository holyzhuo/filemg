  <meta charset="utf-8">
<?php require_once 'conn/conn.php';
	$sql2 = "update file set file_snum = file_snum+1 where file_id='".$result->escapeString($_GET['id'])."'";
	$result->query($sql2);
	if($_GET['type']!='pdf'){
			$result->_alert('该文件不是pdf文件！请下载后查看！','index.php');
	}else{
	$sql = "select file_ori,file_remark from file where file_id='".$result->escapeString($_GET['id'])."'";
	$filerow = $result->getRow($sql);
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>在线预览文件</title>
    </head>
    <style type="text/css">
     .header{
     	width: 100%;
     	height: 60px;
     	text-align: center;
     }
     .bodyer{
     	height: 100%;
     	width: 100%;
     }
    </style>
<body>
	<div class="header">
			<h3>文件摘要</h3>
			<font><?php echo $filerow['file_remark'];?></font>
	</div>
	<a  href="index.php" style="display:block;float: right;text-decoration: none;">返回首页</a>
	<div class="bodyer">
		<embed width="100%" height="570px;" name="plugin" src="<?php echo 'admin/'.$filerow['file_ori'];}?>" type="application/pdf" internalinstanceid="7">
	</div>
</body>
</html>