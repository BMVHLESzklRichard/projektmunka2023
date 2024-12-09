<?php
use function PHPSTORM_META\map;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

require("../../../kapcsolat/kapcsproj.php");
if (!isset($_SESSION['belepett'])) {
    $kivanbent = "<span class=\"hu\">Vendég</span>
    <span class=\"en\">Visitor</span>";
    $permission = "<span class=\"hu\">Vendég</span>
    <span class=\"en\">Visitor</span>";
    $foto = "v.jpg";
    $bejelentid = "Nincs Id";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../../admin/logout.php\"> 
    <span class=\"hu\">Belépés</span>
    <span class=\"en\">Log in</span>
    <span><i class=\"material-icons  piros\">login</i></span>
            </a></p>
  
    </div>";
    $kepcsere = "<img src=../../../kpes/" . $foto . ">";
    $namechange  = "";

} else if ($_SESSION['userper'] == "user") {
    $permission = $_SESSION["userper"]==0?"user":"admin";
    $kivanbent = $_SESSION["username"]  != "" ? $_SESSION["username"] : $_SESSION["user_name"];
    $foto = $_SESSION["csereltfoto"]  != "" ? $_SESSION["csereltfoto"] : $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../../admin/logout.php\">
    <span class=\"hu\">Kilépés</span>
    <span class=\"en\">Log out</span>
    <span><i class=\"material-icons  piros\">logout</i></span>
    </a></p>
  
    </div>";
    $kepcsere = "<a href=\"../../both/changepic.php\"><img src=../../../kpes/" . $foto . "></a>";
    $namechange = "<a href=\"../../both/changename.php\"><i class=\"material-icons lila\">mode_edit</i></a>";

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
                <span><i class=\"material-icons  piros\">logout</i></span>
            </a></p>
    </div>";
    $kepcsere = "<a href=\"../../both/changepic.php\"><img src=../../../kpes/" . $foto . "></a>";
    $namechange = "<a href=\"../../changename.php\"><i class=\"material-icons lila\">mode_edit</i></a>";
}


$sql2 = "SELECT id, raceName, raceDate, racePic FROM races WHERE DATE(raceDate) >= DATE(NOW()) ORDER BY raceDate ASC limit 1";

$eredmeny2 = mysqli_query($dbconn, $sql2);

$futammenu = " <div class=\"elrendezes\">\n";
while ($sor2 = mysqli_fetch_assoc($eredmeny2)) {
    $futammenu .= " 
                <div class=\"kovetkezo_futam\">
                    <div class=\"card\">
                        <img src=\"../../{$sor2["racePic"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["raceName"]}</h5>
                            <p class=\"card-text\">{$sor2["raceDate"]}</p>
                        </div>
                    </div>
                </div>";
}

$sql3 = "SELECT id, raceName, raceDate, racePic FROM races WHERE DATE(raceDate) >= DATE(NOW()) ORDER BY raceDate ASC limit 1,3";

$eredmeny3 = mysqli_query($dbconn, $sql3);

while ($sor2 = mysqli_fetch_assoc($eredmeny3)) {
    $futammenu .= " 
                
                    <div class=\"nincsborder\">
                        <img src=\"../../{$sor2["racePic"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["raceName"]}</h5>
                            <p class=\"card-text\">{$sor2["raceDate"]}</p>
                        </div>
                    </div>";
}
$futammenu .= "</div>";

$alias = (isset($_GET['alias']) ? $_GET['alias'] : "oke");
$sql = "SELECT news.id,news.content,news.creationDate,news.modDate,news.description,news.title,accounts.name, accounts.photo
        FROM `news` 
        INNER JOIN accounts ON news.writerId = accounts.id
        WHERE alias = '{$alias}'
        LIMIT 1";



$eredmeny = mysqli_query($dbconn, $sql);

//érvényes tartalom 
if (mysqli_num_rows($eredmeny) == 1) {
    $sor = mysqli_fetch_assoc($eredmeny);
    $leírás = $sor["description"];
    $cím = $sor["title"];
    $tartalom = $sor["content"];
    $létrehozás = $sor["creationDate"];
    $módosítás = $sor["modDate"];
    $id = $sor["id"];
    $iro = $sor["name"];
    $fotok = $sor["photo"];
    $_SESSION["alias"] = $alias;


    if ($bejelentid != "Nincs Id") {

        $hozzaszolas = "<div class=\"kommentbeiras\">
        <form method=\"post\" action=\"{$alias}\" id=\"commentid\">
 <input type=\"hidden\" id=\"tema_id\" name=\"tema_id\" value=\"0\">
 <p class=\"kommentform\"><textarea id=\"szoveg\" name=\"szoveg\" maxlength=\"25500\" required></textarea>
 <input type=\"submit\" id=\"new\" name=\"new\" value=\"OK\"></p>
 </form><p class=\"tobbkomment\" onclick=\"morecomment()\">Többi hozzászólás</p></div>";
       if(isset($_POST['new']))
       {
           $szoveg = strip_tags(trim($_POST['szoveg']));

           $sqlvane  = "select accid, comment from comments where accid='{$bejelentid}' and comment='{$szoveg}' and newsid='{$id}'";

           $eredmenyvane = mysqli_query($dbconn,$sqlvane);

if (mysqli_num_rows($eredmenyvane) == 0) {
    $sql = "INSERT INTO `comments`(`newsid`, `comment`, `commentDate`, `accid`) VALUES ('{$id}','{$szoveg}',NOW(),'{$bejelentid}')";
    mysqli_query($dbconn, $sql);
    // print_r($id);
    // header("Location:../news/".$alias."#irdkomment");
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
    $tartalom = "<p><em>A keresett oldal nem található!</em></p>";
    $létrehozás = date("Y-m-d H:i:s");
    $módosítás = date("Y-m-d H:i:s");
    $hozzaszolas = "Nincs mihez hozzászólni!";
}


$sablon = file_get_contents("hirsablon.html");

$sablon = str_replace("{{kivanbent}}", $kivanbent, $sablon);
$sablon = str_replace("{{futammenu}}", $futammenu, $sablon);
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
$sablon = str_replace("{{namechange}}", $namechange, $sablon);


print_r($sablon);
