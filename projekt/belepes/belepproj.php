<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

require("../kapcsolat/kapcsproj.php");
if (isset($_POST['ok'])) {
  $email = mysqli_real_escape_string($dbconn, $_POST['email']);
  $pass = sha1($_POST['password']);




  $sqlkepek = "SELECT *
  from bejelentkezettek where foto='.jpeg'";

  $eredmenykepek = mysqli_query($dbconn, $sqlkepek);

  while ($sorkepek = mysqli_fetch_assoc($eredmenykepek)) {
    switch ($sorkepek["username"][0]) {
      case 'A':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'a.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'B':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'b.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'C':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'c.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'D':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'd.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'E':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'e.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'F':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'f.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'G':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'g.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'H':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'h.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'I':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'i.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'J':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'j.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'K':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'k.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'L':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'l.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'M':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'm.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'N':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'n.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'O':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'o.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'P':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'p.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'Q':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'q.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'R':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'r.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'S':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 's.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'T':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 't.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'U':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'u.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'V':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'v.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'W':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'w.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'X':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'x.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'Y':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'y.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
      case 'Z':
        $sql = "UPDATE `bejelentkezettek` SET `foto` = 'z.jpg' WHERE username='{$sorkepek["username"]}'";
        mysqli_query($dbconn, $sql);
        break;
    }
  }

  $select = "SELECT * FROM `bejelentkezettek`
               WHERE email = '$email' && password = '$pass' && statusz=1";

  $result = mysqli_query($dbconn, $select);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($row['permission'] == 'admin') {
      $_SESSION['user_name'] = $row['username'];
      $_SESSION['userper'] = $row['permission'];
      $_SESSION['fotouser'] = $row['foto'];
      $_SESSION['bejelentid'] = $row['id'];
      $_SESSION['belepett'] = true;
      $log = date("Y-m-d H:i:s") . "great success {$email} barátom ({$_SERVER['REMOTE_ADDR']})\n";
      file_put_contents("log.txt", $log, FILE_APPEND);
      header('Location:../admin/admin.php');
    } elseif ($row['permission'] == 'user') {
      $_SESSION['user_name'] = $row['username'];
      $_SESSION['userper'] = $row['permission'];
      $_SESSION['fotouser'] = $row['foto'];
      $_SESSION['bejelentid'] = $row['id'];
      $_SESSION['belepett'] = true;
      $log = date("Y-m-d H:i:s") . "great success {$email} barátom ({$_SERVER['REMOTE_ADDR']})\n";
      file_put_contents("log.txt", $log, FILE_APPEND);
      header('Location:../user/user.php');  
    }
  } else {
    $error[] = "Rossz email vagy jelszó vagy esetleg inaktív lett a fiókod";
    $log = date("Y-m-d H:i:s") . "greatn't success {$email} barátom ({$_SERVER['REMOTE_ADDR']})\n";
    file_put_contents("log.txt", $log, FILE_APPEND);
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
              <div class="kozepbe">
                <h1>Bejelentkezés</h1>

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
                        <input placeholder='Email' type="email" name="email" id="email" required>
                        <input placeholder='Password' type="password" name="password" id="password" required>
                        <div class="belep"><input type="submit" value="Oké" id="ok" name="ok"></div>
                      </div>
                      <div class="elfelejt"><a href="emailforgot.php">Elfelejtetted a jelszavad?</a></div>
                      <div class="vendeg"><a href="../user/user.php">Folytatás vendégként!</a></div>
                      <p class="nincs">Nincs még fiókod? <a href="registerproj.php" class="nincs-bizony">Nincs</a></p>
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
          <a href="registerproj.php" style="--i: 0.1s;">Regisztráció</a>
        </li>
      </ul>
    </div>
  </div>
  <script src="../script/belepjava.js"></script>
</body>

</html>