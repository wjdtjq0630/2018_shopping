<?php
  include 'config.php';
  session_start();
  check_admin();
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>관리자 페이지</title>
   </head>
   <body>
     <ul>
       <li><a href="./category.php">카테고리 관리</a></li>
       <li><a href="./productform.php">상품 등록</a></li>
       <li><a href="./edit_product.php">상품 수정</a></li>
     </ul>
   </body>
 </html>
