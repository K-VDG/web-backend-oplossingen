<?php
session_start();
var_dump($_POST);
var_dump($_SESSION);
require 'functions-generate.php';
require 'functions-db.php';

$laatsteNotification = FALSE;

// notificaties uitprinten en leegmaken:
if (isset($_SESSION['notification'])) {

	var_dump($_SESSION['notification']);

	$lastKey	=	( count( $_SESSION['notification'] ) ) - 1;
	$laatsteNotification = $_SESSION['notification'][ $lastKey ];
	unset($_SESSION['notification']);
}

if (isset($_SESSION['email'])){
	$ingevoerdEmail = $_SESSION['email'];
} else {
	$ingevoerdEmail = '';
}

if (isset($_SESSION['paswoord'])){
	$ingevoerdPaswoord = $_SESSION['paswoord'];
} else {
	$ingevoerdPaswoord = '';
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-Security</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
	<style>#notification { color: red; font-weight: bold; }</style>
</head>
<body>
<h2><a href="registratie-form.php">Registreren</a></h2>	
	<form method="post" action="registratie-proces.php">
		<div id="notification">
			<?= $laatsteNotification ?>
		</div>
		<label for="email">e-mail</label>
		<input type="text" name="email" id="email" autofocus value="
<?=($ingevoerdEmail)? $ingevoerdEmail : '' ?>"/><label for="paswoord">paswoord</label>
		<input type="text" name="paswoord" id="paswoord" 
		value="<?=($ingevoerdPaswoord)? $ingevoerdPaswoord : '' ?>">

	<button name="maakpaswoord" type="submit" formaction="registratie-proces.php" formmethod="post" >Genereer een paswoord</button>
	<div><input type="submit" value="Registreer" name="registreer"></div>
	</form>
</body>
</html>