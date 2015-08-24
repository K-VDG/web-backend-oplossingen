<?php

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
	$timeStamp = mktime(22,35,25,1,21,1904);
	echo('<p>De timestamp is: ' . $timeStamp . '</p>');

	$leesbaarFormaat = date('d F Y, g:i:s a',$timeStamp);
	echo('</p>Dit is het leesbaar formaat: ' . $leesbaarFormaat . '</p>');

	setlocale(LC_ALL, 'nld_nld');
	$lokaleSchrijfwijze = strftime('%d %B %Y, %I:%M:%S', $timeStamp);
	echo($lokaleSchrijfwijze);
	?>
</p>
</body>
</html>

<!--

Zet deze datum 22u 35m 25sec 21 januari 1904 om naar een timestamp

Toon deze timestamp daarna in het volgende formaat: 21 January 1904, 10:35:25 pm

-->