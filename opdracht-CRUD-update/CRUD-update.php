<?php
session_start();
$ditBestand = ($_SERVER['PHP_SELF']);

// connecteren:
	try {
	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', '');
	$boodschap = 'connectie geslaagd!';

	}
	catch ( PDOException $e ){
		$boodschap	=	'Er ging iets mis: ' . $e->getMessage();
	}

// verwijderen
	$teVerwijderen = '';
	if (isset($_GET['delete'])){
			
	$_SESSION['teVerwijderen'] = $_GET['delete'];
	}	

	if(isset($_SESSION['teVerwijderen'])) {
			$teVerwijderen = $_SESSION['teVerwijderen'];
	}


	if (isset($_GET['bevestiging'])) {

		if($_GET['bevestiging']=='ja') {

					$verwijderQuery = 'DELETE FROM brouwers 
									WHERE brouwernr = :teVerwijderen';  
					//echo('Query: <code> ' . $verwijderQuery . '</code>') ;
			try {

			$statement = $db->prepare($verwijderQuery);
			$statement->bindValue(':teVerwijderen', $teVerwijderen );
			$statement->execute();
			$boodschap = 'De datarij werd goed verwijderd';
				}

				catch(PDOException $e) {

			$boodschap = 'De datarij kon niet verwijderd worden. Probeer opnieuw.';
				}
			$_SESSION['teVerwijderen'] = '';
			$teVerwijderen = '';

		} else {
			header("Location: $ditBestand");
			$_SESSION['teVerwijderen'] = '';
			$teVerwijderen = '';
		}

	}

// edit
	$brnaamToEdit = '';
	$brouwernrToEdit ='';
	$showEditHeader = FALSE;

	if (isset($_GET['edit'])){

		try {
			
			$_SESSION['edit'] = $_GET['edit'];
			$showEditHeader = TRUE;
			$brouwernrToEdit = $_SESSION['edit'];

			$zoekEditBrouwerQuery = 'SELECT * FROM brouwers WHERE brouwernr =' . $brouwernrToEdit;

			$statement = $db->prepare($zoekEditBrouwerQuery);

			$statement->execute();

				while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
					{
						$editBrouwer[]	=	$row;
					}

			$brnaamToEdit = $editBrouwer[0]['brnaam'];
		}
		catch(PDOException $e) {
			$boodschap = 'foute boel';
		}

	}	
// edit de geslecteerde brouwer
	if(isset($_POST['wijzigen'])){

		try{
		$brouwernr = $_SESSION['edit'];
		$brnaam = $_POST['brnaam'];
		$adres = $_POST['adres'];
		$postcode = $_POST['postcode'];
		$gemeente = $_POST['gemeente'];
		$omzet = $_POST['omzet'];

		$editQuery = "UPDATE brouwers 
		SET brouwernr='$brouwernr',
		brnaam='$brnaam',
		adres='$adres',
		postcode='$postcode',
		gemeente='$gemeente',
		omzet= '$omzet'
		WHERE brouwernr = $brouwernr";

			$statement = $db->prepare($editQuery);
			$statement->execute();

			$boodschap	=	'Aanpassing succesvol doorgevoerd!';
			echo $editQuery;
		}

		catch(PDOException $e) {

		$boodschap	=	'Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de <a href="mailto:webmaster@dinges.be">systeembeheerder</a> wanneer deze fout zich blijft voordoen' . $e->getMessage();
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
	<title>CRUD Update</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
	<link href="css/stijl.css" rel="stylesheet"/>
</head>
<body>
	<div  class="<?= ($showEditHeader) ? 'shown' :'hidden' ?>" id="editDIV">
	<h1>Brouwerij <?= $brnaamToEdit . '(#' . $brouwernrToEdit . ')' ?> wijzigen<h1>
			<form id="wijzigbrouwerij" method="post" action="<?=$ditBestand ?>">
				<li><label for="brnaam"></label>Brouwernaam</li>
				<li><input type="text" name="brnaam" id="brnaam" value="<?= $editBrouwer[0]['brnaam'] ?>">
				<label for="adres"></label>adres</li>
				<li><input type="text" name="adres" id="adres" value="<?= $editBrouwer[0]['adres'] ?>">
			<label for="postcode"></label>postcode</li>
				<li><input type="text" name="postcode" id="postcode" value="<?= $editBrouwer[0]['postcode'] ?>">
			<label for="gemeente"></label>gemeente</li>
				<li><input type="text" name="gemeente" id="gemeente" value="<?= $editBrouwer[0]['gemeente'] ?>">
			<label for="omzet"></label>omzet</li>
				<li><input type="text" name="omzet" id="omzet" value="<?= $editBrouwer[0]['omzet'] ?>"></li>
				<input type="hidden" name="hiddenBrouwer" value="" >
			<li>	<input type="submit" name="wijzigen" id="wijzigbrouwerijknop" value="wijzigen"></li>
		</form>
	</div>

	<h2><a href="<?= $ditBestand ?>">Overzicht van de brouwers</a></h2>
			<form id="bevestiging" class= "<?= ($teVerwijderen)? 'shown' : 'hidden '?>">
			<p>Bent u zeker dat u deze datarij (<?= $teVerwijderen ?>) wilt verwijderen?</p>
			<input type="submit" name="bevestiging" value="ja"/>
			<input type="submit" name="bevestiging" value="nee"/>
			</form>

		<p>	<?= $boodschap ?></p>
		<table>
			<thead>
			<tr><th>#</th>
				<?php foreach($alleBrouwers[0] as $key => $value): ?>
					<th><?=	$key ?></th>
				<?php endforeach; ?>
				
			</tr>
			</thead>	
			<tbody>
				<?php foreach($alleBrouwers as $key => $value): ?>
					<tr class="<?= ($key % 2 === 0)? 'odd' : '' ?>" 

						id = "<?= ($teVerwijderen == $alleBrouwers[$key]['brouwernr']


					)? 'rood' : '' ?>"	>
						<td><?= ($key + 1) ?></td>
						<?php foreach($alleBrouwers[$key] as $brouwerKolom => $cel): ?>
								<td><?= $cel ?></td>
						<?php endforeach; ?>
						<td><form class="deleteknop"><button type="submit" name="delete" value="<?= $alleBrouwers[$key]['brouwernr'] ?>" formaction="<?= $ditBestand ?>" formmethod="get"></button></form>
						</td>
						<td>
							<form class="editknop"><button type="submit" name="edit" value="<?= $alleBrouwers[$key]['brouwernr'] ?>" formaction="<?= $ditBestand ?>" formmethod="get"></button></form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot></tfoot>
		</table>
</body>
</html>
<!-- INPUTKNOP
	input type="submit" value="" 
							name="<?= $alleBrouwers[$key]['brouwernr'] ?>">
-->