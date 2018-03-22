<?php
  include 'config.php';
  session_start();
  check_admin();

  //상품등록페이지에서 입력한 상품정보 변수에 저장
  $name = mysqli_real_escape_string($conn, $_POST['p_name']);
  $model = mysqli_real_escape_string($conn, $_POST['p_model']);
  $price = mysqli_real_escape_string($conn, $_POST['p_price']);
  $delivery = mysqli_real_escape_string($conn, $_POST['p_delivery']);
  $return = mysqli_real_escape_string($conn, $_POST['exchange']);
  $a_s = mysqli_real_escape_string($conn, $_POST['a/s']);
  //option list

  if(empty($name)||empty($model)||empty($price)||empty($delivery)||empty($return)||empty($a_s)){
    alert_back("필수 항목을 모두 입력하세요!");
  }else{
    if(empty($_FILES['p_image']['name'])){
      alert_back("대표 이미지가 입력되지 않았습니다!");
    } else if($_FILES['p_image']['name']>255){
      alert_back("대표 이미지 파일명이 너무 깁니다!");
    }
  }
  if(empty($_FILES['p_detailimg']['name'])){
    alert_back("상세정보 이미지가 입력되지 않았습니다!");
  } else if($_FILES['p_detailimg']['name']>255){
    alert_back("상세정보 이미지 파일명이 너무 깁니다!");
  }
  $sql = "INSERT INTO product (name,model,price,img,dt_img,delivery,exchange,a_s) VALUES ('$name','$model','$price','$img','$dt_img','$delivery','$return','$a_s')";
  query($sql);
  alert_url("상품 등록 성공","./dt_category.php?id={$id}&dt_id={$dt_id}");
 ?>
