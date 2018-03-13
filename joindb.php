<?php
  include 'config.php';
  session_start();
  check_log();

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
    //history.back();해주면 결과 값 같이 넘어감
    //locate("./join.php?checked_id=$join_id"); //아이디 중복시 중복인 아이디 되돌려주기 //추후 post방식으로 변경할 것
  }
 ?>
