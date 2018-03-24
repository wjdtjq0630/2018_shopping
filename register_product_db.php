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
  $a_s = mysqli_real_escape_string($conn, $_POST['a_s']);
  //option list

  if(empty($name)||empty($model)||empty($price)||empty($delivery)||empty($return)||empty($a_s)){
    alert_back("필수 항목을 모두 입력하세요!");
    exit;
  }

  if(empty($_FILES['p_img']['name'])){
    alert_back("대표 이미지가 입력되지 않았습니다!");
    exit;
  } else if(strlen($_FILES['p_img']['name'])>255){
    alert_back("대표 이미지 파일명이 너무 깁니다!");
    exit;
  }

  if(empty($_FILES['p_detail_img']['name'])){
    alert_back("상세정보 이미지가 입력되지 않았습니다!");
    exit;
  } else if(strlen($_FILES['p_detail_img']['name'])>255){
    alert_back("상세정보 이미지 파일명이 너무 깁니다!");
    exit;
  }

  $date = date("Y-m-d H:i:s",time());
  $img_dir = "./product_img/";
  $img_hash = md5($date.$_FILES['p_img']['name']);
  $img_upfile = $img_dir.$img_hash;
  if(is_uploaded_file($_FILES['p_img']['temp_name'])){
    if(!move_uploaded_file($_FILES['p_img']['temp_name'],$img_upfile)){
      alert_back("대표 이미지 이동 에러");
      exit;
    }
  } else{
    alert_back("대표 이미지 업로드 에러");
    exit;
  }

  $detail_dir = "./product_detail/";
  $detail_hash = md5($date.$_FILES['p_detail_img']['name']);
  $dt_upfile = $detail_dir.$detail_hash;
  if(is_uploaded_file($_FILES['p_detail_img']['temp_name'])){
    if(!move_uploaded_file($_FILES['p_detail_img']['temp_name'],$dt_upfile)){
      alert_back("상세 정보 이미지 이동 에러");
      exit;
    }
  } else{
      alert_back("상세 정보 이미지 업로드 에러");
      exit;
  }

  $sql = "INSERT INTO product (name,model,price,delivery,exchange,a_s) VALUES ('$name','$model','$price','$delivery','$return','$a_s')";
  query($sql);
  $sql = "INSERT INTO product_img (dir,dt_dir) VALUES ('$img_upfile','$dt_upfile')";
  query($sql);
  //alert_url("상품 등록 성공","./dt_category.php?id={$id}&dt_id={$dt_id}");

 ?>
