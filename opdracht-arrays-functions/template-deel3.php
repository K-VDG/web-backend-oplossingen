<?php
	$getallen = array(8,7,8,7,3,2,1,2,4);
	$zonderDuplicaten = array_unique($getallen);
	rsort($zonderDuplicaten);


?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
</head>
<body>

	<div>
		Zonder duplicaten en omgekeerd gesorteerd:
		<?= var_dump($zonderDuplicaten) ?>
	</div>
	


</body>
</html>