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
    $admin = "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../../admin/logout.php\"> 
    <span class=\"hu\">Belépés</span>
    <span class=\"en\">Log in</span>
    <span><i class=\"material-icons  piros\">login</i></span>
            </a></p>
  
    </div>";
    $kepcsere = "<img src=../../../kpes/" . $foto . ">";
    $namechange = "";

} else if ($_SESSION['userper'] == "user") {
    $permission = $_SESSION["userper"] == 0 ? "user" : "admin";
    $kivanbent = $_SESSION["username"] != "" ? $_SESSION["username"] : $_SESSION["user_name"];
    $foto = $_SESSION["csereltfoto"] != "" ? $_SESSION["csereltfoto"] : $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $admin = "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../../admin/logout.php\">
    <span class=\"hu\">Kilépés</span>
    <span class=\"en\">Log out</span>
    <span><i class=\"material-icons  piros\">logout</i></span>
    </a></p>
  
    </div>";
    $kepcsere = "<a href=\"../../both/changepic.php\"><img src=../../../kpes/" . $foto . "></a>";
    $namechange = "<a href=\"../../both/changename.php\"><i class=\"material-icons lila\">mode_edit</i></a>";

} else {
    $permission = $_SESSION["userper"] == 0 ? "user" : "admin";
    $kivanbent = $_SESSION["username"] != "" ? $_SESSION["username"] : $_SESSION["user_name"];
    $foto = $_SESSION["csereltfoto"] != "" ? $_SESSION["csereltfoto"] : $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $admin = "<div class=\"kilep belsofelhasznalo\">
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
    $namechange = "<a href=\"../../both/changename.php\"><i class=\"material-icons lila\">mode_edit</i></a>";
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


$tabellamenu = "<div class=\"top3elrendezes\">
                    <div class=\"elrendezestab\">
                        <div class=\"active\" id=\"top3pilota\">";
$pilotatab = "<div class=\"top3pilotakflex\"><div class=\"top3pilotak\">";

$sql5 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 1,1";

$eredmeny5 = mysqli_query($dbconn, $sql5);

while ($sor4 = mysqli_fetch_assoc($eredmeny5)) {
    $pilotatab .= "<div class=\"hover-img2 masodik\"><img src=\"../../../kepek/pilotakepek/{$sor4["driverPhoto"]}\"><figcaption>{$sor4["firstName"]} {$sor4["lastName"]}<br>{$sor4["driverPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

// $pilotatab.="</div>";
$sql4 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 1";

$eredmeny4 = mysqli_query($dbconn, $sql4);
while ($sor4 = mysqli_fetch_assoc($eredmeny4)) {
    $pilotatab .= "<div class=\"hover-img2 elso\"><img src=\"../../../kepek/pilotakepek/{$sor4["driverPhoto"]}\"><figcaption>{$sor4["firstName"]} {$sor4["lastName"]}<br>{$sor4["driverPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}


$sql6 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 2,1";

$eredmeny6 = mysqli_query($dbconn, $sql6);

while ($sor4 = mysqli_fetch_assoc($eredmeny6)) {
    $pilotatab .= "<div class=\"hover-img2 harmadik\"><img src=\"../../../kepek/pilotakepek/{$sor4["driverPhoto"]}\"><figcaption>{$sor4["firstName"]} {$sor4["lastName"]}<br>{$sor4["driverPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql7 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 3,19";

$eredmeny7 = mysqli_query($dbconn, $sql7);

$pilotatab .= "</div><div class=\"morepilots\"><p><a href=\"../teljestabella.php\"><span class=\"hu\">Többi pilóta...</span><span class=\"en\">More...</span></a></p></div></div>";
// $pilotatab .="</div>";

$sql4 = "SELECT * from `teams` order by teams.teamPoints desc limit 1";

$eredmeny4 = mysqli_query($dbconn, $sql4);

$csapattab = "<div class=\"pilotakflex\"><div class=\"csapatok\">";

while ($sor4 = mysqli_fetch_assoc($eredmeny4)) {
    $csapattab .= "<div class=\"hover-img2 elso\"><img src=\"../../../kepek/kocsirajzok/{$sor4["carPhoto"]}\"><figcaption>{$sor4["teamName"]}<br>{$sor4["teamPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql5 = "SELECT * from `teams` order by  teams.teamPoints desc limit 1,1";

$eredmeny5 = mysqli_query($dbconn, $sql5);

while ($sor4 = mysqli_fetch_assoc($eredmeny5)) {
    $csapattab .= "<div class=\"hover-img2 masodik\"><img src=\"../../../kepek/kocsirajzok/{$sor4["carPhoto"]}\"><figcaption>{$sor4["teamName"]}<br>{$sor4["teamPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql6 = "SELECT * from `teams` order by teams.teamPoints desc limit 2,1";

$eredmeny6 = mysqli_query($dbconn, $sql6);

while ($sor4 = mysqli_fetch_assoc($eredmeny6)) {
    $csapattab .= "<div class=\"hover-img2 harmadik\"><img src=\"../../../kepek/kocsirajzok/{$sor4["carPhoto"]}\"><figcaption>{$sor4["teamName"]}<br>{$sor4["teamPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql7 = "SELECT * from `teams` order by  teams.teamPoints desc limit 3,7";

$eredmeny7 = mysqli_query($dbconn, $sql7);

$csapattab .= "</div><div class=\"morepilots\"><p><a href=\"../teljestabella.php\"><span class=\"hu\">Többi csapat...</span><span class=\"en\">More...</span></a></p></div></div>";
$tabellamenu .= $pilotatab;
$tabellamenu .= "</div>
                    <div id=\"top3csapat\" class=\"hide\">";
$tabellamenu .= $csapattab;
$tabellamenu .= "</div>";
$tabellamenu .= "</div>
                    </div>
                    <div class=\"topCarouselButtons\"><button id=\"prevTop3\" style=\"display:none\">
                    <span></span><span>Pilóták</span>
                </button>
                <button id=\"nextTop3\">
                    <span></span><span>Csapatok</span>
                </button></div>";



$raceURL = (isset($_GET['raceURL']) ? $_GET['raceURL'] : "oke");
$sql = "SELECT racePic, raceName, raceURL, raceDate,id,countryFlag, podiumStyle,podiumName, countryScene
FROM `races` where raceURL = '{$raceURL}' limit 1";

$eredmeny = mysqli_query($dbconn, $sql);

$carmenu = " <div class=\"carousel-inner\">\n";
if (mysqli_num_rows($eredmeny) == 1) {
    $sor = mysqli_fetch_assoc($eredmeny);

    $carmenu .= "<div style=\"background: url(../../../kepek/countryScenes/{$sor["countryScene"]}.jpg)\" class=\"podiumCountryScene\"></div>";
    $currentRaceName = $raceURL;
    $carmenu .= "<div class=\"carousel-item active\">
                        <img src=\"../../../kepek/zaszlok/{$sor["countryFlag"]}\" alt=\"countryFlag\" class=\"podiumCountryFlag\">
                        <div class=\"mainPodium\">
                            <div class=\"podium {$sor["podiumStyle"]}\">
                                <canvas id=\"confetti{$sor["id"]}\" class=\"confetticanvas\"></canvas>
                                <img src=\"../../../kepek/champagnebottle.png\" alt=\"champagneBottle\" class=\"confettibottle\" id=\"champagneBottle{$sor["id"]}\">
                                <div class=\"podiumTitle\"><img src=\"../../../kepek/f1logotrans.png\" alt=\"f1logo\">
                                    <h4>Formula 1 {$sor["podiumName"]} grand prix 2024</h4>
                                </div>
                                <div class=\"podiumStairs\">
                                    ";

    $sql2nd = "SELECT nationality.flagPhoto, races.raceName, drivers.driverPhoto, results.fastestLap, pointsystem.point 
                                        FROM results 
                                        inner join pointsystem on pointsystem.id = results.positionId 
                                        INNER join races on races.id = results.raceId 
                                        INNER JOIN drivers ON results.driverId = drivers.id 
                                        INNER JOIN nationality ON drivers.nationalityId = nationality.id 
                                        WHERE races.raceURL = '{$raceURL}' and pointsystem.place = 2;";

    $eredmeny2nd = mysqli_query($dbconn, $sql2nd);

    while ($sor2nd = mysqli_fetch_assoc($eredmeny2nd)) {
        $fastestColor = ($sor2nd["fastestLap"] ? "fastestColor" : "");
        $fastestLapPoint = ($sor2nd["fastestLap"] ? 1 : 0);
        $maxPoint = ($sor2nd["point"] + $fastestLapPoint);
        $fastestLapIcon = ($sor2nd["fastestLap"] ? "<div class=\"driverLiPosition3\">
        <img src=\"../../../kepek/fstlap.jpg\" alt=\"fastestLapIcon\" title=\"fastestLapIcon\" style=\"width:100%\"></div>
        " : "");
        $carmenu .= "<div class=\"secondPod pods\">
                                            <div class=\"podIMGFlag\"><img
                                                    src=\"../../../kepek/zaszlok/{$sor2nd["flagPhoto"]}\" alt=\"\"></div>
                                            <div class=\"podIMGDriver\"><img
                                                    src=\"../../../kepek/pilotakepek/{$sor2nd["driverPhoto"]}\" alt=\"\">
                                            </div>
                                            <div class=\"podStair\">
                                                <h3>2.</h3>
                                                {$fastestLapIcon}
                                                <p class=\"podiumPont {$fastestColor}\">({$maxPoint}pts)</p>
                                            </div>
                                            </div>";
    }


    $sql1st = "SELECT nationality.flagPhoto, races.raceName, drivers.driverPhoto, results.fastestLap, pointsystem.point 
                                        FROM results 
                                        inner join pointsystem on pointsystem.id = results.positionId 
                                        INNER join races on races.id = results.raceId 
                                        INNER JOIN drivers ON results.driverId = drivers.id 
                                        INNER JOIN nationality ON drivers.nationalityId = nationality.id 
                                        WHERE races.raceURL = '{$raceURL}' and pointsystem.place = 1;";

    $eredmeny1st = mysqli_query($dbconn, $sql1st);

    while ($sor1st = mysqli_fetch_assoc($eredmeny1st)) {
        $fastestColor = ($sor1st["fastestLap"] ? "fastestColor" : "");
        $fastestLapPoint = ($sor1st["fastestLap"] ? 1 : 0);
        $maxPoint = ($sor1st["point"] + $fastestLapPoint);
        $fastestLapIcon = ($sor1st["fastestLap"] ? "<div class=\"driverLiPosition3\">
        <img src=\"../../../kepek/fstlap.jpg\" alt=\"fastestLapIcon\" title=\"fastestLapIcon\" style=\"width:100%\"></div>
        " : "");
        $carmenu .= "<div class=\"firstPod pods\">
                                            <div class=\"podIMGFlag\"><img
                                                    src=\"../../../kepek/zaszlok/{$sor1st["flagPhoto"]}\" alt=\"\"></div>
                                            <div class=\"podIMGDriver\"><img
                                                    src=\"../../../kepek/pilotakepek/{$sor1st["driverPhoto"]}\" alt=\"\">
                                            </div>
                                            <div class=\"podStair\">
                                                <h3>1.</h3>
                                                {$fastestLapIcon}
                                                <p class=\"podiumPont {$fastestColor}\">({$maxPoint}pts)</p>
                                            </div>
                                            </div>";
    }

    $sql3rd = "SELECT nationality.flagPhoto, races.raceName, drivers.driverPhoto, results.fastestLap, pointsystem.point 
                                        FROM results 
                                        inner join pointsystem on pointsystem.id = results.positionId 
                                        INNER join races on races.id = results.raceId 
                                        INNER JOIN drivers ON results.driverId = drivers.id 
                                        INNER JOIN nationality ON drivers.nationalityId = nationality.id 
                                        WHERE races.raceURL = '{$raceURL}' and pointsystem.place = 3;";

    $eredmeny3rd = mysqli_query($dbconn, $sql3rd);

    while ($sor3rd = mysqli_fetch_assoc($eredmeny3rd)) {
        $fastestColor = ($sor3rd["fastestLap"] ? "fastestColor" : "");
        $fastestLapPoint = ($sor3rd["fastestLap"] ? 1 : 0);
        $maxPoint = ($sor3rd["point"] + $fastestLapPoint);
        $fastestLapIcon = ($sor3rd["fastestLap"] ? "<div class=\"driverLiPosition3\">
        <img src=\"../../../kepek/fstlap.jpg\" alt=\"fastestLapIcon\" title=\"fastestLapIcon\" style=\"width:100%\"></div>
        " : "");
        $carmenu .= "<div class=\"thirdPod pods\">
                                            <div class=\"podIMGFlag\"><img
                                                    src=\"../../../kepek/zaszlok/{$sor3rd["flagPhoto"]}\" alt=\"\"></div>
                                            <div class=\"podIMGDriver\"><img
                                                    src=\"../../../kepek/pilotakepek/{$sor3rd["driverPhoto"]}\" alt=\"\">
                                            </div>
                                            <div class=\"podStair\">
                                                <h3>3.</h3>
                                                {$fastestLapIcon}
                                                <p class=\"podiumPont {$fastestColor}\">({$maxPoint}pts)</p>
                                            </div>
                                            </div>";
    }

    $carmenu .= "
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>\n";

    $sqlothers = "SELECT nationality.flagPhoto, races.raceName, drivers.driverPhoto, 
    pointsystem.place, teams.teamName,drivers.lastName, drivers.firstName, pointsystem.point, results.fastestLap  
    FROM results 
    inner join pointsystem on pointsystem.id = results.positionId 
    INNER join races on races.id = results.raceId 
    INNER JOIN drivers ON results.driverId = drivers.id 
    INNER JOIN nationality ON drivers.nationalityId = nationality.id 
    inner join fullteams on fullteams.driverId = drivers.id
    inner join teams on fullteams.teamId = teams.id
    WHERE races.raceURL = '{$raceURL}' order by results.positionId limit 3,20;";

    $eredmenyothers = mysqli_query($dbconn, $sqlothers);
    $driverLiList = "<ul>";
    while ($sorothers = mysqli_fetch_assoc($eredmenyothers)) {
        $fastestColor = ($sorothers["fastestLap"] ? "fastestColor" : "");
        $fastestLapPoint = ($sorothers["fastestLap"] ? 1 : 0);
        $maxPoint = ($sorothers["point"] + $fastestLapPoint);
        $fastestLapIcon = ($sorothers["fastestLap"] ? "<div class=\"driverLiPosition3\"><p>{$sorothers["place"]}th</p>
        <p class=\"{$fastestColor}\">({$maxPoint}pts)</p>
        <img src=\"../../../kepek/fstlap.jpg\" alt=\"fastestLapIcon\" title=\"fastestLapIcon\" style=\"width:100%\"></div>
        " : "<div class=\"driverLiPosition\"><p>{$sorothers["place"]}th</p>
        <p class=\"{$fastestColor}\">({$sorothers["point"]}pts)</p></div>");
        $driverLiList .= "<li>";
        $driverLiList .= "<div class=\"driverLi\">
        <div class=\"driverLiFlag\"><img src=\"../../../kepek/zaszlok/{$sorothers["flagPhoto"]}\" alt=\"\"></div>
        <div class=\"driverLiIMG\"><img src=\"../../../kepek/pilotakepek/{$sorothers["driverPhoto"]}\" alt=\"\"></div>
        <div class=\"driverLiName\"><i>{$sorothers["firstName"]} <span><b>{$sorothers["lastName"]}</b></span></i></div>
        <div class=\"driverLiTeamName\"><span>{$sorothers["teamName"]}</span></div>
        {$fastestLapIcon}
    </div>";
    $driverLiList .="</li>";
    }
    $driverLiList .="</ul>";
    //érvényes tartalom 

    $cím = $sor["raceName"];
    $tartalom = $carmenu;
    $id = $sor["id"];
    $fotok = $sor["racePic"];
    $_SESSION["raceURL"] = $raceURL;
}
//és hibakezelés
else {
    $leírás = "";
    $tartalom = "<p><em>A keresett oldal nem található!</em></p>";
    $létrehozás = date("Y-m-d H:i:s");
    $módosítás = date("Y-m-d H:i:s");
    $hozzaszolas = "Nincs mihez hozzászólni!";
}


$sablon = file_get_contents("sportsablon.html");

$sablon = str_replace("{{kivanbent}}", $kivanbent, $sablon);
$sablon = str_replace("{{futammenu}}", $futammenu, $sablon);
$sablon = str_replace("{{tabellamenu}}", $tabellamenu, $sablon);
$sablon = str_replace("{{admin}}", $admin, $sablon);
$sablon = str_replace("{{permission}}", $permission, $sablon);
$sablon = str_replace("{{driverLiList}}", $driverLiList, $sablon);
$sablon = str_replace("{{userfoto}}", $foto, $sablon);
$sablon = str_replace("{{tartalom}}", $tartalom, $sablon);
$sablon = str_replace("{{cim}}", $cím, $sablon);
$sablon = str_replace("{{foto}}", $fotok, $sablon);
$sablon = str_replace("{{kepcsere}}", $kepcsere, $sablon);
$sablon = str_replace("{{namechange}}", $namechange, $sablon);


print_r($sablon);
