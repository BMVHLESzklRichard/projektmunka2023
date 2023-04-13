<?php
session_start();
include("../user/alapadatok.php");
session_destroy();
$log = date("Y-m-d H:i:s")." {$kivanbent} kijelentkezett ({$_SERVER['REMOTE_ADDR']})\n";
            file_put_contents("logout.txt",$log,FILE_APPEND); 
header("Location:../belepes/belepproj.php");
?>