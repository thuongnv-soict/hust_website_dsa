<?php ob_start(); ?>
<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="headerfooter.css"/>
	<title> Warning </title>
	<style>
		body{
			font-family: "Segoe UI", Calibri;
			margin: auto;
		}
		.button{
			border:1px solid #ff6600;
			font-size: 15px;
			padding: 10px;
			margin-top: 12px;
			margin-right: 40px;
			float: right;
			border-radius: 5px;
			transition-duration: 0.2s;
		}
		.signup{
			background-color: #ff6600;
			color: white;
		}
		main{
			color: #279;
			height: 450px;
		}
		main>img{
			margin: 0 auto;
			display: block;
			width: 300px; 
			height: auto;
		}

	</style>

</head>
<body>
	<header>
		<!--<span class = "logo"> DSA </span>-->
		<a href="HomePage.php"><img class="logo" src="logo.png" alt="logo"/></a>
		<!--<button class="signup"> Sign Up </button>
		<button class="login"> Log In </button>  -->
		<input class="button signup" type="button" value="Log in" onclick="window.open('HomePage.php','_self')"/>
	</header>
	<main> 
		<h1 style="font-weight: 300;text-align: center; color: ##555;"> Bạn chưa đăng nhập </h1>
		<h2 style="font-weight: 300;text-align: center; color: ##555;"> Hãy quay lại <a style="text-decoration: none;" href="HomePage.php">trang chủ</a> và đăng nhập để bắt đầu học </h2>
		<img src="./picture/smile.jpg" alt="Smile"/>
	</main>
	
	<footer>
		<p>Contact us</p>
		<img src="facebook.png" alt="facebook"/>  
		<img src="Mail.png" alt="facebook"/>
		<img src="phone.png" alt="facebook"/>
		
	</footer>
	

</body>
</html>
<?php ob_flush(); ?>