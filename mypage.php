<?php
  include 'config.php';
  session_start();
  check_unlog(); //로그인 안되었으면 로그인 페이지로

  $user_id = htmlspecialchars($_SESSION['user_id']); //회원 아이디
  $user_name = htmlspecialchars($_SESSION['user_name']); //회원명

  $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql)); //회원 정보를 배열에 저장
  $user_phn = htmlspecialchars($row['user_phn']); //회원 전화번호
  $user_adr = htmlspecialchars($row['user_adr']); //회원 주소
  $user_email = htmlspecialchars($row['user_email']); //회원 이메일
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>마이페이지-<?php echo $_SESSION['user_id']; ?></title>
   </head>
   <body>
     <h3>회원정보</h3>
     <form class="" action="edit_mypagedb.php" method="post">
       이름:<input type="text" name="new_name" value="<?php echo $user_name;?>"><br>
       아이디:<?php echo $user_id; ?><br>
       <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
       비밀번호:<input type="password" name="new_pw"><br>
       비밀번호 확인<input type="password" name="check_pw"><br>
       휴대폰 번호:<input type="text" name="new_phn" value="<?php echo $user_phn;?>"><br>
       주소:<input type="text" name="new_adr" value="<?php echo $user_adr;?>"><br>
       이메일:<input type="text" name="new_email" value="<?php echo $user_email;?>"><br>
       <input type="submit" value="변경"><input type="button" value="뒤로가기" onclick="history.back();">
     </form>
   </body>
 </html>
