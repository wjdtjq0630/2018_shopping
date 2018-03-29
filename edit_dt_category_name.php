<?php
  include 'config.php';
  session_start();
  check_admin();

  $category_id = mysqli_real_escape_string($conn, $_POST['category_id']); //카테고리 id
  $dt_id = mysqli_real_escape_string($conn, $_POST['dt_category_name']); //세부 카테고리명
  $new_name = mysqli_real_escape_string($conn, $_POST['new_name']); //새로운 세부 카테고리명

  if(empty($new_name)){ //세부 카테고리명 미입력시 뒤로가기
    alert_back("카테고리명을 입력하세요");
    exit;
  }

  $sql = "SELECT * FROM dt_category WHERE id='$category_id' AND name='$new_name'";
  if(!mysqli_num_rows(mysqli_query($conn, $sql))){ //새로운 세부카테고리명이 중복인지 확인
    $sql = "UPDATE dt_category SET name='$new_name' WHERE id='$category_id' AND dt_id='$dt_id'";
    query($sql); //해당 세부 카테고리명을 입력한 값으로 변경
    locate("./dt_category.php?id={$category_id}&dt_id={$dt_id}");
    exit;
  } else{ //중복일 경우 뒤로가기
    alert_back('카테고리에 같은 이름의 세부 카테고리가 이미 존재합니다!');
    exit;
  }
 ?>
