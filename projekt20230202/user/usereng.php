<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

if (!isset($_SESSION['belepett'])) {
    $kivanbent = "Guest";
    $permission = "Guest";
}
else {
    $permission = $_SESSION["userper"];
    $kivanbent = $_SESSION["user_name"];
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
                <div class="csusz"><label class="switch">
                        <input type="checkbox" onclick="ToggleMode()" id="dark-mode">
                        <span class="slider round"></span>
                    </label></div>
            </div>
            <div class="nav-links">
                <div class="sidebar-logo">
                    <span class="logo-name">R.N.</span>
                    <div class="felhasznalokis" id="kivanbent">
                    <?php
                echo "<p class=" . "felnev" . " onclick="."userjelen()".">" . $kivanbent . "</p>";
                ?>
                    </div>
                    <i class='bx bx-x'></i>
                </div>
                <ul class="links">
                    <li><a href="#">Home</a></li>
                    <li>
                        <a href="#" id="menetrend" onclick="Menet()">Schedule</a>
                        <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                    </li>
                    <li>
                        <a href="#">Standings</a>
                        <i class='bx bxs-chevron-down js-arrow arrow '></i>
                        <ul class="js-sub-menu sub-menu">
                            <li><a href="#">SMTHG</a></li>
                            <li><a href="#">SMTHG8</a></li>
                            <li><a href="#">SMTHG9</a></li>
                            <li><a href="#">SMTHG710</a></li>
                        </ul>
                    </li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
                <div class="le">
                    <label class="switch">
                        <input type="checkbox" onclick="ToggleMode()" id="dark-mode1">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="search-box">
                <i class='bx bx-search'></i>
                <div class="input-box">
                    <input type="text" placeholder="Search...">
                </div>
            </div>
            <div class="felhasznalo">
                <?php
                echo "<p class=" . "felnev" . " onclick="."userjelen()".">" . $kivanbent . "</p>";
                ?>
            </div>
            <div class="nyelvcs">
                <a href="lang.php">
                    <img src="../kepek/eart.png" alt="">
                </a>
            </div>
        </div>
    </nav>

    <div class="displéj" id="adat">
                <div class="kepesnev">
                    <div class="belsokep">
                        <img src="../kepek/logo2.png">
                    </div>
                    <div class="belsofelhasznalo">
                        <?php
                        echo "<p class=" . "felnev" . ">" . $kivanbent . "</p>";
                        ?>
                    </div>
                    <div class="permis">
                        <?php
                            echo "<p class=" . "felnev" . ">" . $permission . "</p>";
                        ?>
                    </div>
                    <div class="kilep">
                        <p><a href="../admin/logout.php">LOGOUT</a></p>
                    </div>
                </div>
            </div>

    <div class="almenu" id="almenuu">
     <div class="alalmenu">
     <div class="felirat">
        <h2> <a href="teljes.php">Schedule</a></h2>
     </div>
   
     <div class="elrendezes">
     <div class="kovetkezo_futam">
        <div class="card" style="width: 18rem;">
            <img src="../kepek/bahrain.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bahraini Nagydíj</h5>
              <p class="card-text">Soon..</p>
            </div>
          </div>
     </div>

  
        <div class="nincsborder" style="width: 18rem;">
            <img src="../kepek/saudi.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Szaúdi Nagydíj</h5>
              <p class="card-text">Soon..</p>
            </div>
         </div>

         <div class="nincsborder" style="width: 18rem;">
          <img src="../kepek/australia.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Ausztráls Nagydíj</h5>
            <p class="card-text">Soon..</p>
          </div>
       </div>
       <div class="nincsborder" style="width: 18rem;">
        <img src="../kepek/azer.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Bahraini Nagydíj</h5>
          <p class="card-text">Soon..</p>
        </div>
     </div>
     </div>
    </div>
    </div>







    <div class="fogrid">
        <div class="mainhir">
       
        <div id="carouselExampleIndicators" class="carousel slide lemen" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../kepek/bum.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../kepek/abum.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Verstappen csalással lett világbajnok? Tarts velünk és kiderül.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../kepek/brum.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
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
        <div class="kisebbhir fogrid2">
            <div class="hir1 magas">
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
            <!-- <p class="kisszoveg">További hírek</p>  -->
        </div>
        <div class="futamok">
            <div class="futam fe">
                <img src="../kepek/landobestmom.jpg" alt="">
            </div>
            <div class="futam fk"><img src="../kepek/landobestmom.jpg" alt=""></div>
            <div class="futam fh"><img src="../kepek/landobestmom.jpg" alt=""></div>
            <div class="futam fn"><img src="../kepek/landobestmom.jpg" alt=""></div>
            <div class="futam fo"><img src="../kepek/landobestmom.jpg" alt=""></div>
            <div class="futam fha"><img src="../kepek/landobestmom.jpg" alt=""></div>
            <div class="futam fhe"><img src="../kepek/landobestmom.jpg" alt=""></div>
            <div class="futam fny"><img src="../kepek/landobestmom.jpg" alt=""></div>
            <div class="futam fki"><img src="../kepek/landobestmom.jpg" alt=""></div>
        </div>
        <div class="gif">
            <div class="szamlalogrid">
                
            </div>
            <p id="proba">Til the end of the season!</p>
        </div>
    </div>


    <div class="videok">
        <p class="videoszoveg">More news could come here.</p>
    </div>








    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="oszlop1">
                        <div class="logo">
                            <img src="../kepek/logo2.png" class="img-fluid" alt="">
                        </div>
                        <p class="bemutato">
                            R.N Motorsport was founded in 2023 in order to complete a task that our school gave to us. We will be rich if this project succeeds.
                        </p>
                        <div class="socialLinks">
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
                            Latest News
                        </h5>
                        <div class="media">

                            <div class="media-body d-flex align-self-center">
                                <div class="content">
                                    <a href="#">
                                        <p>
                                            More News
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
                                            Let's play walkthrough.
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
                        <p>&copy; Copyright 2022.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="../script/java.js"></script>
    <script src="../script/szamoleng.js"></script>
</body>

</html>