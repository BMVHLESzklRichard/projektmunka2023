<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION["belepett"]))
{
  header("Location:../false.html");  
}

// if(isset($_GET['id']))
// {
//     require("../kapcsolat/kapcsproj.php");
    
//     $id= (int)$_GET['id'];
//     // $replaceemail = rand(0,1000000000000000000);
//     $replaceemail = sha1(rand(0,1000000000000000000));
//     $replaceemail .= "@gmail.com";
    
//     $sql = "UPDATE bejelentkezettek  set `email`='{$replaceemail}' WHERE id = {$id}";
    
//     mysqli_query($dbconn, $sql);
// }

if(isset($_GET['id']))
{
    require("../kapcsolat/kapcsproj.php");
    
    $id= (int)$_GET['id'];
    $sql = "UPDATE accounts  set `statusz`=\"false\" WHERE id = {$id}";
    
    mysqli_query($dbconn, $sql);
}

header("Location: admin-kezelo.php");
?>