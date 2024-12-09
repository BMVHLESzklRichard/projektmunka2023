<?php
        // print($_SESSION["csereltfoto"]);
if (!isset($_SESSION['belepett'])) {
    $kivanbent = "<span class=\"hu\">Vendég</span>
    <span class=\"en\">Visitor</span>";
    $permission = "<span class=\"hu\">Vendég</span>
    <span class=\"en\">Visitor</span>";
    $foto = "v.jpg";
    $bejelentid = "Nincs Id";
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../admin/logout.php\"> 
    <span class=\"hu\">Belépés</span>
    <span class=\"en\">Log in</span>
    <span><i class=\"material-icons  piros\">login</i></span>
            </a></p>
  
    </div>";
    $kepcsere = "<img src=../../kpes/" . $foto . ">";
    $namechange = "";
}
else if($_SESSION['userper'] == "0")
{
    // $row['permission']==0?"user":"admin";
    $permission = $_SESSION["userper"]==0?"user":"admin";
    $kivanbent = $_SESSION["username"]  != "" ? $_SESSION["username"] : $_SESSION["user_name"];
    $foto = $_SESSION["csereltfoto"]  != "" ? $_SESSION["csereltfoto"] : $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../admin/logout.php\">
    <span class=\"hu\">Kilépés</span>
    <span class=\"en\">Log out</span>
    <span><i class=\"material-icons  piros\">logout</i></span>
    </a></p>
  
    </div>";
    $kepcsere = "<a href=\"../both/changepic.php\"><img src=../../kpes/" . $foto . "></a>";
    $namechange = "<a href=\"../both/changename.php\"><i class=\"material-icons lila\">mode_edit</i></a>";
}
else {
    $permission = $_SESSION["userper"]==0?"user":"admin";
    $kivanbent = $_SESSION["username"]  != "" ? $_SESSION["username"] : $_SESSION["user_name"];
    $foto = $_SESSION["csereltfoto"]  != "" ? $_SESSION["csereltfoto"] : $_SESSION["fotouser"];
    $bejelentid = $_SESSION['bejelentid'];
    $admin =  "<div class=\"kilep belsofelhasznalo\">
    <p><a href=\"../../admin/logout.php\"> 
    <span class=\"hu\">Kilépés</span>
    <span class=\"en\">Log out</span>
    <span><i class=\"material-icons  piros\">logout</i></span>
            </a></p>
            <p><a href=\"../../admin/admin.php\"> 
            <span class=\"hu\">Admin felület</span>
                <span class=\"en\">Admin page</span>
                <span><i class=\"material-icons  piros\">key</i></span>
            </a></p>
    </div>";
    $kepcsere = "<a href=\"../both/changepic.php\"><img src=../../kpes/" . $foto . "></a>";
    $namechange = "<a href=\"../both/changename.php\"><i class=\"material-icons lila\">mode_edit</i></a>";
}