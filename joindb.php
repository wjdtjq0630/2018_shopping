<?php
  include 'config.php';

  $join_name = mysql_real_escape_string($_POST['join_name'],$conn);
  $join_id = mysql_real_escape_string($_POST['join_id'],$conn);
  $join_pw = mysql_real_escape_string($_POST['join_pw'],$conn);
  $join_phn = mysql_real_escape_string($_POST['join_phn'],$conn);
  $join_adr = mysql_real_escape_string($_POST['join_adr'],$conn);
  $join_email = mysql_real_escape_string($_POST['join_email'],$conn);

  $sql = "SELECT * FROM user WHERE user_id='$join_id'";
  $result = mysqli_query($conn, $sql);
  if($result){
    alert_back('이미 사용중인 아이디 입니다.');
  }
  mysqli_row()
  $sql = "INSERT INTO user (user_name,user_id,user_pw,user_phn,user_adr,user_email)
       VALUES ('$join_name','$join_id','$user_pw','$join_phn','$join_adr','$user_email')";
  query($sql);
  locate('./login.php');
 ?>
