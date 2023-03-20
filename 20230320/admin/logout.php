<?php
session_start();
session_destroy();
$log = date("Y-m-d H:i:s")."great escape ({$_SERVER['REMOTE_ADDR']})\n";
            file_put_contents("../log.txt",$log,FILE_APPEND); 
header("Location:../belepes/belepproj.php");
?>