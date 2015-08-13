<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
</head>
<body>
<p>
	<?php
		$counter = 1;
		while($counter<=100) {
			echo($counter . ' - ');
			++$counter;
		}
	?>
</p>

<p>
	<?php
		$counter = 1;
		while($counter<=100) {
			if($counter % 3 === 0 && $counter > 40 && $counter < 80) {
					echo($counter . ' - ');
			}
			++$counter;
		}	
	?>
</p>



</body>
</html>