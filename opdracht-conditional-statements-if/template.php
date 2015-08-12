<?php
$getal = 2;

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
	echo("Het is een " . $dag);
	?>
</div>

</body>
</html>