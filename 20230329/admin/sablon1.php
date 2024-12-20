<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin - {{menunev}}</title>
<link rel="stylesheet" href="../cssek/footer.css">
<link rel="stylesheet" href="../cssek/alap.css">
<link rel="stylesheet" href="../cssek/redactor.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../script/jquery-1.9.0.min.js"></script>
<script src="../script/redactor.min.js"></script>
<script>
$(document).ready(
	function() {
		$('textarea#tartalom').redactor({
			minHeight: 300,
			imageUpload: 'kepfeltoltes.php',
		});
	}
);
</script>
<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>

	<header id="fejlec">
		<h1>Tartalom szerkesztés felülete</h1>
	</header>

<div id="befoglalo">


	<nav id="menu">
		{{menu}}
	</nav>

	<main id="tartalom">
		<!-- <h2>{{menunev}}</h2> -->
		{{tartalom}}
	</main>

	<aside id="oldalsav">
		{{oldalsav}}
	</aside>

	
	

	
</div>


<?php
    include("../footer.php");
?>



	
</body>
</html>