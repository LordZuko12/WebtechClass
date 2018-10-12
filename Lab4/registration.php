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


<?php
	$name=$uname=$email=$password=$repassword=$phone=$gender=$edulvl="";
	$nameErr=$noEmpty=$emailErr=$passErr=$unameErr= $phoneErr = "";

	$buname = $bemail = $bname = $bpass = $bphone = $bgender = $bedu = false;
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
	    $uname = clean($_POST['username']);
	    $name = clean($_POST['fullname']);
	    $email = clean($_POST['email']);
	    $phone = clean($_POST['phone']);
	    $password = clean($_POST['password']);
	    $repassword = clean($_POST['repassword']);

        if(!isset($_REQUEST['gender'])){
            $noEmpty="Invalid Required Fields";
            $bgender = false;
        }
        else $bgender = true;

		if(!empty($uname) and isValidUserName($uname))
		{
			$buname = true;
		}else
		{
            $noEmpty="Invalid Required Fields";
            $buname = false;
		}
		
		if(!empty($name) and isValidName($name))
		{
			$bname = true;
		}else
		{
            $nameErr="Invalid Required Fields";
            $bname = false;
		}
		
		if(!empty($email) and isValidEmail($email))
		{
            $bemail = true;
		}else
        {
            $emailErr="Invalid Required Fields";
            $bemail = false;
		}

		if(!empty($phone) and isValidMobile($phone)){
            $bphone = true;
        }
        else{
            $bphone = false;
            $noEmpty="Invalid Required Fields";
        }
		
		if(empty($password) || empty($repassword))
		{
			$passErr="Invalid Required Fields";
			$bpass =false;
		}else if($password != $repassword){
            $passErr="Passwords are not same";
            $bpass =false;
        }else{
			$bpass = true;
		}

		$bedu = checkBox();


		if($bgender == true and $buname == true and $bname == true and $bphone == true and $bemail == true and $bpass == true and $bedu ==true)
		    saveUser();
	}
	
	function clean($d)
	{
		$d=trim($d);
		$d=stripcslashes($d);
		$d=htmlspecialchars($d);
		return $d;
	}

    function isValidUserName($name){
        if(preg_match('/^[a-z0-9_-]{5,100}$/', $name)){
            return true;
        }
        else {
            return false;
        }
    }

    function isValidName($name){
        if(preg_match('/^[A-Za-z]+(?:[ _-][A-Za-z]+)*$/', $name)){
            return true;
        }
        else{
            return false;
        }
    }

    function isValidEmail($email){
        if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',$email)){
            return true;
        }
        else{
            return false;
        }
    }

    function isValidMobile($m){
        str_replace(" ", "", $m);
        str_replace("-", "", $m);
        if(preg_match('/^(0088|\+88)?(01)[156789]{1}[0-9]{8}$/', $m)){
            return true;
        }
        else {
            return false;
        }
    }

    function checkBox(){
		
		if(isset($_POST['edu']))
		{
			$edu=$_POST['edu'];
			$cnt = 0;

			foreach($edu as $item) {
				$cnt++;
			}

			if($_SERVER["REQUEST_METHOD"] == "POST" and $cnt < 1) {
				$noEmpty = "Invalid Required Fields";
				return false;
			}

			else 
				return true;
			
		}else
			return false;
	}   
 ?>


<form name="registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
        <legend>Registration</legend>
        <p><span style="color:Tomato">* required field</span></p>
        UserName: <input type="text" name="username" value="<?php echo $uname ?>">
        <span style="color:Tomato">*<?php echo $noEmpty; ?></span><br><br>
        Full Name: <input type="text" name="fullname" value="<?php echo $name ?>">
        <span style="color:Tomato">*<?php echo $nameErr; ?></span><br><br>
        Email: <input type="text" name="email" value="<?php echo $email ?>">
        <span style="color:Tomato">*<?php echo $emailErr; ?></span><br><br>
        Phone: <input type="text" name="phone" value="<?php echo $phone ?>">
        <span style="color:Tomato">*<?php echo $noEmpty; ?></span><br><br>
        Password: <input type="password" name="password" value="<?php echo $password ?>">
        <span style="color:Tomato">*<?php echo $passErr; ?></span><br><br>
        Re-Type Password: <input type="password" name="repassword" value="<?php echo $repassword ?>">
        <span style="color:Tomato">*<?php echo $passErr; ?></span><br><br>

        Gender: <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender=="male") echo "checked";?>>Male
        <input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender=="female") echo "checked";?>>Female
        <input type="radio" name="gender" value="other" <?php if(isset($gender) && $gender=="other") echo "checked";?>>Other
        <span style="color:Tomato">*<?php echo $noEmpty; ?></span><br><br>

        Education: <input type="checkbox" name="edu[]" value="hsc"> HSC
        <input type="checkbox" name="edu[]" value="ssc"> SSC
        <input type="checkbox" name="edu[]" value="jsc"> JSC
        <input type="checkbox" name="edu[]" value="psc"> PSC
        <span style="color:Tomato">*<?php echo $noEmpty; ?></span><br><br>

        <input type="submit" value="submit">
        <!--<input type="reset" value="reset" style="margin: 10px">-->
    </fieldset>
</form>
	
<?php
/*function printInfo(){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $fname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender = $_POST['gender'];
    $edu=$_POST['edu'];
	
    echo "User Name: ".$user."<br>"."Full Name: ".$fname."<br>";
    echo "Email: ".$email."<br>"."Phone: ".$phone."<br>";
    echo "Password: ".$pass."<br>"."Gender: ". $gender . "<br>";
    echo "Education Level: ";
	echo "<ul>";
    foreach ($edu as $item) {
        echo "<li>" . $item . "</li>";
    }
	echo "</ul>";

}*/

function saveUser()
{
	$cookie_name=$_POST['username'];
	$cookie_value=$_POST['password'];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	
	echo "Registration Confirmed!!";
}
?>
	<a href="index.html"><button type="button">Go Back</button></a>
	<a href="login.php"><button type="button">Login</button></a>
</body>
</html>


