<?php
	// OEFENING 1
	 function drukArrayAf($array){
	 	$eerstewaarde = $array[0];
	 	$output = '\'$array[0]\' heeft de waarde \'' . $eerstewaarde . '\'.';

	 	return($output);
	 }
	 $testArray[] = 'gnoe';
	 $testArray[] = 'lynx';
	 $testArray[] = 'dingo';
	 $testArray[] = 'rups';
	 $testArray[] = 'walvis';

	 // VALIDEER HTML
	 $testHTMLstring = '<html> msqldfkjqmsldf! </html>';
	 function validateHtmlTag($html){
	 	$htmlOpenTag = '<html>';
	 	$htmlSluitTag = '</html>';

	 	if(strpos($html, $htmlOpenTag) !== false &&
	 		strpos($html, $htmlSluitTag) !== false) {
	 		$output = 'Correcte syntax!';
	 	} else {
	 		$output = 'Foute syntax!';
	 	}

	 	return($output);
	 }
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
	p {border-bottom: 1px solid blue; font-family: 'arial';}
	</style>
</head>
<body>
	<h1>Opdracht functies - extra</h1>
	<p>
		<?php

			echo drukArrayAf($testArray); 
		?>
	</p>

	<h2>Valideer HTML</h2>
	<p>
		Controleer de volgende string: 
		<?= htmlspecialchars($testHTMLstring) ?>
	</p>
	<p>
		<?php

		echo validateHtmlTag($testHTMLstring);

		var_dump($GLOBALS);
		?>


	</p>
</body>
</html>