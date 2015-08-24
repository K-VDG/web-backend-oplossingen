<?php
// connectie maken:
	$boodschap = '';
	$bierenLijst = array();
	$gekozenBrouwer = '';

	try {
	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', '');
	$boodschap = 'connectie geslaagd!';

	}
	catch ( PDOException $e ){
		$boodschap	=	'Er ging iets mis: ' . $e->getMessage();
	}

// query voor select-element uitvoeren:
	$query = 'SELECT DISTINCT brouwers.brouwernr, brouwers.brnaam FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr';

	$statement = $db->prepare($query);

	$statement->execute();

	while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchAssoc[]	=	$row;
		}

// GET brouwerKeuze

	if (isset($_GET['brouwerKeuze'])){
		$gekozenBrouwer = $_GET['brouwerKeuze'];

		$brouwerQuery = 'SELECT DISTINCT bieren.naam FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr WHERE brnaam =  ' . '"' . $gekozenBrouwer . '"';

// de bieren van deze brouwer opslaan:
		$statement2 = $db->prepare($brouwerQuery);

		$statement2->execute();

		while ( $row = $statement2->fetch(PDO::FETCH_ASSOC) )
			{
				$bierenLijst[]	=	$row;
			}
	}
?>


<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
	<link href="style.css" rel="stylesheet"/>
</head>
<body>
	<h1><a href="CRUD-query-2.php" title ="home">Kies een brouwer</a></h1>
	<p><?= $boodschap ?></p>
	<form action="CRUD-query-2.php" method="GET">
		<select name="brouwerKeuze">		
			<?php foreach($fetchAssoc as $key => $value): ?>
				<option value="<?=$fetchAssoc[$key]['brnaam'] ?>"
					<?= 
					($fetchAssoc[$key]['brnaam'] == $gekozenBrouwer)? 'selected' : '' ?>
					>
				 <?= $fetchAssoc[$key]['brnaam']?>
				</option>
			<?php endforeach; ?>
	</select>

		<input type="submit" value="Geef mij alle bieren van deze brouwerij">
	</form>	

	<table>
		<thead>
			<th>Aantal</th><th>Naam</th>
		</thead>
		<tbody>
				<?php $bierteller = 1; ?>
				<?php foreach($bierenLijst as $key => $value): ?>
					<tr class="<?= ($bierteller %2 != 0)? '' : 'odd' ?>">
					<td> <?= $bierteller ?></td>
					<td> <?= $value['naam'] ?></td>
					<?php ++$bierteller; ?>
				</tr>	
				<?php endforeach; ?>
		</tbody>	
		<tfoot></tfoot>
	</table>	
</body>
</html>