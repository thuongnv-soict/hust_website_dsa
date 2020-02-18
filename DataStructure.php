<?php ob_start(); ?>
<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="MainPage.css"/>
	<link type="text/css" rel="stylesheet" href="headerfooter.css"/>
	<link type="text/css" rel="stylesheet" href="account.css"/>
	<title id="title"> Cấu trúc dữ liệu </title>
	<style>
		
	</style>
	<script src="path.js"> </script>
</head>
<body>
	<?php
		if (empty($_SESSION["username"])){
			header("Location:signout.php");
		}
	?>
	<header>
		<a href="MainPage.php"><img class="logo" src="logo.png" alt="logo"/></a>
		<div class="account">
			<img class="avatar" src="avatar.png" alt="Avatar"/>
			<div class="name">
				<?php 
					echo $_SESSION["fullname"];
				?>
			</div>
			<div class="account_detail">
				<img src="avatar.png" style="float: left; "width="50px" height="50px" alt="Avatar"/>
				<span> <?php echo $_SESSION["fullname"];?> </span>
				<span style="font-size: 80%;"> <?php echo $_SESSION["email"];?> </span>
				<hr/>
				<a href="AccountSetting.php"> Account Setting... </a>
				<?php
					if (strcasecmp($_SESSION["role"], "Admin")==0){
						echo "<a href=\"ManagerAccount.php\"> Manage account for administrator... </a>";
						//echo "Van Thuong";
					}
				?>
				<a href="logout.php"> Log Out... </a>
			</div>
		</div>
	</header>
<!--	<p class="path"> Home -&gt; Giải thuật -&gt; Các khái niệm cơ bản </p>-->
	<div class="path"> 
		<span id="link"> <a href="MainPage.php">Home</a> -> Cấu trúc dữ liệu -> Các khái niệm cơ bản</span>
	</div>
	<main>
		<nav>
			<a id = "0" href="###"> Cấu trúc dữ liệu </a>
			<a id = "1" class="active" href="Array.html" target="section" onclick="active(this.id)"> Mảng </a> 
			<a id = "2" href="List.html" target="section" onclick="active(this.id)"> Danh sách liên kết </a> 
			<a id = "3" href="Stack.html" target="section" onclick="active(this.id)"> Ngăn xếp </a>
			<a id = "4" href="Queue.html" target="section" onclick="active(this.id)"> Hàng đợi </a> 
			<a id = "5" href="Tree.html" target="section" onclick="active(this.id)"> Cây </a> 
			<a id = "6" href="###" onclick="active(this.id)"> Đồ thị </a>
		</nav>
		<section>
			<iframe src="Array.html" name="section"></iframe>
		</section>
	</main>
	
	
	<footer>
		<p>Contact us</p>
		<a href="https://www.facebook.com/thuong.williamhenry" target="_blank"><img src="facebook.png" alt="facebook"/> </a> 
		<img src="Mail.png" alt="facebook"/>
		<img src="phone.png" alt="facebook"/>
	</footer>
</body>
</html>
<?php ob_flush(); ?>		