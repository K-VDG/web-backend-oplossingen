<?php
// $md5HashKey  = "d1fa402db91a7a93c4f414b8278ce073";



	 function tel1($needle){
	 	$outputArray = array();
	 	global $md5HashKey;
	 //	global $md5HashKey;

	 	$aantalkeer = substr_count($md5HashKey, $needle);
	 	$haystackLength = strlen($md5HashKey);
	 	$needleLength = strlen($needle);
	 	$percentage = (($needleLength / $haystackLength) * $aantalkeer) * 100;

	 	// array aanvullen met AANTAL, PERCENTAGE, LETTER, HAYSTACK
	 	$outputArray[] = $aantalkeer;
	 	$outputArray[] = $percentage;
	 	$outputArray[] = $needle;
	 	$outputArray[] = $md5HashKey;

	 	// return($outputArray);
	 	$antwoord = 'Het karakter ' . $outputArray[2] . ' komt ' . $outputArray[0] . ' keer voor in de string ' . $outputArray[3] . '. Dit is ' . $outputArray[1] . '%';
	 	return($antwoord);
	 }

	 	 function tel2($needle){
	 	$outputArray = array();
	 	$md5HashKey = $GLOBALS['md5HashKey'];
	 //	global $md5HashKey;

	 	$aantalkeer = substr_count($md5HashKey, $needle);
	 	$haystackLength = strlen($md5HashKey);
	 	$needleLength = strlen($needle);
	 	$percentage = (($needleLength / $haystackLength) * $aantalkeer) * 100;

	 	// array aanvullen met AANTAL, PERCENTAGE, LETTER, HAYSTACK
	 	$outputArray[] = $aantalkeer;
	 	$outputArray[] = $percentage;
	 	$outputArray[] = $needle;
	 	$outputArray[] = $md5HashKey;

	 	// return($outputArray);
	 	$antwoord = 'Het karakter ' . $outputArray[2] . ' komt ' . $outputArray[0] . ' keer voor in de string ' . $outputArray[3] . '. Dit is ' . $outputArray[1] . '%';
	 	return($antwoord);
	 }

	 	 function tel3($needle,$md5HashKey ){
	 	$outputArray = array();
	 
	 //	global $md5HashKey;

	 	$aantalkeer = substr_count($md5HashKey, $needle);
	 	$haystackLength = strlen($md5HashKey);
	 	$needleLength = strlen($needle);
	 	$percentage = (($needleLength / $haystackLength) * $aantalkeer) * 100;

	 	// array aanvullen met AANTAL, PERCENTAGE, LETTER, HAYSTACK
	 	$outputArray[] = $aantalkeer;
	 	$outputArray[] = $percentage;
	 	$outputArray[] = $needle;
	 	$outputArray[] = $md5HashKey;

	 	// return($outputArray);
	 	$antwoord = 'Het karakter ' . $outputArray[2] . ' komt ' . $outputArray[0] . ' keer voor in de string ' . $outputArray[3] . '. Dit is ' . $outputArray[1] . '%';
	 	return($antwoord);
	 }


?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
	* {font-family: tahoma;font-size:110%;} p {border-bottom: 1px solid teal;}
	</style>
</head>
<body>
	<p>
	<?php
	$md5HashKey  = "d1fa402db91a7a93c4f414b8278ce073";
	echo tel1('c');

	?>	
	<!-- vardump als test: -->
	<!-- <?= var_dump(tel1('x')) ?> -->
	</p>

	<p>
	<?php
	echo tel2('d1fa402db91a7a93c4f414b8278ce073');

	?>	
	<!-- vardump als test: -->
	<!-- <?= var_dump(tel1('x')) ?> -->
	</p>

		<p>
	<?php

	echo tel3('fa4','d1fa402db91a7a93c4f414b8278ce073');

	?>	
	<!-- vardump als test: -->
	<!-- <?= var_dump(tel1('x')) ?> -->
	</p>

</body>
</html>