<?php

  $db_host = "localhost";
  $db_user = "phoneshop";
  $db_password = "asdf1234";
  $db_name = "phoneshop";

  $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name); //데이터베이스 접속

  mysqli_query($conn, "set session character_set_connection=utf8;"); //데이터베이스 인코딩 설정
  mysqli_query($conn, "set session character_set_results=utf8;");
  mysqli_query($conn, "set session character_set_client=utf8;");
  header('Content-Type: text/html; charset=utf-8'); //php문서 인코딩 설정

  include 'func_alert.php'; //경고창 관련 사용자 함수
  include 'func_sql.php'; //sql문 관련 사용자 함수

  if(mysqli_connect_errno($conn)){ //오류가 있을 경우 오류 내용 출력
    echo "데이터베이스 연결 실패:".mysqli_connect_error();
  }

  ?>
