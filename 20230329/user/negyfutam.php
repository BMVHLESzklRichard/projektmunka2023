<?php



$sql2 = "SELECT id, futamnév, futamidőpont, futamkép FROM futamok WHERE DATE(futamidőpont) >= DATE(NOW()) ORDER BY futamidőpont ASC limit 1";

$eredmeny2 = mysqli_query($dbconn,$sql2);


$futammenu = " <div class=\"elrendezes\">\n";
while($sor2 = mysqli_fetch_assoc($eredmeny2))
{
    $futammenu .= " 
                <div class=\"kovetkezo_futam\">
                    <div class=\"card\">
                        <img src=\"{$sor2["futamkép"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 id=\"kovfutamnév\" class=\"card-title\">{$sor2["futamnév"]}</h5>
                            <p id=\"kovfutamido\" class=\"card-text\">{$sor2["futamidőpont"]}</p>
                        </div>
                    </div>
                </div>";
                $futamnév = $sor2["futamnév"];
}

$sql3 = "SELECT id, futamnév, futamidőpont, futamkép FROM futamok WHERE DATE(futamidőpont) >= DATE(NOW()) ORDER BY futamidőpont ASC limit 1,3";

$eredmeny3 = mysqli_query($dbconn,$sql3);

while($sor2 = mysqli_fetch_assoc($eredmeny3))
{
    $futammenu .= " 
                
                    <div class=\"nincsborder\">
                        <img src=\"{$sor2["futamkép"]}\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$sor2["futamnév"]}</h5>
                            <p class=\"card-text\">{$sor2["futamidőpont"]}</p>
                        </div>
                    </div>";
}
$futammenu .="</div>";