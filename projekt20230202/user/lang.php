<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

// if (!isset($_SESSION['belepett'])) {
//     header("Location: false.html");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../cssek/lang.css">
</head>
<body class="csere" id="bodii">
    <div class="hun">
       <div>
       <h1>Magyar Nyelv</h1>
        <div class="kepm">
        <a href="user.php">
            <img src="../kepek/hu-flag.gif" alt="">
        </a>
        </div>
       </div>
    </div>
    <div class="eng" id="eng">
       <div>
       <h1>Angol nyelv</h1>
        <div class="kepm">
        <a href="usereng.php">
            <img src="../kepek/uk-flag.gif" alt="">
        </a>
        </div>
       </div>
    </div>
    <!-- <script src="script/csere.js"></script> -->
</body>
</html>