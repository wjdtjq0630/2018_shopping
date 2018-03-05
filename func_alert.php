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
 ?>
