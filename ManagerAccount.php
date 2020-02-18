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
	<title> Quản lý tài khoản </title>
	<style>
		body{
			font-family: "Segoe UI", Calibri;
		}
		
		main{
			width:100%;
			height: 500px;
		}
		table{
			//width: 80%;
			font-size: 85%;
			border-collapse: collapse;
			
		}
		table, tr, td{
			border: 1px solid #cccccc;
			margin: 0 auto;
		}
		td{
			padding: 5px 10px;
		}
		tr:nth-child(even) {background-color: #f2f2f2}
		/*td input{
			background-color:rgba(0, 0, 0, 0);
			border: none;
			outline: none;
			margin : 0;
			box-sizing: border-box;
			width: 100%;
		}*/
		td button{
			border: none;
			background-color:rgba(0, 0, 0, 0);
			cursor: pointer;
			color: navy;
		}
		td button:hover{
			text-decoration: underline;
		}
	</style>
	<script>
		function show_confirm(){
			// build the confirm box
			var c=confirm("Are you sure you wish to delete?");

			// if true
			if (c){
				alert("true");
			 }else{ // if false
				alert("false");
			}
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
		<h1 style="font-weight: 300;text-align: center; color: ##555;"> Quản lý tài khoản </h1>
		<?php
			$result = false;
			if (strcasecmp($_SESSION["role"], "Admin")==0){
				$con = mysqli_connect("localhost", "root", "", "dsa");
				if (mysqli_connect_errno()){
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				
				mysqli_query($con, "set names 'utf-8'");
				mysqli_query($con,"set character_set_results='utf8'"); 
				$strSQL = "select * from account;";
				$result = mysqli_query($con, $strSQL);
				//$row = mysqli_fetch_row($result);
			}
		?>
		<form method="post" action="ManagerAccount.php">
		<table>
			<tr style="text-align: center;">
				<td>Username</td>
				<td>Password</td>
				<td>Email</td>
				<td>Họ tên</td>
				<td>Giới tính</td>
				<td>MSSV</td>
				<td>Trường</td>
				<td>Khóa</td>
				<td>Lớp</td>
				<td>Vai trò</td>
				<td colspan=2> Action </td>
			</tr>
			<?php
				
				function update($result){
					$i = 0;
					while ($row = mysqli_fetch_assoc($result)){
						echo '<tr>';
						$id = ""; $i = 0;
						foreach($row as $field) {
							if ($i == 0) $id = htmlspecialchars($field);
							echo '<td>' . htmlspecialchars($field) . '</td>';
							$i++;
						}
						//echo $id;
						echo '<td> <button> Message </button></td>';
						echo '<td> <button name= "delButton" value = "'.$id.'"> Delete </button></td>';
						echo '</tr>';
					}	
				}
				update($result);
				if (isset($_POST["delButton"])){
					
					$result = mysqli_query($con, "delete from account where username = '".$_POST["delButton"]."';");
					if ($result == false){
						echo "that bai";
					}
					else
						header("Location: ManagerAccount.php");
				}
				
			?>
			<?php
				//mysqli_free_result($result);
				mysqli_close($con);	
			?>
			
		</table>
		</form>
	
	
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