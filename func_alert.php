<?php
  //알림, url 이동을 위한 함수

  function alert($alert){
    echo "<script>alert(".$alert.");</script>";
  }
  function alert_back($alert){
    echo "<script>alert('".$alert."'); history.back();</script>";
  }
  function location($url){
    echo "<script>location.href='".$url."';</script>";
  }
 ?>
