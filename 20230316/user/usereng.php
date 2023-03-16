<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../kapcsolat/kapcsproj.php");
$sql = "SELECT id,alias,megjelenokep
from hirek where fohir = 1";

$eredmeny = mysqli_query($dbconn,$sql);

$carmenu = " <div class=\"carousel-inner\">\n";
while($sor = mysqli_fetch_assoc($eredmeny))
{
$carmenu .= "<div class=\"carousel-item active\">
<a href=\"{$sor["alias"]}\"><img src=\"{$sor["megjelenokep"]}\" class=\"d-block w-100\" alt=\"...\"></a>
<div class=\"carousel-caption d-none d-md-block more\">
    <h5>First slide label</h5>
    <p>Some representative placeholder content for the first slide.</p>
</div></div>\n";
}
$carmenu .= "</div>\n";

$sql1 = "SELECT id,alias,megjelenokep
from hirek where fohir = 0 order by letrehozas limit 12";

$eredmeny1 = mysqli_query($dbconn,$sql1);

$kismenu = "<div class=\"kisebbhir fogrid2\">\n";
while($sor = mysqli_fetch_assoc($eredmeny1))
{
$kismenu .= "<div class=\"magas\">\n<a href=\"{$sor["alias"]}\"><img src=\"{$sor["megjelenokep"]}\" alt=\"MC\" style=\"width:100%;\"></a>\n</div>\n";
}
$kismenu .= "  

</div>\n";

