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
	<title> Main Page </title>
	<style>
		body{
			font-family: "Segoe UI", Calibri;
		}
		
		main{
			width:100%;
			height: 550px;
		}
		.desc{
			margin: 0 auto;
			width: 49%;
			//border: 1px solid black;
			float: left;
			//height: 490px;
		}
		
		.content{
			width: 80%;
			margin: 0 auto;
			margin-top: 80px;
			//border: 1px solid black;
			height: 30%;
			background-color: #fa0;
			transition: 0.5s;
		}
		.content:hover{
			background-color: #6666ff;
		}
		.content p{
			font-size: 1.5em;
			text-align: center;
			color: white;
			margin: 0.5em 2em;
		}
		.content div{
			text-align: center;
			width: 100px;
			margin: 20px auto;
			padding: 10px;
			color: white;
			background-color: rgba(0, 0, 0, 0.05);
			cursor: pointer;
		}
		div span{
		}
		.content img{
			height: 100px;
			width: auto; 
			display: block; 
			margin: 20px auto;
			padding-top: 20px;
		} 
	</style>
	<script>
		//document.getElementById('content').style.display="none";
		function hide(x){
			document.getElementById(x).style.display="none";
		}
		function show(x){
			document.getElementById(x).style.display="block";
		}
	</script>
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
	<main>
		<div class="desc">
			<div class="content">
				<img src="./picture/structure.png"/>
				<p> CẤU TRÚC DỮ LIỆU </p>
				<p style="font-size:1em;"> Trong khoa học máy tính, cấu trúc dữ liệu là một cách lưu dữ liệu trong máy tính sao cho nó có thể được sử dụng một cách hiệu quả. Trong thiết kế nhiều loại chương trình, việc chọn cấu trúc dữ liệu là vấn đề quan trọng. </p>
				
				<div onclick="window.open('DataStructure.php', '_self')">
					HỌC NGAY
				</div>
			</div>
		</div>
		<div class="desc">
			<div class="content">
				<img src="./picture/algorithms-book.png"/>
				<p> GIẢI THUẬT </p>
				<p style="font-size:1em;"> Giải thuật là một tập hợp hữu hạn của các chỉ thị hay phương cách được định nghĩa rõ ràng cho việc hoàn tất một số sự việc từ một trạng thái ban đầu cho trước, khi các chỉ thị này được áp dụng triệt để thì sẽ dẫn đến kết quả sau cùng như đã dự đoán.</p>
				
				<div onclick="window.open('Argorithm.php', '_self')">
					HỌC NGAY
				</div>
			</div>
		</div>
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