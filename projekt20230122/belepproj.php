<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

require("kapcsolat/kapcsproj.php");
if(isset($_POST['ok']))
{
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $pass = sha1($_POST['password']);

    $select = "SELECT * FROM `projectacc`
               WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($dbconn, $select);

    if(mysqli_num_rows($result) > 0)
    {
       $row = mysqli_fetch_assoc($result);

       if($row['permission'] == 'admin')
       {
        $_SESSION['admin_name'] = $row['username'];
        $_SESSION['adminper'] = $row['permission'];
        $_SESSION['belepett'] = true;
        header('Location:admin/adminlist.php');
       }
       elseif($row['permission'] == 'user')
       {
        $_SESSION['user_name'] = $row['username'];
        $_SESSION['userper'] = $row['permission'];
        $_SESSION['belepett'] = true;
        header('Location:lang.php');
       }
    }
    else
    {
        $error[] = "rossz email vagy jelszó";
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
        <h1>Bejelentkezés</h1>
      
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
        <div class="belepes">
		<div class="form">
			<input placeholder='Email' type="text" name="email" id="email" required>
			<input placeholder='Password' type="password" name="password" id="password" required>
			<div class="belep"><input type="submit" value="Oké" id="ok" name="ok"></div>
		</div>
		<div class="elfelejt"><a href="#">Elfelejtetted a jelszavad?</a></div>
        <p class="nincs">Nincs még fiókod? <a href="registerproj.php" class="nincs-bizony">Nincs</a></p>
	</div>
        </form>
        </div>
    </div>
</body>
</html>


