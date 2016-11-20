<?php 
  require_once '../conn/conn.php';
  require 'session_check.php';
      $sql = "SELECT * FROM division";
  //获取division表数据
  $divisionrow = $result->getAll($sql);

    foreach($divisionrow as $value){
?>
                <tr>
                <td><?php echo $value['division_id'];?></td>
                <td><?php echo $value['division_name'];?></td>
                
                <td><a href="division_update.php?id=<?php echo $value['division_id']; ?>">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="division_delete.php?id=<?php echo $value['division_id']; ?>">删除</a></td>
                </tr>
<?php };?>