<?php 
  require_once '../conn/conn.php';
  require_once 'session_check.php';
  $sql = "select * from division";
  $row = $result->getAll($sql);
  foreach ($row as $value) {

 ?>
 			<option value=<?php echo $value['division_id']?>><?php echo $value['division_name']?></option>
 <?php }?>