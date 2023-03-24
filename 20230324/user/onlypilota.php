<?php
$sql7 = "SELECT * FROM `teljescsapat` inner join pilotak on pilotak.id = teljescsapat.pilotaid inner join csapatok on csapatok.id where csapatok.id = teljescsapat.csapatid GROUP by pilotaid order by pilotak.pilotapont desc";

$eredmeny7 = mysqli_query($dbconn, $sql7);
$szam= 1;
$teljestabella = "<div class=\"pilotagrid\">";
while ($sor = mysqli_fetch_assoc($eredmeny7)) {
$pont = ($sor["pilotapont"] <= '1' ? "pont" : "pontok");

$teljestabella .= "<div class=\"cards_item\" id=\"{$sor["pilotaid"]}\">
<h3>{$szam}</h3>
<div class=\"cardd piros\" style=\"border: 7px solid {$sor["csapatszin"]};\">
<div class=\"flip-card-front\">
<div class=\"card_image\"><img src=\"../kepek/pilotakepek/{$sor["pilotafoto"]}\">
                <div class=\"card_content2\">
                    <h2 class=\"card_title\">{$sor["pilotaknev"]} {$sor["pilotavnev"]}</h2>
                    <ul class=\"card_list\">
                         <li class=\"pontlista\"><b><span class=\"hu\">Pontok: </span>
                         <span class=\"en\">Points: </span></b><div> {$sor["pilotapont"]} <span class=\"hu\">pont.</span>
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