<?php
  include 'config.php';
  session_start(); //세션 시작
  check_log(); //이미 로그인 한 경우 돌려보냄

  $join_name = mysqli_real_escape_string($conn,$_POST['join_name']); //회원 이름
  $join_id = mysqli_real_escape_string($conn,$_POST['join_id']); //회원 아이디
  $join_pw = mysqli_real_escape_string($conn,$_POST['join_pw']); //회원 비밀번호
  $check_pw = $_POST['check_pw']; //확인 비밀번호
  $join_phn = mysqli_real_escape_string($conn,$_POST['join_phn']); //회원 전화번호
  $join_adr = mysqli_real_escape_string($conn,$_POST['join_adr']);  //회원 주소
  $join_email = mysqli_real_escape_string($conn,$_POST['join_email']); //회원 이메일

  $sql = "SELECT * FROM user_info WHERE user_id='$join_id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  if(!$row){
    $sql = "INSERT INTO user_info (user_id,user_pw,user_phn,user_adr,user_email,user_name) VALUES ('$join_id','$join_pw','$join_phn','$join_adr','$join_email','$join_name')";
    query($sql); //입력한 아이디가 중복일 경우 뒤로가기
    locate('./login.php');
  } else{
    alert_back('이미 사용 중인 아이디입니다!');
  }
 ?>
