<?php
use function PHPSTORM_META\map;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

require("../../kapcsolat/kapcsproj.php");
if (!isset($_SESSION['belepett'])) {
    $kivanbent = "Guest";
    $permission = "Guest";
    $foto = "v.jpg";
    $bejelentid = "Nincs id";
    $login = "LOG IN";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../admin/logout.php\"> 
         $login 
            </a></p>
  
    </div>";
  
}
else if($_SESSION['userper'] == "user")
{
    $permission = $_SESSION["userper"]==0?"user":"admin";
    $kivanbent = $_SESSION["user_name"];
    $foto = $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $login = "LOG OUT";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../admin/logout.php\">
         $login
            </a></p>
  
    </div>";

}
else {
    $permission = $_SESSION["userper"]==0?"user":"admin";
    $kivanbent = $_SESSION["user_name"];
    $foto = $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $login = "LOG OUT";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../admin/logout.php\"> 
         $login 
            </a></p>
            <p><a href=\"../../admin/admin.php\"> 
         Admin felület
            </a></p>
    </div>";
}


$sql2 = "SELECT id, futamnev, futamidopont, futamkep FROM futamok WHERE DATE(futamidopont) >= DATE(NOW()) ORDER BY futamidopont ASC limit 1";

$eredmeny2 = mysqli_query($dbconn,$sql2);

$futammenu = " <div class=\"elrendezes\">\n";
while($sor2 = mysqli_fetch_assoc($eredmeny2))
{
    $futammenu .= " 
                <div class=\"kovetkezo_futam\">
                    <div class=\"card\">
                        <img src=\"../{$sor2["futamkep"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["futamnev"]}</h5>
                            <p class=\"card-text\">{$sor2["futamidopont"]}</p>
                        </div>
                    </div>
                </div>";
}

$sql3 = "SELECT id, futamnev, futamidopont, futamkep FROM futamok WHERE DATE(futamidopont) >= DATE(NOW()) ORDER BY futamidopont ASC limit 1,3";

$eredmeny3 = mysqli_query($dbconn,$sql3);

while($sor2 = mysqli_fetch_assoc($eredmeny3))
{
    $futammenu .= " 
                
                    <div class=\"nincsborder\">
                        <img src=\"../{$sor2["futamkep"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["futamnev"]}</h5>
                            <p class=\"card-text\">{$sor2["futamidopont"]}</p>
                        </div>
                    </div>";
}
$futammenu .="</div>";








$tabellamenu = "<div class=\"elrendezestab\"><div class=\"pilotakflex\"><div class=\"pilotak\">";

$sql5 = "SELECT * FROM `pilotak` order by pilotak.pilotapont desc, pilotak.id asc limit 1,1";

$eredmeny5 = mysqli_query($dbconn,$sql5);

while($sor4 = mysqli_fetch_assoc($eredmeny5))
{
    $tabellamenu.="<div class=\"hover-img2 masodik\"><img src=\"../../kepek/pilotakepek/{$sor4["pilotafoto"]}\"><figcaption>{$sor4["pilotaknev"]} {$sor4["pilotavnev"]}<br>{$sor4["pilotapont"]} pont</figcaption>";
}

$tabellamenu.="</div>";
$sql4 = "SELECT * FROM `pilotak` order by pilotak.pilotapont desc, pilotak.id asc limit 1";

$eredmeny4 = mysqli_query($dbconn,$sql4);
while($sor4 = mysqli_fetch_assoc($eredmeny4))
{
    $tabellamenu.="<div class=\" hover-img2 elso\"><img src=\"../../kepek/pilotakepek/{$sor4["pilotafoto"]}\"><figcaption>{$sor4["pilotaknev"]} {$sor4["pilotavnev"]}<br>{$sor4["pilotapont"]} pont</figcaption></div>";
}


$sql6 = "SELECT * FROM `pilotak` order by pilotak.pilotapont desc, pilotak.id asc limit 2,1";

$eredmeny6 = mysqli_query($dbconn,$sql6);

while($sor4 = mysqli_fetch_assoc($eredmeny6))
{
    $tabellamenu.="<div class=\"hover-img2 harmadik\"><img src=\"../../kepek/pilotakepek/{$sor4["pilotafoto"]}\"><figcaption>{$sor4["pilotaknev"]} {$sor4["pilotavnev"]}<br>{$sor4["pilotapont"]} pont</figcaption></div>";
}

$sql7 = "SELECT * FROM `pilotak` order by pilotak.pilotapont desc, pilotak.id asc limit 3,17";

$eredmeny7 = mysqli_query($dbconn,$sql7);

$tabellamenu.="</div><ul>";
while($sor4 = mysqli_fetch_assoc($eredmeny7))
{
    $tabellamenu.="<li><div>{$sor4["pilotaknev"]} {$sor4["pilotavnev"]}</div> <div>{$sor4["pilotapont"]} pont</div></li>";
}

