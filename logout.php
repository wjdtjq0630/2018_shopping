<?php
  include 'config.php';
  session_start();

  if(empty($_SESSION['user_id']) || empty($_SESSION['user_name'])){
    alert_back('잘못된 접근입니다!');
  } else{
    session_destroy();
    alert_url('로그아웃 완료!','./index.php');
  }
 ?>
