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
    <!-- <style>
        .card
        {
            background-color: aqua;
        }
    </style> -->
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
                    <li><a href="user.php">Főoldal</a></li>
                    <li>
                        <a href="#" id="menetrend" onclick="Menet()">Menetrend</a>
                        <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                       
                    </li>
                    <li>
                        <a href="#">Tabellák</a>
                        <i class='bx bxs-chevron-down js-arrow arrow '></i>
                        <ul class="js-sub-menu sub-menu">
                            <li><a href="#">Valami7</a></li>
                            <li><a href="#">Valami8</a></li>
                            <li><a href="#">Valami9</a></li>
                            <li><a href="#">Valami710</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Rólunk</a></li>
                    <li><a href="#">Elérhetőségeink</a></li>
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
        </div>
    </nav>
    <div class="almenu" id="almenuu">
     <div class="alalmenu">
     <div class="felirat">
        <h2> <a href="teljes.php"> Teljes menetrend</a></h2>
     </div>
   
     <div class="elrendezes">
     <div class="kovetkezo_futam">
        <div class="card" style="width: 18rem;">
            <img src="../kepek/bahrain.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bahraini Nagydíj</h5>
              <p class="card-text">Valamikor.</p>
            </div>
          </div>
     </div>

  
        <div class="nincsborder" style="width: 18rem;">
            <img src="../kepek/saudi.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Szaúdi Nagydíj</h5>
              <p class="card-text">Valamikor.</p>
            </div>
         </div>

         <div class="nincsborder" style="width: 18rem;">
          <img src="../kepek/australia.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Ausztráls Nagydíj</h5>
            <p class="card-text">Valamikor.</p>
          </div>
       </div>
       <div class="nincsborder" style="width: 18rem;">
        <img src="../kepek/azer.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Bahraini Nagydíj</h5>
          <p class="card-text">Valamikor.</p>
        </div>
     </div>
     </div>
    </div>
    </div>
  
    <div class="main">
    <h1>A 2023-as évad teljes menetrendje.</h1>
    <ul class="cards">
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">bahraini Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">szaudi Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">ausztrál Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">azeri Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">miami Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">emilia romagna Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">monacoi Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">spanyol Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">kanadai Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">osztrák Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">brit Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">magyar Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">belga Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">holland Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">olasz Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">szingapúri Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">japán Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">qatari Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">usa Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">mexicói Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">brazil Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">las vegasi Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
      <li class="cards_item">
        <div class="cardd">
          <div class="card_image"><img src="../kepek/australian.png"></div>
          <div class="card_content">
            <h2 class="card_title">abu dhabi Nagydíj</h2>
            <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
            <button class="btn card_btn">Read More</button>
          </div>
        </div>
      </li>
    </ul>
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
                            Az R.N. Motorsport News 2023-ban alakult projektmunka céljából. Ha nagyon fasza lesz akkor dől a lé és repülünk fölfelé.
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
    <script src="../script/szamolhun.js"></script>
</body>

</html>