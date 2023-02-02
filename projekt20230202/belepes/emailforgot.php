<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

require("../kapcsolat/kapcsproj.php");
if (isset($_POST['ok'])) {
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $select = "SELECT * FROM `projectacc`
    WHERE email = '$email'";

$result = mysqli_query($dbconn, $select);

if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);

if ($row['email'] == $email) {
$log = date("Y-m-d H:i:s")."új jelszó kérése {$email} barátom ({$_SERVER['REMOTE_ADDR']})\n";
file_put_contents("log.txt",$log,FILE_APPEND); 
$_SESSION['email'] = $email;
header('Location:forgotpass.php');
}


} else {
$error[] = "rossz email";
$log = date("Y-m-d H:i:s")."új jelszó kérése nem sikerült{$email} barátom ({$_SERVER['REMOTE_ADDR']})\n";
file_put_contents("log.txt",$log,FILE_APPEND); 
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Projekt kezdetek</title>
  <link rel="stylesheet" href="../cssek/belepstilus.css" />
</head>

<body>
  <div class="fo">
    <div class="navbar">
      <div class="menu">
        <h3 class="logo"> <img src="../kepek/logo2.png" alt="" class="kep"> R.N. Motorsport</h3>
        <!-- <div class="hamburger-menu">
          <div class="bar"></div>
        </div> -->
      </div>
    </div>

    <div class="main-container">
      <div class="main">
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
        <header>
          <div class="overlay">
            <div class="inner">
              <div class="kozep">
                <h1>Elfelejtett jelszó</h1>
                <h2>Add meg az e-mailed!</h2>
                <div class="kis forgotkis">
                  <div class="hiba">
                    <?php
                    if (isset($error)) {
                      foreach ($error as $error) {
                        echo '<p class="error-msg">' . $error . '</p>';
                      }
                    }
                    ?>
                  </div>
                  <form id="fom" method="post">
                    <div class="belepes">
                      <div class="form">
                        <input placeholder='Email' type="email" name="email" id="email">
                        <div class="belep"><input type="submit" value="Oké" id="ok" name="ok"></div>
                      </div>
                      <p class="nincs"><a href="belepproj.php" class="nincs-bizony">Vissza</a></p>
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
  </div>
  <!-- <script src="script/belepjava.js"></script> -->
</body>

</html>