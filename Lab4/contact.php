<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LabTask1</title>
    <style>
        body{
            font-family: Verdana;
        }
        a{
            text-decoration: none;
            color: white;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        label{
            padding: 30px 50px 30px 500px;

        }
       input{
           margin-left: 40px;
       }

    </style>
</head>
<body>
<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header("location:index.html");
	}
?>
<!--Menu Bar-->
<table align="center" cellpadding="5px">
    <tr align="center" style=" height:50px; background-color: rgb(60,60,60)">
        <td align="center"><a href="index.html" style="text-decoration: none">Home</a></td>
        <td align="center"><a href="education.html" style="text-decoration: none">Education</a></td>
        <td align="center"><a href="project.html" style="text-decoration: none">Projects</a></td>
        <td align="center"><a href="contact.php" style="text-decoration: none">Contact</a></td>
		<td align="center"><a href="login.php" style="text-decoration: none">Login</a></td>
		<td align="center"><a href="registration.php" style="text-decoration: none">Registration</a></td>

    </tr>
    <!--Form Elements-->
    <tr style="background-color:rgb(240, 240, 240)">
        <td colspan="4">

            <form name="contactForm" action="#" method="post">
                <fieldset>
                    <legend>Contact</legend><br>
                    <label>Name:  </label><input type="text" name="name" placeholder="Your Name" size="28"><br><br>
                    <label>Email: </label><input type="text" name="email" placeholder="Your Email" size="28"><br><br>
                    <label>Phone: </label><input type="text" name="phone" placeholder="Your Contact Number" size="28"><br><br>
                    <label>Description: </label><textarea name="description" id="" cols="30" rows="6"></textarea><br>
                    <br><br><br>
                    <input type="submit" value="Reset" style="margin: 0px 40px 100px 650px;  padding: 5px 3px 5px 3px;">
                    <input type="submit" value="Submit" style="margin: 0px 30px 30px 0px; padding: 5px 3px 5px 3px;">
					
                </fieldset>
            </form>
        </td>
    </tr>
</table>
</body>
	<a href="logout.php"><button type="button">Logout</button></a>
</html>