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
  //option list 입력 받을 것

  //필수 항목 입력 여부 확인
  if(empty($name)||empty($model)||empty($price)||empty($delivery)||empty($return)||empty($a_s)){
    alert_back("필수 항목을 모두 입력하세요!");
    exit;
  }

  //상품 이미지 입력 여부 및 파일명 길이 확인
  if(empty($_FILES['p_img']['name'])){
    alert_back("대표 이미지가 입력되지 않았습니다!");
    exit;
  } else if(strlen($_FILES['p_img']['name'])>255){
    alert_back("대표 이미지 파일명이 너무 깁니다!");
    exit;
  }

  //위와 동일
  if(empty($_FILES['p_detail_img']['name'])){
    alert_back("상세정보 이미지가 입력되지 않았습니다!");
    exit;
  } else if(strlen($_FILES['p_detail_img']['name'])>255){
    alert_back("상세정보 이미지 파일명이 너무 깁니다!");
    exit;
  }


  $date = date("Y-m-d H:i:s",time()); //현재 날짜 및 시간
  $img_dir = "./product_img/"; //대표 이미지 업로드할 폴더
  $img_hash = md5($date.$_FILES['p_img']['name']); //현재 날짜 및 시간과 파일명을 조합해 hash 값 생성
  $img_upfile = $img_dir.$img_hash; //업로드할 폴더와 파일명

  if(is_uploaded_file($_FILES['p_img']['temp_name'])){ //서버에 파일이 업로드 되었는지 확인
    if(!move_uploaded_file($_FILES['p_img']['temp_name'],$img_upfile)){ //업로드된 파일을 지정한 경로로 이동
      alert_back("대표 이미지 이동 에러"); //이동 실패시 경고창 출력 후 뒤로가기
      exit;
    }
  } else{
    alert_back("대표 이미지 업로드 에러"); //서버에 업로드 실패시 경고창 출력 후 뒤로가기
    exit;
  }

  $detail_dir = "./product_detail/"; //상세정보 이미지 업로드할 폴더
  $detail_hash = md5($date.$_FILES['p_detail_img']['name']); //현재 날짜 및 시간과 파일명을 조합해 hash 값 생성
  $dt_upfile = $detail_dir.$detail_hash; //업로드할 폴더와 파일명

  if(is_uploaded_file($_FILES['p_detail_img']['temp_name'])){ //
    if(!move_uploaded_file($_FILES['p_detail_img']['temp_name'],$dt_upfile)){
      alert_back("상세 정보 이미지 이동 에러");
      exit;
    }
  } else{
      alert_back("상세 정보 이미지 업로드 에러");
      exit;
  }

  $sql = "INSERT INTO product (name,model,price,delivery,exchange,a_s,category_id,dt_id) VALUES ('$name','$model','$price','$delivery','$return','$a_s','$category_id','$dt_id')";
  query($sql); //상품정보 테이블에 상품정보 삽입
  $sql = "INSERT INTO product_img (dir,dt_dir) VALUES ('$img_upfile','$dt_upfile')";
  query($sql); //상품 이미지 테이블에 이미지가 저장된 위치 삽입
  alert_url("상품 등록 성공","./dt_category.php?id={$id}&dt_id={$dt_id}"); //등록 성공시 경고창 출력 후 상품이 있는 카테고리 페이지로 이동

 ?>
