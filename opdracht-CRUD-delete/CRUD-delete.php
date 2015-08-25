<?php
// connecteren:
	try {
	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', '');
	$boodschap = 'connectie geslaagd!';

	}
	catch ( PDOException $e ){
		$boodschap	=	'Er ging iets mis: ' . $e->getMessage();
	}

// verwijderen
	if (isset($_GET['delete'])){
			$teVerwijderen = $_GET['delete'];
		
			$verwijderQuery = 'DELETE FROM brouwers 
							WHERE brouwernr = :teVerwijderen';  
			echo('Query:<code> ' . $verwijderQuery . '</code>') ;
		try {

	$statement = $db->prepare($verwijderQuery);
	$statement->bindValue(':teVerwijderen', $teVerwijderen );
	$statement->execute();
	$boodschap = 'De datarij werd goed verwijderd';
		}

		catch(PDOException $e) {

	$boodschap = 'De datarij kon niet verwijderd worden. Probeer opnieuw.';
		}

	}

// data ophalen:
	$selecteerQuery = "SELECT * FROM brouwers";
	$statement = $db->prepare($selecteerQuery);

	$statement->execute();

	while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$alleBrouwers[]	=	$row;
		}
		$alleBrouwers = array_reverse($alleBrouwers);



?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CRUD Delete</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
	<link href="css/stijl.css" rel="stylesheet"/>
</head>
<body>
	<h1><a href="CRUD-delete.php">Overzicht van de brouwers</a></h1>
		<p>	<?= $boodschap ?></p>
		<table>
			<thead>
			<tr><th>#</th>
				<?php foreach($alleBrouwers[0] as $key => $value): ?>
					<th><?=	$key ?></th>
				<?php endforeach; ?>
				<th></th>
			</tr>
			</thead>	
			<tbody>
				<?php foreach($alleBrouwers as $key => $value): ?>
					<tr class="<?= ($key % 2 === 0)? 'odd' : '' ?>">
						<td> <?= ($key + 1) ?> </td>
						<?php foreach($alleBrouwers[$key] as $brouwerKolom => $cel): ?>
						<td> <?= $cel ?> </td>
						<?php endforeach; ?>
						<td><form class="deleteknop"><button type="submit" name="delete" value="<?= $alleBrouwers[$key]['brouwernr'] ?>" formaction="CRUD-delete.php" formmethod="get"></button></form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot></tfoot>
		</table>
</body>
</html>