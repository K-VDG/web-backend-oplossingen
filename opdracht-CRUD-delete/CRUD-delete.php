<?php
// connecteren:
	try {
	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', '');
	$boodschap = 'connectie geslaagd!';

	}
	catch ( PDOException $e ){
		$boodschap	=	'Er ging iets mis: ' . $e->getMessage();
	}
// data ophalen:
	$selecteerQuery = "SELECT * FROM `brouwers`";
	$statement = $db->prepare($selecteerQuery);

	$statement->execute();

	while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$alleBrouwers[]	=	$row;
		}
		var_dump($alleBrouwers);

//

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
</head>
<body>

	<?php
	echo $boodschap;
	?>

</body>
</html>