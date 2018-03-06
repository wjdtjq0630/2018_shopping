<?php
  //sql문 관련 함수

  function query($sql){ //입력한 sql문 실행 후 결과에 따라 경고창 출력
    $result = mysqli_query($conn, $sql);
    if(!$result){
      alert_back('query error');
    } else{
      alert('success');
    }
  }
  function mysqli_row($sql,$array_name){ //입력한 sql문 실행 후 결과를 배열에 넣음
    $result = mysqli_query($conn, $sql);
    if(!$result){ //실행 결과가 없을 경우 경고창 출력 후 뒤로가기
      alert_back('error');
    }
    $array_name = mysqli_fetch_array($result);
  }
  function array_row_num($sql, $num){ //sql문 실행 후 변수에 행 개수를 넣음
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $num = mysqli_num_rows($row);
  }
 ?>