$sql4 = "SELECT * FROM `csapatok` order by csapatok.csapatpont desc limit 1";

$eredmeny4 = mysqli_query($dbconn,$sql4);

$csapattab = "<div class=\"pilotakflex\"><div class=\"csapatok\">";

while($sor4 = mysqli_fetch_assoc($eredmeny4))
{
    $csapattab.="<div class=\"hover-img2 elso\"><img src=\"../../kepek/kocsirajzok/{$sor4["autofoto"]}\"><figcaption>{$sor4["csapatnev"]}<br>{$sor4["csapatpont"]} pont</figcaption></div>";
}

$sql5 = "SELECT * FROM `csapatok` order by  csapatok.csapatpont desc limit 1,1";

$eredmeny5 = mysqli_query($dbconn,$sql5);

while($sor4 = mysqli_fetch_assoc($eredmeny5))
{
    $csapattab.="<div class=\"hover-img2 masodik\"><img src=\"../../kepek/kocsirajzok/{$sor4["autofoto"]}\"><figcaption>{$sor4["csapatnev"]}<br>{$sor4["csapatpont"]} pont</figcaption></div>";
}

$sql6 = "SELECT * FROM `csapatok` order by csapatok.csapatpont desc limit 2,1";

$eredmeny6 = mysqli_query($dbconn,$sql6);

while($sor4 = mysqli_fetch_assoc($eredmeny6))
{
    $csapattab.="<div class=\"hover-img2 harmadik\"><img src=\"../../kepek/kocsirajzok/{$sor4["autofoto"]}\"><figcaption>{$sor4["csapatnev"]}<br>{$sor4["csapatpont"]} pont</figcaption></div>";
}

$sql7 = "SELECT * FROM `csapatok` order by  csapatok.csapatpont desc limit 3,7";

$eredmeny7 = mysqli_query($dbconn,$sql7);

$csapattab.="</div><ul>";

while($sor4 = mysqli_fetch_assoc($eredmeny7))
{
    $csapattab.="<li><div>{$sor4["csapatnev"]}</div> <div>{$sor4["csapatpont"]} pont</div></li>";
}
$csapattab.="</ul></div>";

$tabellamenu .="</ul></div>";
$tabellamenu .= $csapattab;

$tabellamenu.="</div>";






$sql = "SELECT id,alias,megjelenokep,cim,leiras
from hirek where fohir = 1 and statusz = 1 order by letrehozas desc limit 1";

$eredmeny = mysqli_query($dbconn,$sql);

$elsohir = "<div>\n";
while($sor = mysqli_fetch_assoc($eredmeny))
{
    $elsohir .= "<div class=\"footermagas\"><a href=\"hirek/{$sor["alias"]}\"><img src=\"../../kepek/f1cars2023/{$sor["megjelenokep"]}\" alt=\"MC\" style=\"width:100%;\"><div><p>{$sor["cim"]}</p></div></a></div>";
}
$elsohir .="</div>";


$sql2 = "SELECT id, futamnev, futamidopont, futamkep FROM futamok WHERE DATE(futamidopont) >= DATE(NOW()) ORDER BY futamidopont ASC limit 1";

$eredmeny2 = mysqli_query($dbconn,$sql2);

$kovifutam = "<div>\n";
while($sor2 = mysqli_fetch_assoc($eredmeny2))
{
    $kovifutam .= "<div class=\"footermagas\">
                        <img src=\"../{$sor2["futamkep"]}\" class=\"card-img-top\" alt=\"...\" style=\"width:100%;\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["futamnev"]}</h5>
                            <p class=\"card-text\">{$sor2["futamidopont"]}</p>
                        </div>
                </div>";
                $futamnev = $sor2["futamnev"];
}
$kovifutam .= "</div>";





$alias = (isset($_GET['alias']) ? $_GET['alias'] : "oke");
$sql = "SELECT hirek.id,hirek.tartalom,hirek.letrehozas,hirek.modositas,hirek.leiras,hirek.cim,bejelentkezettek.name, bejelentkezettek.foto
        FROM `hirek` 
        INNER JOIN bejelentkezettek ON hirek.hiriroid = bejelentkezettek.id
        WHERE alias = '{$alias}'
        LIMIT 1";



$eredmeny = mysqli_query($dbconn,$sql);

