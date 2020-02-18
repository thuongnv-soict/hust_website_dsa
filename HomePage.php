<?php ob_start(); ?>
<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title> Cấu trúc dữ liệu và giải thuật </title>
	<style>
		body{
			font-family: "Segoe UI", Calibri;
			margin: auto;
		}
		img.logo{
			height: 60px;
			width: auto;
			//margin-top: 0px;
			float: left;
		}
		.button{
			cursor: pointer;
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
		.login{
			background-color: white;
			color: #ff6600;
		}
		.login:hover{
			background-color: #ff6600;
			color: white;
		}
		
		
		
		main{
			margin-top:10px;
			background: url(background2.png);
			width: 100%;
			height: 500px;
			background-size: cover;
			background-repeat: no-repeat;
			display: flex;
		}
		form{
			margin: 0 auto;
			width: 800px;
		}
		form input{
			font-family: Calibri;
			padding-left: 10px;
			margin-left: 200px;
			width: 350px;
			height: 40px;
			border-radius: 8px;
			margin-bottom: 10px;
			font-size: 20px;
			border: none;
		}

		form p{
			text-align: center;
			font-size: 40px;
			color: white;
		}
		form input.SignupButton{
			background-color: #ff6600;
			color: white;
			border: none;
			font-size: 17px;
		}
		
		
		footer{
			width:100%;
			height: 60px;
		}
		footer p{
			margin-left: 20px;
			color: #ff6600;
		}
		footer img{
			margin-left: 20px;
			//margin-top:10px;
			width: 30px;
			height: auto;
		}
		input:focus{
			outline-width : 0;
		}

	</style>

</head>
<body>
	<header>
		<!--<span class = "logo"> DSA </span>-->
		<a href="HomePage.php"><img class="logo" src="logo.png" alt="logo"/></a>
		<!--<button class="signup"> Sign Up </button>
		<button class="login"> Log In </button>  -->
		<input class="button signup" type="button" value="Sign Up" onclick="window.open('signup.php','_self');"/>
	</header>
	<!--<img src="background.png"/>-->
	<main>
		<form class="form" method="post" action="HomePage.php">
			<p> Log in to learn Data Structures and Argorithms </p> <br/>
			<input type="text" name="username" placeholder="Username" required/> <br/>
			<input type="password" name="password" placeholder="Password" required/> <br/>
			<input class="SignupButton"type="submit" name="login" value="Log In & Start Learning"/>
		</form>
	</main>
	<?php
		if (isset($_POST["login"])){
			$con = mysqli_connect("localhost", "root", "", "dsa");
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$username = $_POST["username"];
			mysqli_query($con, "set names 'utf-8'");
			mysqli_query($con,"set character_set_results='utf8'"); 
			$strSQL = "select * from account where username = '".$username."' and password = '".$_POST["password"]."';";
			if ($result = mysqli_query($con, $strSQL)){	
				if (mysqli_num_rows($result)>0){
					$row = mysqli_fetch_row($result);
					$fullname = $row[3];
					$email = $row[2];
					$_SESSION["email"] = $email;			//row 2
					$_SESSION["username"] = $username;   	//row 0
					$_SESSION["fullname"] = $fullname;		//row 3
					$_SESSION["gender"] = $row[4];
					$_SESSION["studentid"] = $row[5];
					$_SESSION["school"] = $row[6];
					$_SESSION["course"] = $row[7];
					$_SESSION["password"] = $row[1];		//row 1
					$_SESSION["class"] = $row[8];		//row 1
					$_SESSION["role"] = $row[9];
					echo $_SESSION["role"];
					header("Location: MainPage.php");
				}
				else{
					echo '<script type=text/javascript>';
					echo 'alert("Sai tên đăng nhập hoặc mật khẩu")';
					echo '</script>';
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