if (!isset($_SESSION['belepett'])) {
    $kivanbent = "Guest";
    $permission = "Guest";
    $foto = "mo.png";
    $login = "LOG IN";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../admin/logout.php\">. 
         $login. 
            \"</a></p>
  
    </div>";
}
else if($_SESSION['userper'] == "user")
{
    $permission = $_SESSION["userper"];
    $kivanbent = $_SESSION["user_name"];
    $foto = $_SESSION["fotouser"];
    $login = "LOG OUT";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../admin/logout.php\">. 
         $login. 
            \"</a></p>
  
    </div>";

}
else {
    $permission = $_SESSION["userper"];
    $kivanbent = $_SESSION["user_name"];
    $foto = $_SESSION["fotouser"];
    $login = "LOG OUT";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../admin/logout.php\"> 
         $login 
            </a></p>
            <p><a href=\"../admin/admin.php\"> 
         Admin felület
            </a></p>
    </div>";
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
    <style>



    </style>
</head>

<body>
    <nav>
        <div class="navbar">
            <i class='bx bx-menu'></i>
            <div class="logo"><a href="#"><img src="../kepek/logo2.png" alt="" class="logonk"></a>
            </div>
            <div class="nav-links" id="navkis">
                <div class="sidebar-logo">
                    <span class="logo-name">R.N.</span>
                    <div class="felhasznalokis" id="kivanbent">
                        <div class="kepbutton" onclick="userjelen()">
                            <?php
                            echo "<img src=../kpes/" . $foto . ">";
                            ?>
                            <div class="felnev">
                                <?php
                                $kivanbent
                                ?>
                            </div>
                           
                        </div>
                    </div>
                    <i class='bx bx-x'></i>
                </div>
                <ul class="links">
                    <li><a href="#">Home</a></li>
                    <li id="menetelem">
                        <a href="#" id="menetrend">Schedule</a>
                        <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                    </li>
                    <li id="tabellaelem">
                        <a href="#">Standings</a>
                        <i class='bx bxs-chevron-down js-arrow arrow '></i>
                    </li>
                    <li><a href="#rolunk">About Us</a></li>
                    <li><a href="#elerthetoseg">Contacts</a></li>
                </ul>
            </div>
            <div class="search-box">
                <i class='bx bx-search'></i>
                <div class="input-box">
                    <input type="text" placeholder="Search...">
                </div>
            </div>
            <div class="felhasznalo">
                <div class="kepbutton" onclick="userjelen()">
                    <a href="#top">
                        <?php
                        echo "<img src=../kpes/" . $foto . ">";
                        ?>
                    </a>
                    <div class="felnev">
                        <?php
                        $kivanbent
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <div class="almenu" id="almenuu">
        <div class="alalmenu">
            <div class="felirat">
                <h2> <a href="teljes.php"> Full Schedule</a></h2>
            </div>

            <div class="elrendezes">
                <div class="kovetkezo_futam">
                    <div class="card">
                        <img src="../kepek/bahrain.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bahraini GP</h5>
                            <p class="card-text">Március 03-05</p>
                        </div>
                    </div>
                </div>


                <div class="nincsborder">
                    <img src="../kepek/saudi.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Szaúdi GP</h5>
                        <p class="card-text">Március 17-19</p>
                    </div>
                </div>

                <div class="nincsborder">
                    <img src="../kepek/australia.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ausztrál GP</h5>
                        <p class="card-text">Március 30-Április 02</p>
                    </div>
                </div>
                <div class="nincsborder">
                    <img src="../kepek/azer.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Azeri GP</h5>
                        <p class="card-text">Április 28-30</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="almenu2" id="almenuu2">
        <div class="alalmenu">
            <div class="felirat">
                <h2> <a href="teljes.php"> Standings</a></h2>
            </div>
            <h3>Cums</h3>
        </div>
    </div>
    </nav>

    <div class="displéj" id="adat">
        <div class="useradatok">
            <div class="kepesnev">
                <div class="belsokep">
                    <h3>Username</h3>
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
                    <h3>Permission</h3>
                    <?php
                    echo "<p class=" . "felnev" . ">" . $permission . "</p>";
                    ?>
                </div>

            </div>
            <div class="beallitasok">
                <h3>Settings</h3>
                <div class="joisten">
                    <div class="csusz">
                        <p>Dark mode:</p>
                        <label class="switch">
                        <input type="checkbox" onclick="ToggleMode()" id="dark-mode">
                        <span class="slider round"></span>
                    </label></div>
                    <div class="nyelvcs">
                        <p>Language:</p>
                        <a href="lang.php">
                            <img src="../kepek/eart.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- <div class="kilep belsofelhasznalo">
            <?php echo  "<p><a href=\"../admin/logout.php\">
                 $login
                    </a></p>"?>
                    <?php echo  "<p><a href=\"../admin/admin.php\">
                 $login
                    </a></p>"?>
            </div> -->
            <?php
            echo $admin;
            
            
            ?>
        </div>
    </div>

    <div class="fogrid">
        <div class="mainhir">

            <div id="carouselExampleIndicators" class="carousel slide lemen" data-ride="carousel">
                <!-- <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> -->
                <div class="carousel-inner"> 
                     <div class="carousel-item active">
                        <a href="hirek/williamshir.php"><img src="../kepek/f1cars2023/wil.jpg" class="d-block w-100" alt="..."></a>
                        <div class="carousel-caption d-none d-md-block more">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../kepek/f1cars2023/redbull.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block morer">
                            <h5>First slide label</h5>
                            <p>Verstappen csalással lett világbajnok? Tarts velünk és kiderül.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../kepek/f1cars2023/haas.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block moreh">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../kepek/f1cars2023/alfa.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block morea">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    </div>
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
       <!-- <div class="kisebbhir fogrid2">
            <div class="hir1 magas">
            <img src="../kepek/f1cars2023/mc2023.jpg" alt="MC" style="width:100%;">
  <div class="bottom-left">Bottom Left</div>
  <div class="top-left">Top Left</div>
  <div class="top-right">Top Right</div>
  <div class="bottom-right">Bottom Right</div>
  <div class="centered">Centered</div>
            </div>
            <div class="hir2 magas">
            </div>
            <div class="hir3 magas">
            </div>
            <div class="hir4 magas">
            </div>
            <div class="hir5 magas">
            </div>
            <div class="hir6 magas">
            </div>
            <div class="hir7 magas">
            </div>
            <div class="hir8 magas">
            </div>
            <div class="hir9 magas">
            </div> 
        </div>-->
            <?php
            echo $kismenu;
            ?>
        <div class="futamok">
            <div class="futam fe">
                <a href="https://www.youtube.com/watch?v=GzIC2_3k0ZM" target="_blank"><img src="../kepek/videokeps/wilreveal.jpg" alt=""></a>
            </div>
            <div class="futam fk"><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam fh"><a href="https://www.youtube.com/watch?v=9bbVsDo3oRI" target="_blank"><img src="../kepek/videokeps/alfareveal.jpg" alt=""></a></div>
            <div class="futam fn"><a href="https://www.youtube.com/watch?v=GzIC2_3k0ZM" target="_blank"><img src="../kepek/videokeps/wilreveal.jpg" alt=""></a></div>
            <div class="futam fo"><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam fha"><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam fhe"><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam fny"><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
            <div class="futam fki"><a href="https://www.youtube.com/watch?v=pjUc0DnWjL4" target="_blank"><img src="../kepek/videokeps/landobestmom.jpg" alt=""></a></div>
        </div>
        <div class="gif">
            <div class="szamlalogrid" id="szamoloo">

            </div>
            <p id="proba">Til the start of the season</p>
        </div>
    </div>


    <div class="container2">
      <div class="panel active" style="background-image: url(../kepek/csapatkepek/mergalogo.jpg) ;">
            <p class="h3">Mercedes AMG Petronas F1 Team</p>
            <p></p>
            <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>
      <div class="panel" style="background-image: url(../kepek/csapatkepek/ferrari2.jpg)">
            <p class="h3">Scuderia Ferrari</p>
            <p></p>
            <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>
      <div class="panel" style="background-image: url(../kepek/csapatkepek/redbull3.jpg)">
            <p class="h3">Oracle RedBull Racing Team<p>
            <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>
      <div class="panel" style="background-image: url(../kepek/csapatkepek/mclaren2.jpg)">
       <p class="h3">Mclaren<p>
      <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>
      <div class="panel" style="background-image: url(../kepek/csapatkepek/alpine.jpg)">
       <p class="h3">Alpine F1 Team<p>
      <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>
      <div class="panel" style="background-image: url(../kepek/csapatkepek/alpha2.jpg)">
             <p class="h3">Scuderia Alpha Tauri<p>
            <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>
      <div class="panel" style="background-image: url(../kepek/csapatkepek/aston.jpg)">
       <p class="h3">Aston Martin F1<p>
      <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>
      <div class="panel" style="background-image: url(../kepek/csapatkepek/alfa.png)">
       <p class="h3">Alfa Romeo F1 Team Stake<p>
      <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>
      <div class="panel" style="background-image: url(../kepek/csapatkepek/haas.jpg)">
       <p class="h3">Moneygram Haas F1 Team<p>
      <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>
      <div class="panel" style="background-image: url(../kepek/csapatkepek/williams.jpg)">
       <p class="h3">Williams Racing<p>
      <div class="lista">
                <p>Csapatfőnök: Toto Wolff</p>
                <p>Pilóták: Lewsi Hamilton, George Russel</p>
                <p>Konstruktőri bajnoki címek: 8</p>
                <p>Győzelmek: 125</p>
                <p>Dobogós heylzeések: 281</p>
                <p>Világbajnoki pontok: 6813.5</p>
                <p>Tavalyi helyezés: 3</p>
            </div>
      </div>


    </div>








    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="oszlop1">
                        <div class="logo">
                            <img src="../kepek/logo2.png" class="img-fluid" alt="">
                        </div>
                        <p class="bemutato" id="rolunk">
                            Az R.N. Motorsport News 2023-ban alakult projektmunka céljából. Ha nagyon fasza lesz akkor dől a lé és repülünk fölfelé.
                        </p>
                        <div class="socialLinks" id="elerthetoseg">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="oszlop2">
                        <h5>
                            Legutóbbi híreink
                        </h5>
                        <div class="media">

                            <div class="media-body d-flex align-self-center">
                                <div class="content">
                                    <a href="#">
                                        <p>
                                            Ide lehetne esetleg rakni valamilyen hírt még
                                        </p>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="media">

                            <div class="media-body d-flex align-self-center">
                                <div class="content">
                                    <a href="#">
                                        <p>
                                            Ide meg jöhetne a tippjáték ha nagyon kell vagy akarjuk
                                        </p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p>&copy; Copyright 2023.</p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="../script/java.js"></script>
    <script src="../script/szamolhun.js"></script>
    <script>

    </script>
</body>

</html>