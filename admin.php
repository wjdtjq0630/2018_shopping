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
       <h3>관리자 페이지</h3>
       <li><a href="./category_list.php">카테고리 관리</a></li>
       <li><a href="./register_product_form.php">상품 등록</a></li>
       <li><a href="./edit_product.php">상품 수정</a></li>
       <input type="button" value="메인 페이지" onclick="location.href='./index.php'">
     </ul>
   </body>
 </html>
