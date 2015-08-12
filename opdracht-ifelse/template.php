<?php
$jaartal = 1900;

/*
if($jaartal % 400 === 0) {
	$schrikkel = true;
	
} elseif($jaartal % 100 === 0) {
	$schrikkel = false;

} elseif($jaartal % 4 === 0) {
	$schrikkel = true;
	
} else {
	$schrikkel = false;
}
*/

if( $jaartal % 4 === 0 ) {
	$schrikkel = true;
	if (($jaartal % 400 !== 0) && ($jaartal % 100 === 0)){
	$schrikkel = false;	
	}
} else {
	$schrikkel = false;
}
	
	


if($schrikkel === false) {
		$output = 'g';
	} else {
		$output = '';
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
</head>
<body>

<h1>
	<?php
		echo($jaartal . ' is ' . $output . 'een schrikkeljaar.');
	?>
</h1>

</body>
</html>