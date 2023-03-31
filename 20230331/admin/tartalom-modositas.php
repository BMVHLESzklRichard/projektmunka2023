<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use function PHPSTORM_META\map;

session_start();
if(!isset($_SESSION["belepett"]))
{
  header("Location:../false.html");  
}

if(!isset($_REQUEST["id"]))
{
  header("Location:tartalom-szerkeszto.php");  
}


if(isset($_POST["rendben"]))
{
    //változók clear
    $_POST = array_map("trim",$_POST);
    $alias = strtolower(strip_tags($_POST['alias']));
	$fohir = (int)$_POST['fohir'];
    $cim = strip_tags($_POST['cim']);
    $tartalom = $_POST['tartalom'];
    $leiras = strip_tags($_POST['leiras']);
	$statusz = (int)$_POST['statusz'];

	//változók ellenőrzés
    $mime = array("image/gif", "image/png", "image/jpg", "image/jpeg");
	//változók ellenőrzés
	 //ellenőrzés
	 if(empty($alias))
	 {
		 $hibak[] = "Alias ne legyen üres!";
	 }
 
	 if(!preg_match("/^[a-z_]*$/",$alias))
	 {
		 $hibak[] = "Alias nem tartalmazhat értelmetlen jeleket!";
	 }
 
	 if(empty($cim))
	 {
		 $hibak[] = "Ne legyen a cím üres!";
	 }

	 if($_FILES['foto']['error'] == 0 && $_FILES['foto']['size'] > 6000000)
	 {
		 $hibak[] = "A kép mérete túl nagy";
	 }
 
	 $foto2 = $_FILES['foto']['name'];
	 print $foto2;
 
	 if($_FILES['foto']['error'] == 0 && !in_array($_FILES['foto']['type'], $mime))
	 {
		 $hibak[] = "Rossz fotótípus";
	 }

	 switch($_FILES['foto']['type'])
	 {
		 case "image/png":
			 $kit = ".png";
		 break;
		 case "image/gif":
			 $kit = ".gif";
		 break;
		 case "image/jpg":
			 $kit = ".jpg";
		 break;
		 default:
		 $kit = ".jpeg";
	 }
 
	 $foto = date("U").$kit;

	 //hibakcollect
 
	 if(isset($hibak))
	 {
		 $kimenet = "<ul>\n";
		 foreach($hibak as $hiba)
		 {
			 $kimenet.="<li>{$hiba}</li>\n";
		 }
		 $kimenet.="</ul>";
	 }
	 else
	 {

        $id= (int)$_GET['id'];
		 // mehet a levesbe(adatbázisba)
		 require("../kapcsolat/kapcsproj.php");
		 $sql = "UPDATE `news` SET `alias`='{$alias}',`title`='{$cim}',`content`='{$tartalom}',`modDate`=NOW(),`description`='{$leiras}',`status`='{$statusz}', `shownPicture`='{$foto}',`mainNews`='{$fohir}' WHERE `id` = {$id}";
		 mysqli_query($dbconn, $sql);
		 move_uploaded_file($_FILES['foto']['tmp_name'], "../kepek/f1cars2023/{$foto}");
		 header("Location: tartalom-szerkeszto.php");
	 }
}
else
{
    require("../kapcsolat/kapcsproj.php");
    $id= (int)$_GET['id'];
    $sql = "SELECT * from news WHERE id = {$id}";

    $eredmeny = mysqli_query($dbconn, $sql);
    $sor = mysqli_fetch_assoc($eredmeny);

    $alias = $sor['alias'];

    $cim = $sor['title'];
    $tartalom = $sor['content'];
    $leiras = $sor['description'];
    $statusz = $sor['status'];
    $fohir = $sor['mainNews'];
	$foto = $sor['shownPicture'];


}


if(isset($_POST["reset"]))
{
	header("Refresh:0");
}

$kimenet = (isset($kimenet)) ? $kimenet : "";

$urlap = <<<URLAP
<form action="" method="post" enctype="multipart/form-data">
	{$kimenet}
	<p><em>A *-al jelölt mezők kitöltése kötelező!</em></p>
	<input type="hidden" name="MAX_FILE_SIZE" value="6000000">
       <p><Label for="foto">Fotó feltöltése*:</Label>
           <input type="file" name="foto" id="foto" value="{$foto}" required>
       </p>
	<p>
		<label for="alias">Alias*:</label><br>
		<input type="text" name="alias" id="alias" required pattern="^[a-z-_]+$" value="{$alias}">
	</p>
	
	<p>
		<label for="cim">Cím*:</label><br>
		<input type="text" name="cim" id="cim" value="{$cim}" required>
	</p>
	<p>
		<label for="tartalom">Tartalom*:</label><br>
		
		<textarea name="tartalom" id="editor"  style="min-height:300px">$tartalom</textarea>
	</p>
	<p>
		<label for="leiras">Leírás:</label><br>
	<textarea name="leiras" id="leiras" value="{$leiras}">$leiras</textarea>
	</p>
	<p>
		<label for="statusz">Státusz:</label><br>
		<select name="statusz" id="statusz">
			<option value="1">Aktív</option>
			<option value="2">Inaktív</option>
		</select>
	</p>
	<p>
	<label for="fohir">Főhír:</label><br>
	<select name="fohir" id="fohir">
		<option value="1">Igen</option>
		<option value="0">Nem</option>
	</select>
</p>
	<input type="submit" value="Rendben" id="rendben" name="rendben">
	<input type="reset" value="Mégsem" id="reset" name="reset">
</form>

URLAP;

$menu = "<ul>
           <li><a href=\"tartalom-szerkeszto.php\">Tartalom</a></li>
        </ul>";


$szo = "módosítása";

//Fernando Sablonzo
$sablon = file_get_contents("sablon.html");
//mitmireholdik
$sablon = str_replace("{{menu}}",$menu,$sablon);
$sablon = str_replace("{{cim}}","Új oldal",$sablon);
$sablon = str_replace("{{tartalom}}",$urlap,$sablon);
$sablon = str_replace("{{oldalsav}}","",$sablon);
$sablon = str_replace("{{szo}}",$szo,$sablon);

print($sablon);
?>