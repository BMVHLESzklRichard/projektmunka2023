<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();


include("alapadatok.php");

if (isset($_POST['ok'])) {
    $mime = array("image/gif", "image/png", "image/jpg", "image/jpeg");

    if ($_FILES['foto']['error'] == 0 && $_FILES['foto']['size'] > 6000000) {
        $hibak[] = "A kép mérete túl nagy";
    }

    $foto2 = $_FILES['foto']['name'];
    print $foto2;

    if ($_FILES['foto']['error'] == 0 && !in_array($_FILES['foto']['type'], $mime)) {
        $hibak[] = "Rossz fotótípus";
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

    $foto = date("U").$kit;

    // Hibák összeállítása
    $_SESSION["csereltfoto"] = "";
    if (isset($hibak)) {
        $kimenet = "<ul>\n";
        foreach ($hibak as $i) {
            $kimenet .= "<li>$i</li>";
        }
        $kimenet .= "</ul>";
    } else {
        require("../../kapcsolat/kapcsproj.php");
        $sql = "UPDATE accounts SET `photo`='{$foto}' WHERE `id` = '{$bejelentid}'";
        mysqli_query($dbconn, $sql);
        move_uploaded_file($_FILES['foto']['tmp_name'], "../../kpes/{$foto}");
        $_SESSION["csereltfoto"] = $foto;
         header("Location: ../felhasznaloiFelulet/user.php");
        // session_destroy();
        // header("Location: ../belepes/belepproj.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RNMotorsport - Képcsere</title>
    <link rel="stylesheet" href="../../cssek/belepstilus.css">
</head>

<body>
    <div class="fo">
        <div class="navbar">
            <div class="menu">
                <h3 class="logo"> <img src="../../kepek/ujlogo.png" alt="" class="kep">R.N. Motorsport</h3>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="main">
                <div id="light">
                    <div id="lineh1">
                        <img src="../../kepek/kocsirajzok/ferrarirajz.png" class="kep1">
                    </div>
                    <div id="lineh2">
                        <img src="../../kepek/kocsirajzok/mclarenrajz.png" class="kep1">
                    </div>
                    <div id="lineh3">
                        <img src="../../kepek/kocsirajzok/williamsrajz.png" class="kep1">
                    </div>
                    <div id="lineh4">
                        <img src="../../kepek/kocsirajzok/astonmartinrajz.png" class="kep2">
                    </div>
                    <div id="lineh5">
                        <img src="../../kepek/kocsirajzok/alpinerajz.png" class="kep1">
                    </div>
                    <div id="lineh6">
                        <img src="../../kepek/kocsirajzok/mercedesrajz.png" class="kep2">
                    </div>
                    <div id="lineh7">
                        <img src="../../kepek/kocsirajzok/alfarajz.png" class="kep2">
                    </div>
                    <div id="lineh8">
                        <img src="../../kepek/kocsirajzok/haasrajz.png" class="kep1">
                    </div>
                    <div id="lineh9">
                        <img src="../../kepek/kocsirajzok/redbullrajz.png" class="kep1">
                    </div>
                    <div id="lineh10">
                        <img src="../../kepek/kocsirajzok/alphataurirajz.png" class="kep2">
                    </div>
                </div>
                <header>
                    <div class="overlay">
                        <div class="inner">
                            <div class="kozep">
                                <h1>Kép változtatás</h1>

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
                                    <div>
                                        <h4>Eddigi profilkép: </h4>
                                        <div class="kepbutton">
                                        <?php
                                            echo "<img src=../../kpes/" . $foto . ">";
                                        ?>
                                        </div>
                                    </div>
                                    <form id="from" method="post" enctype="multipart/form-data">
                                        <div class="regisztracio">
                                            <div class="form">
                                                <p><em>A *-al jelölt mezők kitöltése kötelező!</em></p>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
                                                <p><Label for="foto">Fotó feltöltése</Label>
                                                    <input type="file" name="foto" id="foto">
                                                </p>
                                                <div class="belep"><input type="submit" value="Változtatás mentése" id="ok" name="ok"></div>
                                            </div>
                                            <p class="van"><a href="user.php" class="van-bizony">Vissza a főoldalra!</a></p>
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
                    <a href="user.php" style="--i: 0.1s;">Vissza a főoldalra!</a>
                </li>
            </ul>
        </div>
    </div>
    <script src="../../script/belepjava.js"></script>
</body>

</html>