<?php
  include 'config.php';
  session_start();
  check_log(); //로그인 확인
 ?>
 <form class="" action="logindb.php" method="post">
   <input type="text" name="login_id"><br>
   <input type="password" name="login_pw"><br>
   <input type="submit" value="login">
 </form>
