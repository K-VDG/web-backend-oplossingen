<?php
// require 'classes/percent.php';
// __autoload('Percent');

function __autoload($Percent){
$percent = "classes/" . $Percent . ".php";
	//if (is_readable('classes/percent.php') ){
	require($percent);
} // 		DIT IS EEN FOUT GEBRUIK VAN AUTOLOAD, maar 't werkt

$percentage = new Percent(150,100);

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>tr, td {border: 1px solid grey; font-size: 130%;}</style>
</head>
<body>
	<table>
		<th>Hoeveel procent is 150 van 100?</th>
		<tr><td>Absoluut</td><td><?= $percentage->absolute ?></td></tr>
		<tr><td>Relatief</td><td><?= $percentage->relative ?></td></tr>
		<tr><td>Geheel getal</td><td><?= $percentage->hundred ?> %</td></tr>
		<tr><td>Nominaal</td><td><?= $percentage->nominal ?></td></tr>
	</table>






	<?php
		var_dump($percentage);
	?>

</body>
</html>