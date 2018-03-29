<?php
  include 'config.php';
  session_start();
  check_log(); //로그인 확인

  $login_id = mysqli_real_escape_string($conn,$_POST['login_id']); //아이디
  $login_pw = mysqli_real_escape_string($conn,$_POST['login_pw']); //비밀번호

  $sql = "SELECT * FROM user_info WHERE user_id='$login_id' AND user_pw='$login_pw'";
  $result = mysqli_query($conn, $sql);
  if($row = mysqli_fetch_array($result)){ //입력한 아이디와 비밀번호가 모두 일치하는 회원정보가 있으면 로그인
    $_SESSION['user_id'] = $row['user_id']; //세션 변수에 아이디와 회원명 저장
    $_SESSION['user_name'] = $row['user_name'];
    if(isset($row['admin'])){ //관리자일 경우 세션 변수에 관리자 등급 저장
      $_SESSION['admin'] = $row['admin'];
      alert_url("관리자 로그인 성공!","./admin.php"); //경고창 출력 후 관리자 페이지로 이동
    }
    alert_url("로그인 성공!","./index.php"); //일반회원일 경우 메인 페이지로 이동
  }else{
    alert_back("아이디 또는 비밀번호가 일치하지 않습니다!"); //일치하는 회원정보가 없으면 경고창 출력 후 뒤로가기
  }

 ?>
