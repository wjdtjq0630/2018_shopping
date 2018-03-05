<?php
  //sql문 관련 함수

  function query($sql){
    $result = mysqli_query($conn, $sql);
    if(!$result){
      alert_back('query error');
    } else{
      alert('success');
    }
  }
  function mysqli_row($sql,$array_name){
    $result = mysqli_query($conn, $sql);
    $array_name = mysqli_fetch_array($result);
  }
  function array_row_num($sql){
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $num = mysqli_num_rows($row);
  }
 ?>
