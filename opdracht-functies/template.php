<?php
	function berekenSom($getal1, $getal2){
		$resultaat = $getal1 + $getal2;
		return($resultaat);
	}

	function vermenigvuldig($getal1, $getal2){
		$resultaat = $getal1 * $getal2;
		return($resultaat);
	}

	function isEven($getal1){
		if($getal1 % 2 === 0){
			$even = true;
		} else {
			$even = false;
		}
		return $even;
	}

	function upperLength($string){
		$uppercase = strtoupper($string);
		$lengte = strlen($string);
		$upperLengthArray = array($uppercase, $lengte);
		return($upperLengthArray);
	}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
	p {border-top: 1px solid blue; font-family: 'arial';}
	</style>
</head>
<body>

	<p>
	De som van 4 en 5 is <?= berekenSom(4,5) ?>
	</p>

	<p>
	Het product van 6 en 7 is <?= vermenigvuldig(6,7) ?>
	</p>

	<p>
		Is het getal 8 even?
		<?php
			$getal = 8; 
			if (isEven($getal) == true){
				echo ('yup');
			} else {
				echo ('nope');
			}
				;
		?>

	</p>

	<p>
		Geef de lengte en uppercase versie van een string:
		<?php
			var_dump(upperLength("Dit is een string!"));
		?>
	</p>

</body>
</html>