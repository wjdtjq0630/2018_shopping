<?php
  include 'config.php';
  session_start();
  check_log(); //로그인 확인

  $login_id = mysqli_real_escape_string($conn,$_POST['login_id']); //로그인 시 입력한 아이디와 비밀번호 변수에 저장
  $login_pw = mysqli_real_escape_string($conn,$_POST['login_pw']);

  $sql = "SELECT * FROM user_info WHERE user_id='$login_id'";
  if($row = mysqli_fetch_array(mysqli_query($conn,$sql))){
    if($row['user_pw'] == $login_pw){
      $_SESSON['user_id'] = $row['user_id'];
      $_SESSON['user_name'] = $row['user_name'];
      if($row['admin'] == 1){
        $_SESSION['admin_id'] = $row['user_id'];
        $_SESSION['admin_name'] = $row['user_name'];
        alert_url('관리자 로그인 성공!','./admin.php');
      }else{
        alert_url('로그인 성공!','./index.php');
      }
    } else{
        alert_back('비밀번호가 일치하지 않습니다!');
      }
  } else{
     alert_back('존재하지 않는 아이디 입니다!');
    }

 ?>
