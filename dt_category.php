<?php
  include 'config.php';
  session_start();
  check_admin();

  if(empty($_GET['id']) || empty($_GET['dt_id'])){
    alert_back('잘못된 접근입니다!');
  } else{
      $id = mysqli_real_escape_string($conn, $_GET['id']);
      $dt_id = mysqli_real_escape_string($conn, $_GET['dt_id']);
  }
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>세부 카테고리 - <?php echo $dt_id; ?></title>
   </head>
   <body>
     <table border=1>
       <tr>
         <th>상품코드</th><th>상품명</th><th>모델명</th>
       </tr>
     <?php
      $sql = "SELECT * FROM product WHERE category_id='$id' AND dt_id='$dt_id'";
      if($result = mysqli_query($conn, $sql)){
        while($row = mysqli_fetch_array($result)){
          echo "<td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['model']}</td>"; //제품정보 테이블로 출력
        }
      }
      ?>
      </table>
   </body>
 </html>
