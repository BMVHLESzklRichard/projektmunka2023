<?php

$sql7 = "SELECT * FROM `teljescsapat` inner join pilotak on pilotak.id = teljescsapat.pilotaid inner join csapatok on csapatok.id where csapatok.id = teljescsapat.csapatid GROUP by pilotaid order by pilotak.pilotapont desc limit 1";

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
        <div class=\"cardd piros elsopilota\" style=\"border: 7px solid {$borderszin};\">
          <div class=\"flip-card-front\">
              <div class=\"card_image\"><img src=\"../kepek/pilotakepek/{$sor["pilotafoto"]}\">
                  <div class=\"card_content2\">
                      <h2 class=\"card_title\">{$sor["pilotaknev"]} {$sor["pilotavnev"]}</h2>
                      <ul class=\"card_list\">
                           <li><b>Eddig elért {$pont}:</b> {$sor["pilotapont"]} pont.</li>
                           <li class=\"kisebblista\"><b>Csapat:</b> <div class=\"csapatdiv\"><div class= \"keplist\"><img src=\"../kepek/csapatkepek/{$sor["csapatfoto"]}\"></div>{$sor["csapatnev"]}</div></li>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
      </li>";
}

$sql7 = "SELECT * FROM `teljescsapat` inner join pilotak on pilotak.id = teljescsapat.pilotaid inner join csapatok on csapatok.id where csapatok.id = teljescsapat.csapatid GROUP by pilotaid order by pilotak.pilotapont desc limit 1,1";

$eredmeny7 = mysqli_query($dbconn, $sql7);


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
        <div class=\"cardd piros masodikpilota\" style=\"border: 7px solid {$borderszin};\">
          <div class=\"flip-card-front\">
              <div class=\"card_image\"><img src=\"../kepek/pilotakepek/{$sor["pilotafoto"]}\">
                  <div class=\"card_content2\">
                      <h2 class=\"card_title\">{$sor["pilotaknev"]} {$sor["pilotavnev"]}</h2>
                      <ul class=\"card_list\">
                           <li><b>Eddig elért {$pont}:</b> {$sor["pilotapont"]} pont.</li>
                           <li class=\"kisebblista\"><b>Csapat:</b> <div class=\"csapatdiv\"><div class= \"keplist\"><img src=\"../kepek/csapatkepek/{$sor["csapatfoto"]}\"></div>{$sor["csapatnev"]}</div></li>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
      </li>";
}

$sql7 = "SELECT * FROM `teljescsapat` inner join pilotak on pilotak.id = teljescsapat.pilotaid inner join csapatok on csapatok.id where csapatok.id = teljescsapat.csapatid GROUP by pilotaid order by pilotak.pilotapont desc limit 2,1";

$eredmeny7 = mysqli_query($dbconn, $sql7);


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
        <div class=\"cardd piros harmadikpilota\" style=\"border: 7px solid {$borderszin};\">
          <div class=\"flip-card-front\">
              <div class=\"card_image\"><img src=\"../kepek/pilotakepek/{$sor["pilotafoto"]}\">
                  <div class=\"card_content2\">
                      <h2 class=\"card_title\">{$sor["pilotaknev"]} {$sor["pilotavnev"]}</h2>
                      <ul class=\"card_list\">
                           <li><b>Eddig elért {$pont}:</b> {$sor["pilotapont"]} pont.</li>
                           <li class=\"kisebblista\"><b>Csapat:</b> <div class=\"csapatdiv\"><div class= \"keplist\"><img src=\"../kepek/csapatkepek/{$sor["csapatfoto"]}\"></div>{$sor["csapatnev"]}</div></li>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
      </li>";
}



$sql7 = "SELECT * FROM `teljescsapat` inner join pilotak on pilotak.id = teljescsapat.pilotaid inner join csapatok on csapatok.id where csapatok.id = teljescsapat.csapatid GROUP by pilotaid order by pilotak.pilotapont desc limit 3,17";

$eredmeny7 = mysqli_query($dbconn, $sql7);


while ($sor = mysqli_fetch_assoc($eredmeny7)) {
  include("pilotakartyak.php");
}
$teljestabella .= "</ul>";

$teljestabella .= " <div class=\"tabellagombok\">
<form method=\"post\">
<input type=\"submit\" name=\"csapatpontok\" id=\"csapatpontok\" value=\"Csapatok pontjai\">
</form>
</div>";