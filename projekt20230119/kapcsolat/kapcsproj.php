<?php
header("Content-Type: text/html; charset=utf-8");

define("DBHOST","mysql.omega");
define("DBUSER","tehen");
define("DBPASS","tehenmu12");
define("DBNAME","tehen");


$dbconn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("SHINE");

if(mysqli_connect_error())
{
    die("The problem is" . mysqli_connect_error());
}
// echo "Siker";
// mysqli_query($dbconn, "SET NAMES utf8");
?>