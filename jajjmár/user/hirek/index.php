<?php
use function PHPSTORM_META\map;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

require("../../kapcsolat/kapcsproj.php");
if (!isset($_SESSION['belepett'])) {
   $kivanbent = "Vendég";
    $permission = "Vendég";
    $foto = "v.jpg";
    $bejelentid = "Nincs Id";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../admin/logout.php\"> 
    <span class=\"hu\">Belépés</span>
    <span class=\"en\">Log in</span>
            </a></p>
  
    </div>";
    $kepcsere = "";

} else if ($_SESSION['userper'] == "user") {
    $permission = $_SESSION["userper"]==0?"user":"admin";
    $kivanbent = $_SESSION["username"]  != "" ? $_SESSION["username"] : $_SESSION["user_name"];
    $foto = $_SESSION["csereltfoto"]  != "" ? $_SESSION["csereltfoto"] : $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../admin/logout.php\">
    <span class=\"hu\">Kilépés</span>
    <span class=\"en\">Log out</span>
    </a></p>
  
    </div>";
    $kepcsere = "<a href=\"../changepic.php\"> <span class=\"hu\">Képváltoztatás</span>
    <span class=\"en\">Change profile picture</span></a>";

} else {
    $permission = $_SESSION["userper"]==0?"user":"admin";
    $kivanbent = $_SESSION["username"]  != "" ? $_SESSION["username"] : $_SESSION["user_name"];
    $foto = $_SESSION["csereltfoto"]  != "" ? $_SESSION["csereltfoto"] : $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../admin/logout.php\"> 
    <span class=\"hu\">Kilépés</span>
    <span class=\"en\">Log out</span>
            </a></p>
            <p><a href=\"../../admin/admin.php\"> 
            <span class=\"hu\">Admin felület</span>
                <span class=\"en\">Admin page</span>
            </a></p>
    </div>";
    $kepcsere = "<a href=\"../changepic.php\">  <span class=\"hu\">Képváltoztatás</span>
    <span class=\"en\">Change profile picture</span></a>";
}


$sql2 = "SELECT id, futamnév, futamidőpont, futamkép FROM futamok WHERE DATE(futamidőpont) >= DATE(NOW()) ORDER BY futamidőpont ASC limit 1";

$eredmeny2 = mysqli_query($dbconn, $sql2);

$futammenu = " <div class=\"elrendezes\">\n";
while ($sor2 = mysqli_fetch_assoc($eredmeny2)) {
    $futammenu .= " 
                <div class=\"kovetkezo_futam\">
                    <div class=\"card\">
                        <img src=\"../{$sor2["futamkép"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["futamnév"]}</h5>
                            <p class=\"card-text\">{$sor2["futamidőpont"]}</p>
                        </div>
                    </div>
                </div>";
}

$sql3 = "SELECT id, futamnév, futamidőpont, futamkép FROM futamok WHERE DATE(futamidőpont) >= DATE(NOW()) ORDER BY futamidőpont ASC limit 1,3";

$eredmeny3 = mysqli_query($dbconn, $sql3);

while ($sor2 = mysqli_fetch_assoc($eredmeny3)) {
    $futammenu .= " 
                
                    <div class=\"nincsborder\">
                        <img src=\"../{$sor2["futamkép"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["futamnév"]}</h5>
                            <p class=\"card-text\">{$sor2["futamidőpont"]}</p>
                        </div>
                    </div>";
}
$futammenu .= "</div>";








$tabellamenu = "<div class=\"elrendezestab\"><div class=\"pilotakflex\"><div class=\"pilotak\">";

$sql5 = "SELECT * FROM `pilotak` order by pilotak.pilótapont desc, pilotak.id asc limit 1,1";

$eredmeny5 = mysqli_query($dbconn, $sql5);

while ($sor4 = mysqli_fetch_assoc($eredmeny5)) {
    $tabellamenu .= "<div class=\"hover-img2 masodik\"><img src=\"../../kepek/pilotakepek/{$sor4["pilótafotó"]}\"><figcaption>{$sor4["pilótakeresztnév"]} {$sor4["pilótavezetéknév"]}<br>{$sor4["pilótapont"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption>";
}

$tabellamenu .= "</div>";
$sql4 = "SELECT * FROM `pilotak` order by pilotak.pilótapont desc, pilotak.id asc limit 1";

