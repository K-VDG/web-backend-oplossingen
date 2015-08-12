<?php
$aantalSeconden = 221108521;
$aantalMinuten = round($aantalSeconden/60);
$aantalUren = round($aantalMinuten/60);
$aantalDagen = round($aantalUren/24);
$aantalWeken = floor($aantalDagen/7);
$aantalMaanden = round($aantalDagen/31);
$aantalJaren = round($aantalMaanden/12);
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
</head>
<body>
<p>
	In 
	<?php
		echo($aantalSeconden);
	?>
	seconden:
</p>
<ul>
	<li>minuten: <?php echo $aantalMinuten ?></li>	
	<li>uren: <?php echo $aantalUren ?></li>
	<li>dagen: <?php echo $aantalDagen ?></li>	
	<li>weken: <?php echo $aantalWeken ?></li>
	<li>maanden: <?php echo $aantalMaanden ?></li>	
	<li>jaren: <?php echo $aantalJaren ?></li>
</ul>

</body>
</html>