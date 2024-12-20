<?php
use function PHPSTORM_META\map;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

require("../../kapcsolat/kapcsproj.php");
if (!isset($_SESSION['belepett'])) {
    $hozzaszolas = "CSOCSI";
}
else if($_SESSION['userper'] == "user")
{
    $hozzaszolas = "{{hozzaszolas}}";
}
else {
    $hozzaszolas = "{{hozzaszolas}}";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../cssek/footer.css">
    <link rel="stylesheet" href="../../cssek/stilus.css" id="stilus">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{leiras}}">
<meta name="keywords" content="{{kulcsszavak}}">
<title>{{cim}}</title>
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
                            <img src="../kpes/\".{{userfoto}}>
                            <div class="felnev">
                                {{kivanbent}}
                            </div>
                           
                        </div>
                    </div>
                    <i class='bx bx-x'></i>
                </div>
                <ul class="links">
                    <li><a href="#">Főoldal</a></li>
                    <li id="menetelem">
                        <a href="#" id="menetrend">Menetrend</a>
                        <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                    </li>
                    <li id="tabellaelem">
                        <a href="#">Tabellák</a>
                        <i class='bx bxs-chevron-down js-arrow arrow '></i>
                    </li>
                    <li><a href="#rolunk">Rólunk</a></li>
                    <li><a href="#elerthetoseg">Elérhetőségeink</a></li>
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
                        <img src="../kpes/\".{{userfoto}}>
                    </a>
                    <div class="felnev">
                        {{kivanbent}}
                    </div>
                </div>
            </div>
        </div>
    <div class="almenu" id="almenuu">
        <div class="alalmenu">
            <div class="felirat">
                <h2> <a href="teljes.php"> Teljes menetrend</a></h2>
            </div>

           {{futammenu}}
            <!-- <div class="elrendezes">
                <div class="kovetkezo_futam">
                    <div class="card">
                        <img src="../kepek/bahrain.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bahraini Nagydíj</h5>
                            <p class="card-text">Március 03-05</p>
                        </div>
                    </div>

                  
                </div>


                <div class="nincsborder">
                    <img src="../kepek/saudi.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Szaúdi Nagydíj</h5>
                        <p class="card-text">Március 17-19</p>
                    </div>
                </div>

                <div class="nincsborder">
                    <img src="../kepek/australia.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ausztrál Nagydíj</h5>
                        <p class="card-text">Március 30-Április 02</p>
                    </div>
                </div>
                <div class="nincsborder">
                    <img src="../kepek/azer.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Azeri Nagydíj</h5>
                        <p class="card-text">Április 28-30</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="almenu2" id="almenuu2">
        <div class="alalmenu">
            <div class="felirat">
                <h2> <a href="teljes.php"> Teljes menetrend</a></h2>
            </div>
            <h3>...</h3>
        </div>
    </div>
    </nav>
    <div class="displéj" id="adat">
        <div class="useradatok">
            <div class="kepesnev">
                <div class="belsokep">
                    <h3>Felhasználónév</h3>
                    <div class="nembaj">
                        <div class="bskep" id="bs">
                            {{userfoto}}
                        </div>
                        <div class="bsszoveg">
                            {{kivanbent}}
                        </div>
                    </div>
                </div>
                <div class="belsofelhasznalo">
                    <h3>Jogosultság</h3>
                    {{permission}}
                </div>

            </div>
            <div class="beallitasok">
                <h3>Beállítások</h3>
                <div class="joisten">
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
            <!-- <div class="kilep belsofelhasznalo">
            <?php echo  "<p><a href=\"../admin/logout.php\">
                 $login
                    </a></p>"?>
                    <?php echo  "<p><a href=\"../admin/admin.php\">
                 $login
                    </a></p>"?>
            </div> -->
            {{admin}}
        </div>
    </div>
    <div class="fogrid">
        <div>{{tartalom}}
        </div>
        {{letrehozas}}
    </div>
   <?php
   echo $hozzaszolas;
   ?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="oszlop1">
                        <div class="logo">
                            <img src="../../kepek/logo2.png" class="img-fluid" alt="">
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
    <script src="../../script/java.js"></script>
   
</body>

</html>