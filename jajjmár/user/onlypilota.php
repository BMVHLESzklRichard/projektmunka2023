<?php
$sql7 = "SELECT * FROM `teljescsapat` inner join pilotak on pilotak.id = teljescsapat.pilotaid inner join csapatok on csapatok.id where csapatok.id = teljescsapat.csapatid GROUP by pilotaid order by pilotak.pilótapont desc";

$eredmeny7 = mysqli_query($dbconn, $sql7);
$szam= 1;
$teljestabella = "<div class=\"pilotagrid\">";
while ($sor = mysqli_fetch_assoc($eredmeny7)) {
$pont = ($sor["pilótapont"] <= '1' ? "pont" : "pontok");

$teljestabella .= "<div class=\"cards_item\" id=\"{$sor["pilotaid"]}\">
<h3>{$szam}</h3>
<svg class=\"sargavonal\" width=\"30\" height=\"10\">
  <rect width=\"30\" height=\"10\" style=\"fill:yellow\"/>
  Sorry, your browser does not support inline SVG.  
</svg>
<div class=\"cardd piros\" style=\"border: 7px solid {$sor["csapatszín"]};\">
<div class=\"flip-card-front\">
<div class=\"card_image\"><img src=\"../kepek/pilotakepek/{$sor["pilótafotó"]}\">
                <div class=\"card_content2\">
                    <h2 class=\"card_title\">{$sor["pilótakeresztnév"]} {$sor["pilótavezetéknév"]}</h2>
                    <ul class=\"card_list\">
                         <li class=\"pontlista\"><b><span class=\"hu\">Pontok: </span>
                         <span class=\"en\">Points: </span></b><div> {$sor["pilótapont"]} <span class=\"hu\">pont.</span>
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