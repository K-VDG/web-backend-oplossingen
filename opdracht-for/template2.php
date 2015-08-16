<?php
	$klasse = '';
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
		td,tr {border: 2px solid black;border-collapse: collapse;padding: 10px; text-align: center;}

		.lightgreen {
			background-color: lightgreen;
		}
	</style>
</head>
<body>
<table>
	
	<?php
		for($verticaal = 1; $verticaal <= 10; ++$verticaal)
			{
				echo("<tr>");
				for($horizontaal = 1; $horizontaal <= 10; ++$horizontaal)
				{
					$output = $horizontaal * $verticaal;

					$klasse = ($output % 2 === 0) ?  'lightgreen': '';
					
					echo('<td class ="' . $klasse . '">' . $output  . '</td>');
				};
				echo("</tr>");
			}
	?>
</table>
</body>
</html>