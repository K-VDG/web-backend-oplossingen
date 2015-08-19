<?php

session_start();

$email 	=	( isset( $_SESSION['email'] ) ? $_SESSION['email'] : '' );
$nickname 	=	( isset( $_SESSION['nickname'] ) ? $_SESSION['nickname'] : '' );



$teFocussenVeld= '';
if( isset($_GET['autofocus'])){
	$teFocussenVeld = $_GET['autofocus'];
}

?>


<!DOCTYPE HTML>
<html>
<head>
	<title>Registratie</title>
	<meta charset="UTF-8">
	<style>
	li {list-style-type: none;}
	body {font-family: helvetica; color: darkblue;}
	input {margin: 5px 0; padding: 5px;}
	</style>
</head>
<body>
<h2>Deel 1: registratiegegevens</h2>
<form method="post" action="sessions-adresgegevens.php">
	<li>
		<label for='email'>e-mail: </label>
	</li>
	<li>
		<input type="email" name="email" value="<?= $email ?>" id="email"
		<?= ($teFocussenVeld == 'email')? 'autofocus' : '' ?>/>
	</li>
	<li>
		<label for="nickname">nickname: </label>
	</li>
	<li>	
		<input type="text" name="nickname" id="nickname" value="<?= $nickname?> "
		<?= ($teFocussenVeld == 'nickname')? 'autofocus' : '' ?>/> 
	</li>
		<input type="submit" value="Verzenden">
</form>
</body>
</html>
<pre><?php var_dump( $_SESSION ) ?></pre>