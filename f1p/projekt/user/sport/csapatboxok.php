
<?php


$sql9 = "SELECT * FROM fullteams inner join teams on fullteams.teamId = teams.id GROUP by teamId order by teams.teamPoints desc limit 1";

$eredmeny9 = mysqli_query($dbconn, $sql9);

// $csapathurkak = "<div class=\"container2\">";
$moge = "th";
$csapathurkak = "";
while ($sor9 = mysqli_fetch_assoc($eredmeny9)) {
    switch ($sor9["teamRanking"]) {
        case '1':
            $moge = "st";
            break;
        case '2':
            $moge = "nd";
            break;
        case '3':
            $moge = "rd";
            break;
        default:
            $moge = "th";
            break;
    }
    switch ($sor9["teamName"]) {
        case 'Oracle Red Bull Racing':
            $hatterszin = "#fcc427";
            break;
        case 'Aston Martin Aramco Cognizant Formula One Team':
            $hatterszin = "rgb(224,231,65)";
            break;
        case 'Mercedes AMG Petronas F1 Team':
            $hatterszin = "#41e2dd";
            break;
        case 'Scuderia Ferrari':
            $hatterszin = "#f4f4f4";
            break;
        case 'BWT Alpine F1 Team':
            $hatterszin = "#0856ab";
            break;
        case 'Alfa Romeo F1 Team Stake':
            $hatterszin = "#000000";
            break;
        case 'MoneyGram Haas F1 Team':
            $hatterszin = "#ec1b3b";
            break;
        case 'Williams Racing':
            $hatterszin = "#b01a00";
            break;
        case 'Mclaren Formula 1 Team':
            $hatterszin = "#72dbff";
            break;
        case 'Scuderia Alpha Tauri':
            $hatterszin = "#d63b4c";
            break;
        default:
            $hatterszin = "black";
            break;
    }
    $csapathurkak .= "<div class=\"panel active\" style=\"background-image: url(../../kepek/csapatkepek/{$sor9["teamPhoto"]}); border-color: {$sor9["teamColor"]}; background-color: {$sor9["teamColor"]}8f\">
    <div>
        <p class=\"teamname\" style=\"color: {$sor9["teamColor"]}; background-color: {$hatterszin};width:100%;\"><marquee width=\"90%\" direction=\"left\" height=\"auto\">{$sor9["teamName"]}</marquee></p>
        <p></p>
        <div class=\"lista\">
            <p class=\"listaszoveg\"><span class=\"hu\">Csapatfőnök: </span>
            <span class=\"en\">Team Principal: </span>{$sor9["teamPrincipal"]}</p>
            <p class=\"listaszoveg\"><span class=\"hu\">Pilóták:</span>
            <span class=\"en\">Drivers:</span> ";

    $sql11 = "SELECT drivers.lastName,drivers.firstName FROM fullteams inner join teams on fullteams.teamId = teams.id inner join drivers on fullteams.driverId = drivers.id where teamId = {$sor9["teamId"]}";

    $eredmeny11 = mysqli_query($dbconn, $sql11);
    while ($sor11 = mysqli_fetch_assoc($eredmeny11)) {
        $csapathurkak .= "{$sor11["firstName"]} {$sor11["lastName"]}, ";
    }
    $csapathurkak .= " </p>
    <span class=\"hu\">
    <h5>A 2024-es szezonig elért eredmények:</h5></span><span class=\"en\">
    <h5>Results before the start of the 2024 season:</h5></span><p class=\"listaszoveg\"><span class=\"hu\">Konstruktőri bajnoki címek:</span>
           <span class=\"en\">Constructor's championships:</span> {$sor9["teamConstructors"]} <span class=\"hu\">db</span>
           <span class=\"en\">x</span></p>
            <p class=\"listaszoveg\"><span class=\"hu\">Győzelmek: </span>
            <span class=\"en\">Wins: </span> {$sor9["teamWins"]} <span class=\"hu\">db</span>
            <span class=\"en\">x</span></p>
            <p class=\"listaszoveg\"><span class=\"hu\">Dobogós helyezések: </span>
            <span class=\"en\">Podiums: </span>{$sor9["teamPodiums"]} <span class=\"hu\">db</span>
            <span class=\"en\">x</span></p>
            <p class=\"listaszoveg\"><span class=\"hu\">Tavalyi helyezés: </span>
            <span class=\"en\">Previous year result: </span> {$sor9["teamRanking"]}<span class=\"hu\">. hely</span>
            <span class=\"en\">{$moge}</p>
        </div>
        </div>
        <div class=\"light\">
    <div class=\"line\">
      <img src=\"../../kepek/kocsirajzok/{$sor9["carPhoto"]}\" class=\"kep1\">
    </div>
    </div>
  </div>";
}
$sql10 = "SELECT * FROM fullteams inner join teams on fullteams.teamId = teams.id GROUP by teamId order by teams.teamPoints desc limit 1,10";

