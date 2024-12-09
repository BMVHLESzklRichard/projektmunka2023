<?php
use function PHPSTORM_META\map;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
if(!isset($_SESSION["belepett"]))
{
  header("Location:../false.html");  
}
else
{
	$permission = $_SESSION["userper"];
    $kivanbent = $_SESSION["user_name"];
    $foto = $_SESSION["fotouser"];
    $hiriroid = $_SESSION["bejelentid"]; 
}


if(isset($_POST["rendben"]))
{
    //változók clear
    $_POST = array_map("trim",$_POST);
    $alias = strtolower(strip_tags($_POST['alias']));
    $cim = strip_tags($_POST['cim']);
    $tartalom = $_POST['tartalom'];
    $leiras = strip_tags($_POST['leiras']); 
	$statusz = (int)$_POST['statusz'];
	$fohir = (int)$_POST['fohir'];


	//változók ellenőrzés
    $mime = array("image/gif", "image/png", "image/jpg", "image/jpeg");
	 //ellenőrzés
	 if(empty($alias))
	 {
		 $hibak[] = "Nem adtál meg aliast!";
	 }
 
	 if(!preg_match("/^[a-z_]*$/",$alias))
	 {
		 $hibak[] = "Csak megfelelő írásjeleket használj!";
	 }
 
	 if(empty($cim))
	 {
		 $hibak[] = "Nem adtál meg menünevet!";
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

 
	 function Inseert($alias, $cim, $tartalom, $fohir, $leiras, $statusz, $foto, $hiriroid,$kivanbent)
	 {
		$aliasp = $alias;
		$cimp = $cim;
		$tartalomp = $tartalom;
		$fohirp = $fohir;
		$leirasp = $leiras;
		$statuszp = $statusz;
		$fotop = $foto;
		$hiriroidp = $hiriroid;
		$kivanbent = $kivanbent;
		require("../kapcsolat/kapcsproj.php");
		$sql = "INSERT INTO `news`(`alias`, `title`, `content`, `creationDate`, `mainNews`, `description`, `status`, `shownPicture`, `writerId`) VALUES ('{$aliasp}','{$cimp}','{$tartalomp}',Now(),'{$fohirp}','{$leirasp}','{$statuszp}','{$fotop}', '{$hiriroidp}')";
						mysqli_query($dbconn, $sql);
						move_uploaded_file($_FILES['foto']['tmp_name'], "../kepek/f1cars2023/{$foto}");
						
						$log = date("Y-m-d H:i:s") . "Cikket vitt fel {$kivanbent}. ({$_SERVER['REMOTE_ADDR']})\n";
						file_put_contents("felvitt.txt", $log, FILE_APPEND);
						header("Location: tartalom-szerkeszto.php");
	 }

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
		
	


		if ($fohir == 1)
		{
			require("../kapcsolat/kapcsproj.php");

			$mennyifohir = "select id from news where mainNews = 1";
			$mennyifohireredmeny = mysqli_query($dbconn, $mennyifohir);

			if(mysqli_num_rows($mennyifohireredmeny) >= 4)
			{
				
			$idle = "select id from news where mainNews = 1 order by creationDate asc limit 1";

			$idleeredmeny = mysqli_query($dbconn, $idle);

	//érvényes tartalom 
					if (mysqli_num_rows($idleeredmeny) == 1) {
					    $sor = mysqli_fetch_assoc($idleeredmeny);
					
						$regiid = $sor["id"];
					
						$update = "Update news set mainNews = 0 where id = {$regiid}";
						mysqli_query($dbconn, $update);
						Inseert($alias, $cim, $tartalom, $fohir, $leiras, $statusz, $foto, $hiriroid,$kivanbent);
					}
			}
			else
			{ Inseert($alias, $cim, $tartalom, $fohir, $leiras, $statusz, $foto, $hiriroid,$kivanbent); }	
		}
		else
		{ Inseert($alias, $cim, $tartalom, $fohir, $leiras, $statusz, $foto, $hiriroid,$kivanbent); }
	 } 
}


$kimenet = (isset($kimenet)) ? $kimenet : "";
$alias = (isset($alias)) ? $alias : "";
$cim = (isset($cim)) ? $cim : "";
$tartalom  = (isset($tartalom)) ? $tartalom  : "";
$leiras  = (isset($leiras)) ? $leiras  : "";
$statusz = (isset($statusz)) ? $statusz : "";
$fohir = (isset($fohir)) ? $fohir : "";
$foto = (isset($foto)) ? $foto : "";



$urlap = <<<URLAP
<form action="" method="post" enctype="multipart/form-data">
	{$kimenet}
	<p><em>A *-al jelölt mezők kitöltése kötelező!</em></p>
	<input type="hidden" name="MAX_FILE_SIZE" value="6000000">
       <p><Label for="foto">Fotó feltöltése*:</Label>
           <input type="file" name="foto" id="foto">
       </p>
	<p>
		<label for="alias">Alias*:</label><br>
		<input type="text" name="alias" id="alias" required pattern="^[a-z-_]+$" value="{$alias}" required>
	</p>
	<p>
		<label for="cim">Cím*:</label><br>
		<input type="text" name="cim" id="cim" value="{$cim}" required>
	</p>
	<p>
	<label for="tartalom">Tartalom*:</label><br>

		<textarea name="tartalom" id="editor" value="{$tartalom}" style="min-height:300px"></textarea>

	</p>
	<p>
		<label for="leiras">Leírás*:</label><br>
	<textarea name="leiras" id="leiras" value="{$leiras}" required></textarea>
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
	<input type="reset" value="Mégsem">
</form>

URLAP;
$menu = "<ul>
           <li><a href=\"admin.php\">Admin Főoldal</a></li>
        </ul>";


$oldalsav = "<ul>
<li><a href=\"logout.php\">Kijelentkezés</a></li>
</ul>";

$szo = "felvitele";

$sablon = file_get_contents("cikkfelsablon.html");
$sablon = str_replace("{{menu}}",$menu,$sablon);
$sablon = str_replace("{{cim}}","Új oldal",$sablon);
$sablon = str_replace("{{tartalom}}",$urlap,$sablon);
$sablon = str_replace("{{oldalsav}}","$oldalsav",$sablon);
$sablon = str_replace("{{szo}}","$szo",$sablon);
print($sablon);
