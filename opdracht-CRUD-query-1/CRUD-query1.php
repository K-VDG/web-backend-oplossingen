<?php

	$messageContainer	=	'';
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


// query uitvoeren:
	$query = 'SELECT * FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr WHERE `naam` LIKE "du%" AND brnaam LIKE "%a%"';

	$statement = $db->prepare($query);

	$statement->execute();

	while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchAssoc[]	=	$row;
		}
	
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht- CRUD query 1</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
	<link href="css.css" rel="stylesheet"/>
</head>
<body>

		<h1>Overzicht van de bieren</h1>	

		<p><?php echo $messageContainer ?></p>
		<table>
<!-- header -->			
			<thead></tr>
				<th>#</th>
				<?php foreach($fetchAssoc[0] as $key => $value): ?>
					<th>
						<?= $key ?>
					</th>	
				<?php endforeach; ?>
			</tr></thead>


<!-- de data -->
				<tbody>
					<?php foreach ($fetchAssoc as $key => $value): ?>
						<?php static $counter = 1; ?>
							<tr class= " <?= ($counter % 2 === 0)? 'even' : '' ?>">
								<td> <?= $counter ?> </td>
								<?php foreach ($fetchAssoc[$key] as $key => $value): ?>		
								<td> <?= $value ?>	</td>
								<?php endforeach ?>
							</tr>
						<?php ++$counter; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot></tfoot>
		</table>
</body>
</html>

<?= var_dump($fetchAssoc); ?>