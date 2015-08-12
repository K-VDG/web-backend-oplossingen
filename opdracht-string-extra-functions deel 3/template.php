<?php
	$lettertje = 'e';
	$cijfertje = 3;
	$langstewoord = 'zandzeepsodemineralenwatersteenstralen';
	$langstewoord = str_replace($lettertje, $cijfertje, $langstewoord);
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
		echo $langstewoord;
	?>
</p>



</body>
</html>