$eredmeny4 = mysqli_query($dbconn, $sql4);
while ($sor4 = mysqli_fetch_assoc($eredmeny4)) {
    $tabellamenu .= "<div class=\" hover-img2 elso\"><img src=\"../../kepek/pilotakepek/{$sor4["pilótafotó"]}\"><figcaption>{$sor4["pilótakeresztnév"]} {$sor4["pilótavezetéknév"]}<br>{$sor4["pilótapont"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}


$sql6 = "SELECT * FROM `pilotak` order by pilotak.pilótapont desc, pilotak.id asc limit 2,1";

$eredmeny6 = mysqli_query($dbconn, $sql6);

while ($sor4 = mysqli_fetch_assoc($eredmeny6)) {
    $tabellamenu .= "<div class=\"hover-img2 harmadik\"><img src=\"../../kepek/pilotakepek/{$sor4["pilótafotó"]}\"><figcaption>{$sor4["pilótakeresztnév"]} {$sor4["pilótavezetéknév"]}<br>{$sor4["pilótapont"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql7 = "SELECT * FROM `pilotak` order by pilotak.pilótapont desc, pilotak.id asc limit 3,17";

$eredmeny7 = mysqli_query($dbconn, $sql7);

$tabellamenu .= "</div><ul>";
while ($sor4 = mysqli_fetch_assoc($eredmeny7)) {
    $tabellamenu .= "<li><div>{$sor4["pilótakeresztnév"]} {$sor4["pilótavezetéknév"]}</div> <div style=\"display:flex;gap:5px;\">{$sor4["pilótapont"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></div></li>";
}

$sql4 = "SELECT * FROM `csapatok` order by csapatok.csapatpont desc limit 1";

$eredmeny4 = mysqli_query($dbconn, $sql4);

$csapattab = "<div class=\"pilotakflex\"><div class=\"csapatok\">";

while ($sor4 = mysqli_fetch_assoc($eredmeny4)) {
    $csapattab .= "<div class=\"hover-img2 elso\"><img src=\"../../kepek/kocsirajzok/{$sor4["autófotó"]}\"><figcaption>{$sor4["csapatnév"]}<br>{$sor4["csapatpont"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql5 = "SELECT * FROM `csapatok` order by  csapatok.csapatpont desc limit 1,1";

$eredmeny5 = mysqli_query($dbconn, $sql5);

while ($sor4 = mysqli_fetch_assoc($eredmeny5)) {
    $csapattab .= "<div class=\"hover-img2 masodik\"><img src=\"../../kepek/kocsirajzok/{$sor4["autófotó"]}\"><figcaption>{$sor4["csapatnév"]}<br>{$sor4["csapatpont"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql6 = "SELECT * FROM `csapatok` order by csapatok.csapatpont desc limit 2,1";

$eredmeny6 = mysqli_query($dbconn, $sql6);

while ($sor4 = mysqli_fetch_assoc($eredmeny6)) {
    $csapattab .= "<div class=\"hover-img2 harmadik\"><img src=\"../../kepek/kocsirajzok/{$sor4["autófotó"]}\"><figcaption>{$sor4["csapatnév"]}<br>{$sor4["csapatpont"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql7 = "SELECT * FROM `csapatok` order by  csapatok.csapatpont desc limit 3,7";

$eredmeny7 = mysqli_query($dbconn, $sql7);

$csapattab .= "</div><ul>";

while ($sor4 = mysqli_fetch_assoc($eredmeny7)) {
    $csapattab .= "<li><div>{$sor4["csapatnév"]}</div> <div style=\"display:flex;gap:5px;\">{$sor4["csapatpont"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></div></li>";
}
$csapattab .= "</ul></div>";

$tabellamenu .= "</ul></div>";
$tabellamenu .= $csapattab;

$tabellamenu .= "</div>";






// $sql = "SELECT id,alias,megjelenőkep,cím,leírás
// from hirek where fohir = 1 and statusz = 1 order by létrehozás desc limit 1";

// $eredmeny = mysqli_query($dbconn, $sql);

// $elsohir = "<div>\n";
// while ($sor = mysqli_fetch_assoc($eredmeny)) {
//     $elsohir .= "<div class=\"footermagas\"><a href=\"hirek/{$sor["alias"]}\"><img src=\"../../kepek/f1cars2023/{$sor["megjelenokep"]}\" alt=\"MC\" style=\"width:100%;\"><div><p>{$sor["cím"]}</p></div></a></div>";
// }
// $elsohir .= "</div>";


// $sql2 = "SELECT id, futamnev, futamidopont, futamkep FROM futamok WHERE DATE(futamidopont) >= DATE(NOW()) ORDER BY futamidopont ASC limit 1";

// $eredmeny2 = mysqli_query($dbconn, $sql2);

// $kovifutam = "<div>\n";
// while ($sor2 = mysqli_fetch_assoc($eredmeny2)) {
//     $kovifutam .= "<div class=\"footermagas\">
//                         <img src=\"../{$sor2["futamkep"]}\" class=\"card-img-top\" alt=\"...\" style=\"width:100%;\">
//                         <div class=\"card-body\">
//                             <h5 class=\"card-title\">{$sor2["futamnev"]}</h5>
//                             <p class=\"card-text\">{$sor2["futamidopont"]}</p>
//                         </div>
//                 </div>";
//     $futamnev = $sor2["futamnev"];
// }
// $kovifutam .= "</div>";





$alias = (isset($_GET['alias']) ? $_GET['alias'] : "oke");
$sql = "SELECT hirek.id,hirek.tartalom,hirek.létrehozás,hirek.módosítás,hirek.leírás,hirek.cím,bejelentkezettek.név, bejelentkezettek.fotó
        FROM `hirek` 
        INNER JOIN bejelentkezettek ON hirek.hiriroid = bejelentkezettek.id
        WHERE alias = '{$alias}'
        LIMIT 1";



$eredmeny = mysqli_query($dbconn, $sql);

//érvényes tartalom 
if (mysqli_num_rows($eredmeny) == 1) {
    $sor = mysqli_fetch_assoc($eredmeny);
    $leírás = $sor["leírás"];
    $cím = $sor["cím"];
    $tartalom = $sor["tartalom"];
    $létrehozás = $sor["létrehozás"];
    $módosítás = $sor["módosítás"];
    $id = $sor["id"];
    $iro = $sor["név"];
    $fotok = $sor["fotó"];
    $_SESSION["alias"] = $alias;


    if ($bejelentid != "Nincs Id") {

        $hozzaszolas = "<div class=\"kommentbeiras\">
        <form method=\"post\" action=\"{$alias}\" id=\"komi\">
 <input type=\"hidden\" id=\"tema_id\" name=\"tema_id\" value=\"0\">
 <p class=\"kommentform\"><textarea id=\"szoveg\" name=\"szoveg\" maxlength=\"25500\" required></textarea>
 <input type=\"submit\" id=\"new\" name=\"new\" value=\"OK\"></p>
 </form><p class=\"tobbkomment\" onclick=\"morecomment()\">Többi hozzászólás</p></div>";
       if(isset($_POST['new']))
       {
           $szoveg = strip_tags(trim($_POST['szoveg']));

           $sqlvane  = "select accid, komment from hozzaszolasok where accid='{$bejelentid}' and komment='{$szoveg}' and hirid='{$id}'";

           $eredmenyvane = mysqli_query($dbconn,$sqlvane);

if (mysqli_num_rows($eredmenyvane) == 0) {
    $sql = "INSERT INTO `hozzaszolasok`(`hirid`, `komment`, `kommentdátum`, `accid`) VALUES ('{$id}','{$szoveg}',NOW(),'{$bejelentid}')";
    mysqli_query($dbconn, $sql);
    // print_r($id);
    // header("Location:../hirek/".$alias."#irdkomment");
    // header("Refresh: 0");
}
       }
    } else {
        $hozzaszolas = "<p class=\"tobbkomment\" onclick=\"morecomment()\">Többi hozzászólás</p>
                <p>Ha kommentelni akarsz jelentkezz be vagy regisztrálj!</p></div>";
    }

}
//és hibakezelés
else {
    $leírás = "";
    $tartalom = "<p><em>A keresett oldal nincs more!</em></p>";
    $létrehozás = date("Y-m-d H:i:s");
    $módosítás = date("Y-m-d H:i:s");
    $hozzaszolas = "Nincs mihez hozzászólni!";
}


$sablon = file_get_contents("hirsablon.html");

$sablon = str_replace("{{kivanbent}}", $kivanbent, $sablon);
$sablon = str_replace("{{futammenu}}", $futammenu, $sablon);
$sablon = str_replace("{{tabellamenu}}", $tabellamenu, $sablon);
$sablon = str_replace("{{admin}}", $admin, $sablon);
$sablon = str_replace("{{permission}}", $permission, $sablon);
$sablon = str_replace("{{userfoto}}", $foto, $sablon);
$sablon = str_replace("{{tartalom}}", $tartalom, $sablon);
$sablon = str_replace("{{letrehozas}}", $létrehozás, $sablon);
$sablon = str_replace("{{cim}}", $cím, $sablon);
$sablon = str_replace("{{iro}}", $iro, $sablon);
$sablon = str_replace("{{foto}}", $fotok, $sablon);
// $sablon = str_replace("{{kovifutam}}", $kovifutam, $sablon);
// $sablon = str_replace("{{elsohir}}", $elsohir, $sablon);
$sablon = str_replace("{{hozzaszolas}}", $hozzaszolas, $sablon);
$sablon = str_replace("{{kepcsere}}", $kepcsere, $sablon);


print_r($sablon);
