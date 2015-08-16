<?php
 $text = file_get_contents("textfile.txt");
 $textChars = str_split($text);
 rsort($textChars);
 $omgekeerd = array_reverse($textChars);


$teller = '';
$letters = array();
 foreach ($omgekeerd as $value) {
 	++$teller;
 	/*
 	if(in_array($value, $omgekeerd)) {
 		// +1 bij reeds bestaande array
 		$letters[$value][] += 1;

 	} else {
 		// nieuwe array aanmaken met als naam de 'value'
 		$
 		}
	*/

 	//$occurences = substr_count($omgekeerd, $value);
 		
 	
 }

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
	echo('Het totaal aantal letters is: ' . $teller);
	// var_dump($omgekeerd);
	var_dump($occurences);
	?>
</p>
</body>
</html>