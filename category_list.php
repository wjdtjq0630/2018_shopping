<?php
  include 'config.php';
  session_start();
  check_admin();
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>카테고리 관리</title>
   </head>
   <body>
     <h3>카테고리 목록</h3>
     <form class="" action="add_category.php" method="post"> <!--새로운 카테고리를 등록-->
       새로운 카테고리:<br><input type="text" name="new_category"><br>
       <input type="submit" value="등록하기">
     </form>
         <?php //카테고리로 이동
            $sql = "SELECT * FROM category";
            if($result = mysqli_query($conn, $sql)){
                while($row = mysqli_fetch_array($result)){
                  echo "<a href='./category.php?id={$row['id']}'>{$row['id']}: {$row['name']}</a><br>";
                }
            }
          ?>
    <a href="./admin.php">관리자 메인페이지</a>
   </body>
 </html>
