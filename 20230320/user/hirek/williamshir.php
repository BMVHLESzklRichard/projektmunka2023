<?php

use function PHPSTORM_META\map;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

// if(!isset($_SESSION["belepett"]))
// {
//     header("Location:../../false.html");  
// }

require("../../kapcsolat/kapcsproj.php");

$sql = "SELECT id,alias,megjelenokep
from hirek";

$eredmeny = mysqli_query($dbconn,$sql);

$carmenu = "<ul>\n";
while($sor = mysqli_fetch_assoc($eredmeny))
{
    $carmenu .= "<li><a href=\"{$sor["alias"]}\">MIVAN</a></li>\n";
}
$carmenu .= "</ul>\n";
$alias = (isset($_GET['alias']) ? $_GET['alias'] : "williams");
$sql = "SELECT tartalom,letrehozas,modositas,leiras, kulcsszavak
        from hirek
        WHERE alias = '{$alias}'
        LIMIT 1";

$eredmeny = mysqli_query($dbconn,$sql);

//érvényes tartalom 
if(mysqli_num_rows($eredmeny) == 1)
{
    $sor = mysqli_fetch_assoc($eredmeny);
    $leiras = $sor["leiras"];
    $kulcsszavak = $sor["kulcsszavak"];
    $tartalom = $sor["tartalom"];
    $letrehozas = $sor["letrehozas"];
    $modositas = $sor["modositas"];
}
//és hibakezelés
else
{
    $leiras = ""; //kuka
    $kulcsszavak = "";
    $tartalom = "<p><em>A keresett oldal nincs!</em></p>"; 
    $letrehozas = date("Y-m-d H:i:s");
    $modositas = date("Y-m-d H:i:s");
}

$kimenet = (isset($kimenet)) ? $kimenet : "";
$alias = (isset($alias)) ? $alias : "";
$tartalom  = (isset($tartalom)) ? $tartalom  : "";
$leiras  = (isset($leiras)) ? $leiras  : "";
$kulcsszavak = (isset($kulcsszavak)) ? $kulcsszavak : "";


$menu = "<div class=\"navbar\">
<i class='bx bx-menu'></i>
<div class=\"logo\"><a href=\"#\"><img src=\"../../kepek/logo2.png\" alt=\"\" class=\"logonk\"></a>
</div>
<div class=\"nav-links\" id=\"navkis\">
    <div class=\"sidebar-logo\">
        <span class=\"logo-name\">R.N.</span>
        <div class=\"felhasznalokis\" id=\"kivanbent\">
            <div class=\"kepbutton\" onclick=\"userjelen()\">

                <div class=\"felnev\">

                </div>
               
            </div>
        </div>
        <i class='bx bx-x'></i>
    </div>
    <ul class=\"links\">
        <li><a href=\"#\">Főoldal</a></li>
        <li id=\"menetelem\">
            <a href=\"#\" id=\"menetrend\">Menetrend</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
        </li>
        <li id=\"tabellaelem\">
            <a href=\"#\">Tabellák</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
        </li>
        <li><a href=\"#rolunk\">Rólunk</a></li>
        <li><a href=\"#elerthetoseg\">Elérhetőségeink</a></li>
    </ul>
</div>
<div class=\"search-box\">
    <i class='bx bx-search'></i>
    <div class=\"input-box\">
        <input type=\"text\" placeholder=\"Search...\">
    </div>
</div>
<div class=\"felhasznalo\">
    <div class=\"kepbutton\" onclick=\"userjelen()\">
        <a href=\"#top\">

        </a>
        <div class=\"felnev\">

        </div>
    </div>
</div>
</div>

<div class=\"almenu\" id=\"almenuu\">
<div class=\"alalmenu\">
<div class=\"felirat\">
    <h2> <a href=\"../teljes.php\"> Teljes menetrend</a></h2>
</div>

<div class=\"elrendezes\">
    <div class=\"kovetkezo_futam\">
        <div class=\"card\">
            <img src=\"../../kepek/bahrain.png\" class=\"card-img-top\" alt=\"...\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">Bahraini Nagydíj</h5>
                <p class=\"card-text\">Március 03-05</p>
            </div>
        </div>
    </div>


    <div class=\"nincsborder\">
        <img src=\"../../kepek/saudi.png\" class=\"card-img-top\" alt=\"...\">
        <div class=\"card-body\">
            <h5 class=\"card-title\">Szaúdi Nagydíj</h5>
            <p class=\"card-text\">Március 17-19</p>
        </div>
    </div>

    <div class=\"nincsborder\">
        <img src=\"../../kepek/australia.png\" class=\"card-img-top\" alt=\"...\">
        <div class=\"card-body\">
            <h5 class=\"card-title\">Ausztrál Nagydíj</h5>
            <p class=\"card-text\">Március 30-Április 02</p>
        </div>
    </div>
    <div class=\"nincsborder\">
        <img src=\"../../kepek/azer.png\" class=\"card-img-top\" alt=\"...\">
        <div class=\"card-body\">
            <h5 class=\"card-title\">Azeri Nagydíj</h5>
            <p class=\"card-text\">Április 28-30</p>
        </div>
    </div>
</div>
</div>
</div>




<div class=\"almenu2\" id=\"almenuu2\">
<div class=\"alalmenu\">
<div class=\"felirat\">
    <h2> <a href=\"teljes.php\"> Teljes menetrend</a></h2>
</div>
<h3>GECIs</h3>
</div>
</div>";

//Fernando Sablonzo
$sablon = file_get_contents("hirsablon.html");
//mitmireholdik
$sablon = str_replace("{{navbar}}",$menu,$sablon);
$sablon = str_replace("{{alias}}",$alias,$sablon);
$sablon = str_replace("{{carmenu}}",$carmenu,$sablon);
//mitmireholdik
$sablon = str_replace("{{tartalom}}",$tartalom,$sablon);
$sablon = str_replace("{{letrehozas}}",$letrehozas,$sablon);
print($sablon);

?>