$eredmeny10 = mysqli_query($dbconn, $sql10);


while ($sor10 = mysqli_fetch_assoc($eredmeny10)) {
    switch ($sor10["teamRanking"]) {
        case '1':
            $moge = "st";
            break;
        case '2':
            $moge = "nd";
            break;
        case '3':
            $moge = "rd";
            break;
        default:
            $moge = "th";
            break;
    }
    switch ($sor10["teamName"]) {
        case 'Oracle Red Bull Racing':
            $hatterszin = "#fcc427";
            break;
        case 'Aston Martin Aramco Cognizant Formula One Team':
            $hatterszin = "rgb(224,231,65)";
            break;
        case 'Mercedes AMG Petronas F1 Team':
            $hatterszin = "#41e2dd";
            break;
        case 'Scuderia Ferrari':
            $hatterszin = "#f4f4f4";
            break;
        case 'BWT Alpine F1 Team':
            $hatterszin = "#0856ab";
            break;
        case 'Alfa Romeo F1 Team Stake':
            $hatterszin = "#000000";
            break;
        case 'MoneyGram Haas F1 Team':
            $hatterszin = "#ec1b3b";
            break;
        case 'Williams Racing':
            $hatterszin = "#b01a00";
            break;
        case 'Mclaren Formula 1 Team':
            $hatterszin = "#72dbff";
            break;
        case 'Scuderia Alpha Tauri':
            $hatterszin = "#d63b4c";
            break;
        default:
            $hatterszin = "black";
            break;
    }
    $csapathurkak .= "<div class=\"panel\" style=\"background-image: url(../../kepek/csapatkepek/{$sor10["teamPhoto"]}); border-color: {$sor10["teamColor"]}; background-color: {$sor10["teamColor"]}8f\">
    <div>
        <p class=\"teamname\" style=\"color: {$sor10["teamColor"]}; background-color: {$hatterszin};width:100%;\"><marquee width=\"90%\" direction=\"left\" height=\"auto\">{$sor10["teamName"]}</marquee></p>
        <p></p>
        <div class=\"lista\">
            <p class=\"listaszoveg\"><span class=\"hu\">Csapatfőnök: </span>
            <span class=\"en\">Team Principal: </span>{$sor10["teamPrincipal"]}</p>
            <p class=\"listaszoveg\"><span class=\"hu\">Pilóták:</span>
            <span class=\"en\">Drivers:</span> ";

    $sql11 = "SELECT drivers.lastName,drivers.firstName FROM fullteams inner join teams on fullteams.teamId = teams.id inner join drivers on fullteams.driverId = drivers.id where teamId = {$sor10["teamId"]} limit 2";

    $eredmeny11 = mysqli_query($dbconn, $sql11);
    while ($sor11 = mysqli_fetch_assoc($eredmeny11)) {
        $csapathurkak .= "{$sor11["firstName"]} {$sor11["lastName"]}, ";
    }
    $csapathurkak .= " </p><span class=\"hu\">
    <h5>A 2024-es szezonig elért eredmények:</h5></span><span class=\"en\">
    <h5>Results before the start of the 2024 season:</h5></span><p class=\"listaszoveg\"><span class=\"hu\">Konstruktőri bajnoki címek:</span>
           <span class=\"en\">Constructor's championships:</span> {$sor10["teamConstructors"]} <span class=\"hu\">db</span>
           <span class=\"en\">x</span></p>
            <p class=\"listaszoveg\"><span class=\"hu\">Győzelmek: </span>
            <span class=\"en\">Wins: </span> {$sor10["teamWins"]} <span class=\"hu\">db</span>
            <span class=\"en\">x</span></p>
            <p class=\"listaszoveg\"><span class=\"hu\">Dobogós helyezések: </span>
            <span class=\"en\">Podiums: </span>{$sor10["teamPodiums"]} <span class=\"hu\">db</span>
            <span class=\"en\">x</span></p>
            <p class=\"listaszoveg\"><span class=\"hu\">Tavalyi helyezés: </span>
            <span class=\"en\">Previous year result: </span> {$sor10["teamRanking"]}<span class=\"hu\">. hely</span>
            <span class=\"en\">{$moge}</p>
        </div>
        </div>
        <div class=\"light\">
        <div class=\"line\">
          <img src=\"../../kepek/kocsirajzok/{$sor10["carPhoto"]}\" class=\"kep1\">
        </div>
        </div>
  </div>";
}
?>