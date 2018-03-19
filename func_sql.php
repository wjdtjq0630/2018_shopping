<?php
  //sql문 관련 함수

  function query($sql){ //입력한 sql문 실행 후 결과에 따라 경고창 출력
    global $conn;
    $result = mysqli_query($conn, $sql);
    if(!$result){
      alert_back('query error');
    } else{
      alert('success');
    }
  }
  //사용 불가 오류 발생
  // function mysqli_row($sql){ //입력한 sql문 실행 후 결과를 배열에 넣음
  //   global $conn;
  //   $result = mysqli_query($conn, $sql);
  //   if(!$result){ //실행 결과가 없을 경우 경고창 출력 후 뒤로가기
  //     alert_back('error');
  //   } else{
  //       return mysqli_fetch_array($result);
  // }
  // }
  // function array_num_rows($sql){ //sql문 실행 후 변수에 행 개수를 넣음
  //   global $conn;
  //   $result = query($sql);
  //   return mysqli_fetch_array($result);
  // }
 ?>
