<?php
  include 'func_alert.php';
  include 'func_sql.php';

  $db_host = "localhost";
  $db_user = "phoneshop";
  $db_password = "asdf1234";
  $db_name = "phoneshop";

  $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

  mysqli_query($conn, "set session character_set_connection=utf8;");
  mysqli_query($conn, "set session character_set_results=utf8;");
  mysqli_query($conn, "set session character_set_client=utf8;");
  header('Content-Type: text/html; charset=utf-8');
  
  if(mysqli_connect_errno($conn)){
    echo "데이터베이스 연결 실패:".mysqli_connect_error();
  }

  ?>
