<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION["belepett"]))
{
  header("Location:../false.html");  
}

require("../kapcsolat/kapcsproj.php");

$sql = "SELECT id,email,username,password,name,permission,status,photo FROM `accounts`";

$eredmeny = mysqli_query($dbconn,$sql);

$tablazat = "<table><thead>
	<tr>
        <th>Fotó</th>
		<th>E-mail</th>
		<th>Felhasználónév</th>
		<th>Jelszó</th>
		<th>Név</th>
		<th>Jogosultság</th>
		<th>Státusz</th>
		<th>Művelet</th>
	</tr></thead><tbody class=\"tabla\">";
    while($sor =mysqli_fetch_assoc($eredmeny))
    {
      $engedelyadas =  ($sor["status"] == '0' ? "<a href=\"adminjogback.php?id={$sor["id"]}\"><i class=\"material-icons  piros\" onclick=\"return confirm('Biztos benne, hogy visszaadja a jogát {$sor["username"]} felhasználónk?');\">done</i></a>": "<a href=\"admintorles.php?id={$sor["id"]}\"><i class=\"material-icons  piros\" onclick=\"return confirm('Biztos benne, hogy kitörli?');\">delete</i></a>");
      $státusz =  ($sor["status"] == '1' ? "Aktív felhasználó": "Inaktív felhasználó");
      $jogosultság = ($sor["permission"] ==0?"user":"admin");

        $tablazat.="<tr>
                       <td><img src=\"../kpes/{$sor['photo']}\" alt=\"{$sor['photo']}\" style=\"width: 100%;\"></td>
                       <td>{$sor["email"]}</td>
                       <td>{$sor["username"]}</td>
                       <td>{$sor["password"]}</td>
                       <td>{$sor["name"]}</td>
                       <td>{$jogosultság}</td>
                       <td>{$státusz}</td>
                       <td><a href=\"admin-modositas.php?id={$sor["id"]}\"><i class=\"material-icons lila\">mode_edit</i></a>{$engedelyadas}
                       </td>
                       </tr>\n";
    }
$tablazat .= "</tbody></table>";

$menu = "<ul>
           <li><a href=\"admin.php\">Főoldal</a></li>
           <li><a href=\"admin-kezelo.php\">Felhasználókezelés</a></li>
           <li><a href=\"logout.php\">Kilépés</a></li>
        </ul>";

//Fernando Sablonzo
$sablon = file_get_contents("sablon2.html");
//mitmireholdik
$sablon = str_replace("{{menu}}",$menu,$sablon);
$sablon = str_replace("{{menunev}}","Szerkesztés",$sablon);
$sablon = str_replace("{{tartalom}}",$tablazat,$sablon);
$sablon = str_replace("{{oldalsav}}","",$sablon);


print($sablon);
?>