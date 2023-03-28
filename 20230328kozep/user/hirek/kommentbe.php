<?php
use function PHPSTORM_META\map;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


    require("../../kapcsolat/kapcsproj.php");
    if (isset($_SESSION['alias'])) {
        $alias = $_SESSION['alias'];
        $sql2 = "select * from (SELECT hozzaszolasok.id,hozzaszolasok.kommentszoveg,bejelentkezettek.name,bejelentkezettek.foto,hozzaszolasok.kommentdatum FROM `hozzaszolasok` inner join hirek on hirek.id = hozzaszolasok.hirid inner join bejelentkezettek on bejelentkezettek.id = hozzaszolasok.accid WHERE hirek.alias = '{$alias}' order by hozzaszolasok.kommentdatum desc limit 5) tmp order by tmp.kommentdatum";
        $eredmeny2 = mysqli_query($dbconn,$sql2);
        $sqlKim = mysqli_query($dbconn,$sql2);
            $kiiras = "";
            
                while ($sor2 =mysqli_fetch_assoc($sqlKim)) {
                    $kiiras.= "<div class=\"uzenetdiv\">
                        <p class=\"uzenet\">{$sor2['kommentszoveg']}</p>
                        <p class=\"uzenetki\">Készítette: <strong class=\"lehetilyet\">{$sor2['name']}</strong> <img class=\"uzenetkep\" src=\"../../kpes/{$sor2['foto']}\"><br>
                        <i>Létrehozva: {$sor2['kommentdatum']}</i></p>
                    </div>\n";
                }
        print $kiiras; 



        $sql2 = "SELECT bejelentkezettek.username FROM `hozzaszolasok` inner join hirek on hirek.id = hozzaszolasok.hirid inner join bejelentkezettek on bejelentkezettek.id = hozzaszolasok.accid WHERE hirek.alias = '{$alias}' order by hozzaszolasok.kommentdatum desc limit 1";
        $eredmeny3 = mysqli_query($dbconn,$sql2);
        if (mysqli_num_rows($eredmeny3) == 1) {
            $sor = mysqli_fetch_assoc($eredmeny3);

            $utolsoiro = "<p id=\"oirt\" style=\"display:none\">". $sor["username"]."</p>";
        }
        print $utolsoiro;
    }
    
?>