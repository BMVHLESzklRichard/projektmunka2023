<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem

session_start();
if (isset($_SESSION['belepett']) && $_SESSION['userper'] == "admin") {
    $permission = $_SESSION["userper"];
    $kivanbent = $_SESSION["user_name"];
    $foto = $_SESSION["fotouser"];
    $hiriroid = $_SESSION["bejelentid"]; 
}
else
{
    if($_SESSION['userper'] == "user")
{
    header("Location: ../false.html");
    exit();
}
else {
    header("Location: ../false.html");
    exit();
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../cssek/footer.css">
    <link rel="stylesheet" href="../cssek/stilus.css">
    <link rel="stylesheet" href="../cssek/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../kepek/logo2.png" type="image/x-icon">
    <title>Admin - Főoldal</title>
</head>
<body class="adminbodi">
    <!-- <div class="kepbutton" onclick="userjelen()"> -->
    <div class="gridadmin">
        <div class="gridhirfel gridmind hover-img"><a href="tartalomletrehozas.php"><img src="../kepek/adminkepek/fel.jpg" alt="hirfelvitel" title="hirfelvitel"><figcaption>Hírfelvitel</figcaption></a></div>
        <div class="gridhirmod gridmind hover-img"><a href="tartalom-szerkeszto.php"><img src="../kepek/adminkepek/edit.jpg" alt="hirmodositas" title="hirmodositas"><figcaption>Hírműveletek</figcaption></a></div>
        <div class="griduserfel gridmind hover-img"><a href="../user/user.php"><img src="../kepek/adminkepek/papir.jpg" alt="userfelulet" title="userfelulet"><figcaption>Felhasználói<br>felület</figcaption></a></div>
        <div class="gridadminkez gridmind hover-img"><a href="admin-kezelo.php"><img src="../kepek/adminkepek/gear.jpg" alt="adminkezeles" title="adminkezeles"><figcaption>Felhasználókezelés</figcaption></a></div>
    </div>
    <div class="btn">
		<a href="chat.php">
        <button class="gomb">
            Admin CSET🌚
        </button>
		</a>
        <a href="logout.php"><button class="gomb">
           LOG OUT
        </button></a>
    </div>
    <?php  include("../footer.php"); ?>

    </body>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="../script/java.js"></script>
</html>



