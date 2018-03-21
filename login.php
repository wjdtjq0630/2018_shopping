<html>
<head>
	<title>PhoneK's:login</title>
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
    <link rel="stylesheet" type="text/css" href="logincss.css">
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
				<li>
					<a href="/">갤럭시 시리즈</a>
				</li>
				<li>
					<a href="/">갤럭시 노트</a>
				</li>
				<li>
					<a href="/">아이폰 시리즈</a>
				</li>
				<li>
					<a href="/">LG 시리즈</a>
				</li>
				<li>
					<a href="/">기타</a>
				</li>
				<li class="right">
					<a href="/">회원가입</a>
				</li>
				<li class="right">
					<a href="/">로그인</a>
				</li>
			</ul>
		</div>
	</nav>
	<main>
	</main>
	<section class="login">
		<div class="container">
			<?php
			  include 'config.php';
			  session_start();
			  check_log(); //로그인 확인
			?>
			 <form class="lgform" action="logindb.php" method="post">
			   <input type="text" name="login_id"><br>
			   <input type="password" name="login_pw"><br>
			   <input type="submit" value="login"><a href="./join.php">회원가입</a>
			 </form>
		</div>
	</section>
	</body>
</html>
