<?php
$pigHealth = 6;
$maximumThrows = 8;

function calculateHit($pigHealth){
	global $maximumThrows;
	//global $pigHealth;
	static $aantalkeer = 0;
	if($aantalkeer < $maximumThrows) {

		$raakKans = rand(1,10);
		if($raakKans < 5) {
			--$pigHealth;
			if($pigHealth > 1){
			echo('<p>Raak! Er zijn nog maar ' . $pigHealth . ' varkens over.</p>' . 'raakansvariabele =  ' .$raakKans);
			} else {
			echo('<p>Raak! Nog 1 varken over! ' . 'raakansvariabele =  ' .$raakKans);

			}

		} else {
			echo('<p>Mis! Er zijn nog maar ' . $pigHealth . ' varkens over.</p>'. 'raakansvariabele =  ' . $raakKans);
		}
		++$aantalkeer;
		calculateHit($pigHealth);
	} else {
			if($pigHealth < 1) {
				echo('<p><b>Gewonneuh!</b></p>');
			} else {
				echo('<p><b>Verloren!</b></p>');
			}
		}
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
	* {font-family: tahoma;font-size:110%;}
	p {border-bottom: 1px solid teal;}
	</style>
</head>
<body>
<p>
	<?php

	calculateHit($pigHealth);

	?>
</p>
</body>
</html>