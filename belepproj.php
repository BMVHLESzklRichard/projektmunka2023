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
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['belepett'] = true;
        header('Location:admin/adminlist.php');
       }
       elseif($row['permission'] == 'user')
       {
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['belepett'] = true;
        header('Location:user/user.php');
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
    <link rel="stylesheet" href="csseseesek/registerbele.css">
</head>
<body>
    <div class="kozep">
        <h1>Belépés</h1>
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
                <div class="melle">
                <label for="email">
                    <p>E-mail</p>
                    <input type="email" name="email" id="email" required>
                </label>
                </div>
            </p>
            <p>
                <div class="melle">
                <label for="password" class="melle">
                    <p>Jelszó</p>
                    <input type="password" name="password" id="password" required>
                </label>
                </div>
            </p>
            <div class="gomb"><input type="submit" value="OKÉ" id="ok" name="ok"></div>
            <p class="nincs">Nincs még fiókod? <a href="registerproj.php">Nincs</a></p>
        </form>
        </div>
    </div>
</body>
</html>


