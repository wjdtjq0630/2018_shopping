<?php
  include 'config.php';
  session_start();
  check_log(); //로그인 확인

  $login_id = mysqli_real_escape_string($_POST['login_id'],$conn);
  $login_pw = mysqli_real_escape_string($_POST['login_pw'],$conn);
  $sql = "SELECT * FROM user WHERE user_id='$login_id'";
  mysqli_row($sql,$user); //배열에 sql실행결과 담기 //아이디가 존재하지 않을 경우 경고창 출력 후 뒤로가기

  if($user['user_pw'] == $login_pw){ //비밀번호가 일치할 경우
    alert('로그인 성공');
    $_SESSION['user_id'] = $user['user_id']; //세션에 로그인 정보 저장
    $_SESSION['user_pw'] = $user['user_pw'];
    locate('./index.php');
  }
 ?>
