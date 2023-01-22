<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

if (!isset($_SESSION['belepett'])) {
    header("Location: ../false.html");
    exit();
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <div class="felhasznalokis">
                    <?php
                echo "<p class=" . "felnev" . " onclick="."userjelen()".">" . $_SESSION["user_name"] . "</p>";
                ?>
                    </div>
                    <i class='bx bx-x'></i>
                </div>
                <ul class="links">
                    <li><a href="#">Home</a></li>
                    <li>
                        <a href="#">Schedule</a>
                        <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                        <ul class="htmlCss-sub-menu sub-menu egesz">
                            <li><a href="#">Something</a></li>
                            <li><a href="#">Something2</a></li>
                            <li><a href="#">Something3</a></li>
                            <li class="more">
                                <span><a href="#">More</a>
                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="#">Something4</a></li>
                                    <li><a href="#">Something5</a></li>
                                    <li><a href="#">Something6</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Standings</a>
                        <i class='bx bxs-chevron-down js-arrow arrow '></i>
                        <ul class="js-sub-menu sub-menu">
                            <li><a href="#">Something7</a></li>
                            <li><a href="#">Something8</a></li>
                            <li><a href="#">Something9</a></li>
                            <li><a href="#">Something10</a></li>
                        </ul>
                    </li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Contact us</a></li>
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
                echo "<p class=" . "felnev" . " onclick="."userjelen()".">" . $_SESSION["user_name"] . "</p>";
                ?>
            </div>
            <div class="displéj" id="adat">
                <div class="kepesnev">
                    <div class="belsokep">
                        <img src="../kepek/logo2.png">
                    </div>
                    <div class="belsofelhasznalo">
                        <?php
                        echo "<p class=" . "felnev" . ">" . $_SESSION["user_name"] . "</p>";
                        ?>
                    </div>
                    <div class="permis">
                        <?php
                            echo "<p class=" . "felnev" . ">" . $_SESSION["userper"] . "</p>";
                        ?>
                    </div>
                    <div class="kilep">
                        <p><a href="../admin/logout.php">LOGOUT</a></p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

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
            <div class="futam fe"></div>
            <div class="futam fk"><p>A</p></div>
            <div class="futam fh"></div>
            <div class="futam fn"></div>
            <div class="futam fo"></div>
            <div class="futam fha"></div>
            <div class="futam fhe"></div>
            <div class="futam fny"></div>
            <div class="futam fki"></div>
        </div>
        <div class="gif">
            <img src="../kepek/image_processing20220404-20113-tnsr7m.gif" alt="">
        </div>
    </div>


    <div class="videok">
        <p class="videoszoveg">Videos and other stuffs could be placed here.</p>
    </div>








    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
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
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="oszlop2">
                        <h5>
                            Latest News
                        </h5>
                        <div class="media">

                            <div class="media-body d-flex align-self-center">
                                <div class="content">
                                    <a href="#">
                                        <p>
                                            More News.
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
                                            Let's play.
                                        </p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="oszlop3">
                        <h5>
                            Links
                        </h5>
                        <ul>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="oszlop4">
                        <h5>
                            idk
                        </h5>
                        <ul>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    idk
                                </a>
                            </li>
                        </ul>
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
</body>

</html>