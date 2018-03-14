<?php
  include 'config.php';
  session_start(); //세션 시작
  check_log(); //이미 로그인 한 경우 돌려보냄

  $join_name = mysqli_real_escape_string($conn,$_POST['join_name']);
  $join_id = mysqli_real_escape_string($conn,$_POST['join_id']);
  $join_pw = mysqli_real_escape_string($conn,$_POST['join_pw']);
  $check_pw = $_POST['check_pw'];
  $join_phn = mysqli_real_escape_string($conn,$_POST['join_phn']);
  $join_adr = mysqli_real_escape_string($conn,$_POST['join_adr']);
  $join_email = mysqli_real_escape_string($conn,$_POST['join_email']);

  $sql = "SELECT * FROM user_info WHERE user_id='$join_id'";
  if(!$result = mysqli_query($conn, $sql)){
    $sql = "INSERT INTO user_info (user_id,user_pw,user_phn,user_adr,user_email,user_name) VALUES ('$join_id','$user_pw','$join_phn','$join_adr','$user_email','$join_name')";
    query($sql);
    locate('./login.php');
  } else{
    alert_back('이미 사용중인 아이디 입니다.');
  }
 ?>
