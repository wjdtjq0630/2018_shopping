<?php
  include 'config.php';
  session_start();
  check_unlog();
?>
<form class="" action="leavedb.php" method="post">
  비밀번호:<input type="password" name="pw" placeholder="비밀번호를 입력하세요">
  <input type="submit" value="탈퇴하기">
</form>
