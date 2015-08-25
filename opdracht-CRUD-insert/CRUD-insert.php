<?php
		$brnaam = '';
		$adres = '';
		$postcode = '';
		$gemeente = '';
		$omzet = '';
		$invoerQuery = '';
// connectie maken:
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken
		$messageContainer	=	'Connectie dmv PDO geslaagd.';
	}
	catch ( PDOException $e )
	{
		$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
	}

// ophalen submit values

if (isset($_POST['submit'])){

	try {
		var_dump($_POST);
		$brnaam = $_POST['brnaam'];
		$adres = $_POST['adres'];
		$postcode = $_POST['postcode'];
		$gemeente = $_POST['gemeente'];
		$omzet = $_POST['omzet'];
		$invoerQuery = "INSERT INTO `brouwers`(`brouwernr`, `brnaam`, `adres`, `postcode`, `gemeente`, `omzet`) VALUES ('',' $brnaam','$adres','$postcode','$gemeente','$omzet')";

		$messageContainer	=	'Upload geslaagd!';

			$statement = $db->prepare($invoerQuery);
			$statement->execute();
			echo('laatst toegevoegd:' . $db->lastInsertId());


	}

	catch(PDOException $e) {
		$messageContainer	=	'Upload mislukt! ' . $e->getMessage();

	}

}

// INVOEREN

// 


?>

<!DOCTYPE HTML>
<html>
<head>
	<title>CRUD _ INSERT</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
</head>
<body>
	<h1><a href="CRUD-insert.php">Voeg een brouwer toe</a></h1>
	<form method="POST" action="CRUD-insert.php">
		<li>
			<label for='brnaam'>Brouwernaam</label>
		</li>
		<li>
			<input name='brnaam'/>
		</li>
		
		<li>
			<label for='adres'>adres</label>
		</li>
		<li>
			<input name='adres'/>
		</li>
		
		<li>
			<label for='postcode'>postcode</label>
		</li>
		<li>
			<input name='postcode'/>
		</li>
		
		<li>
			<label for='gemeente'>gemeente</label>
		</li>
		<li>
			<input name='gemeente'/>
		</li>
		
		<li>
			<label for='omzet'>omzet</label>
		</li>
		<li>
			<input name='omzet'/>
		</li>

		<input type="submit" name="submit"/>
	</form>
	<p><?=	$messageContainer ?></p>
</body>
</html>