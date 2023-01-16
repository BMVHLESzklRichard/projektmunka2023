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
<div class="ocean">
  <div class="wave"></div>
  <div class="wave"></div>
  <div class="wave"></div>
</div>
    <div class="kozep">
        <h1>Regisztárció</h1>
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
        <p>
                <div class="melle"><label for="name">
                    <p>Name</p>
                    <input type="text" name="name" id="name" required>
                </label></div>
                
            </p>
        <p>
        <div class="melle"><label for="username">
                    <p>Username</p>
                    <input type="text" name="username" id="username" required>
                </label></div>
                
            </p>
            <p>
            <div class="melle"> <label for="email">
                    <p>E-mail</p>
                    <input type="email" name="email" id="email" required>
                </label></div>
               
            </p>
            <p>
            <div class="melle"><label for="password">
                    <p>Jelszó</p>
                    <input type="password" name="password" id="password" required>
                </label></div>
                
            </p>
            <p>
            <div class="melle"><label for="passwordagain">
                    <p>Jelszó újra</p>
                    <input type="password" name="passwordagain" id="passwordagain" required>
                </label></div>
                
            </p>
            <div class="gomb"><input type="submit" value="OK" id="ok" name="ok"></div>
            <p class="nincs">Van már fiókod? <a href="belepproj.php">Igen</a></p>
        </form>
        </div>
    </div>
</body>
</html>


