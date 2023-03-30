<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../kapcsolat/kapcsproj.php");

include("alapadatok.php");

include("negyfutam.php");

include("tabella.php");



if (isset($_POST["pilotapontok"])) {
  include("onlypilota.php");
} else if (isset($_POST["csapatpontok"])) {
  $sql7 = "SELECT * FROM teams order by teamPoints desc";
$szam= 1;
  $eredmeny7 = mysqli_query($dbconn, $sql7);

  $teljestabella = "<div class=\"csapatgrid\">";
  while ($sor = mysqli_fetch_assoc($eredmeny7)) {
    $teljestabella .= "<div class=\"cards_item\" id=\"csapat{$sor["id"]}\">
    <h3>{$szam}</h3>
    <svg class=\"sargavonal\" width=\"30\" height=\"10\">
  <rect width=\"30\" height=\"10\" style=\"fill:yellow\"/>
  Sorry, your browser does not support inline SVG.  
</svg>
          <div style=\"border: 5px solid {$sor["teamColor"]};background-color: {$sor["teamColor"]}; display: flex; align-items: flex-end;\">
            <div class=\"card_image csapatkartya\"><img src=\"../kepek/kocsirajzok/{$sor["carPhoto"]}\">
            <div class=\"card_content\">
            <h2 class=\"card_title\">{$sor["teamName"]}</h2>
            <ul>
              <li class=\"pontlista\"><b><span class=\"hu\">Pontok: </span>
              <span class=\"en\">Points: </span></b><div> {$sor["teamPoints"]} <span class=\"hu\">pont.</span>
              <span class=\"en\">points.</span></div></li>
            </ul>
          </div></div>
          </div>
        </div>";
        $szam++;
  }
  $teljestabella .= "</div>";

  $gomb = " <div class=\"tabellagombok\">
  <form method=\"post\">
  <input type=\"submit\" name=\"pilotapontok\" id=\"pilotapontok\" value=\"Pilóták pontjai\">
  </form>
  </div>";
} else {
  include("onlypilota.php");
}

include("elsohirfooter.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../cssek/footer.css">
  <link rel="stylesheet" href="../cssek/stilus.css" id="stilus">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../kepek/ujlogo.png" type="image/x-icon">
  <title>RNMotorsport - Tabella</title>
</head>

<body>
  <?php include("../navbar.php"); ?>

  <?php include("displey.php"); ?>

  <div class="main">
    <h1><span class="hu">A 2023-as évad világbajnoki pontverseny állása.</span>
      <span class="en">Standings of the 2023 season.</span>
    </h1>
    <div class="track">
    <div class="curbs">
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
</div>
      <?php echo $teljestabella; ?>
      <div class="curbs2">
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
    <div class="curb2"></div>
    <div class="curb"></div>
</div>
    </div>
    <?php echo $gomb; ?>
  </div>
  <?php include("../footer.php"); ?>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <script src="../script/java.js"></script>
  <script src="../script/alapdarkmode.js"></script>
</body>

</html>