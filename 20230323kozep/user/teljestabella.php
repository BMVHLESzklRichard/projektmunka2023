<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../kapcsolat/kapcsproj.php");

include("alapadatok.php");


$sql2 = "SELECT id, futamnev, futamidopont, futamkep FROM futamok WHERE DATE(futamidopont) >= DATE(NOW()) ORDER BY futamidopont ASC limit 1";

$eredmeny2 = mysqli_query($dbconn, $sql2);


$futammenu = " <div class=\"elrendezes\">\n";
while ($sor2 = mysqli_fetch_assoc($eredmeny2)) {
  $futammenu .= " 
                <div class=\"kovetkezo_futam\">
                    <div class=\"card\">
                        <img src=\"{$sor2["futamkep"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 id=\"kovfutamnev\" class=\"card-title\">{$sor2["futamnev"]}</h5>
                            <p id=\"kovfutamido\" class=\"card-text\">{$sor2["futamidopont"]}</p>
                        </div>
                    </div>
                </div>";
  $futamnev = $sor2["futamnev"];
}

$sql3 = "SELECT id, futamnev, futamidopont, futamkep FROM futamok WHERE DATE(futamidopont) >= DATE(NOW()) ORDER BY futamidopont ASC limit 1,3";

$eredmeny3 = mysqli_query($dbconn, $sql3);

while ($sor2 = mysqli_fetch_assoc($eredmeny3)) {
  $futammenu .= " 
                
                    <div class=\"nincsborder\">
                        <img src=\"{$sor2["futamkep"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["futamnev"]}</h5>
                            <p class=\"card-text\">{$sor2["futamidopont"]}</p>
                        </div>
                    </div>";
}
$futammenu .= "</div>";

include("tabella.php");



if (isset($_POST["pilotapontok"])) 
{
include("onlypilota.php");
} 
else if (isset($_POST["csapatpontok"])) {
  $sql7 = "SELECT * FROM csapatok order by csapatpont desc";

  $eredmeny7 = mysqli_query($dbconn, $sql7);

  $teljestabella = "<ul class=\"cardsgrid\">";
  while ($sor = mysqli_fetch_assoc($eredmeny7)) {
    switch ($sor["csapatnev"]) {
      case 'Oracle Red Bull Racing':
        $borderszin = "#13152c";
        break;
      case 'Aston Martin Aramco Cognizant Formula One Team':
        $borderszin = "#145243";
        break;
      case 'Scuderia Ferrari':
        $borderszin = "#930418";
        break;
      case 'Mercedes AMG Petronas F1 Team':
        $borderszin = "black";
        break;
      case 'Alfa Romeo F1 Team Stake':
        $borderszin = "#991d24";
        break;
      case 'BWT Alpine F1 Team':
        $borderszin = "#f38ec2";
        break;
      case 'Williams Racing':
        $borderszin = "#0c234f";
        break;
      case 'Mclaren Formula 1 Team':
        $borderszin = "#fb7415";
        break;
      case 'MoneyGram Haas F1 Team':
        $borderszin = "#a7a7a7";
        break;
      case 'Scuderia Alpha Tauri':
        $borderszin =  "#172d54";
        break;
        default:
        $borderszin = "black";
        break;
    }
    $teljestabella .= "<li class=\"cardsgrid_item\" id=\"csapat{$sor["id"]}\">
          <div style=\"border: 5px solid {$borderszin};background-color: {$borderszin}\">
            <div class=\"card_image csapatkartya\"><img src=\"../kepek/kocsirajzok/{$sor["autofoto"]}\">
            <div class=\"card_content\">
            <h2 class=\"card_title\">{$sor["csapatnev"]}</h2>
            <ul>
              <li><b><span class=\"hu\">Eddigi pontok: </span>
              <span class=\"en\">Points so far: </span></b> {$sor["csapatpont"]} <span class=\"hu\">pont.</span>
              <span class=\"en\">points.</span></li>
            </ul>
          </div></div>
          </div>
        </li>";
  }
  $teljestabella .= "</ul>";

  $teljestabella .= " <div class=\"tabellagombok\">
  <form method=\"post\">
  <input type=\"submit\" name=\"pilotapontok\" id=\"pilotapontok\" value=\"Pilóták pontjai\">
  </form>
  </div>";
} 
else
 {
  include("onlypilota.php");
}




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
  <link rel="shortcut icon" href="../kepek/logo2.png" type="image/x-icon">
  <title>Menetrend</title>
</head>

<body>
  <?php include("../navbar.php"); ?>

  <?php include("displey.php"); ?>

  <div class="main">
    <h1><span class="hu">A 2023-as évad világbajnoki pontverseny állása.</span>
              <span class="en">Standings of the 2023 season.</span></h1><?php echo $teljestabella; ?>
  </div>
  <?php include("../footer.php"); ?>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <script src="../script/java.js"></script>
  <script src="../script/alapdarkmode.js"></script>
</body>

</html>