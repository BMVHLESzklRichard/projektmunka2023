<?php
use function PHPSTORM_META\map;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION["belepett"]))
{
  header("Location:../false.html");  
}

require_once("../kapcsolat/kapcsproj.php");

$sql = "SELECT id,alias,cim,statusz,tartalom,fohir from hirek";

$eredmeny = mysqli_query($dbconn,$sql);

$tablazat = "<p id=\"fel\"><a href=\"tartalomletrehozas.php\"><i class=\"material-icons\">add_box</i>Új oldal létrehozása</a></p>

<table>
	<tr>
		<th>Alias</th>
		<th>Sorozatszám</th>
		<th>Tartalom</th>
		<th>Státusz</th>
		<th>Főhír</th>
		<th>Művelet</th>
	</tr>";
    while($sor =mysqli_fetch_assoc($eredmeny))
    {
      $fohire = ($sor["fohir"] == '1' ? "Főhír": "Kis hír");
      $elerhetoe = ($sor["statusz" ]== '1' ? "Elérhető" : "Nem elérhető");
      $id = $sor["id"]; 
        $tablazat.="<tr>
                       <td>{$sor["alias"]}</td>
                       <td>{$sor["cim"]}</td>
                       <td>".substr(strip_tags($sor["tartalom"]),0,100)."</td>
                       <td>{$elerhetoe}</td>
                       <td>{$fohire}</td>
                       <td><a href=\"tartalom-modositas.php?id={$sor["id"]}\"><i class=\"material-icons lila\">mode_edit</i></a>
                       <i class=\"material-icons  piros\" onclick=\"kitorles({$id});\">delete</i></td>
                       
                       </tr>\n";
    }
$tablazat .= "</table>\n
<p><a href=\"tartalomletrehozas.php\"><i class=\"material-icons\">add_box</i>Új oldal létrehozása</a></p>\n";

$menu = "<ul>
           <li><a href=\"admin.php\">Főoldal</a></li>
           <li><a href=\"#fel\">Tartalomkezelés</a></li>
           <li><a href=\"logout.php\">Kilépés</a></li>
        </ul>";

//Fernando Sablonzo
$sablon = file_get_contents("sablon.html");
//mitmireholdik
$sablon = str_replace("{{menu}}",$menu,$sablon);
$sablon = str_replace("{{menunev}}","Szerkesztés",$sablon);
$sablon = str_replace("{{tartalom}}",$tablazat,$sablon);
$sablon = str_replace("{{oldalsav}}","",$sablon);


print($sablon);
?>