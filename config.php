<?php
  include 'func_alert.php';
  include 'func_sql.php';

  $db_host = "localhost";
  $db_user = "phoneshop";
  $db_password = "asdf1234";
  $db_name = "phoneshop";

  $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

  if(mysqli_connect_errno($conn)){
    echo "데이터베이스 연결 실패:".mysqli_connect_error();
  }

 ?>
