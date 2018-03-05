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
        <input type="text" name="join_name" placeholder="이름"><br>
        <?php
          if(isset($_GET['checked_id'])){ //추후 post방식으로 변경할 것
            $join_id = htmlspecialchars($_GET['checked_id']);
            echo '<input type="text" name="join_id" placeholder="아이디" value="'.$join_id.'"><br>';
          }else{
            echo '<input type="text" name="join_id" placeholder="아이디"><br>';
          }
         ?>
        <input type="password" name="join_pw" placeholder="비밀번호"><br>
        <input type="password" name="check_pw" placeholder="비밀번호 확인"><br>
        <input type="text" name="join_phn" placeholder="휴대폰번호"><br>
        <input type="text" name="join_adr" placeholder="주소"><br>
        <input type="text" name="join_email" placeholder="이메일"><br>
        <input type="submit" value="가입하기">
      </form>
    </header>
  </body>
</html>
