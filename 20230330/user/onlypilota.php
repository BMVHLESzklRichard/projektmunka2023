<?php
$sql7 = "SELECT * FROM `fullteams` inner join drivers on drivers.id = fullteams.driverId inner join teams on teams.id where teams.id = fullteams.teamID GROUP by driverId order by drivers.driverPoints desc";

$eredmeny7 = mysqli_query($dbconn, $sql7);
$szam= 1;
$teljestabella = "<div class=\"pilotagrid\">";
while ($sor = mysqli_fetch_assoc($eredmeny7)) {
$pont = ($sor["driverPoints"] <= '1' ? "pont" : "pontok");

$teljestabella .= "<div class=\"cards_item\" id=\"{$sor["driverId"]}\">
<h3>{$szam}</h3>
<svg class=\"sargavonal\" width=\"30\" height=\"10\">
  <rect width=\"30\" height=\"10\" style=\"fill:yellow\"/>
  Sorry, your browser does not support inline SVG.  
</svg>
<div class=\"cardd piros\" style=\"border: 7px solid {$sor["teamColor"]};\">
<div class=\"flip-card-front\">
<div class=\"card_image\"><img src=\"../kepek/pilotakepek/{$sor["driverPhoto"]}\">
                <div class=\"card_content2\">
                    <h2 class=\"card_title\">{$sor["firstName"]} {$sor["lastName"]}</h2>
                    <ul class=\"card_list\">
                         <li class=\"pontlista\"><b><span class=\"hu\">Pontok: </span>
                         <span class=\"en\">Points: </span></b><div> {$sor["driverPoints"]} <span class=\"hu\">pont.</span>
                         <span class=\"en\">points</span></div></li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>";
    $szam++;
}
$teljestabella .= "</div>";

$gomb = " <div class=\"tabellagombok\">
<form method=\"post\">
<input type=\"submit\" name=\"csapatpontok\" id=\"csapatpontok\" value=\"Csapatok pontjai\">
</form>
</div>";