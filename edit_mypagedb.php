<?php
  include 'config.php';
  session_start();
  check_unlog();

  $new_name = mysqli_real_escape_string($conn, $_POST['new_name']);
  $new_password = mysqli_real_escape_string($conn, $_POST['new_pw']);
  $check_password = mysqli_real_escape_string($conn, $_POST['check_pw']);
  $new_phn = mysqli_real_escape_string($conn, $_POST['new_phn']);
  $new_adr = mysqli_real_escape_string($conn, $_POST['new_adr']);
  $new_email = mysqli_real_escape_string($conn, $_POST['new_email']);

  if($new_password != $check_password){
    alert_back('비밀번호가 일치하지 않습니다!');
  }
 ?>
