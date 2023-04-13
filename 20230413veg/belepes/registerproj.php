<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../kapcsolat/kapcsproj.php");

if (isset($_POST['ok'])) {


    $name = strip_tags(trim(ucwords($_POST['name'])));
    $username = strip_tags(trim(ucwords($_POST['username'])));
    $email = strip_tags(trim(strtolower($_POST['email'])));
    $pass = sha1($_POST['password']);
    $passagain = sha1($_POST['passwordagain']);
    $mime = array("image/gif", "image/png", "image/jpg", "image/jpeg");


$sqlvaneuser = "Select username,email from accounts where email = '{$email}' or username='{$username}'";
$eredmenyvaneuser = mysqli_query($dbconn,$sqlvaneuser);

if(mysqli_num_rows($eredmenyvaneuser) == 0)
{
    if (empty($name)) {
        $error[] = "Nem adtál meg nevet.";
    } elseif (strlen($name) < 3) {
        $error[] = "A rövid a neved.";
    }

    if (empty($username)) {
        $error[] = "Nem adtál meg felhasználónevet.";
    } elseif (strlen($username) < 3) {
        $error[] = "A rövid a felhasználóneved.";
    }

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email nem jó!";
    }


    if ($_FILES['foto']['error'] == 0 && $_FILES['foto']['size'] > 6000000) {
        $error[] = "A kép mérete túl nagy";
    }

    $foto2 = $_FILES['foto']['name'];
    print $foto2;

    if ($_FILES['foto']['error'] == 0 && !in_array($_FILES['foto']['type'], $mime)) {
        $error[] = "Rossz fotótípus";
    }

    switch ($_FILES['foto']['type']) {
        case "image/png":
            $kit = ".png";
            break;
        case "image/gif":
            $kit = ".gif";
            break;
        case "image/jpg":
            $kit = ".jpg";
            break;
        default:
            $kit = ".jpeg";
    }

    $foto = $foto2.$kit;

    // Hibák összeállítása

    if (isset($error)) {
    } else {

        $sql = "INSERT INTO accounts
                (photo,name,username,password,email,status)
                VALUE('{$foto}','{$name}','{$username}','{$pass}','{$email}',1)";
        mysqli_query($dbconn, $sql);

        // kép mozgatása a végleges helyére

        move_uploaded_file($_FILES['foto']['tmp_name'], "../kpes/{$foto}");
        header("Location: belepproj.php");
    }
}
else
{
    $error[] = "Ilyen email címmel vagy felhasználónévvel már regisztráltak!";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RNMotorsport - Regisztráció</title>
    <link rel="shortcut icon" href="../kepek/ujlogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../cssek/belepstilus.css">
</head>

<body>
    <div class="fo">
        <div class="navbar">
            <div class="menu">
                <h3 class="logo"> <img src="../kepek/ujlogo.png" alt="" class="kep">R.N. Motorsport</h3>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="main">
                <div id="light">
                    <div id="lineh1">
                        <img src="../kepek/kocsirajzok/ferrarirajz.png" class="kep1">
                    </div>
                    <div id="lineh2">
                        <img src="../kepek/kocsirajzok/mclarenrajz.png" class="kep1">
                    </div>
                    <div id="lineh3">
                        <img src="../kepek/kocsirajzok/williamsrajz.png" class="kep1">
                    </div>
                    <div id="lineh4">
                        <img src="../kepek/kocsirajzok/astonmartinrajz.png" class="kep2">
                    </div>
                    <div id="lineh5">
                        <img src="../kepek/kocsirajzok/alpinerajz.png" class="kep1">
                    </div>
                    <div id="lineh6">
                        <img src="../kepek/kocsirajzok/mercedesrajz.png" class="kep2">
                    </div>
                    <div id="lineh7">
                        <img src="../kepek/kocsirajzok/alfarajz.png" class="kep2">
                    </div>
                    <div id="lineh8">
                        <img src="../kepek/kocsirajzok/haasrajz.png" class="kep1">
                    </div>
                    <div id="lineh9">
                        <img src="../kepek/kocsirajzok/redbullrajz.png" class="kep1">
                    </div>
                    <div id="lineh10">
                        <img src="../kepek/kocsirajzok/alphataurirajz.png" class="kep2">
                    </div>
                </div>
                <header>
                    <div class="overlay">
                        <div class="inner">
                            <div class="kozep">
                                <h1>Regisztráció</h1>

                                <div class="kis">
                                    <div class="hiba">
                                        <?php
                                        if (isset($error)) {
                                            foreach ($error as $error) {
                                                echo '<p class="error-msg">' . $error . '</p>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <form id="from" method="post" enctype="multipart/form-data">
                                        <div class="regisztracio">
                                            <div class="form">
                                                <p><em>A *-al jelölt mezők kitöltése kötelező!</em></p>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
                                                <p><Label for="foto">Fotó feltöltése</Label>
                                                    <input type="file" name="foto" id="foto">
                                                </p>
                                                <input placeholder="Név" type="text" name="name" id="name" required>
                                                <input placeholder="Felhasználónév" type="text" name="username" id="username" required>
                                                <input placeholder='E-mail' type="email" name="email" id="email" required>
                                                <input placeholder='Jelszó' type="password" name="password" id="password" required>
                                                <input placeholder='Jelszó újra' type="password" name="passwordagain" id="passwordagain" required>
                                                <div class="belep"><input type="submit" value="Regisztráció" id="ok" name="ok"></div>
                                            </div>
                                            <p class="van">Már van fiókod? <a href="belepproj.php" class="van-bizony">Van</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <div class="shadow one"></div>
            <div class="shadow two"></div>
        </div>
        <div class="links">
            <ul>
                <li>
                    <a href="belepproj.php" style="--i: 0.1s;">Bejelentkezés</a>
                </li>
            </ul>
        </div>
    </div>
    <script src="../script/belepjava.js"></script>
</body>

</html>