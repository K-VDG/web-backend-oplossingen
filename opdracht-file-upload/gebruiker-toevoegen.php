<?php
session_start();
$dezeUser = '1@1.be';

include 'classes/database.php';
$dbInst = new Database;
$db = $dbInst ->connectToDatabase();  


// $_SESSION['notification'] = array();
// check if alt-attribuut is set & voeg dit toe;

// var_dump($dbInst->selecteerDezeUser($dezeUser));

$iedereen = $dbInst->selecteerIedereen();

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet"><style>input { display: block; margin: 10px;} #profielfoto {max-width: 200px; display: inline-block; margin-bottom: 20px;}</style>
</head>
<body>
<h1>Gegevens wijzigen</h2>
<div id="notification"><?= var_dump($_SESSION['notification']); ?></div>	<?php var_dump($iedereen) ?>

<?php foreach($iedereen as $key => $value): ?>
		<div id="profielfoto">

	<img src="<?= 
	($iedereen[$key]['profile_picture'])? ('img/' . $iedereen[$key]['profile_picture']) : 'img/placeholder.gif' ?>" title="profielfoto" alt="profielfoto"/>
	<figcaption><?= $iedereen[$key]['email']?></figcaption>
		</div>	

<?php endforeach; ?>
<form enctype="multipart/form-data" method="POST" action="gegevens-bewerken.php">
	<input type="file" name="bestand">
	<input type="text" name="email" value="<?= $dezeUser ?>">
	<input type="submit" value="Gegevens wijzigen" name="submit">
</form>

</body>
</html>