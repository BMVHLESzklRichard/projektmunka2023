<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../false.html");
    exit();
}


require("../kapcsolat/kapcsproj.php");


if (isset($_POST['oke'])) {
    $pass = sha1($_POST['password']);
  $passag = sha1($_POST['passwordag']);

  $email = $_SESSION['email'];
  
  $sql =  "SELECT * FROM `bejelentkezettek`
  WHERE email = '$email'";
  
  $result = mysqli_query($dbconn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if(empty($pass))
    {
        $error[] = "Jelszó ne legyen üres!";
    }else if(empty($passag))
    {
        $error[] = "Jelszó ne legyen üres";
    }else if($pass != $passag)
    {
        $error[] = "A két jelszó nem azonos!";
    }
    else
    {

        $emailll= $_SESSION['email'];

        $select = "UPDATE `bejelentkezettek` 
                    SET `jelszó`='{$pass}' 
                    WHERE `email`= '{$emailll}'";
         
         
         
            mysqli_query($dbconn, $select);
            header("Location: belepproj.php");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RNMotorsport - Elfelejtett jelszó</title>
  <link rel="shortcut icon" href="../kepek/ujlogo.png" type="image/x-icon">
  <link rel="stylesheet" href="../cssek/belepstilus.css" />
</head>

<body>
  <div class="fo">
    <div class="navbar">
      <div class="menu">
        <h3 class="logo"> <img src="../kepek/ujlogo.png" alt="" class="kep"> R.N. Motorsport</h3>
        <!-- <div class="hamburger-menu">
          <div class="bar"></div>
        </div> -->
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
                <h1>Elfelejtett jelszó</h1>

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
                  <form id="fom" method="post">
                    <div class="belepes">
                      <div class="form">
                        <input placeholder='Password' type="password" name="password" id="password" required>
                        <input placeholder='Password again' type="password" name="passwordag" id="passwordag" required>
                        <div class="belep"><input type="submit" value="Oké" id="oke" name="oke"></div>
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