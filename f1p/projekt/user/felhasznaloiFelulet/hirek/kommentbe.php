<?php
use function PHPSTORM_META\map;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


    require("../../../kapcsolat/kapcsproj.php");
    if (isset($_SESSION['alias'])) {
        $alias = $_SESSION['alias'];
        $sql2 = "select * from (SELECT comments.id,comments.comment,accounts.username,accounts.photo,comments.commentDate FROM `comments` inner join news on news.id = comments.newsid inner join accounts on accounts.id = comments.accid WHERE news.alias = '{$alias}' order by comments.commentDate desc limit 5) tmp order by tmp.commentDate";
        $eredmeny2 = mysqli_query($dbconn,$sql2);
        $sqlKim = mysqli_query($dbconn,$sql2);
            $kiiras = "";
            
                while ($sor2 =mysqli_fetch_assoc($sqlKim)) {
                    $kiiras.= "<div class=\"uzenetdiv\">
                        <p class=\"uzenet\">{$sor2['comment']}</p>
                        <p class=\"uzenetki\">Készítette: <strong class=\"lehetilyet\">{$sor2['username']}</strong> <img class=\"uzenetkep\" src=\"../../../kpes/{$sor2['photo']}\"><br>
                        <i>Létrehozva: {$sor2['commentDate']}</i></p>
                    </div>\n";
                }
        print $kiiras; 



        $sql2 = "SELECT accounts.username FROM `comments` inner join news on news.id = comments.newsid inner join accounts on accounts.id = comments.accid WHERE news.alias = '{$alias}' order by comments.commentDate desc limit 1";
        $eredmeny3 = mysqli_query($dbconn,$sql2);
        if (mysqli_num_rows($eredmeny3) == 1) {
            $sor = mysqli_fetch_assoc($eredmeny3);

            $utolsoiro = "<p id=\"oirt\" style=\"display:none\">". $sor["username"]."</p>";
        }
        else
        {
            $utolsoiro  = "";
        }
        print $utolsoiro;
    }
    
?>