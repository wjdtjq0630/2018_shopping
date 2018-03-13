<?php
  include 'config.php';
  session_start();
  check_log(); //로그인 확인

  $login_id = mysqli_real_escape_string($conn,$_POST['login_id']); //로그인 시 입력한 아이디와 비밀번호 변수에 저장
  $login_pw = mysqli_real_escape_string($conn,$_POST['login_pw']);

  $sql = "SELECT * FROM user_info WHERE user_id='$login_id'";
  $result = mysqli_query($conn, $sql); //입력한 아이디에 해당하는 회원정보가 존재하는가?
  if(!$result){ //아이디가 존재하지 않을 경우 경고창 출력 후 뒤로가기
    alert_back('존재하지 않는 아이디 입니다!');
  } else{//아이디가 존재하면 해당 아이디의 회원정보를 배열에 담는다.
      $user = mysqli_fetch_array($result);

      if($user['user_pw'] == $login_pw){ //저장한 회원정보와 비밀번호가 일치할 경우
        $_SESSION['user_id'] = $user['user_id']; //세션에 회원정보 저장
        $_SESSION['user_pw'] = $user['user_pw'];
        alert_url('로그인 성공','./index.php'); //알림창 출력 후 메인 페이지로 이동
      } else{ //비밀번호가 일치하지 않을 경우
        alert_back('비밀번호가 일치하지 않습니다.'); //알림창 출력 후 뒤로가기
      }
    }
 ?>
