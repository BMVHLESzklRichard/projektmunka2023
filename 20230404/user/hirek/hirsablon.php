<?php

use function PHPSTORM_META\map;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        
.chatUzenetek{
  padding: 0;
  overflow-y: auto;
  height: calc(80vh - 220px);
}
.active{

}

    </style>
    <link rel="stylesheet" href="../../cssek/footer.css">
    <link rel="stylesheet" href="../../cssek/stilus.css" id="stilus2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{leiras}}">
<meta name="keywords" content="{{kulcsszavak}}">
<link rel="shortcut icon" href="../../kepek/logo2.png" type="image/x-icon">
<title>{{cim}}</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <i class='bx bx-menu'></i>
            <div class="logo"><a href="../user.php"><img src="../../kepek/ujlogo.png" alt="" class="logonk"></a>
            </div>
            <div class="nav-links" id="navkis">
                <div class="sidebar-logo">
                    <span class="logo-name">R.N.</span>
                    <div class="felhasznalokis" id="kivanbent">
                        <div class="kepbutton" onclick="userjelen()">
                            <img src="../../kpes/{{userfoto}}">
                            <div class="felnev">
                                {{kivanbent}}
                            </div>
                           
                        </div>
                    </div>
                    <i class='bx bx-x'></i>
                </div>
                <ul class="links">
                    <li><a href="../user.php">Főoldal</a></li>
                    <li id="menetelem">
                        <a href="../teljes.php" id="menetrend">Menetrend</a>
                        <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                    </li>
                    <li id="tabellaelem">
                        <a href="../teljestabella.php">Tabellák</a>
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
                        <img src="../../kpes/{{userfoto}}">
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
                <h2> <a href="../teljes.php"> Teljes menetrend</a></h2>
            </div>

           {{futammenu}}
           
        </div>
    </div>
    <div class="almenu2" id="almenuu2">
        <div class="alalmenu">
            <div class="felirat">
                <h2> <a href="../teljestabella.php"> Tabellák</a></h2>
            </div>
            {{tabellamenu}}
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
                            <img src="../../kpes/{{userfoto}}">
                        </div>
                        <div class="bsszoveg">
                            {{kivanbent}}
                        </div>
                    </div>
                </div>
                <div class="belsofelhasznalo">
                    <h3>Jogosultság</h3>
                    <p class="felnev">
                        {{permission}}
                    </p>
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
                            <img src="../../kepek/eart.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
   
            {{admin}}
        </div>
    </div>
    <div class="fogridhir">
        <div>
            <h1>{{cim}}</h1>
        <hr style="background-color: red;">
        </div>
        <div class="tart">{{tartalom}}
        </div>
        <p>Készítette: {{iro}} <img class="uzenetkep" src="../../kpes/{{foto}}" alt="jash"></p>
        <p>Létrehozás dátuma: {{letrehozas}}</p>
    </div>

    <div class="kommentek"><h3 class="cimeakommentnek">Hozzászólások</h3>
        <p></p>
<div class="comment chatUzenetek">

</div>

    </div>
   {{hozzaszolas}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
        <script>
                const chatBox = document.querySelector(".chatUzenetek");


                chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

    //AJAX a chat felülethez
    setInterval(() =>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "kommentbe.php", true);
        xhr.onload = ()=>{
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    chatBox.innerHTML = data;
                    if(!chatBox.classList.contains("active")){
                        scrollToBottom();
                    }
                }
            }
        }
        xhr.send();
    }, 500)

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}

//Chat üzenet elküldése enter megnyomásakor
inputField.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      sendBtn.click();
      scrollToBottom();
    }
})
        </script>
    <script src="../../script/java.js"></script>
   <script src="../../script/hirdarkmode.js "></script>
</body>

</html>