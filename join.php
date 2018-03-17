<?php
  include 'config.php';
  session_start();
  check_log();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>shopping</title>
    <link rel="stylesheet" href="/css/master.css">
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
    <header>
      <form class="" action="joindb.php" method="post">
        이름:<input type="text" name="join_name" placeholder="이름"><br>
        아이디:<input type="text" name="join_id" placeholder="아이디"><br>
        비밀번호:<input type="password" name="join_pw" placeholder="비밀번호"><br>
        비밀번호 확인<input type="password" name="check_pw" placeholder="비밀번호 확인"><br>
        휴대폰 번호:<input type="text" name="join_phn" placeholder="휴대폰번호"><br>
        주소:<input type="text" name="join_adr" placeholder="주소"><br>
        이메일:<input type="text" name="join_email" placeholder="이메일"><br>
        <input type="submit" value="가입하기"><a href="./index.php">메인 페이지</a>
      </form>
    </header>
  </body>
</html>
