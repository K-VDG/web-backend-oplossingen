<?php
$txtInhoud = file_get_contents('jan.txt');
$txtArray = explode(',', $txtInhoud);

/*
$InputUser = $txtArray[0];
$InputPaswoord = $txtArray[1];
*/

$foutboodschap = '';

	// LOGIN
	if (isset( $_POST['password'] ) ) 
	{
		// zoek user:
		$locatieUserInArray = array_search($_POST['username'], $txtArray);
		$verwachteUsername = $txtArray[$locatieUserInArray];
		$bijhorendPaswoord = $txtArray[$locatieUserInArray + 1];

		echo('verwachte username: ' . $verwachteUsername . '</br>verwacht paswoord: ' . $bijhorendPaswoord);

		echo('arraypaswoord: ' . $_POST['password'] . '</Br>arrayusername: ' . $_POST['username']);



		if ($_POST['password'] == $bijhorendPaswoord && 
			$_POST['username'] == $verwachteUsername) 
		{
			setcookie( 'ingelogd', TRUE, time() + 360 );
			header( 'location: opdracht-cookies-login.php' );
		} 
		else 
		{
			$foutboodschap = 'Paswoord niet correct. Probeer opnieuw.';
		}
	}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
	li {list-style-type: none;}
	body {font-family: helvetica;}
	.error {color: red; font-weight: bold;}

	</style>
</head>
<body>
<h1>Opdracht Cookies</h1>

<div class="error"><?= $foutboodschap ?></div>

<form method="post" action="#">
<li>
	<label for='username'>gebruikersnaam: </label>
</li>
<li>
	<input type="text" name="username" id="username"/>
</li>
<li>
	<label for="paswoord">paswoord: </label>
</li>
<li>	
	<input type="password" name="password" id="password"/> 
</li>
<li>
	<input type="checkbox" name="onthou" id="onthou">
	<label for="onthou">Mij onthouden</label>
</li>
	<input type="submit" value="Verzenden">
</form>
</body>
</html>