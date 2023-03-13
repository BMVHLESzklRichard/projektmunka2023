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
  header("Location:admin-kezelo.php");  
}
if (isset($_POST['ok'])) 
{
    require("../kapcsolat/kapcsproj.php");
        $email = mysqli_real_escape_string($dbconn,$_POST['email']);
        $usertype = $_POST['user_type'];
        $select = "SELECT * FROM `projectacc`
        WHERE email = '$email'";

        $result = mysqli_query($dbconn, $select);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            if ($row['email'] == $email) {
            $log = date("Y-m-d H:i:s")."új jelszó kérése {$email} barátom ({$_SERVER['REMOTE_ADDR']})\n";
            file_put_contents("log.txt",$log,FILE_APPEND); 
            $_SESSION['email'] = $email;
            header('Location:forgotpass.php');
            }
            } else {
            $hibak[] = "rossz email";
            $log = date("Y-m-d H:i:s")."új jelszó kérése nem sikerült{$email} barátom ({$_SERVER['REMOTE_ADDR']})\n";
            file_put_contents("log.txt",$log,FILE_APPEND); 
            }

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
		//  require("../kapcsolat/kapcsproj.php");
		 $sql = "UPDATE `projectacc` SET `permission`= '{$usertype}' WHERE email = '{$email}' and id = {$id}";
         mysqli_query($dbconn, $sql);
         header('Location:admin-kezelo.php');
	 }
}
else
{
    require("../kapcsolat/kapcsproj.php");
    $id= (int)$_GET['id'];
    $sql = "SELECT * from projectacc WHERE id = {$id}";

    $eredmeny = mysqli_query($dbconn, $sql);
    $sor = mysqli_fetch_assoc($eredmeny);

    $email = $sor["email"];

}


$kimenet = (isset($kimenet)) ? $kimenet : "";
$urlap = <<<URLAP
<form action="" method="post" class="felulet">
    <div class="container feluletkozepre">
    <div class="hiba">
    {$kimenet}
        </div>
        <div class="melle">
            <label for="email" class="melle">
                <p>E-mail</p>
                <input type="email" name="email" id="email" value="{$email}" required>
            </label>
        </div>
        <div class="melles">
                <select name="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
        </div>
        <div class="gomb"><input type="submit" value="OK" id="ok" name="ok"></div>
    </div> 
    </form>
URLAP;

$menu = "<ul>
           <li><a href=\"admin-kezelo.php\">Tartalom</a></li>
        </ul>";

//Fernando Sablonzo
$sablon = file_get_contents("sablon2.html");
//mitmireholdik
$sablon = str_replace("{{menu}}",$menu,$sablon);
$sablon = str_replace("{{cim}}","Új oldal",$sablon);
$sablon = str_replace("{{tartalom}}",$urlap,$sablon);
$sablon = str_replace("{{oldalsav}}","",$sablon);

print($sablon);
