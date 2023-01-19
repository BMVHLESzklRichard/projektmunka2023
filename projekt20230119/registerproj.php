<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

require("kapcsolat/kapcsproj.php");
if(isset($_POST['ok']))
{
    $name = mysqli_real_escape_string($dbconn, $_POST['name']);
    $username = mysqli_real_escape_string($dbconn, $_POST['username']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $pass = sha1($_POST['password']);
    $passagain = sha1($_POST['passwordagain']);

    $select = "SELECT * FROM `projectacc` where email = '$email' or username = '$username'";

    $result = mysqli_query($dbconn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        $error[] = 'user already exist!';
    }
    else
    {
        if($pass != $passagain)
        {
            $error[] = 'passord not matched!';
        }
        else
        {
            $insert = "INSERT INTO `projectacc`(`name`, `username`, `email`, `password`) VALUES ('$name','$username','$email','$pass')";
            mysqli_query($dbconn,$insert);
            header('Location:belepproj.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cssek/belepreg.css">
</head>
<body>
<div id="light">
		<div id="lineh1"></div>
		<div id="lineh2"></div>
		<div id="lineh3"></div>
		<div id="lineh4"></div>
		<div id="lineh5"></div>
		<div id="lineh6"></div>
		<div id="lineh7"></div>
		<div id="lineh8"></div>
		<div id="lineh9"></div>
		<div id="lineh10"></div>
	</div>

    <div class="kozep">
    <h1>Regisztráció</h1>
      
        <div class="kis">
        <div class="hiba">
        <?php
        if(isset($error))
        {
            foreach($error as $error)
            {
                echo '<p class="error-msg">'.$error.'</p>';
            }
        }
        ?>
        </div>
        <form id="fom" method="post">
        <div class="regisztracio">

		<div class="form">
			<input placeholder="Név" type="text" name="name" id="name" required>
			<input placeholder="Felhasználónév" type="text" name="username" id="username" required>
			<input placeholder='E-mail' type="text" name="email" id="email" required>
			<input placeholder='Jelszó' type="password" name="password" id="password" required>
			<input placeholder ='Jelszó újra'type="password" name="passwordagain" id="passwordagain" required>
			<div class="belep"><input type="submit" value="REG" id="ok" name="ok"></div>
		</div>
        <p class="van">Már van fiókod? <a href="belepproj.php" class="van-bizony">Van</a></p>
	</div>
        </form>
        </div>
    </div>
</body>
</html>


