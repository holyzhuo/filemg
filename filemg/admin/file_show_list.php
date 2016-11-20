<?php 
  require_once '../conn/conn.php';
  require 'session_check.php';
  require_once '../page.class.php';
      $sql = "SELECT * FROM `file` LEFT JOIN division ON file.division_id = division.division_id order by file_retime desc";

      //分页
  $result->query($sql);
  $total = $result->affected_rows();//获取总记录条数
  $showrow = 8; //一页显示的行数
  $url = "?page={page}"; //分页地址
  $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
  if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
    $curpage = ceil($total / $showrow); //当前页数大于最后页数，取最后一页
  //获取数据
  $sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";


  //获取file表数据
  $filerow = $result->getAll($sql);

    foreach($filerow as $value){
?>
                <tr>
                <td><?php echo $value['file_title'];?></td>
                <td><?php echo $value['file_donum'];?></td>
                <td><?php echo $value['division_name'];?></td>
                <td><?php echo $value['file_litime'];?></td>
                <td><?php echo $value['file_retime'];?></td>
                <td><?php echo $value['file_uperson'];?></td>
                <td><?php preg_match('/(png)|(gif)|(jpg)|(jpeg)|(pdf)|(doc)|(xlsx)|(docx)$/',$value['file_ori'],$match); 
                if($match[0]=='doc'|| $match[0]=='docx'){
                  echo 'word';
                }
                else if($match[0]=='xlsx') {
                  echo 'excel';
                }else if($match[0]=='pdf') {
                  echo 'pdf';
                }else{
                  echo "图片";
                }
                ?></td>
                <td><?php echo $value['file_snum'];?></td>
                <td><a href="file_update.php?id=<?php echo $value['file_id']?>">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="file_delete.php?id=<?php echo $value['file_id']?>">删除</a></td>
                </tr>
<?php };?>
         <tr align="center">
                  <td colspan="9"><?php
                    if ($total > $showrow) {//总记录数大于每页显示数，显示分页
                        $page = new page($total, $showrow, $curpage, $url, 2);
                        echo $page->myde_write();
                    }
                    ?><td>
                </tr>