<?php ob_start(); ?>
<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="headerfooter.css"/>
	<link type="text/css" rel="stylesheet" href="account.css"/>
	<title> Thiết lập tài khoản </title>
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
			width: 1004px;
			
			margin: 0 auto;
			overflow: auto;
		}
		nav{		
			border: 1px solid black;
			width: 1000px;
			overflow: auto;
		}
		nav>form{
			float: left;
			width: 280px;
			border: 1px solid black;
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
		<h1 style="font-weight: 300;text-align: center; color: ##555;"> Thiết lập tài khoản </h1>
		<!--<div class="desc">
			<img src="./picture/signup-img.jpg" alt="Description"/>
		</div>-->
		<nav>
			<form method="post" action="AccountSetting.php"> 
				Email: <br/>
				<input type="email" name="email" value="<?php echo $_SESSION["email"] ?>" required/><br/>
				Họ và tên:<br/>
				<input type="text" name="fullname" value="<?php echo $_SESSION["fullname"] ?>" required/><br/>
				Giới tính:&nbsp;
				<select name="gender">
					<option value="Nam" <?php if ($_SESSION["gender"] == "Nam") echo "selected"?>> Nam </option>
					<option value="Nữ" <?php if ($_SESSION["gender"] == "Nữ") echo "selected"?>> Nữ </option>
					<option value="Khác" <?php if ($_SESSION["gender"] == "Khác") echo "selected"?>> Khác </option>
				</select>
				<br/>
				Mã số sinh viên:<br/>
				<input type="text" name="studentid" value="<?php echo $_SESSION["studentid"] ?>" /><br/>
				Trường:<br/>
				<input type="text" name="school" value="<?php echo $_SESSION["school"] ?>" /><br/>
				Khóa:&nbsp;
				<input type="number" name="khoa" value="<?php echo $_SESSION["khoa"] ?>" style="width: 45px;"/>
				&nbsp;Lớp:
				<input type="text" name="class" value="<?php echo $_SESSION["class"] ?>" style="width: 150px; float:right;"/><br/>
				<br/>
				<input type="submit" name="updateinfo" value="Cập nhật"/>
			</form>
			<form method="post" action="AccountSetting.php">
				Mật khẩu hiện tại: <span style="font-size: 80%; color: red;" id="currentpassword"> </span>
				<br/>
				<input type="password" name="currentpassword" required/><br/>
				Mật khẩu mới: <span> </span>
				<br/>
				<input type="password" name="password" required/><br/>
				Xác nhận mật khẩu: <span style="font-size: 80%; color: red;" id="confirmpass"> </span>
				<br/>
				<input type="password" name="confirmpassword" required/><br/>
				<input type="submit" name="changepassword" value="Đổi mật khẩu"/>
			</form>
		</nav>
	
	
	</main>
	<?php	
		if (isset($_POST["changepassword"])){
			echo $_SESSION["password"];
			if ($_POST["currentpassword"] != $_SESSION["password"]){
				echo '<script type=text/javascript>';
				echo 'document.getElementById("currentpassword").innerHTML="*Mật khẩu không đúng."';
				echo '</script>';
			}
			else if ($_POST["password"] != $_POST["confirmpassword"]){
				echo '<script type=text/javascript>';
				echo 'document.getElementById("confirmpass").innerHTML="*Xác nhận không đúng."';
				echo '</script>';
			}
			//echo $_POST["fullname"];
			else{
				$con = mysqli_connect("localhost", "root", "", "dsa");
				if (mysqli_connect_errno()){
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				mysqli_query($con, "set names 'utf-8'");
				mysqli_query($con,"set character_set_results='utf8'"); 
				mysqli_set_charset($con,"utf8");
				$strSQL = "update account set password = '".$_POST["password"]."' where username = '".$_SESSION["username"]."';";
				if ($result = mysqli_query($con, $strSQL)){	
					$effectrow = mysqli_affected_rows($con);
					if ($effectrow > 0){
						echo '<script type=text/javascript>';
						echo 'alert("Đổi mật khẩu thành công")';
						echo '</script>';
					}
					else{
						echo '<script type=text/javascript>';
						echo 'alert("Đổi mật khẩu thất bại")';
						echo '</script>';
					}
				}
				else {
					echo '<script type=text/javascript>';
					echo 'alert("Cannot SQL")';
					echo '</script>';
				}
				mysqli_close($con);			
			}
		}
		if (isset($_POST["updateinfo"])){
			$con = mysqli_connect("localhost", "root", "","dsa");
			mysqli_query($con, "set names 'utf-8'");
			mysqli_query($con,"set character_set_results='utf8'"); 
			mysqli_set_charset($con,"utf8");
			$strSQL = "update account set fullname = '".$_POST["fullname"]."',email='".$_POST["email"]."', studentid='".$_POST["studentid"]."', school='".$_POST["school"]."', gender='".$_POST["gender"]."', khoa='".$_POST["khoa"]."', class='".$_POST["class"]."' where username='".$_SESSION["username"]."';";
			if ($result = mysqli_query($con, $strSQL)){
				$effectrow = mysqli_affected_rows($con);
				if ($effectrow > 0){
					$_SESSION["email"] = $_POST["email"];
					$_SESSION["fullname"] = $_POST["fullname"];
					$_SESSION["gender"] = $_POST["gender"];
					$_SESSION["studentid"] = $_POST["studentid"];
					$_SESSION["school"] = $_POST["school"];
					$_SESSION["khoa"] = $_POST["khoa"];
					$_SESSION["class"] = $_POST["class"];
					echo '<script type=text/javascript>';
					echo 'alert("Cập nhật thông tin thành công")';
					echo '</script>';
					header("Location:AccountSetting.php");
				}
				else{
					echo '<script type=text/javascript>';
					echo 'alert("Cập nhật thông tin thất bại")';
					echo '</script>';
				}
			}
			else{
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