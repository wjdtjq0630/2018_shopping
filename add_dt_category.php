<?php
  include 'config.php';
  session_start();
  check_admin();

  $id = $_POST['category_id'];
  $new_dt_category = mysqli_real_escape_string($conn, $_POST['$new_dt_category']);

  $sql = "SELECT * FROM dt_category WHERE id='$id' AND name='$new_dt_category'";
  if($result = mysqli_query($conn, $sql)){
    alert_back('이미 존재하는 카테고리 입니다.');
  } else{
      $sql = "INSERT INTO dt_category (id,name) VALUES ('$id','$name')";
      query($sql);
      locate("./category.php?id='$id'");
    }
?>
