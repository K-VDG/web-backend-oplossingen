<?php
	$boodschappenlijstje = array('wortelen', 'patatten', 'avocado', 'chocolate', 'fruitsap')
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
</head>
<body>
	<ul>
		<?php
		
			$counter = 0;
			while($counter < count($boodschappenlijstje) ){

				echo('<li>' . $boodschappenlijstje[$counter] . '</li>' );
				++$counter;
			}
		?>
	</ul>
</body>
</html>