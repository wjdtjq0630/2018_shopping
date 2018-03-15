<?php
  include 'config.php';
  session_start();
  check_admin();

  $new_category = mysqli_real_escape_string($conn, $_POST['new_category']);

  $sql = "SELECT * FROM category";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if($new_category == ""){
    alert_back('카테고리 이름을 입력하세요!');
  } else if($num == 5){
    alert_back('카테고리는 최대 5개까지만 등록 가능합니다!');
  } else{
    $sql = "INSERT INTO category (name) VALUES ('$new_category')";
    query($sql);
    locate('./category_list.php');
  }
 ?>
