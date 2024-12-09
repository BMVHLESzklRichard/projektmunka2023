<?php

$sql = "SELECT id,alias,shownPicture,title
from news where mainnews = 1 and status = 1 order by creationDate desc limit 1";

$eredmeny = mysqli_query($dbconn,$sql);

$elsohir = "<div>\n";
while($sor = mysqli_fetch_assoc($eredmeny))
{
    $elsohir .= "<div class=\"footermagas\"><a href=\"hirek/{$sor["alias"]}\"><img src=\"../../kepek/f1cars2023/{$sor["shownPicture"]}\" alt=\"MC\" style=\"width:100%;\"><div><p>{$sor["title"]}</p></div></a></div>";
}
$elsohir .="</div>";




$sql2 = "SELECT id, raceName, raceDate, racePic FROM races WHERE DATE(raceDate) >= DATE(NOW()) ORDER BY raceDate ASC limit 1";

$eredmeny2 = mysqli_query($dbconn,$sql2);

$kovifutam = "<div>\n";
while($sor2 = mysqli_fetch_assoc($eredmeny2))
{
    $kovifutam .= "<div class=\"footermagas\">
                        <img src=\"../{$sor2["racePic"]}\" class=\"card-img-top\" alt=\"...\" style=\"width:100%;\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["raceName"]}</h5>
                            <p class=\"card-text\">{$sor2["raceDate"]}</p>
                        </div>
                </div>";
                $futamnév = $sor2["raceName"];
}
$kovifutam .= "</div>";
