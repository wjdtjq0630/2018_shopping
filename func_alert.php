<?php
  //경고창, url 이동을 위한 함수

  function alert($alert){ //경고창 출력
    echo "<script>alert('".$alert."');</script>";
  }
  function alert_url($alert,$url){
    echo "<script>alert('".$alert."'); location.href='".$url."';</script>";
  }
  function alert_back($alert){ //경고창 출력 후 url 이동
    echo "<script>alert('".$alert."'); history.back();</script>";
  }
  function locate($url){ //url 이동
    echo "<script>location.href='".$url."';</script>";
  }
  function check_log(){ //이미 로그인한 경우 메인 페이지로 이동
    if(isset($_SESSION['user_name']) || isset($_SESSION['user_id'])){
      alert_url('이미 로그인 하셨습니다.','./index.php');
    }
  }
  function check_unlog(){ //로그인 하지 않은 경우 로그인 페이지로 이동
    if(empty($_SESSION['user_name']) || empty($_SESSION['user_id'])){
      alert_url('로그인 후 이용하세요.','./login.php');
    }
  }
  function check_admin(){ //로그인하지 않았거나 관리자가 아닐 경우 돌려보냄
    if(empty($_SESSION['user_id'])){
      alert_url('로그인 후 이용하세요!','./login.php');
      } else if(empty($_SESSION['admin_id'])){
        alert_back('관리자 전용 페이지 입니다!');
      }
  }
 ?>
