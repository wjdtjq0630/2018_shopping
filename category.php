<?php
  include 'config.php';
  session_start();
  check_admin();

  $id = htmlspecialchars($_GET['id']);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>카테고리 - <?php echo $name;?></title>
  </head>
  <body>
      <form class="" action="add_dt_category.php" method="post"> <!--새로운 세부 카테고리 등록 -->
        새로운 세부 카테고리:<input type="text" name="new_dt_category"><br>
        <input type="hidden" name="category_id" value="<?php echo $id ?>">
        <input type="submit" value="등록하기">
      </form>
      <?php
        $sql = "SELECT * FROM dt_category WHERE id='$id'";
        if($result = mysqli_query($conn, $sql)){
          while($row = mysqli_fetch_array($result)){
            echo "<a href='./dt_category.php?id={$row['id']}'>{$row['id']}: {$row['name']}</a>";
          }
        }
       ?>
  </body>
</html>
