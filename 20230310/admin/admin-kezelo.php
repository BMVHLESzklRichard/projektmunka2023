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

$sql = "SELECT id,email,username,password,name,permission,foto FROM `projectacc`";

$eredmeny = mysqli_query($dbconn,$sql);

$tablazat = "<table><thead>
	<tr>
        <th>Photo</th>
		<th>E-mail</th>
		<th>Username</th>
		<th>Password</th>
		<th>Name</th>
		<th>Permission</th>
		<th>Művelet</th>
	</tr></thead><tbody class=\"tabla\">";
    while($sor =mysqli_fetch_assoc($eredmeny))
    {
        $tablazat.="<tr>
                       <td><img src=\"../kpes/{$sor['foto']}\" alt=\"{$sor['foto']}\" style=\"width: 100%;\"></td>
                       <td>{$sor["email"]}</td>
                       <td>{$sor["username"]}</td>
                       <td>{$sor["password"]}</td>
                       <td>{$sor["name"]}</td>
                       <td>{$sor["permission"]}</td>
                       <td><a href=\"admin-modositas.php?id={$sor["id"]}\"><i class=\"material-icons lila\">mode_edit</i></a>
                       <a href=\"admintorles.php?id={$sor["id"]}\"><i class=\"material-icons  piros\" onclick=\"return confirm('Biztos benne, hogy kitörli?');\">delete</i></a></td>
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