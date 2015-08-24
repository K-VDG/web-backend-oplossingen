<?php
	function __autoload( $className ) {
	    include 'classes/' . $className . '.php';
	}

	$hond = new Animal('Fifi', 'male', 50);

	$kat = new Animal('Sylvester', 'female',40);

	$lynx = new Animal('Willy', 'male', 60);

	$lynx->changeHealth(-25);
	$kat->changeHealth(10);
	$hond->changeHealth(-5);

	// deel 3 v/d opdracht:
	$simba = new Lion('Simba', 'male', 120, 'Congo lion');
	$scar = new Lion('Scar', 'male', 120, 'Kenia lion');

	$barcode = new Zebra('Barcode', 'male', 70, 'zwart met witte strepen');
	$stripey = new Zebra('Stripey', 'female', 65, 'wit met zwarte strepen');

	$_zebras = array($barcode, $stripey);
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Extends</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
</head>
<body>
	<h2>Instanties van de Animal class</h2>
	<p>
		<?= $hond->getName() ?> is van het geslacht <?= $hond->getGender() ?> en heeft momenteel <?= $hond->getHealth() ?> levenspunten.
	</p>	
	<p>
		<?= $kat->getName() ?> is van het geslacht <?= $kat->getGender() ?> en heeft momenteel <?= $kat->getHealth() ?> levenspunten.
	</p>	
	<p>
		<?= $lynx->getName() ?> is van het geslacht <?= $lynx->getGender() ?> en heeft momenteel <?= $lynx->getHealth() ?> levenspunten.
	</p>	

	<p>
		<?= 
			$lynx->doSpecialMove();
		?>
	</p>

	<h2>Instanties van de Lion class</h2>

	<p>
		De speciale move van <?= $simba->getName() ?> (soort: <?= $simba->getSpecies() ?>): <?= $simba->doSpecialMove()?>.
	</p>

	<p>
		De speciale move van <?= $scar->getName() ?> (soort: <?= $scar->getSpecies() ?>): <?= $scar->doSpecialMove()?>.
	</p>

	<h2>Instanties van de Zebra class</h2>

	<p>
		De speciale move van <?= $barcode->getName() ?> (soort: <?= $barcode->getSpecies() ?>): <?= $barcode->doSpecialMove()?>.
	</p>	

	<p>
		De speciale move van <?= $stripey->getName() ?> (soort: <?= $stripey->getSpecies() ?>): <?= $stripey->doSpecialMove()?>.
	</p>	



</body>
</html>

<?php
	 var_dump($_zebras);
	 var_dump($barcode);
	 var_dump($stripey);

/*
	 foreach ($barcode as $key => $value ){
	 	echo ($key . ' ' . $value);
	 }
*/	 
?>