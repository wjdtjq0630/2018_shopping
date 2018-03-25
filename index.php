<?php
  include 'config.php';
  session_start();
 ?>
<html>
<head>
	<title>PhoneK's</title>
	<meta charset="utf-8">
	<meta name="robots" content="noodp, FOLLOW, INDEX">
	<meta name="description" content="multiCore">
	<meta name="keywords">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="theme-color" content="#FFA700">
	<link rel="shortcut icon" type="image/x-icon" href="/images/icon.png">
	<link rel="apple-touch-icon-precomposed" href="/images/icon_appletouch.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<link name="msapplication-TileImage" href="/images/icon_metrotile.png">
    <link rel="stylesheet" type="text/css" href="/public/css/essential.css">
    <link rel="stylesheet" type="text/css" href="/public/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="http://www.multicore.kr/public/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="private.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="/public/javascript/essential.js"></script>
    <script type="text/javascript" src="private.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<a href="/">
				<span id="logo">PhoneK's</span>
			</a>
		</div>
	</header>
	<nav>
		<div class="container">
			<ul>
        <?php
          $sql = "SELECT * FROM category";
          if($result = mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($result)){
              echo "<li><a href='./sdf.php?id={$row['id']}'>{$row['name']}</a></li>";
            }
          }
         ?>
        <?
          if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){ //로그인 한 경우
            $user_id = htmlspecialchars($_SESSION['user_id']);
            $user_name = htmlspecialchars($_SESSION['user_name']);
            echo "<li class='right'><a href='./logout.php'>로그아웃</a></li><li class='right'><a href='./mypage.php'>{$user_name}({$user_id})</a></li>";
            if($user_id == "admin"){
              echo '<li class="right"><a href="./admin.php">관리자 페이지</a></li>';
            }
          } else{ //로그인 하지 않은 경우 로그인 링크 출력
            echo '<li class="right"><a href="./join.php">회원가입</a></li>
    				<li class="right"><a href="./login.php">로그인</a></li>';
          }
        ?>
			</ul>
		</div>
	</nav>
	<main>
		<section class="sc-1">
			<div class="container">
			</div>
		</section>
		<section class="sc-2">
			<div class="container">
			</div>
		</section>
		<section class="sc-3">
			<div class="container">
				<div id="sc-3A">
					<span class="sc-3s">
						BEST 50
					</span>
				</div>
				<div id="sc-3B">
					<span class="sc-3s">
						이벤트 상품
					</span>
				</div>
				<div id="sc-3C">
					<span class="sc-3s">
						할인 상품
					</span>
				</div>

			</div>
		</section>
	</main>
</body>
</html>
