<?php

$sql = "SELECT id,alias,megjelenőkép,cím,leírás
from hirek where főhír = 1 and státusz = 1 order by létrehozás desc limit 1";

$eredmeny = mysqli_query($dbconn,$sql);

$elsohir = "<div>\n";
while($sor = mysqli_fetch_assoc($eredmeny))
{
    $elsohir .= "<div class=\"footermagas\"><a href=\"hirek/{$sor["alias"]}\"><img src=\"../kepek/f1cars2023/{$sor["megjelenőkép"]}\" alt=\"MC\" style=\"width:100%;\"><div><p>{$sor["cím"]}</p></div></a></div>";
}
$elsohir .="</div>";




$sql2 = "SELECT id, futamnév, futamidőpont, futamkép FROM futamok WHERE DATE(futamidőpont) >= DATE(NOW()) ORDER BY futamidőpont ASC limit 1";

$eredmeny2 = mysqli_query($dbconn,$sql2);

$kovifutam = "<div>\n";
while($sor2 = mysqli_fetch_assoc($eredmeny2))
{
    $kovifutam .= "<div class=\"footermagas\">
                        <img src=\"{$sor2["futamkép"]}\" class=\"card-img-top\" alt=\"...\" style=\"width:100%;\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["futamnév"]}</h5>
                            <p class=\"card-text\">{$sor2["futamidőpont"]}</p>
                        </div>
                </div>";
                $futamnév = $sor2["futamnév"];
}
$kovifutam .= "</div>";
