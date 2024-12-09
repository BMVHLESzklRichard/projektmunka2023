<?php
$tabellamenu = "<div class=\"top3elrendezes\">
                    <div class=\"elrendezestab\">
                        <div class=\"active\" id=\"top3pilota\">";
$pilotatab = "<div class=\"top3pilotakflex\"><div class=\"top3pilotak\">";

$sql5 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 1,1";

$eredmeny5 = mysqli_query($dbconn, $sql5);

while ($sor4 = mysqli_fetch_assoc($eredmeny5)) {
    $pilotatab .= "<div class=\"hover-img2 masodik\"><img src=\"../../kepek/pilotakepek/{$sor4["driverPhoto"]}\"><figcaption>{$sor4["firstName"]} {$sor4["lastName"]}<br>{$sor4["driverPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

// $pilotatab.="</div>";
$sql4 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 1";

$eredmeny4 = mysqli_query($dbconn, $sql4);
while ($sor4 = mysqli_fetch_assoc($eredmeny4)) {
    $pilotatab .= "<div class=\"hover-img2 elso\"><img src=\"../../kepek/pilotakepek/{$sor4["driverPhoto"]}\"><figcaption>{$sor4["firstName"]} {$sor4["lastName"]}<br>{$sor4["driverPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}


$sql6 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 2,1";

$eredmeny6 = mysqli_query($dbconn, $sql6);

while ($sor4 = mysqli_fetch_assoc($eredmeny6)) {
    $pilotatab .= "<div class=\"hover-img2 harmadik\"><img src=\"../../kepek/pilotakepek/{$sor4["driverPhoto"]}\"><figcaption>{$sor4["firstName"]} {$sor4["lastName"]}<br>{$sor4["driverPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql7 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 3,19";

$eredmeny7 = mysqli_query($dbconn, $sql7);

$pilotatab .= "</div><div class=\"morepilots\"><p><a href=\"teljestabella.php\"><span class=\"hu\">Többi pilóta...</span><span class=\"en\">More...</span></a></p></div></div>";
// $pilotatab .="</div>";

$sql4 = "SELECT * from `teams` order by teams.teamPoints desc limit 1";

$eredmeny4 = mysqli_query($dbconn, $sql4);

$csapattab = "<div class=\"pilotakflex\"><div class=\"csapatok\">";

while ($sor4 = mysqli_fetch_assoc($eredmeny4)) {
    $csapattab .= "<div class=\"hover-img2 elso\"><img src=\"../../kepek/kocsirajzok/{$sor4["carPhoto"]}\"><figcaption>{$sor4["teamName"]}<br>{$sor4["teamPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql5 = "SELECT * from `teams` order by  teams.teamPoints desc limit 1,1";

$eredmeny5 = mysqli_query($dbconn, $sql5);

while ($sor4 = mysqli_fetch_assoc($eredmeny5)) {
    $csapattab .= "<div class=\"hover-img2 masodik\"><img src=\"../../kepek/kocsirajzok/{$sor4["carPhoto"]}\"><figcaption>{$sor4["teamName"]}<br>{$sor4["teamPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql6 = "SELECT * from `teams` order by teams.teamPoints desc limit 2,1";

$eredmeny6 = mysqli_query($dbconn, $sql6);

while ($sor4 = mysqli_fetch_assoc($eredmeny6)) {
    $csapattab .= "<div class=\"hover-img2 harmadik\"><img src=\"../../kepek/kocsirajzok/{$sor4["carPhoto"]}\"><figcaption>{$sor4["teamName"]}<br>{$sor4["teamPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql7 = "SELECT * from `teams` order by  teams.teamPoints desc limit 3,7";

$eredmeny7 = mysqli_query($dbconn, $sql7);

$csapattab .= "</div><div class=\"morepilots\"><p><a href=\"teljestabella.php\"><span class=\"hu\">Többi csapat...</span><span class=\"en\">More...</span></a></p></div></div>";
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



?>