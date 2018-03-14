<?php
  include 'config.php';
  session_start();

  if(isset($_SESSION['user_id']) && $_SESSION['user_name']){
    $user_id = htmlspecialchars($_SESSION['user_id']);
    $user_name = htmlspecialchars($_SESSION['user_name']);
    echo "{$user_name}({$user_id})님 환영합니다.";
    echo '<a href="./logout.php">로그아웃</a>';
  } else{
    echo '<a href="./login.php">로그인</a>';
  }

 ?>
