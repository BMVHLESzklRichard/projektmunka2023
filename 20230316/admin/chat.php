<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

if (!isset($_SESSION['belepett'])) {
	$kivanbent = "Guest";
	$permission = "Guest";
	$foto = "mo.png";
} else if ($_SESSION['userper'] == "user") {
	$permission = $_SESSION["userper"];
	$kivanbent = $_SESSION["user_name"];
	$foto = $_SESSION["fotouser"];
} else {
	$permission = $_SESSION["userper"];
	$kivanbent = $_SESSION["user_name"];
	$foto = $_SESSION["fotouser"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="cssek/chat.css">
	<title>Admin chat</title>
	<link rel="shortcut icon" href="../kepek/logo2.png" type="image/x-icon">
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
:root
{
   --red: rgb(225 6 0);
  --darkred: rgb(68, 0, 0);
  --black: rgb(21,21,30);
  --greyblack: rgba(12, 12, 12, 0.473);
  --bluegrey: rgb(46, 63, 80);
}



*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

*:focus {
    outline: none;
}

	body {
		background:var(--black);
		color:var(--red);
	}

	input,
	textarea {
		color: white;
		background: #57767F;
		font-size: 14px;
	}

	#content {
		width: 90%;
		text-align: left;
		margin: auto;
	}

	#chatwindow {
		border: 3px solid black;
		border-radius: 10px;
		padding: 10px;
		background: rgb(12,12,12);
		box-shadow: 30px 22px 6px var(--greyblack);
		color: grey;
		width: 100%;
		height: auto;
		word-wrap: break-word;
	}

	.moves
	{
		display: flex;
		justify-content: space-around;
		margin: 20px;
	}

	#chatnick {
		border: 1px solid black;
		border-radius: 10px;
		padding: 5px;
		background: var(--greyblack);
	}

	#chatmsg {
		border: 1px solid black;
		border-radius: 10px;
		width: 60%;
		height: 5%;
		padding: 10px;
		background: var(--greyblack);
	}

	.chatgomb
	{
		border: 1px solid black;
		border-radius: 10px;
		padding: 5px;
		background: var(--greyblack);
	}

	#info {
		text-align: center;
		padding-left: 0px;
		margin: auto;
	}

	#info td {
		font-size: 12px;
		padding-right: 10px;
		color: #DFDFDF;
	}

	#info .small {
		font-size: 12px;
		padding-left: 10px;
		padding-right: 0px;
	}

	#info a {
		text-decoration: none;
		color: white;
	}

	#info a:hover {
		text-decoration: underline;
		color: #e91b14;
	}


	.btn {
		width: 100%;
		text-align: center;

	}

	.gomb {
		background-color: rgb(225, 6, 0);
		padding: 10px;
		border-radius: 10px;
		height: 60px;
		width: 120px;
		cursor: pointer;

	}

	.btn a {
		text-decoration: none;
		font-weight: bold;
		font-size: 12px;

	}


	@media screen and (max-width: 900px)
	{
		.moves
	{
		display: flex;
		flex-direction:column;
		justify-content: space-around;
		align-items: center;
		margin: 20px;
		gap:10px;
	}

	.chatgomb
	{
		width: 20%;
	}
	}
</style>
</head>

<body>

	<div id="info">
		<br>
		<h1>Admin Üzenőfal</h1>

	</div>


	<div id="content">
		<p id="chatwindow"> </p>
		<!--			<textarea id="chatwindow" rows="19" cols="95" readonly></textarea><br>
-->
		<div class="moves">
		<input id="chatnick" type="text" size="9" value="<?php echo $kivanbent ?>" disabled>&nbsp;
		<input id="chatmsg" type="text" size="40" maxlength="80" onkeyup="keyup(event.keyCode);">
		<input type="button" class="chatgomb" value="add" onclick="submit_msg();" style="cursor:pointer;border:1px solid gray;">
		</div>
	</div>




	<div class="btn">
		<a href="admin.php">
			<button class="gomb">
				Admin felület
			</button>
		</a>
	</div>
</body>

</html>

<script type="text/javascript">
	/* Settings you might want to define */
	let waittime = 800;

	/* Internal Variables & Stuff */
	chatmsg.focus()
	document.getElementById("chatwindow").innerHTML = "loading...";

	let xmlhttp = false;
	let xmlhttp2 = false;


	/* Request for Reading the Chat Content */
	function ajax_read(url) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
			if (xmlhttp.overrideMimeType) {
				xmlhttp.overrideMimeType('text/xml');
			}
		} else if (window.ActiveXObject) {
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}
		}

		if (!xmlhttp) {
			alert('Giving up :( Cannot create an XMLHTTP instance');
			return false;
		}

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4) {
				document.getElementById("chatwindow").innerHTML = xmlhttp.responseText;

				zeit = new Date();
				ms = (zeit.getHours() * 24 * 60 * 1000) + (zeit.getMinutes() * 60 * 1000) + (zeit.getSeconds() * 1000) + zeit.getMilliseconds();
				intUpdate = setTimeout("ajax_read('chat.txt?x=" + ms + "')", waittime)
			}
		}

		xmlhttp.open('GET', url, true);
		xmlhttp.send(null);
	}

	/* Request for Writing the Message */
	function ajax_write(url) {
		if (window.XMLHttpRequest) {
			xmlhttp2 = new XMLHttpRequest();
			if (xmlhttp2.overrideMimeType) {
				xmlhttp2.overrideMimeType('text/xml');
			}
		} else if (window.ActiveXObject) {
			try {
				xmlhttp2 = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}
		}

		if (!xmlhttp2) {
			alert('Giving up :( Cannot create an XMLHTTP instance');
			return false;
		}

		xmlhttp2.open('GET', url, true);
		xmlhttp2.send(null);
	}

	/* Submit the Message */
	function submit_msg() {
		nick = document.getElementById("chatnick").value;
		msg = document.getElementById("chatmsg").value;

		if (nick == "") {
			check = prompt("please enter username:");
			if (check === null) return 0;
			if (check == "") check = "anonymous";
			document.getElementById("chatnick").value = check;
			nick = check;
		}

		document.getElementById("chatmsg").value = "";
		ajax_write("chathez.php?m=" + msg + "&n=" + nick);
	}

	/* Check if Enter is pressed */
	function keyup(arg1) {
		if (arg1 == 13) submit_msg();
	}

	/* Start the Requests! ;) */
	let intUpdate = setTimeout("ajax_read('chat.txt')", waittime);
</script>