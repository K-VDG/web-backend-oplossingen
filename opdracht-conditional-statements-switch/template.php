<?php
$getal = 7;

switch ($getal){
	case 1:
		$dag = 'maandag';
		break;
	case 2:
		$dag = 'dinsdag';
		break;
	case 3:
		$dag = 'woensdag';
		break;
	case 4:
		$dag = 'donderdag';
		break;
	case 5:
		$dag = 'vrijdag';
		break;
	case 6:
		$dag = 'zaterdag';
		break;
	case 7:
		$dag = 'zondag';
		break;
	default:
	echo("Foute invoer");
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
	't is een: 
	<?php echo($dag) ?>
</p>

</body>
</html>