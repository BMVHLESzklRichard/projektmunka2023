<?php



$sql2 = "SELECT id, raceName, raceDate, racePic FROM races WHERE DATE(raceDate) > DATE(NOW()) ORDER BY raceDate ASC limit 1";

$eredmeny2 = mysqli_query($dbconn,$sql2);


$futammenu = " <div class=\"elrendezes\">\n";
while($sor2 = mysqli_fetch_assoc($eredmeny2))
{
    $futammenu .= " 
                <div class=\"kovetkezo_futam\">
                    <div class=\"card\">
                        <img src=\"{$sor2["racePic"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 id=\"kovraceName\" class=\"card-title\">{$sor2["raceName"]}</h5>
                            <p id=\"kovfutamido\" class=\"card-text\">{$sor2["raceDate"]}</p>
                        </div>
                    </div>
                </div>";
                $raceName = $sor2["raceName"];
}

$sql3 = "SELECT id, raceName, raceDate, racePic FROM races WHERE DATE(raceDate) > DATE(NOW()) ORDER BY raceDate ASC limit 1,3";

$eredmeny3 = mysqli_query($dbconn,$sql3);

while($sor2 = mysqli_fetch_assoc($eredmeny3))
{
    $futammenu .= " 
                
                    <div class=\"nincsborder\">
                        <img src=\"{$sor2["racePic"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["raceName"]}</h5>
                            <p class=\"card-text\">{$sor2["raceDate"]}</p>
                        </div>
                    </div>";
}
$futammenu .="</div>";