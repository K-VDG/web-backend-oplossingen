<?php
	$fruit = 'ananas';
	$stringpositie = strrpos($fruit, 'a');

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
			echo $stringpositie;
		?>
	</p>	
	
	<p>
		<?php
			echo strtoupper($fruit);
		?>
	</p>
</body>
</html>