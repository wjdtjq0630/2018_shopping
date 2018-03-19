<?php
  include 'config.php';
  session_start();
  check_admin();

  if(empty($_GET['id']) || empty($_GET['dt_id'])){
    alert_back('잘못된 접근입니다!');
  } else{
      $id = mysqli_real_escape_string($conn, $_GET['id']); //카테고리의 아이디 값
      $dt_id = mysqli_real_escape_string($conn, $_GET['dt_id']); //세부 카테고리의 아이디 값
      $sql = "SELECT * FROM category WHERE id='$id'";
      $row = mysqli_fetch_array(mysqli_query($conn, $sql));
  }
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title><?php echo "{$id}:{$row['name']}-{$dt_id}"; ?></title>
   </head>
   <body>
     <h4><?php echo "{$id}:{$row['name']}";?></h4>
     <h3><?php echo $dt_id;?></h3>
     <form class="" action="index.html" method="post">
       세부 카테고리명:<input type="text" name="dt_category_name" value="<?php echo $dt_id;?>">
       <input type="submit" value="변경하기">
     </form>
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
      <input type="button" value="뒤로가기" onclick="history.back();">
   </body>
 </html>
