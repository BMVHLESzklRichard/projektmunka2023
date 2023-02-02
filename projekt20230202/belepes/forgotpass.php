<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();


require("../kapcsolat/kapcsproj.php");


if (isset($_POST['oke'])) {
    $pass = sha1($_POST['password']);
  $passag = sha1($_POST['passwordag']);

  $email = $_SESSION['email'];
  
  $sql =  "SELECT * FROM `projectacc`
  WHERE email = '$email'";
  
  $result = mysqli_query($dbconn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if(empty($pass))
    {
        $error[] = "HÉJÉJÉJÉJJ pass üres!";
    }else if(empty($passag))
    {
        $error[] = "(╬ಠ益ಠ) üres jelszÓ";
    }else if($pass != $passag)
    {
        $error[] = "(ノಠ益ಠ)ノ彡┻━┻ dikilyenjeleketne!";
    }
    else
    {

        $emailll= $_SESSION['email'];

        $select = "UPDATE `projectacc` 
                    SET `password`='{$pass}' 
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