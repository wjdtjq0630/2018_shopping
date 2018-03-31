<?php
  include 'config.php';
  session_start();
  check_unlog(); //로그인하지 않았을 경우 로그인 페이지로 이동

  $pw = mysqli_real_escape_string($conn, $_POST['pw']); //입력한 비밀번호

  $user_id = $_SESSION['user_id']; //회원의 아이디
  $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql)); //회원정보를 불러옴

  if($pw == $row['user_pw']){
    $sql = "DELETE FROM user_info WHERE user_id='$user_id'";
    query($sql); //비밀번호가 일치할 경우 회원정보를 삭제
    session_destroy(); //로그아웃
    locate("./index.php"); //메인 페이지로 이동
    exit;
  } else{
    alert_back("비밀번호가 일치하지 않습니다!"); //일치하지 않을경우 뒤로가기
    exit;
  }
 ?>
