<?php
$dieren = array('gnoe', 'platypus', 'albatros', 'aalscholver', 'eend', 'potvis', 'processierups', 'tor', 'lynx', 'dingo');

sort($dieren);

$zoogdieren = array('mens', 'varken', 'paard');
$dierenlijst = array_merge($dieren, $zoogdieren);

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
			var_dump($dieren);
		?>
	</div>

	<div>
		Samengevoegd met de merge-functie:
		<?php
			var_dump($dierenlijst);
		?>
	</div>
	

</body>
</html>