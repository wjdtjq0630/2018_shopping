<?php
  //경고창, url 이동을 위한 함수

  function alert($alert){ //경고창 출력
    echo "<script>alert(".$alert.");</script>";
  }
  function alert_back($alert){ //경고창 출력 후 url 이동
    echo "<script>alert('".$alert."'); history.back();</script>";
  }
  function locate($url){ //url 이동
    echo "<script>location.href='".$url."';</script>";
  }
  function check_log(){ //이미 로그인한 경우 메인 페이지로 이동
    if(isset($_SESSION['user_name'])){
      alert('이미 로그인 하셨습니다.');
      locate('./index.php');
    }
  function checkadmin(){ //관리자가 아닐 경우 돌려보냄
    if($_SESSION['user_name'] != "admin"){
      alert('관리자 전용 페이지 입니다.');
      locate('./index.php');
    }
  }
  }
 ?>
