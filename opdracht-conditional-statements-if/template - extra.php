<?php
$getal = 3;

if($getal === 1) {
	$dag = 'maandag';
}

if($getal === 2) {
	$dag = 'dinsdag';
}

if($getal === 3) {
	$dag = 'woensdag';
}

if($getal === 4) {
	$dag = 'donderdag';
}

if($getal === 5) {
	$dag = 'vrijdag';
}

if($getal === 6) {
	$dag = 'zaterdag';
}

if($getal === 7) {
	$dag = 'zondag';
}

?>


<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
</head>
<body>

<div>
	<?php
		echo('Het is een ' . $dag);
	?>
</div>

<div>
	<?php
		echo('Het is een ' . strtoupper($dag));
	?>
</div>

<div>
	<?php
		$dagUpper = strtoupper($dag);
		$output = str_replace('A', 'a', $dagUpper);
		echo('Enkel de a als kleine letter: ' . $output);
	?>
	
</div>
	<?php
		$dagUpper = strtoupper($dag);
		$PosLaatsteA = strrpos($dagUpper, 'A');		
		echo($PosLaatsteA);
		

		
		
		//echo($output);
	?>


</body>
</html>