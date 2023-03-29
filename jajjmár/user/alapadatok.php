<?php
        // print($_SESSION["csereltfoto"]);
if (!isset($_SESSION['belepett'])) {
    $kivanbent = "Vendég";
    $permission = "Vendég";
    $foto = "v.jpg";
    $bejelentid = "Nincs Id";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../admin/logout.php\"> 
    <span class=\"hu\">Belépés</span>
    <span class=\"en\">Log in</span>
            </a></p>
  
    </div>";
    $kepcsere = "";
}
else if($_SESSION['userper'] == "0")
{
    // $row['permission']==0?"user":"admin";
    $permission = $_SESSION["userper"]==0?"user":"admin";
    $kivanbent = $_SESSION["username"]  != "" ? $_SESSION["username"] : $_SESSION["user_name"];
    $foto = $_SESSION["csereltfoto"]  != "" ? $_SESSION["csereltfoto"] : $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../admin/logout.php\">
    <span class=\"hu\">Kilépés</span>
    <span class=\"en\">Log out</span>
    </a></p>
  
    </div>";
    $kepcsere = "<a href=\"changepic.php\"> <span class=\"hu\">Képváltoztatás</span>
    <span class=\"en\">Change profile picture</span></a>";
}
else {
    $permission = $_SESSION["userper"]==0?"user":"admin";
    $kivanbent = $_SESSION["username"]  != "" ? $_SESSION["username"] : $_SESSION["user_name"];
    $foto = $_SESSION["csereltfoto"]  != "" ? $_SESSION["csereltfoto"] : $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../admin/logout.php\"> 
    <span class=\"hu\">Kilépés</span>
    <span class=\"en\">Log out</span>
            </a></p>
            <p><a href=\"../admin/admin.php\"> 
            <span class=\"hu\">Admin felület</span>
                <span class=\"en\">Admin page</span>
            </a></p>
    </div>";
    $kepcsere = "<a href=\"changepic.php\">  <span class=\"hu\">Képváltoztatás</span>
    <span class=\"en\">Change profile picture</span></a>";
}