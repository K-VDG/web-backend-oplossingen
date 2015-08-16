<?php


	function berekenSaldo($saldo, $rentevoet, $aantaljaar){

		$output = array();

		$counter = 0;
		while ($counter <= $aantaljaar){
			array_push($output, $saldo);

			$saldo = floor($saldo + ($saldo * ($rentevoet / 100)));

			++$counter;
		}
		return($output);

	}	


	function RecursiveBerekenSaldo($saldo, $rentevoet, $aantaljaar)	{
		
		static $counter = 0;
		static $output = array();
		++$counter;

		if ($counter <= ($aantaljaar+1)){

			array_push($output, $saldo);

			$saldo = floor($saldo + ($saldo * ($rentevoet / 100)));

			RecursiveBerekenSaldo($saldo, $rentevoet, $aantaljaar);
		
		} else {
			
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
	* {font-family: tahoma; font-size: 100%;}
	p {border-bottom: 1px solid teal;}
	</style>
</head>
<body>
<p>
	De niet-recursieve manier:
	<?php
	var_dump(berekenSaldo(100000, 8, 10));
	?>
		<br/>
	
	De recursieve manier:
	<?php

	static $saldo = 100000;
	var_dump(RecursiveBerekenSaldo($saldo, 8, 10));

	$uitloopen = RecursiveBerekenSaldo($saldo, 8, 10);
	foreach($uitloopen as $key => $value){

		echo('<div>Na ' .$key . ' jaar zal er ' . $value . ' Euro op de rekening staan.</div>');
	}
	?>
	
</p>
</body>
</html>