<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../kapcsolat/kapcsproj.php");
include("alapadatok.php");

$sql = "SELECT id,alias,shownPicture,title,description, creationDate
from news where  status = 1 order by creationDate desc";

$eredmeny = mysqli_query($dbconn, $sql);

$osszeshir = "<div class=\"cols\">";

while($sor = mysqli_fetch_assoc($eredmeny))
{
    $osszeshir .= "<div class=\"ccol\" ontouchstart=\"this.classList.toggle('hover');\">
        <div class=\"ccontainer\">
            <div class=\"front\" style=\"background-image: url(../kepek/f1cars2023/{$sor["shownPicture"]})\">
                <div class=\"inner\">
                <p>{$sor["title"]}</p>
                    <p>{$sor["creationDate"]}</p>
                </div>
            </div>
            <div class=\"back\">
                <div class=\"inner\">
                  <p><a href=\"hirek/{$sor["alias"]}\">{$sor["description"]}</a></p>
                </div>
            </div>
        </div>
    </div>";
}

$osszeshir .= "</div>";

include("negyfutam.php");
include("tabella.php");
include("elsohirfooter.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../cssek/footer.css">
    <link rel="stylesheet" href="../cssek/stilus.css" id="stilus">
    <!-- <style>
        *{
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

    </style> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../kepek/ujlogo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RNMotorsport-Összes cikk</title>
</head>
<body>

<?php include("../navbar.php")?>
<?php include("displey.php"); ?>


<div class="wrapper">
    <h1>Összes Cikk</h1>
    <?php echo $osszeshir; ?>
 </div>


<?php    include("../footer.php");    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="../script/java.js"></script>
    <script src="../script/szamolhun.js"></script>
    <script src="../script/alapdarkmode.js"></script>
</body>
</html>



