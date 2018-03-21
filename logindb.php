<?php
  include 'config.php';
  session_start();
  check_log(); //로그인 확인

  $login_id = mysqli_real_escape_string($conn,$_POST['login_id']); //로그인 시 입력한 아이디와 비밀번호 변수에 저장
  $login_pw = mysqli_real_escape_string($conn,$_POST['login_pw']);

  $sql = "SELECT * FROM user_info WHERE user_id='$login_id' AND user_pw='$login_pw'";
  $result = mysqli_query($conn, $sql);
  if($row = mysqli_fetch_array($result)){
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_name'] = $row['user_name'];
    if($row['admin'] == 1){
      $_SESSION['admin'] = $row['admin'];
      alert_url("관리자 로그인 성공!","./admin.php");
    }
    alert_url("로그인 성공!","./index.php");
  }else{
    alert_back("아이디 또는 비밀번호가 일치하지 않습니다!");
  }

 ?>
