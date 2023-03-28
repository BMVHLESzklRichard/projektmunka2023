<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../kapcsolat/kapcsproj.php");


if (!isset($_SESSION['belepett'])) {
    $kivanbent = "Vendég";
    $permission = "Vendég";
    $foto = "alapbetuk/v.jpg";
    $bejelentid = "Nincs Id";
    $login = "Belépés";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../admin/logout.php\"> 
         $login 
            </a></p>
  
    </div>";
  
}
else if($_SESSION['userper'] == "user")
{
    $permission = $_SESSION["userper"];
    $kivanbent = $_SESSION["user_name"];
    $foto = $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $login = "LOG OUT";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../admin/logout.php\">
         $login</a></p>
  
    </div>";

}
else {
    $permission = $_SESSION["userper"];
    $kivanbent = $_SESSION["user_name"];
    $foto = $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $login = "Kilépés";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../admin/logout.php\"> 
         $login 
            </a></p>
            <p><a href=\"../admin/admin.php\"> 
         Admin felület
            </a></p>
    </div>";
}




$sql = "SELECT id,alias,megjelenokep,cim,leiras
from hirek where fohir = 1 and statusz = 1 order by letrehozas desc limit 1";

$eredmeny = mysqli_query($dbconn,$sql);

$carmenu = " <div class=\"carousel-inner\">\n";

while($sor = mysqli_fetch_assoc($eredmeny))
{
$carmenu .= "<div class=\"carousel-item active\">
<a href=\"hirek/{$sor["alias"]}\"><img src=\"../kepek/f1cars2023/{$sor["megjelenokep"]}\" class=\"d-block w-100\" alt=\"...\"></a>
<div class=\"carousel-caption d-none d-md-block\">
<h5>{$sor["cim"]}</h5>
<p>{$sor["leiras"]}</p>
</div></div>\n";
}
$sql = "SELECT id,alias,megjelenokep,cim,leiras
from hirek where fohir = 1 and statusz = 1 order by letrehozas desc limit 1,6";

$eredmeny = mysqli_query($dbconn,$sql);
while($sor = mysqli_fetch_assoc($eredmeny))
{
$carmenu .= "<div class=\"carousel-item\">
<a href=\"hirek/{$sor["alias"]}\"><img src=\"../kepek/f1cars2023/{$sor["megjelenokep"]}\" class=\"d-block w-100\" alt=\"...\"></a>
<div class=\"carousel-caption d-none d-md-block\">
    <h5>{$sor["cim"]}</h5>
    <p>{$sor["leiras"]}</p>
</div></div>\n";
}
$carmenu .= "</div>\n";

$sql1 = "SELECT id,alias,megjelenokep,cim
from hirek where fohir = 0 and statusz = 1 order by letrehozas desc limit 12";

$eredmeny1 = mysqli_query($dbconn,$sql1);

$kismenu = "<div class=\"kisebbhir fogrid2\">\n";
while($sor = mysqli_fetch_assoc($eredmeny1))
{
$kismenu .= "<div class=\"magas hover-img\">\n<a href=\"hirek/{$sor["alias"]}\"><img src=\"../kepek/f1cars2023/{$sor["megjelenokep"]}\" alt=\"MC\" style=\"width:100%;\"><figcaption>{$sor["cim"]}</figcaption></a>\n</div>\n";
}
$kismenu .= "  

</div>\n";




$sql2 = "SELECT id, futamnev, futamidopont, futamkep FROM futamok WHERE DATE(futamidopont) >= DATE(NOW()) ORDER BY futamidopont ASC limit 1";

$eredmeny2 = mysqli_query($dbconn,$sql2);


