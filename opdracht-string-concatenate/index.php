<?php
$voornaam = 'Koen';
$achternaam = 'Van de Gaer';
$volledigenaam = $voornaam . ' ' . $achternaam;
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>String-concatenate</title>
	<meta charset="UTF-8">
</head>
<body>

<p>
	<?php
	echo $volledigenaam;
	?>
</p>

<p>
	<?php
	echo strlen($volledigenaam);
	?>
</p>


</body>
</html>