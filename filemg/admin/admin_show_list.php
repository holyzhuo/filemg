<?php 
  require_once '../conn/conn.php';
  require 'session_check.php';
      $sql = "SELECT * FROM admin";
  //获取division表数据
  $adminrow = $result->getAll($sql);

    foreach($adminrow as $value){
?>
                <tr>
                <td><?php echo $value['admin_id'];?></td>
                <td><?php echo $value['admin_name'];?></td>
                
                <td><a href="admin_add.php">添加管理员</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_delete.php?id=<?php echo $value['admin_id'];?>">删除</a></td>
                </tr>
<?php };?>