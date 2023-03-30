<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../kapcsolat/kapcsproj.php");

include("alapadatok.php");

$sql = "SELECT id,alias,shownPicture,title,description
from news where mainNews = 1 and status = 1 order by creationDate desc limit 1";

$eredmeny = mysqli_query($dbconn, $sql);

$carmenu = " <div class=\"carousel-inner\">\n";

while ($sor = mysqli_fetch_assoc($eredmeny)) {
    $carmenu .= "<div class=\"carousel-item active\">
<a href=\"hirek/{$sor["alias"]}\"><img src=\"../kepek/f1cars2023/{$sor["shownPicture"]}\" class=\"d-block w-100\" alt=\"...\"></a>
<div class=\"carousel-caption d-none d-md-block\">
<h5>{$sor["title"]}</h5>
<p>{$sor["description"]}</p>
</div></div>\n";
}
$sql = "SELECT id,alias,shownPicture,title,description
from news where mainNews = 1 and status = 1 order by creationDate desc limit 1,3";

$eredmeny = mysqli_query($dbconn, $sql);
while ($sor = mysqli_fetch_assoc($eredmeny)) {
    $carmenu .= "<div class=\"carousel-item\">
<a href=\"hirek/{$sor["alias"]}\"><img src=\"../kepek/f1cars2023/{$sor["shownPicture"]}\" class=\"d-block w-100\" alt=\"...\"></a>
<div class=\"carousel-caption d-none d-md-block\">
    <h5>{$sor["title"]}</h5>
    <p>{$sor["description"]}</p>
</div></div>\n";
}
$carmenu .= "</div>\n";

$sql1 = "SELECT id,alias,shownPicture,title
from news where mainNews = 0 and status = 1 order by creationDate desc limit 12";

$eredmeny1 = mysqli_query($dbconn, $sql1);

$kismenu = "<div class=\"kisebbhir fogrid2\">\n";
while ($sor = mysqli_fetch_assoc($eredmeny1)) {
    $kismenu .= "<div class=\"magas hover-img\">\n<a href=\"hirek/{$sor["alias"]}\"><img src=\"../kepek/f1cars2023/{$sor["shownPicture"]}\" alt=\"MC\" style=\"width:100%;\"><figcaption>{$sor["title"]}</figcaption></a>\n</div>\n";
}
$kismenu .= "  

</div>\n";


include("negyfutam.php");

