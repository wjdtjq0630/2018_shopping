<!-- 사용하지 않음 -->
<?php
  include 'config.php';
  session_start();
  //check_admin();

  $sql = "SELECT * FROM product_opt WHERE product_id='$product_id'";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>옵션 추가하기</title>
  </head>
  <body>
    <form class="" action="add_optiondb.php" method="post">
      <input type="text" name="add_option_name"><br>
      <input type="submit" value="추가">
    </form>
  </body>
</html>
