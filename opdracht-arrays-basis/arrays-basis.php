<?php
$dieren = array('gnoe', 'platypus', 'albatros', 'aalscholver', 'eend', 'potvis', 'processierups', 'tor', 'lynx', 'dingo');

$dieren2[] = 'gnoe';
$dieren2[] = 'platypus';
$dieren2[] = 'albatros';
$dieren2[] = 'aalscholver';
$dieren2[] = 'eend';
$dieren2[] = 'potvis';
$dieren2[] = 'processierups';
$dieren2[] = 'tor';
$dieren2[] = 'lynx';
$dieren2[] = 'dingo';

$voertuigen = array('landvoertuigen' => array('fiets', 'Segway', 
	'schoen'), 'watervoertuigen' => array('boot', 'cruiseschip'), 'luchtvoertuigen' => array('helikopter'));

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
</head>
<body>

	<p>
		<?php
		var_dump($dieren);
		var_dump($dieren2);
		var_dump($voertuigen);
		?>
	</p>


</body>
</html>