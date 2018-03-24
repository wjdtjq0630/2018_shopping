<?php
  include 'config.php';
  session_start();
  check_admin();

  if(empty($_GET['id'])){
    alert_back('잘못된 접근입니다.');
  }

  $id = htmlspecialchars($_GET['id']);
  $sql = "SELECT * FROM category WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $category = mysqli_fetch_array($result);
  $name = $category['name'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>카테고리 <?php echo $id.':'.$name;?></title>
  </head>
  <body>
    <h3><?php echo "{$id}:{$name}" ?></h3>
    <form class="" action="edit_category_name.php" method="post">
      <input type="hidden" name="category_id" value="<?php echo $id;?>">
      카테고리 이름:<input type="text" name="category_name" value="<?php echo $name;?>"><input type="submit" value="변경하기">
    </form>
      <?php
        $sql = "SELECT * FROM dt_category WHERE id='$id'";
        if($result = mysqli_query($conn, $sql)){
          while($row = mysqli_fetch_array($result)){
            echo "<a href='./dt_category.php?id={$row['id']}&dt_id={$row['name']}'>{$row['name']}</a><br>";
          }
        }
       ?>
       <form class="" action="add_dt_category.php" method="post"> <!--새로운 세부 카테고리 등록 -->
         새로운 세부 카테고리:<input type="text" name="new_dt_category">
         <input type="hidden" name="category_id" value="<?php echo $id;?>">
         <input type="submit" value="등록하기">
       </form>
       <input type="button" value="뒤로가기" onclick='location.href="category_list.php"'>
  </body>
</html>
