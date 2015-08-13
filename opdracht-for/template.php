<?php
	$rijen = 10;
	$kolommen = 10;
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
		td, tr {
			border: 2px solid black;
			border-collapse: collapse;
			padding: 10px;
		}
	</style>
</head>
<body>
<table>
	<?php

	for($teller = 1; $teller <= $rijen; ++$teller)
	{
		echo('<tr>');
			for($kolomteller = 1; $kolomteller <= $kolommen; ++$kolomteller) {
				echo('<td>kolom</td>');
			}
		echo('</tr>');
	}

	?>
</table>
</body>
</html>