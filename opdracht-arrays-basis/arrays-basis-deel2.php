<?php

$getallen = array(1,2,3,4,5);
$getallenProduct = array_product($getallen);

// de even en oneven getallen scheiden:
$odd = array();
$even = array();
foreach ($getallen as $k => $v) {
    if ($k % 2 == 0) {
        $even[] = $v;
    }
    else {
        $odd[] = $v;
    }
}

/*
  <p>De getallen van beide arrays met elkaar opgeteld: </p>
      <ul>
          <?php foreach ($somArray as $key => $value): ?>
            <li>Som van values met key [<?= $key ?>]: <?= $value ?></li>
         <?php endforeach ?>
      </ul>
*/
$omgekeerd = array(5,4,3,2,1);
foreach ($getallen as $key => $getal) {
	$getal1 = $getal;
	$getal2 = $omgekeerd[$key];

	$samengevoegd[] = $getal1 + $getal2;
}


?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
		p {
		border: 1px solid green;
		}
	</style>
</head>
<body>

	<p>
		<?php
		var_dump($getallen);
		?>
	</p>

	<p>
		De array_product geeft:<?php
		var_dump($getallenProduct);
		?>
	</p>

	<p>
		Splitsing van odd &amp; even:
		<?php
			var_dump($odd, $even);
		?>
	</p>

	<p>
		De 2 arrays samengevoegd:
		<?php
			var_dump($samengevoegd);
		?>
	</p>
</body>
</html>