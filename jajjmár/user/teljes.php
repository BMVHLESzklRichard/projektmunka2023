<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RNMotorsport - Menetrend</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="shortcut icon" href="../kepek/ujlogo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../cssek/ujmenetrend.css">
    <link rel="stylesheet" href="../cssek/footer.css">
    <link rel="stylesheet" href="../cssek/stilus.css" id="stilus">
</head>
<body>
    <?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../kapcsolat/kapcsproj.php");


include("elsohirfooter.php");


$sql = "SELECT futamkép, futamnév, futamidőpont, elsőszabadedzés, másodikszabadedzés, harmadikszabadedzés, időmérő, sprint,id,országzászló FROM futamok";

$eredmeny = mysqli_query($dbconn, $sql);

$menetrendek = " <div class=\"carousel2\">";
while($sor = mysqli_fetch_assoc($eredmeny))
{
    $vansprint = ($sor["sprint"] == '0000-00-00 00:00:00' ? "Nincs sprint" : date("Y m d - H:i",strtotime($sor["sprint"])));
    $vanharmadik = ($sor["sprint"] != '0000-00-00 00:00:00' ? "Nincs harmadik szabadedzés" : date("Y m d - H:i",strtotime($sor["harmadikszabadedzés"])));
    $menetrendek .= "    <div class=\"carousel-item\">
    <div class=\"carousel-box\">
    <div class=\"title\"><h1>{$sor["futamnév"]}</h1> <img src=\"../kepek/zaszlok/{$sor["országzászló"]}\"></div>
    <div class=\"num\"><span class=\"hu\">Futam:</span>
    <span class=\"en\">Race: </span>".date("Y m d - H:i",strtotime($sor["futamidőpont"]))."</div>
    <img id=\"ke2p{$sor["id"]}\" src=\"{$sor["futamkép"]}\"/>
    <ul>
    <li><b><span class=\"hu\">Első szabadedzés:</span>
    <span class=\"en\">FP1: </span></b>".date("Y m d - H:i",strtotime($sor["elsőszabadedzés"]))."</li>
    <li><b><span class=\"hu\">Második szabadedzés:</span>
    <span class=\"en\">FP2: </span></b>".date("Y m d - H:i",strtotime($sor["másodikszabadedzés"]))."</li>
    <li><b><span class=\"hu\">Harmadik szabadedzés:</span>
    <span class=\"en\">FP3: </span></b> {$vanharmadik}</li>
    <li><b><span class=\"hu\">Időmérő:</span>
    <span class=\"en\">Qualifying: </span></b>".date("Y m d - H:i",strtotime($sor["időmérő"]))."</li>
    <li><b><span class=\"hu\">Sprintfutam: </span>
    <span class=\"en\">Sprint: </span></b> {$vansprint}</li>
    </ul>
    </div>
    </div>";
}
$menetrendek .= "</div>";



include("negyfutam.php");

include("alapadatok.php");

include("tabella.php");
include("../navbar.php");

include("displey.php"); 


?>
<?php echo $menetrendek; ?>


<div class="cursor"></div>
<div class="cursor cursor2"></div>
<?php
    include("../footer.php");
    ?>
<script>
    /*--------------------
    Vars
    --------------------*/
    let progress = 50
let startX = 0
let active = 0
let isDown = false

/*--------------------
Contants
--------------------*/
const speedWheel = 0.02
const speedDrag = -0.03

/*--------------------
Get Z
--------------------*/
const getZindex = (array, index) => (array.map((_, i) => (index === i) ? array.length : array.length - Math.abs(index - i)))

/*--------------------
Items
--------------------*/
const $items = document.querySelectorAll('.carousel-item')
const $cursors = document.querySelectorAll('.cursor')

const displayItems = (item, index, active) => {
const zIndex = getZindex([...$items], active)[index]
item.style.setProperty('--zIndex', zIndex)
item.style.setProperty('--active', (index-active)/$items.length)
}

/*--------------------
Animate
--------------------*/
const animate = () => {
progress = Math.max(0, Math.min(progress, 100))
active = Math.floor(progress/100*($items.length-1))

$items.forEach((item, index) => displayItems(item, index, active))
}
animate()

/*--------------------
Click on Items
--------------------*/
$items.forEach((item, i) => {
item.addEventListener('click', () => {
progress = (i/$items.length) * 100 + 10
animate()
})
})

/*--------------------
Handlers
--------------------*/
const handleWheel = e => {
const wheelProgress = e.deltaY * speedWheel
progress = progress + wheelProgress
animate()
}

const handleMouseMove = (e) => {
if (e.type === 'mousemove') {
$cursors.forEach(($cursor) => {
  $cursor.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`
})
}
if (!isDown) return
const x = e.clientX || (e.touches && e.touches[0].clientX) || 0
const mouseProgress = (x - startX) * speedDrag
progress = progress + mouseProgress
startX = x
animate()
}

const handleMouseDown = e => {
isDown = true
startX = e.clientX || (e.touches && e.touches[0].clientX) || 0
}

const handleMouseUp = () => {
isDown = false
}

/*--------------------
Listeners
--------------------*/
// document.addEventListener('mousewheel', handleWheel)
document.addEventListener('mousedown', handleMouseDown)
document.addEventListener('mousemove', handleMouseMove)
document.addEventListener('mouseup', handleMouseUp)
document.addEventListener('touchstart', handleMouseDown)
document.addEventListener('touchmove', handleMouseMove)
document.addEventListener('touchend', handleMouseUp)
</script>
<script src="../script/java.js"></script>
<script src="../script/alapdarkmode.js"></script>
</body>
</html>