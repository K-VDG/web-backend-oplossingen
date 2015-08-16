<?php

/*
	function berekenSaldo($saldo, $rentevoet, $aantaljaar){

		// static $saldo = $saldo; 		WERKT NIET
		$output = array();

		$counter = 0;
		while ($counter <= $aantaljaar){
			array_push($output, $saldo);

			$saldo = floor($saldo + ($saldo * ($rentevoet / 100)));

			++$counter;
		}
		return($output);

	}	
*/	


	function recursiveBerekenSaldo($saldo, $rentevoet, $aantaljaar, $counter, $output = array())	{
		
		//static $counter = 0;
		//static $output = array();

		++$counter;

		if ($counter <= ($aantaljaar+1)){

			array_push($output, $saldo);

			$saldo = floor($saldo + ($saldo * ($rentevoet / 100)));

			return recursiveBerekenSaldo($saldo, $rentevoet, $aantaljaar, $counter, $output);
		
		} else {
			return($output);
		}
	}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
	.xdebug-var-dump {font-family: tahoma; font-size: 100%;}
	p {border-bottom: 1px solid teal;}
	</style>
</head>
<body>
<p>


	
	Persoon 1:
	<?php
		var_dump(recursiveBerekenSaldo(1000, 3, 10, 0 ));
	?>

	Persoon 2:
	<?php
		var_dump(recursiveBerekenSaldo(100000, 8, 10, 0 ));
	?>
	
</p>
</body>
</html>