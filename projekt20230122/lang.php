<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

if (!isset($_SESSION['belepett'])) {
    header("Location: false.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cssek/lang.css">
</head>
<body>
    <div class="hun">
        <h1>Magyar Nyelv</h1>
        <a href="user/user.php">
            <img src="kepek/Flag_of_Hungary.gif" alt="">
        </a>
    </div>
    <div class="eng">
        <h1>Angol nyelv</h1>
        <a href="user/usereng.php">
            <img src="kepek/Flag_of_the_United_Kingdom.gif" alt="">
        </a>
    </div>
</body>
</html>