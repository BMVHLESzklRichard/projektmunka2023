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

$sql = "SELECT id,alias,title,status,content,mainNews from news";

$eredmeny = mysqli_query($dbconn,$sql);

$tablazat = "<table>
	<tr>
		<th>Alias</th>
		<th>Cím</th>
		<th>Tartalom</th>
		<th>Státusz</th>
		<th>Főhír</th>
		<th>Művelet</th>
	</tr>";
    while($sor =mysqli_fetch_assoc($eredmeny))
    {
      $fohire = ($sor["mainNews"] == '1' ? "Főhír": "Kis hír");
      $elerhetoe = ($sor["status" ]== '1' ? "Elérhető" : "Nem elérhető");
      $id = $sor["id"]; 
        $tablazat.="<tr>
                       <td>{$sor["alias"]}</td>
                       <td>{$sor["title"]}</td>
                       <td>".substr(strip_tags($sor["content"]),0,100)."</td>
                       <td>{$elerhetoe}</td>
                       <td>{$fohire}</td>
                       <td><a href=\"tartalom-modositas.php?id={$sor["id"]}\"><i class=\"material-icons lila\">mode_edit</i></a>
                       <i class=\"material-icons  piros\" onclick=\"kitorles({$id});\">delete</i></td>
                       
                       </tr>\n";
    }
$tablazat .= "</table>\n";

$menu = "<ul>
           <li><a href=\"admin.php\">Főoldal</a></li>
           <li><a href=\"tartalomletrehozas.php\"><i class=\"material-icons\">add_box</i>Új oldal létrehozása</a></li>
           <li><a href=\"logout.php\">Kilépés</a></li>
        </ul>";


$szo = "szerkesztése";


$sablon = file_get_contents("sablon.html");

$sablon = str_replace("{{menu}}",$menu,$sablon);
$sablon = str_replace("{{menunev}}","Szerkesztés",$sablon);
$sablon = str_replace("{{tartalom}}",$tablazat,$sablon);
$sablon = str_replace("{{szo}}",$szo,$sablon);
$sablon = str_replace("{{oldalsav}}","",$sablon);


print($sablon);
?>