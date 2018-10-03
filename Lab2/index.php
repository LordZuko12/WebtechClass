<?php
?>

<!doctype html>
<html lang="en">

<head>
	<title>Registration</title>
	<style>
		form{
			margin: 50px 50px 50px 50px;
		}
	</style>
</head>
<body>
	
	<form name="login" method="post" action="sum.php">
		<fieldset>
			<legend>Registration</legend>
				UserName: <input type="text" name="username"><br><br>
				Full Name: <input type="text" name="fullname"><br><br>
				Email: <input type="text" name="email"><br><br>
				Phone: <input type="text" name="phone"><br><br>
				Password: <input type="password" name="password"><br><br>
				Re-Type Password: <input type="password" name="repassword"><br><br>
				Gender: Male <input type="radio" name="gender" value="male"> Female <input type="radio" name="gender" value="female"> Other <input type="radio" name="gender" value="other"><br><br>
				Education: <input type="checkbox" name="edulvl[]" value="hsc"> HSC
				<input type="checkbox" name="edulvl[]" value="ssc"> SSC
				<input type="checkbox" name="edulvl[]" value="jsc"> JSC
				<input type="checkbox" name="edulvl[]" value="psc"> PSC<br><br>
				
				<input type="submit" value="submit">
				<input type="reset" value="reset" style="margin: 10px">
		</fieldset>
	</form>
</body>
</html>





