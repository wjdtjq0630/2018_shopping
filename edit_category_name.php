<?php
  include 'config.php';
  session_start();
  check_admin();

  $category_id = mysqli_real_escape_string($conn, $_POST['category_id']); //해당 카테고리의 id
  $new_name = mysqli_real_escape_string($conn, $_POST['category_name']); //카테고리의 새로운 이름

  if(empty($new_name)){ //카테고리명 미입력시 뒤로가기
    alert_back("카테고리명을 입력하세요");
    exit;
  }

  $sql = "SELECT * FROM category WHERE name='$new_name'";
  if(mysqli_fetch_array(mysqli_query($conn, $sql))){ //새로운 카테고리명이 중복일 경우 뒤로가기
    alert_back('이미 존재하는 카테고리명 입니다!');
    exit;
  }

  $sql = "UPDATE category SET name='$new_name' WHERE id='$category_id'";
  query($sql); //해당 카테고리의 이름을 새로운 카테고리명으로 변경
  locate("./category.php?id={$category_id}"); //해당 카테고리 관리 페이지로 이동

 ?>
