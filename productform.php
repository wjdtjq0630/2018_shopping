<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>상품등록</title>
  </head>
  <body>
    <form action="productdb.php" method="post" enctype="multipart/form-data">
      <select class="" name="">
        <?php
          $sql = "SELECT * FROM category";
          if($result = mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($result)){
              $cat = htmlspecialchars($row['name']);
              echo '<option value="'.$cat.'">'.$cat.'</option>';
            }
          }
         ?>
      </select>
      상품명:<input type="text" name="product_name"><br>
      상품가격:<input type="text" name="product_price"><br>
      상품 이미지<input type="file" name="product_image"><br>
      <input type="submit" value="등록하기">
    </form>
  </body>
</html>
