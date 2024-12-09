<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../../kapcsolat/kapcsproj.php");

include("../both/alapadatok.php");

include("../both/negyfutam.php");

include("tabella.php");



$curbs = "<div class=\"curbs\">";

for ($i=0; $i < 13; $i++) { 
  $curbs.="
  <div class=\"curb\"></div>
  <div class=\"curb2\"></div>";
}

$curbs .="</div>";


$curbs2 = "<div class=\"curbs2\">";

for ($i=0; $i < 13; $i++) { 
  $curbs2.="
  <div class=\"curb\"></div>
  <div class=\"curb2\"></div>";
}

$curbs2 .="</div>";


if (isset($_POST["pilotapontok"])) {
  include("onlypilota.php");
} else if (isset($_POST["csapatpontok"])) {
  $sql7 = "SELECT * FROM teams order by teamPoints desc";
$szam= 1;
  $eredmeny7 = mysqli_query($dbconn, $sql7);

  $teljestabella = "<div class=\"csapatgrid\">";
  while ($sor = mysqli_fetch_assoc($eredmeny7)) {
    $teljestabella .= "<div class=\"cards_item\" id=\"csapat{$sor["id"]}\">
    <h3>{$szam}</h3>
    <svg class=\"sargavonal\" width=\"30\" height=\"10\">
  <rect width=\"30\" height=\"10\" style=\"fill:yellow\"/>
  Sorry, your browser does not support inline SVG.  
</svg>
          <div style=\"border: 5px solid {$sor["teamColor"]};background-color: {$sor["teamColor"]}; display: flex; align-items: flex-end;\">
            <div class=\"card_image csapatkartya\"><img src=\"../../kepek/kocsirajzok/{$sor["carPhoto"]}\">
            <div class=\"card_content\">
            <h2 class=\"card_title\">{$sor["teamName"]}</h2>
            <ul>
              <li class=\"pontlista\"><b><span class=\"hu\">Pontok: </span>
              <span class=\"en\">Points: </span></b><div> {$sor["teamPoints"]} <span class=\"hu\">pont.</span>
              <span class=\"en\">points.</span></div></li>
            </ul>
          </div></div>
          </div>
        </div>";
        $szam++;
  }
  $teljestabella .= "</div>";

  $gomb = " <div class=\"tabellagombok\">
  <form method=\"post\">
  <input type=\"submit\" name=\"pilotapontok\" id=\"pilotapontok\" value=\"Pilóták pontjai\">
  </form>
  </div>";
} else {
  include("onlypilota.php");
}




