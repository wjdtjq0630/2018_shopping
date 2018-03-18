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
    <script src="http://code.jquery.com/jquery-latest.js"></script>
  </head>
  <body>
    <form action="register_product_db.php" method="post" enctype="multipart/form-data">
      카테고리:
      <select class="" name="category">
        <?php
          $sql = "SELECT * FROM category ORDER BY id ASC"; //카테고리 목록을 id by 오름차순으로 불러옴
          if($result = mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($result)){
              echo '<option value="'.$row['id'].'">'.htmlspecialchars($row['name']).'</option>';
            }
          }
          //위에서 선택한 카테고리의 id값 변수에 저장
          $sql = "SELECT * FROM dt_category WHERE id='$id' ORDER BY id ASC";
          //mysqli_row($sql,$d_category); //선택한 카테고리의 세부 카테고리를 순서대로 $d_category에 저장
          //$d_category에 저장된 목록 select-option으로 출력
         ?>
      </select><br>
      상품명: <input type="text" name="p_name"><br>
      모델명: <input type="text" name="p_model"><br>
      상품 가격: <input type="text" name="p_price"><br>
      상품 대표이미지: <input type="file" name="p_image"><br>
      상품 상세정보: <input type="file" name="p_detailimg"><br>
      배송: <input type="text" name="p_delivery"><br>
      반품/교환: <input type="text" name="return"><br>
      A/S: <input type="text" name="a/s"><br>
      옵션:<input type="text" name="option1"><br>
      <!--버튼을 누르면 옵션을 추가하는 input 태그를 생성하는 javascript 코드 작성할 것
        name은 option1, option2, option3 이런 식으로...-->
      <input type="submit" value="등록하기"><a href="./admin.php">취소하기</a>
    </form>
  </body>
</html>
