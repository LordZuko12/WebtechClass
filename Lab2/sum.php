<!doctype html>
<html lang="en">

<head>
	<title>Registration Successful</title>
	
</head>
<body>
	<h3>"Registration Successful"</h3>
	<hr>
</body>
</html>
<?php

$user=$_POST['username'];
$pass=$_POST['password'];
$fname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender = $_POST['gender'];
$edulvl=$_POST['edulvl'];


echo "User Name: ".$user."<br>"."Full Name: ".$fname."<br>";
echo "Email: ".$email."<br>"."Phone: ".$phone."<br>";
echo "Password: ".$pass."<br>"."Gender: ".$gender."<br>";

echo "Education Level: ";
echo "<ul>";

foreach($edulvl as $edu){
	
	echo "<li>".$edu."</li>";
}

echo "</ul>";



?>