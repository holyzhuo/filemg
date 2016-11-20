<?php 
  require_once '../conn/conn.php';
  require_once 'session_check.php';
  $sql = "select * from division";
  $row = $result->getAll($sql);
  $division_id = $filerow['division_id'];
  foreach ($row as $value) {
 ?>
 			<option value=<?php echo $value['division_id']?> <?php  		
 			if($division_id==$value['division_id']){
 					echo "selected";
 				}else{
 					echo '';
 					}?>><?php echo $value['division_name']?></option>
 <?php }?>