<?php
  include 'config.php';
  session_start();
  check_admin();

  $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
  $dt_id = mysqli_real_escape_string($conn, $_POST['dt_category_name']);
  $new_name = mysqli_real_escape_string($conn, $_POST['new_name']);

  if(empty($new_name)){
    alert_back("카테고리명을 입력하세요");
    exit;
  }

  $sql = "SELECT * FROM dt_category WHERE id='$category_id' AND name='$new_name'";
  if(!mysqli_num_rows(mysqli_query($conn, $sql))){
    $sql = "UPDATE dt_category SET name='$new_name' WHERE id='$category_id' AND dt_id='$dt_id'";
    query($sql);
    locate("./dt_category.php?id={$category_id}&dt_id={$dt_id}");
    exit;
  } else{
    alert_back('카테고리에 같은 이름의 세부 카테고리가 이미 존재합니다!');
    exit;
  }
 ?>
