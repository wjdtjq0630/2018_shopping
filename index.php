<?php
  include 'config.php';
  session_start();

  if(isset($_SESSION['user_id']) && $_SESSION['user_name']){ //로그인 한 경우
    $user_id = htmlspecialchars($_SESSION['user_id']);
    $user_name = htmlspecialchars($_SESSION['user_name']);
    echo "{$user_name}({$user_id})님 환영합니다.<a href='./logout.php'>로그아웃</a>";
  } else{ //로그인 하지 않은 경우 로그인 링크 출력
    echo '<a href="./login.php">로그인</a> <a href="./join.php">회원가입</a>';
  }

 ?>
