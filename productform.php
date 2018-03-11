<?php
  include 'config.php';
  session_start();
  check_admin(); //관리자로 로그인 했는지 확인
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>상품등록</title>
  </head>
  <body>
    <form action="productdb.php" method="post" enctype="multipart/form-data">
      카테고리:
      <select class="" name="category">
        <?php
          $sql = "SELECT * FROM category ORDER BY id ASC"; //카테고리 목록을 id by 오름차순으로 불러옴
          if($result = mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($result)){
              echo '<option value="'.$row['id'].'">'.htmlspecialchars($row['name']).'</option>';
            }
          }
          //선택한 카테고리의 id값 변수에 저장
          $sql = "SELECT * FROM dt_category WHERE id='$id' ORDER BY id ASC";
          //mysqli_row($sql,$d_category); //선택한 카테고리의 세부 카테고리를 순서대로 $d_category에 저장
         ?>
      </select><br>
      상품명: <input type="text" name="p_name"><br>
      모델명: <input type="text" name="p_model"><br>
      상품가격: <input type="text" name="p_price"><br>
      상품이미지: <input type="file" name="p_image"><br>
      상품 상세정보: <input type="file" name="p_detailimg"><br>
      배송: <input type="text" name="p_delivery"><br>
      반품/교환: <input type="text" name="p_delivery"><br>
      A/S: <input type="text" name="p_delivery"><br>
      옵션: <input type="text" name="p_option"><br>
      <!-- 옵션 추가 기능 구현 할 것 -->
      <input type="submit" value="등록하기">
    </form>
  </body>
</html>
