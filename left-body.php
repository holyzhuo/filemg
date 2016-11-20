<?php
	require 'conn/conn.php';
	$sql = "SELECT * FROM division";
	$derow = $result->getAll($sql);//获取所有数据库中查询出的数据
    foreach ($derow as $value) {//遍历
 ?> 
			<li><span class="glyphicon glyphicon-search"></span><a href="?d=<?php echo $value['division_id'] ?>">
			<?php echo $value['division_name']?></a></li>
 <?php }?>


