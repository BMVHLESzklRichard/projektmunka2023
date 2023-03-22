<?php
$sql7 = "SELECT * FROM `teljescsapat` inner join pilotak on pilotak.id = teljescsapat.pilotaid inner join csapatok on csapatok.id where csapatok.id = teljescsapat.csapatid GROUP by pilotaid order by pilotak.pilotapont desc";

$eredmeny7 = mysqli_query($dbconn, $sql7);

$teljestabella = "<ul class=\"cards\">";
while ($sor = mysqli_fetch_assoc($eredmeny7)) {
$pont = ($sor["pilotapont"] <= '1' ? "pont" : "pontok");

switch ($sor["csapatnev"]) {
    case 'Oracle Red Bull Racing':
        $borderszin = "#13152c";
        break;
    case 'Aston Martin Aramco Cognizant Formula One Team':
        $borderszin = "#145243";
        break;
    case 'Scuderia Ferrari':
        $borderszin = "#930418";
        break;
    case 'Mercedes AMG Petronas F1 Team':
        $borderszin = "black";
        break;
    case 'Alfa Romeo F1 Team Stake':
        $borderszin = "#991d24";
        break;
    case 'BWT Alpine F1 Team':
        $borderszin = "#f38ec2";
        break;
    case 'Williams Racing':
        $borderszin = "#0c234f";
        break;
    case 'Mclaren Formula 1 Team':
        $borderszin = "#fb7415";
        break;
    case 'MoneyGram Haas F1 Team':
        $borderszin = "#a7a7a7";
        break;
    case 'Scuderia Alpha Tauri':
        $borderszin =  "#172d54";
        break;
    default:
        $borderszin = "black";
        break;
}

$teljestabella .= "<li class=\"cards_item\" id=\"{$sor["pilotaid"]}\">
      <div class=\"cardd piros\" style=\"border: 7px solid {$borderszin};\">
        <div class=\"flip-card-front\">
            <div class=\"card_image\"><img src=\"../kepek/pilotakepek/{$sor["pilotafoto"]}\">
                <div class=\"card_content2\">
                    <h2 class=\"card_title\">{$sor["pilotaknev"]} {$sor["pilotavnev"]}</h2>
                    <ul class=\"card_list\">
                         <li><b><span class=\"hu\">Eddigi pontok: </span>
                         <span class=\"en\">Points so far: </span></b> {$sor["pilotapont"]} <span class=\"hu\">pont.</span>
                         <span class=\"en\">points:</span></li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </li>";
}
$teljestabella .= "</ul>";

$teljestabella .= " <div class=\"tabellagombok\">
<form method=\"post\">
<input type=\"submit\" name=\"csapatpontok\" id=\"csapatpontok\" value=\"Csapatok pontjai\">
</form>
</div>";