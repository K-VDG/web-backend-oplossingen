<?php
	$fruit = 'kokosnoot';
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
		echo("De stringlengte is: ");
		echo strlen($fruit);
	?>
</p>

<p>	
	<?php
	echo('De string position is: ');
	echo stripos($fruit, 'o');
	?>
</p>


</body>
</html>