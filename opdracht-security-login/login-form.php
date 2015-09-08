<?php
session_start();
$laatsteNotification = FALSE;
if (isset($_SESSION['notification'])) {

	var_dump($_SESSION['notification']);

	$lastKey	=	( count( $_SESSION['notification'] ) ) - 1;
	$laatsteNotification = $_SESSION['notification'][ $lastKey ];
	unset($_SESSION['notification']);
}
/*
	if(isset($_COOKIE['login'])){
   		header('Location: login-form.php');
   		break;
}
*/

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-Security</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet"><style>#notification { color: red; font-weight: bold;}</style>
</head>
<body>
<h2>Inloggen</h2>
		<div id="notification">
			<?= $laatsteNotification ?>
		</div>
<form method="post" action="login-process.php">
		<label for="email">e-mail</label>
		<input type="text" name="email" id="email" autofocus value="
"/><label for="paswoord">paswoord</label>
		<input type="text" name="paswoord" id="paswoord" 
		value="">

	<div><input type="submit" value="login" name="login"></div>
	</form>

  <p><a href="registratie-form.php">Naar registratiepagina</a></p>
</body>
</html>