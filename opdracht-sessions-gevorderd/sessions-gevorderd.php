<?php
$thisFile = ($_SERVER['PHP_SELF']);
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Sessions gevorderd</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
	<link href="style.css" rel="stylesheet"/>
</head>
<body>

<h2>Winkelrek<h2>
	<p>Klik op een prodcut om het aan het winkelmandje toe te voegen</p>
	<!-- action="<?= $thisFile ?>" method='POST'-->
		<li><button type="submit" name="bananen" formaction="<?= $thisFile ?>" formmethod="post">Tros bananen</button></li>
		<li><button type="submit" name="Appelsienen" formaction="<?= $thisFile ?>" formmethod="post">Appelsienen</button></li>
		<li><button type="submit" name="Koffie" formaction="<?= $thisFile ?>" formmethod="post">Koffie</button></li>
		<li><button type="submit" name="Koffie" formaction="<?= $thisFile ?>" formmethod="post" value='test'>Melk</button></li>
<h2>Winkelmandje<h2>




</body>
</html>