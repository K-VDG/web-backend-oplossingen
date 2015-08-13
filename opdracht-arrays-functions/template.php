<?php
$dieren = array('gnoe', 'platypus', 'albatros', 'aalscholver', 'eend', 'potvis', 'processierups', 'tor', 'lynx', 'dingo');
$aantaldieren = count($dieren);

$teZoekenDier = 'lynx';
$gevonden = in_array($teZoekenDier, $dieren);


?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
</head>
<body>
<div>
	Het aantal dieren is: <?= $aantaldieren ?>.
</div>

<div>
Het dier '<?= $teZoekenDier ?>' werd...
<?php
	echo ($gevonden == true) ? 'Gevonden!' : 'NIET gevonden!';
?>
</div>

</body>
</html>