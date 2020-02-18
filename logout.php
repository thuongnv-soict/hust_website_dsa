<?php ob_start(); ?>
<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title> Cấu trúc dữ liệu và giải thuật </title>
</head>
<body>
	<?php
		unset($_SESSION["email"]);
		unset($_SESSION["username"]); 
		unset($_SESSION["fullname"]); ;
		unset($_SESSION["gender"]); 
		unset($_SESSION["studentid"]);
		unset($_SESSION["school"]);
		unset($_SESSION["course"]);
		unset($_SESSION["password"]);
		unset($_SESSION["role"]);
	?>
	<script language="javascript">
		window.open('HomePage.php', '_self');
	</script>
</body>
</html>
<?php ob_flush(); ?>