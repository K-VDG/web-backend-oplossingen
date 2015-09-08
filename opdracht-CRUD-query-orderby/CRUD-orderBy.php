<?php
$ditBestand = ($_SERVER['PHP_SELF']);
$melding = '';
// connectie maken:
	try {
	$database = new pdo('mysql:host=localhost;dbname=bieren', 'root', '');
	
		$melding = 'connectie geslaagd';
	}
	catch(Exception $e ) {
		$melding = 'connectie mislukt';
	}

// data ophalen:
	if (isset($_GET['order_by'])){
		$keuze = $_GET['order_by'];
		$keuzeArray = (explode('-',$keuze));
		$orderByField = $keuzeArray[0];
		$orderType = $keuzeArray[1];

		//if(isset($GET['previousOrder'])){

			// 
		// }

	} else {
		// standaardsortering (zonder selectie)
		$orderType = 'asc';
		$orderByField = 'bieren.biernr';
	}

echo ($orderByField . ' ' . $orderType);

	$selecteerQuery = "SELECT * FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr INNER JOIN soorten on soorten.soortnr = bieren.soortnr ORDER BY $orderByField  $orderType";
	$statement = $database->prepare($selecteerQuery);

	$statement->execute();

	$statement->fetch(PDO::FETCH_ASSOC);

	while( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$completeDatabase[]	=	$row;
		}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht Query Order By</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
	<link href="style.css" rel="stylesheet"/>
</head>
<body>
	<table>
		<thead class="order">
			<h1><a href="<?= $ditBestand ?>">Overzicht van de bieren</a>
			 <span class="melding"> - <?= $melding ?></span>
			</h1>

			<th><a href="<?= $ditBestand .'?order_by=biernr-' 
			. $orderType ?>">Biernummer(PK)</a></th>
			<th><a href="<?= $ditBestand .'?order_by=naam-'
			. $orderType ?>">Bier</a></th>
			<th><a href="<?= $ditBestand .'?order_by=brnaam-' 
			. $orderType?>">Brouwer</a></th>
			<th><a href="<?= $ditBestand .'?order_by=soort-' 
			. $orderType ?>">Soort</a></th>
			<th><a href="<?= $ditBestand .'?order_by=alcohol-'
			. $orderType ?>">Alcoholprecentage</a></th>
			<th></th>
			<th></th>

<!--'

	&previous=' . $orderByField

-->
		</thead>
		<tbody>
			<?php foreach($completeDatabase as $key => $value): ?>
				<tr>
					<td>
						<?= $value['biernr'] ?>
					</td>
					<td>
						<?= $value['naam'] ?>
					</td>

					<td>
						<?= $value['brnaam'] ?>
					</td>
					<td>
						<?= $value['soort'] ?>
					</td>
					<td>
						<?= $value['alcohol'] ?>
					</td>
					<td></td>
					<td></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>