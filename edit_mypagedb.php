<?php
  include 'config.php';
  session_start();
  check_unlog();

  $user_id = mysqli_real_escape_string($conn, $_POST['user_id']); //회원 아이디
  $new_name = mysqli_real_escape_string($conn, $_POST['new_name']); //새로운 이름
  $new_password = mysqli_real_escape_string($conn, $_POST['new_pw']); //새로운 비밀번호
  $check_password = mysqli_real_escape_string($conn, $_POST['check_pw']); //확인 비밀번호
  $new_phn = mysqli_real_escape_string($conn, $_POST['new_phn']); //새로운 휴대폰 번호
  $new_adr = mysqli_real_escape_string($conn, $_POST['new_adr']); //새로운 주소
  $new_email = mysqli_real_escape_string($conn, $_POST['new_email']); //새로운 이메일

  if(empty($new_name) || empty($new_password) || empty($check_password) || empty($new_phn) || empty($new_adr) || empty($new_email)){
    alert_back("필수항목을 모두 입력하세요!");
  }

  if($new_password != $check_password){ //새 비밀번호와 확인 비밀번호가 일치하지 않을 경우 뒤로가기
    alert_back('비밀번호가 일치하지 않습니다!');
  } else{
      $sql = "UPDATE user_info SET user_name='$new_name', user_pw='$new_password', user_phn='$new_phn', user_adr='$new_adr', user_email='$new_email' WHERE user_id='$user_id'";
      query($sql); //새로운 회원정보로 변경
      locate('./index.php'); //메인 페이지로 이동
    }
 ?>