include("sportfooter.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../../cssek/footer.css">
  <link rel="stylesheet" href="../../cssek/stilus.css" id="stilus">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../kepek/ujlogo.png" type="image/x-icon">
  <title>RNMotorsport - Tabella</title>
  <style>
:root
{
    --primarycolor: #1c192b;
    --secondarycolor: #1c192b;
    --ferrariyellow: #ffe61d;
    --helmetinner: #1c49ea;
    --helmetouter: #fa0809;
    --wheelcover: #19181f;
    --wheelline: #19181f;
    --wheelline2: #19181f;
    --wheelcircle: #ffe61d;
}

        * {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
body {
  min-height: 100vh;
  /* background: #403c3c; */
  /* center in the viewport */
  display: grid;
  justify-content: center;
  align-content: center;
  justify-items: center;
  background: linear-gradient(rgb(152, 196, 219),rgb(148, 148, 148));
}
    </style>
</head>

<body id="tabellaBOdy">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <script>
        let tabellaBOdy = document.getElementById("tabellaBOdy");
        tabellaBOdy.innerHTML = `<div class="redlamps">
        <div class="lamps redlamp" id="redlamp1">
        </div>
        <div class="lamps redlamp" id="redlamp2">
        </div>
        <div class="lamps redlamp" id="redlamp3">
        </div>
        <div class="lamps redlamp" id="redlamp4">
        </div>
        <div class="lamps blacklamp" id="redlamp6">
        </div>
    </div>
<div>
            <!-- svg describing the loader
    made up of dashes and the race car
    -->
    <svg viewBox="0 0 178 40" width="586" height="170">
        <!-- dash included behind the car
        ! be sure to delay the animation of the path after the dashes on the right side of the car
        -->
        <path
            class="air"
            d="M 46 16.5 h -20 a 8 8 0 0 1 0 -16"
            fill="none"
            stroke="#ffffff"
            stroke-width="1"
            stroke-linejoin="round"
            stroke-linecap="round">
        </path>
    
        <!-- wrap the svg describing the car in a group
        this to translate the car horizontally within the wrapping svg
        -->
        <g id="car">
            <!-- svg describing the race car in a container 118 wide and 28.125 tall
            .125 due to the 2.25 width of the stroke
    
            position in the bottom center of the wrapping svg
            -->
            <svg viewBox="0 0 118 28.125" x="30" y="11.725" width="118" height="28.125">
                <defs>
                    <!-- circle repeated for the wheel -->
                    <circle
                        id="circle"
                        cx="0"
                        cy="0"
                        r="1">
                    </circle>
                    <!-- wheel
                    three overlapping circles describing the parts of the wheel
                    in between the circles add path elements to detail the graphic
                    -->
                    <g id="wheel">
                        <use href="#circle" fill="black" transform="scale(9)"></use>
                        <use href="#circle" fill="var(--wheelcover)" transform="scale(6)"></use>
                        <!-- inner shadow -->
                        <path
                            fill="var(--wheelline)"
                            stroke="var(--wheelline2)"
                            stroke-width="0.1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            opacity="0.9"
                            stroke-dashoffset="0"
                            d="M -3.5 0 a 4 4 0 0 1 7 0 a 3.5 3.5 0 0 0 -7 0">
                        </path>
                        <use href="#circle" fill="var(--wheelcircle)" transform="scale(1.5)"></use>
                        <!-- yellow stripe
                        include stroke-dasharray values totalling the circumference of the circle
                        this to use the dash-offset property and have the stripe rotate around the center while keeping its shape
                        ! explicitly set the stroke-dashoffset property to 0 for the other path elements (in this way the stroke-dashoffset attribute added through the <use> element affects only this path)
                        -->
                        <path
                            fill="none"
                            stroke="red"
                            stroke-width="0.75"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-dasharray="20 14 8 5"
                            d="M 0 -7.5 a 7.5 7.5 0 0 1 0 15 a 7.5 7.5 0 0 1 0 -15">
                        </path>
                        <!-- outer glow (from a hypothetical light source) -->
                        <path
                            fill="none"
                            stroke="#fff"
                            stroke-width="1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            opacity="0.1"
                            stroke-dashoffset="0"
                            d="M -6.5 -6.25 a 10 10 0 0 1 13 0 a 9 9 0 0 0 -13 0">
                        </path>
                    </g>
                </defs>
                <!-- group describing the pilot's helmet
                translate in the middle of the cockpit
                -->
                <g transform="translate(51.5 11.125)">
                    <path
                        stroke-width="1.5"
                        stroke="var(--helmetouter)"
                        fill="var(--helmetinner)"
                        d="M 0 0 v -2 a 4.5 4.5 0 0 1 9 0 v 2">
                    </path>
                    <rect
                        fill="#1E191A"
                        x="3.25"
                        y="-3"
                        width="5"
                        height="3">
                    </rect>
                </g>
    
                <!-- group describing the car -->
                <g transform="translate(10 24.125)">
                    <!-- shadow below the car
                    ! change the transform-origin of the shadow to animate it from the top center
                    the idea is to skew the shadow as the car moves
                    -->
                    <g transform="translate(59 0)">
                        <path
                            id="shadow"
                            opacity="0.7"
                            fill="#1E191A"
                            d="M -64 0 l -4 4 h 9 l 8 -1.5 h 100 l -3.5 -2.5">
                        </path>
                    </g>
                    <!-- path describing the frame of the car
                    ! do not add a stroke at the bottom of the frame
                    additional lines are overlapped to detail the belly of the vehicle
                    -->
                    <defs>
                        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" style="stop-color:var(--primarycolor)" />
                          <stop offset="100%" style="stop-color:var(--secondarycolor)" />
                        </linearGradient>
                      </defs>
                      
                      <path
                        fill="url(#gradient)"
                        stroke="#1E191A"
                        stroke-width="1.25"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M 0 0 v -10 l 35 -13 v 5 l 4 0.5 l 0.5 4.5 h 35.5 l 30 13">
                    </path>
    
                    <!-- wings -->
                    <g
                        fill="#de150b"
                        stroke="#1E191A"
                        stroke-width="1.25"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M -6 0 v -22 h 10 z">
                        </path>
                        <path
                            d="M 111 0 h -3 l -12 -5.2 v 6.2 h 12">
                        </path>
                    </g>
    
                    <!-- grey areas to create details around the car's dashes -->
                    <g
                        fill="#0b0109"
                        opacity="0.8">
                        <rect
                            x="16"
                            y="-6"
                            width="38"
                            height="6">
                        </rect>
                        <path
                            d="M 24 -14 l 13 -1.85 v 1.85">
                        </path>
                    </g>
    
                    <!-- dashes included sparingly on top of the frame -->
                    <g
                        fill="none"
                        stroke="#0b0109"
                        stroke-width="1.25"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            
                            d="M 90 0 h -88">
                        </path>
                        <path
                            d="M 39.5 -13 h -15">
                        </path>
                    </g>
    
                    <!-- elements describing the side of the car -->
                    <path
                        fill="var(--primarycolor)"
                        stroke="var(--ferrariyellow)"
                        stroke-width="1.25"
                        stroke-linejoin="round"
                        d="M 48.125 -6 h -29 v 6 h 29"><!-- .125 to tuck the path behind the rectangle and avoid a pixel disconnect as the svg is scaled -->
                    </path>
    
                    <rect
                        x="48"
                        y="-6.125"
                        width="2.125"
                        height="7.125"
                        fill="#1E191A">
                    </rect>
    
                    <!-- rear view mirror -->
                    <g fill="var(--primarycolor)">
                        <rect
                            x="60"
                            y="-15"
                            width="1"
                            height="6">
                        </rect>
                        <rect
                            x="56.5"
                            y="-17.5"
                            width="6"
                            height="2.5">
                        </rect>
                    </g>
                </g>
    
                <!-- group describing the wheels, positioned at the bottom of the graphic and at either end of the frame -->
                <g class="wheels" transform="translate(0 18.125)">
                    <g transform="translate(10 0)">
                        <use href="#wheel"></use>
                    </g>
    
                    <g transform="translate(87 0)">
                        <!-- add an offset to rotate the yellow stripe around the center -->
                        <use href="#wheel" stroke-dashoffset="-22"></use>
                    </g>
                </g>
            </svg>
        </g>
    
        <!-- dashes included above and around the race car
        ! include them in order from right to left
        this allows to rapidly assign an increasing delay in the script, to have the dashes animated in sequence
        -->
        <g
            fill="none"
            stroke-width="1"
            stroke-linejoin="round"
            stroke-linecap="round">
            <!-- right side -->
            <path
                class="air"
                stroke="#d9d9d9"
                d="M 177.5 34 h -10 q -16 0 -32 -8">
            </path>
    
            <path
                class="air"
                stroke="#d9d9d9"
                d="M 167 28.5 c -18 -2 -22 -8 -37 -10.75">
            </path>
    
            <path
                class="air"
                stroke="#d9d9d9"
                d="M 153 20 q -4 -1.7 -8 -3">
            </path>
    
            <path
                class="air"
                stroke="#d9d9d9"
                d="M 117 16.85 c -12 0 -12 16 -24 16 h -8"><!-- around (117 29.85) where the right wheel is centered -->
            </path>
    
            <!-- left side -->
            <path
                class="air"
                stroke="#d9d9d9"
                d="M 65 12 q -5 3 -12 3.8">
            </path>
    
            <path
                class="air"
                stroke="#d9d9d9"
                stroke-dasharray="9 10"
                d="M 30 13.5 h -2.5 q -5 0 -5 -5">
            </path>
    
            <path
                class="air"
                stroke="#d9d9d9"
                d="M 31 33 h -10">
            </path>
    
            <path
                class="air"
                stroke="#d9d9d9"
                d="M 29.5 23 h -12">
            </path>
            <path
                class="air"
                stroke="#d9d9d9"
                d="M 13.5 23 h -6">
            </path>
    
            <path
                class="air"
                stroke="#d9d9d9"
                d="M 28 28 h -27.5">
            </path>
        </g>
    </svg>
    </div>`
        setTimeout(() => {
            let blackLamp = document.getElementById("redlamp6")
            blackLamp.classList.add("redlamp");
            blackLamp.classList.remove("blacklamp");
            setTimeout(() => {
                let lamps = document.querySelectorAll(".lamps");
                lamps[0].classList.remove("redlamp");
                lamps[0].classList.add("blacklamp");
                lamps[1].classList.remove("redlamp");
                lamps[1].classList.add("blacklamp");
                lamps[2].classList.remove("redlamp");
                lamps[2].classList.add("blacklamp");
                lamps[3].classList.remove("redlamp");
                lamps[3].classList.add("blacklamp");
                lamps[4].classList.remove("redlamp");
                lamps[4].classList.add("blacklamp");
                setTimeout(() => {
                    tabellaBOdy.style.display = "block";
                    tabellaBOdy.style.background = "white";
                    tabellaBOdy.innerHTML = `<?php include("sportnavbar.php"); ?>

<?php include("../both/displey.php"); ?>

<div class="main">
  <h1><span class="hu">A 2024-as évad világbajnoki pontverseny állása.</span>
    <span class="en">Standings of the 2024 season.</span>
  </h1>
  <div class="track">
  <?php echo $curbs; ?>
  <?php echo $teljestabella; ?>
  <?php echo $curbs2; ?>
  </div>
  <?php echo $gomb; ?>
</div>
<?php include("../both/footer.php"); ?>

`;    }, 500);
            }, 1000);
        }, 1000);

        // target all path elements describing the gusts of air around the race car
        const paths = document.querySelectorAll('path.air');

        /*
        for each path update the --stroke-dash property to match the length of the stroke
        ! create another property for the negative offset (mostly due to Edge not liking the calc() function with custom properties)
        ! include also an increasing delay to animate the path in sequence
        */
        // add an increasing delay to the animation
        paths.forEach((path, index) => {
            const totalLength = path.getTotalLength();
            path.style.setProperty('--stroke-dash', totalLength);
            path.style.setProperty('--stroke-dash-negative', -totalLength);
            // ! as the first path actually describes a stroke on the left side of the car, tailor its delay to occur with the dashes on the left side
            if (index === 0) {
                path.style.animationDelay = `${0.08 * (paths.length - 2)}s`;
            } else {
                path.style.animationDelay = `${0.08 * index}s`;
            }
        });
    </script>
  <script src="../../script/sportjava.js"></script>
  <script src="../../script/java.js"></script>
  <script src="../../script/alapdarkmode.js"></script>
  <script src="../../script/tabellacarousel.js"></script>
</body>

</html>