<?php
$tabellamenu = "<div class=\"elrendezestab\"><div class=\"pilotakflex\"><div class=\"pilotak\">";

$sql5 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 1,1";

$eredmeny5 = mysqli_query($dbconn,$sql5);

while($sor4 = mysqli_fetch_assoc($eredmeny5))
{
    $tabellamenu.="<div class=\"hover-img2 masodik\"><img src=\"../kepek/pilotakepek/{$sor4["driverPhoto"]}\"><figcaption>{$sor4["firstName"]} {$sor4["lastName"]}<br>{$sor4["driverPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption>";
}

$tabellamenu.="</div>";
$sql4 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 1";

$eredmeny4 = mysqli_query($dbconn,$sql4);
while($sor4 = mysqli_fetch_assoc($eredmeny4))
{
    $tabellamenu.="<div class=\" hover-img2 elso\"><img src=\"../kepek/pilotakepek/{$sor4["driverPhoto"]}\"><figcaption>{$sor4["firstName"]} {$sor4["lastName"]}<br>{$sor4["driverPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}


$sql6 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 2,1";

$eredmeny6 = mysqli_query($dbconn,$sql6);

while($sor4 = mysqli_fetch_assoc($eredmeny6))
{
    $tabellamenu.="<div class=\"hover-img2 harmadik\"><img src=\"../kepek/pilotakepek/{$sor4["driverPhoto"]}\"><figcaption>{$sor4["firstName"]} {$sor4["lastName"]}<br>{$sor4["driverPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql7 = "SELECT * from `drivers` order by drivers.driverPoints desc, drivers.id asc limit 3,17";

$eredmeny7 = mysqli_query($dbconn,$sql7);

$tabellamenu.="</div><ul>";
while($sor4 = mysqli_fetch_assoc($eredmeny7))
{
    $tabellamenu.="<li><div>{$sor4["firstName"]} {$sor4["lastName"]}</div> <div style=\"display:flex;gap:5px;\">{$sor4["driverPoints"]} <span class=\"hu\"> pont</span>
    <span class=\"en\"> points</span></div></li>";
}

$sql4 = "SELECT * from `teams` order by teams.teamPoints desc limit 1";

$eredmeny4 = mysqli_query($dbconn,$sql4);

$csapattab = "<div class=\"pilotakflex\"><div class=\"csapatok\">";

while($sor4 = mysqli_fetch_assoc($eredmeny4))
{
    $csapattab.="<div class=\"hover-img2 elso\"><img src=\"../kepek/kocsirajzok/{$sor4["carPhoto"]}\"><figcaption>{$sor4["teamName"]}<br>{$sor4["teamPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql5 = "SELECT * from `teams` order by  teams.teamPoints desc limit 1,1";

$eredmeny5 = mysqli_query($dbconn,$sql5);

while($sor4 = mysqli_fetch_assoc($eredmeny5))
{
    $csapattab.="<div class=\"hover-img2 masodik\"><img src=\"../kepek/kocsirajzok/{$sor4["carPhoto"]}\"><figcaption>{$sor4["teamName"]}<br>{$sor4["teamPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql6 = "SELECT * from `teams` order by teams.teamPoints desc limit 2,1";

$eredmeny6 = mysqli_query($dbconn,$sql6);

while($sor4 = mysqli_fetch_assoc($eredmeny6))
{
    $csapattab.="<div class=\"hover-img2 harmadik\"><img src=\"../kepek/kocsirajzok/{$sor4["carPhoto"]}\"><figcaption>{$sor4["teamName"]}<br>{$sor4["teamPoints"]} <span class=\"hu\">pont</span>
    <span class=\"en\">points</span></figcaption></div>";
}

$sql7 = "SELECT * from `teams` order by  teams.teamPoints desc limit 3,7";

$eredmeny7 = mysqli_query($dbconn,$sql7);

$csapattab.="</div><ul>";

while($sor4 = mysqli_fetch_assoc($eredmeny7))
{
    $csapattab.="<li><div>{$sor4["teamName"]}</div> <div style=\"display:flex;gap:5px;\">{$sor4["teamPoints"]} <span class=\"hu\"> pont</span>
    <span class=\"en\"> points</span></div></li>";
}
$csapattab.="</ul></div>";

$tabellamenu .="</ul></div>";
$tabellamenu .= $csapattab;

$tabellamenu.="</div>";

?>