//érvényes tartalom 
if(mysqli_num_rows($eredmeny) == 1)
{
            $sor = mysqli_fetch_assoc($eredmeny);
            $leiras = $sor["leiras"];
            $cim = $sor["cim"];
            $tartalom = $sor["tartalom"];
            $letrehozas = $sor["letrehozas"];
            $modositas = $sor["modositas"];
            $id = $sor["id"];
            $iro = $sor["name"];
            $fotok = $sor["foto"];
            $_SESSION["alias"] = $alias;
            
          
            if ( $bejelentid != "Nincs id")
            {

            if (mysqli_num_rows($eredmeny2) >= 1)
            {
                $hozzaszolas= "<form method=\"post\" action=\"{$alias}\" id=\"komi\">
                    <h3>Új hozzászólás létrehozása</h3>
                    <input type=\"hidden\" id=\"tema_id\" name=\"tema_id\" value=\"0\">
                    <p>Hozzászólás szövege:*<br>
                    <textarea id=\"szoveg\" name=\"szoveg\" cols=\"40\" rows=\"5\" maxlength=\"255\" required></textarea></p>
                    <p><em>A csillaggal jelölt mező kitöltése kötelező!</em></p>
                    <input type=\"submit\" id=\"new\" name=\"new\" value=\"Létrehozás\">
                </form>";
                
            
                if (isset($_POST['new'])) {
                    $szoveg = strip_tags(trim($_POST['szoveg']));
                    $sql = "INSERT INTO `hozzaszolasok`(`hirid`, `kommentszoveg`, `kommentdatum`, `accid`) VALUES ('{$id}','{$szoveg}',NOW(),'{$bejelentid}')";
                    mysqli_query($dbconn, $sql);
                    print_r($id);
                    // header("Location:../hirek/".$alias);
                    header("Refresh: 0");
                }
            }
            else {
                $hozzaszolas= "<form method=\"post\" action=\"{$alias}\">
                    <h3>Új hozzászólás létrehozása</h3>
                    <input type=\"hidden\" id=\"tema_id\" name=\"tema_id\" value=\"0\">
                    <p>Hozzászólás szövege:*<br>
                    <textarea id=\"szoveg\" name=\"szoveg\" cols=\"40\" rows=\"5\" maxlength=\"255\" required></textarea></p>
                    <p><em>A csillaggal jelölt mező kitöltése kötelező!</em></p>
                    <input type=\"submit\" id=\"new\" name=\"new\" value=\"Létrehozás\">
                </form>";
                
            
                if (isset($_POST['new'])) {
                    $szoveg = strip_tags(trim($_POST['szoveg']));
                    $sql = "INSERT INTO `hozzaszolasok`(`hirid`, `kommentszoveg`, `kommentdatum`, `accid`) VALUES ('{$id}','{$szoveg}',NOW(),'{$bejelentid}')";
                    mysqli_query($dbconn, $sql);
                    print_r($id);
                    // header("Location:../hirek/".$alias);
                    header("Refresh: 0");
                }
            }
            }
            else {
                $hozzaszolas = "<div class=\"kommentek\"><h3 class=\"cimeakommentnek\">Hozzászólások</h3>
                <p></p>
                <div class=\"comment\">";
            
                while ($sor2 =mysqli_fetch_assoc($eredmeny2)) {
                    $hozzaszolas.= "<div class=\"uzenetdiv\">
                        <p class=\"uzenet\">{$sor2['kommentszoveg']}</p>
                        <p class=\"uzenetki\">Készítette: {$sor2['name']} <img class=\"uzenetkep\" src=\"../../kpes/{$sor2['foto']}\"><br>
                        <i>Létrehozva: {$sor2['kommentdatum']}</i></p>
                    </div>\n";
                }
                $hozzaszolas.= "</div>
                <p>Ha kommentelni akarsz jelentkezz be vagy regisztrálj!</p></div>";
            }
                
}
//és hibakezelés
else
{
    $leiras = ""; 
    $tartalom = "<p><em>A keresett oldal nincs more!</em></p>"; 
    $letrehozas = date("Y-m-d H:i:s");
    $modositas = date("Y-m-d H:i:s");
    $hozzaszolas = "Nincs mihez hozzászólni!";
}


$sablon = file_get_contents("hirsablon.html");

$sablon = str_replace("{{kivanbent}}",$kivanbent,$sablon);
$sablon = str_replace("{{futammenu}}",$futammenu,$sablon);
$sablon = str_replace("{{tabellamenu}}",$tabellamenu,$sablon);
$sablon = str_replace("{{admin}}",$admin,$sablon);
$sablon = str_replace("{{permission}}",$permission,$sablon);
$sablon = str_replace("{{userfoto}}",$foto,$sablon);
$sablon = str_replace("{{tartalom}}",$tartalom,$sablon);
$sablon = str_replace("{{letrehozas}}",$letrehozas,$sablon);
$sablon = str_replace("{{cim}}",$cim,$sablon);
$sablon = str_replace("{{iro}}",$iro,$sablon);
$sablon = str_replace("{{foto}}", $fotok, $sablon);
$sablon = str_replace("{{kovifutam}}", $kovifutam, $sablon);
$sablon = str_replace("{{elsohir}}", $elsohir, $sablon);
$sablon = str_replace("{{hozzaszolas}}",$hozzaszolas,$sablon);


print_r($sablon);
?>
