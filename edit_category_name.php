<?php
  include 'config.php';
  session_start();
  check_admin();

  $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
  $new_name = mysqli_real_escape_string($conn, $_POST['category_name']);

  if(empty($new_name)){
    alert_back("카테고리명을 입력하세요");
    exit;
  }
  
  $sql = "UPDATE category SET name='$new_name' WHERE id='$category_id'";
  query($sql);
  locate("./category.php?id={$category_id}");

 ?>
