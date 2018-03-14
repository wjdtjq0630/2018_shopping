<?php
  include 'config.php';
  session_start();

  if(empty($_SESSION['user_id']) || empty($_SESSION['user_name'])){ //로그인 하지 않은 상태일 경우
    alert_back('잘못된 접근입니다!'); //경고창 출력 후 뒤로가기
  } else{ //로그인한 상태일 경우
    session_destroy(); //세션을 삭제한다.
    alert_url('로그아웃 완료!','./index.php'); //완료 알림 출력 후 메인 페이지로 이동
  }
 ?>