$futammenu = " <div class=\"elrendezes\">\n";
while($sor2 = mysqli_fetch_assoc($eredmeny2))
{
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

$eredmeny3 = mysqli_query($dbconn,$sql3);

while($sor2 = mysqli_fetch_assoc($eredmeny3))
{
    $futammenu .= " 
                
                    <div class=\"nincsborder\">
                        <img src=\"{$sor2["futamkep"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["futamnev"]}</h5>
                            <p class=\"card-text\">{$sor2["futamidopont"]}</p>
                        </div>
                    </div>";
}
$futammenu .="</div>";

include("tabella.php");


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
    <link rel="shortcut icon" href="../kepek/logo2.png" type="image/x-icon">
    <title>Főoldal</title>
    <!-- <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
   
    <?php
        include("../navbar.php")
    ?>

    <div class="displéj" id="adat">
        <div class="useradatok">
            <div class="kepesnev">
                <div class="belsokep">
                    <h3>Felhasználónév</h3>
                    <div class="nembaj">
                        <div class="bskep" id="bs">
                            <?php
                            echo "<img src=../kpes/" . $foto . ">";
                            ?>
                        </div>
                        <div class="bsszoveg">
                            <?php
                            echo "<p class=" . "felnev" . ">" . $kivanbent . "</p>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="belsofelhasznalo">
                    <h3>Jogosultság</h3>
                    <?php
                    echo "<p class=" . "felnev" . ">" . $permission . "</p>";
                    ?>
                </div>

            </div>
            <div class="beallitasok">
                <h3>Beállítások</h3>
                <div class="beallitasokkis">
                    <div class="csusz">
                        <p>Sötét mód:</p>
                        <label class="switch">
                        <input type="checkbox" onclick="ToggleMode()" id="dark-mode">
                        <span class="slider round"></span>
                    </label></div>
                    <div class="nyelvcs">
                        <p>Nyelv:</p>
                        <a href="lang.php">
                            <img src="../kepek/eart.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <?php
            echo $admin;
            
            
            ?>
        </div>
    </div>

    <div class="fogrid">
        <div class="mainhir">

            <div id="carouselExampleIndicators" class="carousel slide lemen" data-ride="carousel">
                    <?php
                        echo $carmenu;
                    ?>
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
            <?php
            echo $kismenu;
            ?>
        <div class="futamok">
            <div class="futam "><a href="https://www.youtube.com/watch?v=f9j8nhMNYO4" target="_blank"><img src="../kepek/videokeps/bahrainverseny.png" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=Wg4YfEXK8R8" target="_blank"><img src="../kepek/videokeps/hello.png" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=9bbVsDo3oRI" target="_blank"><img src="../kepek/videokeps/alfareveal.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=GzIC2_3k0ZM" target="_blank"><img src="../kepek/videokeps/wilreveal.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam "><a href="https://www.youtube.com/watch?v=GzIC2_3k0ZM" target="_blank"><img src="../kepek/videokeps/wilreveal.jpg" alt=""></a></div>
        </div>
        <div class="gif">
            <div class="szamlalogrid" id="szamoloo">

            </div>
            <?php echo "<p id=" ."proba" .">És elrajtol a ".  $futamnev.  "</p>";?>
        </div>
    </div>

    <?php


$sql9 = "SELECT * FROM teljescsapat inner join csapatok on teljescsapat.csapatid = csapatok.id GROUP by csapatid limit 1";

$eredmeny9 = mysqli_query($dbconn,$sql9);


// $csapathurkak = "<div class=\"container2\">";
$csapathurkak = "";
while($sor9 = mysqli_fetch_assoc($eredmeny9))
        {
            $csapathurkak .= "<div class=\"panel active\" style=\"background-image: url(../kepek/csapatkepek/{$sor9["csapatfoto"]}) ;\">
            <p class=\"h3\">{$sor9["csapatnev"]}</p>
            <p></p>
            <div class=\"lista\">
                <p>Csapatfőnök:{$sor9["csapatfonok"]}</p>
                <p>Pilóták: ";

                $sql11 = "SELECT pilotak.pilotavnev,pilotak.pilotaknev FROM teljescsapat inner join csapatok on teljescsapat.csapatid = csapatok.id inner join pilotak on teljescsapat.pilotaid = pilotak.id where csapatid = {$sor9["csapatid"]}";

                $eredmeny11 = mysqli_query($dbconn,$sql11);
                while($sor11 = mysqli_fetch_assoc($eredmeny11))
                {
                    $csapathurkak.="{$sor11["pilotaknev"]} {$sor11["pilotavnev"]}, ";
                }
               $csapathurkak.=" </p><p>Konstruktőri bajnoki címek: {$sor9["csapatbajcim"]} db</p>
                <p>Győzelmek: {$sor9["csapatgyoz"]} db</p>
                <p>Dobogós helyezések: {$sor9["csapatdobogo"]} db</p>
                <p>Eddigi szezonpontok: {$sor9["csapatpont"]} pont</p>
                <p>Tavalyi helyezés: {$sor9["csapathelyezes"]}.</p>
            </div>
      </div>";
        }
        $sql10 = "SELECT * FROM teljescsapat inner join csapatok on teljescsapat.csapatid = csapatok.id GROUP by csapatid limit 1,10";
        
        $eredmeny10 = mysqli_query($dbconn,$sql10);
        
        
        while($sor10 = mysqli_fetch_assoc($eredmeny10))
        {
            $csapathurkak .= "<div class=\"panel\" style=\"background-image: url(../kepek/csapatkepek/{$sor10["csapatfoto"]}) ;\">
            <p class=\"h3\">{$sor10["csapatnev"]}</p>
            <p></p>
            <div class=\"lista\">
            <p>Csapatfőnök:{$sor10["csapatfonok"]}</p>
            <p>Pilóták: ";
            
            $sql11 = "SELECT pilotak.pilotavnev,pilotak.pilotaknev FROM teljescsapat inner join csapatok on teljescsapat.csapatid = csapatok.id inner join pilotak on teljescsapat.pilotaid = pilotak.id where csapatid = {$sor10["csapatid"]}";
            
            $eredmeny11 = mysqli_query($dbconn,$sql11);
            while($sor11 = mysqli_fetch_assoc($eredmeny11))
            {
                $csapathurkak.="{$sor11["pilotaknev"]} {$sor11["pilotavnev"]}, ";
            }
            $csapathurkak.="</p><p>Konstruktőri bajnoki címek: {$sor10["csapatbajcim"]} db</p>
            <p>Győzelmek: {$sor10["csapatgyoz"]} db</p>
            <p>Dobogós helyezések: {$sor10["csapatdobogo"]} db</p>
            <p>Eddigi szezonpontok: {$sor10["csapatpont"]} pont</p>
            <p>Tavalyi helyezés: {$sor10["csapathelyezes"]}.</p>
            </div>
            </div>";
        }
        ?>

<div class="container2">
<?php   echo $csapathurkak;    ?>  
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