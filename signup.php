<?php ob_start(); ?>
<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="headerfooter.css"/>
	<title> Đăng ký </title>
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
			//height: 550px;
			width: 1000px;
			
			margin: 0 auto;
			overflow: auto;
		}
		nav{		
			background-image: url(./picture/signup-img.jpg);
			background-repeat: no-repeat;
			background-position: left top;
			background-size: auto 100%;
			background-color: #f2f2f2;
			//border: 1px solid black;
			width: 1000px;
			overflow: auto;
		}
		nav>form{
			float: right;
			width: 280px;
			//border: 1px solid black;
			padding: 20px 30px;
			font-size: 0.8em;
			font-weight: 600;
		}
		nav form input{
			width: 280px;
			height: 25px;
			margin-top: 5px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
		}
		nav>form>select{
			width: 100px;
			height: 25px;
			margin-top: 10px;
			margin-bottom: 20px;
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
		<h1 style="font-weight: 300;text-align: center; color: ##555;"> Tạo tài khoản mới </h1>
		<!--<div class="desc">
			<img src="./picture/signup-img.jpg" alt="Description"/>
		</div>-->
		<nav>
			<form method="post" action="signup.php"> 
				Tên tài khoản: <span style="font-size: 80%; color: red;" id="user"> </span>
				<br/>
				<input type="text" name="username" maxlength="50" required/><br/>
				Mật khẩu: <span> </span>
				<br/>
				<input type="password" name="password" required/><br/>
				Xác nhận mật khẩu: <span style="font-size: 80%; color: red;" id="confirmpass"> </span>
				<br/>
				<input type="password" name="confirmpassword" required/><br/>
				Email: <br/>
				<input type="email" name="email" required/><br/>
				Họ và tên:<br/>
				<input type="text" name="fullname" required/><br/>
				Giới tính:&nbsp;
				<select name="gender">
					<option value="Nam"> Nam </option>
					<option value="Nữ"> Nữ </option>
					<option value="Khác"> Khác </option>
				</select>
				<br/>
				Mã số sinh viên:<br/>
				<input type="text" name="studentid"/><br/>
				Trường:<br/>
				<input type="text" name="school"/><br/>
				Khóa:&nbsp;
				<input type="number" name="course" style="width: 45px;"/>
				&nbsp;Lớp:
				<input type="text" name="class" style="width: 150px; float:right;"/><br/>
				<br/>
				<input type="submit" name="signup" value="Đăng ký"/>
			</form>
		</nav>
	
	
	</main>
	<?php
		if (isset($_POST["signup"])){
			$con = mysqli_connect("localhost", "root", "", "dsa");
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if ($_POST["password"] != $_POST["confirmpassword"]){
				echo '<script type=text/javascript>';
				echo 'document.getElementById("confirmpass").innerHTML="*Xác nhận không đúng."';;
				echo '</script>';
			}
			//echo $_POST["fullname"];
			mysqli_query($con, "set names 'utf-8'");
			mysqli_query($con,"set character_set_results='utf8'"); 
			mysqli_set_charset($con,"utf8");
			$username = $_POST["username"];
			$strSQL = "select * from account where username = '".$username."';";
			if ($result = mysqli_query($con, $strSQL)){	
				if (mysqli_num_rows($result)>0){
					echo '<script type=text/javascript>';
					echo 'document.getElementById("user").innerHTML="*Tên tài khoản đã tồn tại."';
					echo '</script>';
				}
				else{
					if (empty($_POST["course"])){
						$strSQL="insert into account values ('".$username."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["fullname"]."','".$_POST["gender"]."','".$_POST["studentid"]."','".$_POST["school"]."',NULL,'".$_POST["class"]."',NULL);";
					}
					else 
						$strSQL="insert into account values ('".$username."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["fullname"]."','".$_POST["gender"]."','".$_POST["studentid"]."','".$_POST["school"]."',".$_POST["course"].",'".$_POST["class"]."', NULL);";
					//echo $strSQL;
					mysqli_query($con, $strSQL);
					$effectrow = mysqli_affected_rows($con);
					if ($effectrow > 0) {
						echo '<script type=text/javascript>';
						echo 'alert("Đăng kí thành công")';
						echo '</script>';
					}
					//header("Location: HomePage.php");
				}
				 mysqli_free_result($result);
			}
			else {
				echo '<script type=text/javascript>';
				echo 'alert("Cannot SQL")';
				echo '</script>';
			}
			mysqli_close($con);			
		}
	
	
	
	?>
	
	<footer>
		<p>Contact us</p>
		<a href="https://www.facebook.com/thuong.williamhenry" target="_blank"><img src="facebook.png" alt="facebook"/> </a> 
		<img src="Mail.png" alt="facebook"/>
		<img src="phone.png" alt="facebook"/>
		
	</footer>
	

</body>
</html>
<?php ob_flush(); ?>