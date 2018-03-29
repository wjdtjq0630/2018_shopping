<?php
  include 'config.php';
  session_start();
  check_admin();

  $id = $_POST['category_id']; //카테고리 id
  $new_dt_category = mysqli_real_escape_string($conn, $_POST['new_dt_category']); //새로운 세부 카테고리명

  $sql = "SELECT * FROM dt_category WHERE id='$id' AND name='$new_dt_category'";
  if(mysqli_fetch_array(mysqli_query($conn, $sql))){
    alert_back('이미 존재하는 카테고리 입니다.'); //해당 카테고리가 존재할 경우 뒤로가기
  } else{
      $sql = "INSERT INTO dt_category (id,name) VALUES ('$id','$new_dt_category')";
      query($sql); //그렇지 않을 경우 카테고리 id 및 이름을 세부카테고리 테이블에 삽입
      locate("./category.php?id=$id");
    }
?>
