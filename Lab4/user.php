<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	
	session_start();
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(isset($_COOKIE[$username]) && $_COOKIE[$username] == $password)
	{
		$_SESSION['username']=$username;
		header("location:contact.php");
	}else
	{
		echo "Invalid User. Please Confirm Registration"."<br>";
		
	}
?>
	<a href="index.html"><button type="button">Go Back</button></a>
</body>
</html>