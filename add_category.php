<?php
  include 'config.php';
  session_start();
  check_admin();

  $new_category = mysqli_real_escape_string($conn, $_POST['new_category']);

  $sql = "SELECT * FROM category";
  $num = mysqli_num_rows(mysqli_query($conn, $sql)); //카테고리의 개수 가져옴

  if($new_category == ""){ //카테고리명 미입력시 뒤로가기
    alert_back('카테고리 이름을 입력하세요!');
  } else if($num == 5){ //카테고리가 5개일 경우 추가 불가능
    alert_back('카테고리는 최대 5개까지만 등록 가능합니다!');
  } else{ //그렇지 않을 경우 새로운 카테고리 추가
    $sql = "INSERT INTO category (name) VALUES ('$new_category')";
    query($sql);
    locate('./category_list.php');
  }
 ?>
