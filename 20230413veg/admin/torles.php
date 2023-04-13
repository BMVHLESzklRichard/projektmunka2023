<?php
use function PHPSTORM_META\map;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if(!isset($_SESSION["belepett"]))
{
    header("Location: tartalom-szerkeszto.php");
}

if(isset($_GET['id']))
{
    require("../kapcsolat/kapcsproj.php");
    
    $id= (int)$_GET['id'];
    $sql1 = "DELETE FROM `comments` WHERE newsid = {$id}";

    mysqli_query($dbconn, $sql1);
    $sql = "DELETE FROM news 
            WHERE id = {$id}";
    
    mysqli_query($dbconn, $sql);
}
header("Location: tartalom-szerkeszto.php");
?>