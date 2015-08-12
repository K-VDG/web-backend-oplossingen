<?php
$getal = 55;
$output = "";

if($getal < 9){
	$output = 'Het getal is kleiner dan 10.';
} else if($getal > 9 && $getal < 19 ){
	$output = 'Het getal ligt tussen 10 en 20.';
} else if($getal > 19 && $getal < 29){
	$output = 'Het getal ligt tussen 20 en 30.';
} else if($getal >29 && $getal < 39){
	$output = 'Het getal ligt tussen 30 en 40.';
} else if($getal >39 && $getal < 49){
	$output = 'Het getal ligt tussen 40 en 50.';
} else if($getal >49 && $getal < 59){
	$output = 'Het getal ligt tussen 50 en 60.';
} else if($getal >59 && $getal < 69){
	$output = 'Het getal ligt tussen 60 en 70.';
} else if($getal >69 && $getal < 79){
	$output = 'Het getal ligt tussen 70 en 80.';
} else if($getal >79 && $getal < 89){
	$output = 'Het getal ligt tussen 80 en 90.';
} else if($getal >89 && $getal <= 100){
	$output = 'Het getal ligt tussen 90 en 100.';
} else {
	$output = 'Foute invoer!';
}

?>


<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
	* {
		font-family: arial;
		font-weight: bold;
		font-size: 150%;		
	}
	</style>
</head>
<body>

<div>
	<?php
		echo strrev($output);
	?>
</div>

</body>
</html>