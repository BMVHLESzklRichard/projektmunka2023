<?php
$tabellamenu = "<div class=\"elrendezestab\"><div class=\"pilotakflex\"><div class=\"pilotak\">";

$sql5 = "SELECT * FROM `pilotak` order by pilotak.pilotapont desc, pilotak.id asc limit 1,1";

$eredmeny5 = mysqli_query($dbconn,$sql5);

while($sor4 = mysqli_fetch_assoc($eredmeny5))
{
    $tabellamenu.="<div class=\"hover-img2 masodik\"><img src=\"../kepek/pilotakepek/{$sor4["pilotafoto"]}\"><figcaption>{$sor4["pilotaknev"]} {$sor4["pilotavnev"]}<br>{$sor4["pilotapont"]} pont</figcaption>";
}

$tabellamenu.="</div>";
$sql4 = "SELECT * FROM `pilotak` order by pilotak.pilotapont desc, pilotak.id asc limit 1";

$eredmeny4 = mysqli_query($dbconn,$sql4);
while($sor4 = mysqli_fetch_assoc($eredmeny4))
{
    $tabellamenu.="<div class=\" hover-img2 elso\" id=\"vicc\"><img src=\"../kepek/pilotakepek/{$sor4["pilotafoto"]}\"><figcaption>{$sor4["pilotaknev"]} {$sor4["pilotavnev"]}<br>{$sor4["pilotapont"]} pont</figcaption></div>";
}


$sql6 = "SELECT * FROM `pilotak` order by pilotak.pilotapont desc, pilotak.id asc limit 2,1";

$eredmeny6 = mysqli_query($dbconn,$sql6);

while($sor4 = mysqli_fetch_assoc($eredmeny6))
{
    $tabellamenu.="<div class=\"hover-img2 harmadik\"><img src=\"../kepek/pilotakepek/{$sor4["pilotafoto"]}\"><figcaption>{$sor4["pilotaknev"]} {$sor4["pilotavnev"]}<br>{$sor4["pilotapont"]} pont</figcaption></div>";
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
    $csapattab.="<div class=\"hover-img2 elso\"><img src=\"../kepek/kocsirajzok/{$sor4["autofoto"]}\"><figcaption>{$sor4["csapatnev"]}<br>{$sor4["csapatpont"]} pont</figcaption></div>";
}

$sql5 = "SELECT * FROM `csapatok` order by  csapatok.csapatpont desc limit 1,1";

$eredmeny5 = mysqli_query($dbconn,$sql5);

while($sor4 = mysqli_fetch_assoc($eredmeny5))
{
    $csapattab.="<div class=\"hover-img2 masodik\"><img src=\"../kepek/kocsirajzok/{$sor4["autofoto"]}\"><figcaption>{$sor4["csapatnev"]}<br>{$sor4["csapatpont"]} pont</figcaption></div>";
}

$sql6 = "SELECT * FROM `csapatok` order by csapatok.csapatpont desc limit 2,1";

$eredmeny6 = mysqli_query($dbconn,$sql6);

while($sor4 = mysqli_fetch_assoc($eredmeny6))
{
    $csapattab.="<div class=\"hover-img2 harmadik\"><img src=\"../kepek/kocsirajzok/{$sor4["autofoto"]}\"><figcaption>{$sor4["csapatnev"]}<br>{$sor4["csapatpont"]} pont</figcaption></div>";
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

?>