include("tabella.php");

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../kepek/ujlogo.png" type="image/x-icon">
    <title>RNMotorsport - Főoldal</title>
    <!-- <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php include("../navbar.php") ?>
    <?php include("displey.php"); ?>

    <div class="fogrid">
        <div class="mainhir">

            <div id="carouselExampleIndicators" class="carousel slide lemen" data-ride="carousel">
                <?php echo $carmenu; ?>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>

        </div>
        <?php echo $kismenu;  ?>
        <div class="futamok">
            <div class="futam "><a href="https://www.youtube.com/watch?v=BxGpi0racMc" target="_blank"><img src="../kepek/videokeps/saudiverseny.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=bvLYdmK8nUo" target="_blank"><img src="../kepek/videokeps/saudiidomero.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=f9j8nhMNYO4" target="_blank"><img src="../kepek/videokeps/bahrainverseny.png" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=Wg4YfEXK8R8" target="_blank"><img src="../kepek/videokeps/hello.png" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=9bbVsDo3oRI" target="_blank"><img src="../kepek/videokeps/alfareveal.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=GzIC2_3k0ZM" target="_blank"><img src="../kepek/videokeps/wilreveal.jpg" alt=""></a></div>
        </div>
        <div class="gif">
            <div class="szamlalogrid" id="szamoloo">

            </div>
            <?php echo "<p id=" . "proba" . "><span class=\"hu\">És elrajtol a(z)</span>
    <span class=\"en\">'til the start of</span> " .  $futamnév .  "</p>"; ?>
        </div>
    </div>

    <?php


    $sql9 = "SELECT * FROM fullteams inner join teams on fullteams.teamId = teams.id GROUP by teamId order by teams.teamPoints desc limit 1";

    $eredmeny9 = mysqli_query($dbconn, $sql9);

    // $csapathurkak = "<div class=\"container2\">";
    $moge = "th";
    $csapathurkak = "";
    while ($sor9 = mysqli_fetch_assoc($eredmeny9)) {
        switch ($sor9["teamRanking"]) {
            case '1':
                $moge = "st";
                break;
            case '2':
                $moge = "nd";
                break;
            case '3':
                $moge = "rd";
                break;
            default:
                $moge = "th";
                break;
        }
        switch ($sor9["teamName"]) {
            case 'Oracle Red Bull Racing':
                $hatterszin = "#fcc427";
                break;
            case 'Aston Martin Aramco Cognizant Formula One Team':
                $hatterszin = "rgb(224,231,65)";
                break;
            case 'Mercedes AMG Petronas F1 Team':
                $hatterszin = "#41e2dd";
                break;
            case 'Scuderia Ferrari':
                $hatterszin = "#f4f4f4";
                break;
            case 'BWT Alpine F1 Team':
                $hatterszin = "#0856ab";
                break;
            case 'Alfa Romeo F1 Team Stake':
                $hatterszin = "#000000";
                break;
            case 'MoneyGram Haas F1 Team':
                $hatterszin = "#ec1b3b";
                break;
            case 'Williams Racing':
                $hatterszin = "#b01a00";
                break;
            case 'Mclaren Formula 1 Team':
                $hatterszin = "#72dbff";
                break;
            case 'Scuderia Alpha Tauri':
                $hatterszin = "#d63b4c";
                break;
            default:
                $hatterszin = "black";
                break;
        }
        $csapathurkak .= "<div class=\"panel active\" style=\"background-image: url(../kepek/csapatkepek/{$sor9["teamPhoto"]}); border-color: {$sor9["teamColor"]}\">
        <div class=\"light\">
        <div class=\"line\">
          <img src=\"../kepek/kocsirajzok/{$sor9["carPhoto"]}\" class=\"kep1\">
        </div>
        </div>
            <p class=\"teamname\" style=\"color: {$sor9["teamColor"]}; background-color: {$hatterszin};width:100%;\">{$sor9["teamName"]}</p>
            <p></p>
            <div class=\"lista\">
                <p class=\"listaszoveg\"><span class=\"hu\">Csapatfőnök: </span>
                <span class=\"en\">Team Principal: </span>{$sor9["teamPrincipal"]}</p>
                <p class=\"listaszoveg\"><span class=\"hu\">Pilóták:</span>
                <span class=\"en\">Drivers:</span> ";

        $sql11 = "SELECT drivers.lastName,drivers.firstName FROM fullteams inner join teams on fullteams.teamId = teams.id inner join drivers on fullteams.driverId = drivers.id where teamId = {$sor9["teamId"]}";

        $eredmeny11 = mysqli_query($dbconn, $sql11);
        while ($sor11 = mysqli_fetch_assoc($eredmeny11)) {
            $csapathurkak .= "{$sor11["firstName"]} {$sor11["lastName"]}, ";
        }
        $csapathurkak .= " </p><p class=\"listaszoveg\"><span class=\"hu\">Konstruktőri bajnoki címek:</span>
               <span class=\"en\">Constructor's championships:</span> {$sor9["teamConstructors"]} <span class=\"hu\">db</span>
               <span class=\"en\">x</span></p>
                <p class=\"listaszoveg\"><span class=\"hu\">Győzelmek: </span>
                <span class=\"en\">Wins: </span> {$sor9["teamWins"]} <span class=\"hu\">db</span>
                <span class=\"en\">x</span></p>
                <p class=\"listaszoveg\"><span class=\"hu\">Dobogós helyezések: </span>
                <span class=\"en\">Podiums: </span>{$sor9["teamPodiums"]} <span class=\"hu\">db</span>
                <span class=\"en\">x</span></p>
                <p class=\"listaszoveg\"><span class=\"hu\">Tavalyi helyezés: </span>
                <span class=\"en\">Previous year result: </span> {$sor9["teamRanking"]}<span class=\"hu\">. hely</span>
                <span class=\"en\">{$moge}</p>
            </div>
      </div>";
    }
    $sql10 = "SELECT * FROM fullteams inner join teams on fullteams.teamId = teams.id GROUP by teamId order by teams.teamPoints desc limit 1,10";

    $eredmeny10 = mysqli_query($dbconn, $sql10);


    while ($sor10 = mysqli_fetch_assoc($eredmeny10)) {
        switch ($sor10["teamRanking"]) {
            case '1':
                $moge = "st";
                break;
            case '2':
                $moge = "nd";
                break;
            case '3':
                $moge = "rd";
                break;
            default:
                $moge = "th";
                break;
        }
        switch ($sor10["teamName"]) {
            case 'Oracle Red Bull Racing':
                $hatterszin = "#fcc427";
                break;
            case 'Aston Martin Aramco Cognizant Formula One Team':
                $hatterszin = "rgb(224,231,65)";
                break;
            case 'Mercedes AMG Petronas F1 Team':
                $hatterszin = "#41e2dd";
                break;
            case 'Scuderia Ferrari':
                $hatterszin = "#f4f4f4";
                break;
            case 'BWT Alpine F1 Team':
                $hatterszin = "#0856ab";
                break;
            case 'Alfa Romeo F1 Team Stake':
                $hatterszin = "#000000";
                break;
            case 'MoneyGram Haas F1 Team':
                $hatterszin = "#ec1b3b";
                break;
            case 'Williams Racing':
                $hatterszin = "#b01a00";
                break;
            case 'Mclaren Formula 1 Team':
                $hatterszin = "#72dbff";
                break;
            case 'Scuderia Alpha Tauri':
                $hatterszin = "#d63b4c";
                break;
            default:
                $hatterszin = "black";
                break;
        }
        $csapathurkak .= "<div class=\"panel\" style=\"background-image: url(../kepek/csapatkepek/{$sor10["teamPhoto"]}); border-color: {$sor10["teamColor"]}\">
        <div class=\"light\">
        <div class=\"line\">
          <img src=\"../kepek/kocsirajzok/{$sor10["carPhoto"]}\" class=\"kep1\">
        </div>
        </div>
            <p class=\"teamname\" style=\"color: {$sor10["teamColor"]}; background-color: {$hatterszin};width:100%;\">{$sor10["teamName"]}</p>
            <p></p>
            <div class=\"lista\">
                <p class=\"listaszoveg\"><span class=\"hu\">Csapatfőnök: </span>
                <span class=\"en\">Team Principal: </span>{$sor10["teamPrincipal"]}</p>
                <p class=\"listaszoveg\"><span class=\"hu\">Pilóták:</span>
                <span class=\"en\">Drivers:</span> ";

        $sql11 = "SELECT drivers.lastName,drivers.firstName FROM fullteams inner join teams on fullteams.teamId = teams.id inner join drivers on fullteams.driverId = drivers.id where teamId = {$sor10["teamId"]}";

        $eredmeny11 = mysqli_query($dbconn, $sql11);
        while ($sor11 = mysqli_fetch_assoc($eredmeny11)) {
            $csapathurkak .= "{$sor11["firstName"]} {$sor11["lastName"]}, ";
        }
        $csapathurkak .= " </p><p class=\"listaszoveg\"><span class=\"hu\">Konstruktőri bajnoki címek:</span>
               <span class=\"en\">Constructor's championships:</span> {$sor10["teamConstructors"]} <span class=\"hu\">db</span>
               <span class=\"en\">x</span></p>
                <p class=\"listaszoveg\"><span class=\"hu\">Győzelmek: </span>
                <span class=\"en\">Wins: </span> {$sor10["teamWins"]} <span class=\"hu\">db</span>
                <span class=\"en\">x</span></p>
                <p class=\"listaszoveg\"><span class=\"hu\">Dobogós helyezések: </span>
                <span class=\"en\">Podiums: </span>{$sor10["teamPodiums"]} <span class=\"hu\">db</span>
                <span class=\"en\">x</span></p>
                <p class=\"listaszoveg\"><span class=\"hu\">Tavalyi helyezés: </span>
                <span class=\"en\">Previous year result: </span> {$sor10["teamRanking"]}<span class=\"hu\">. hely</span>
                <span class=\"en\">{$moge}</p>
            </div>
      </div>";
    }
    ?>

    <div class="container2">
        <?php echo $csapathurkak;    ?>
    </div>

    <?php
    include("../footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="../script/java.js"></script>
    <script src="../script/szamolhun.js"></script>
    <script src="../script/alapdarkmode.js"></script>
</body>

</html>