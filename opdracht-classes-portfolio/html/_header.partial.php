<?php
	// css bestanden ophalen en in array gooien
	$cssFiles = glob('..\css\*.css');
	var_dump($cssFiles);

	// idem dito voor de javascript
	$jsFiles = glob('..\js\*.js');
	var_dump($jsFiles);

?>


<!DOCTYPE HTML>
<html>
<head>
	<title>Portfolio-</title>
	<meta charset="UTF-8">

<?php foreach($cssFiles as $stijlblad): ?>
	<link rel="stylesheet" href="<?= $stijlblad ?>">
<?php endforeach; ?>

<?php foreach($jsFiles as $script): ?>
	<script src="<?= $script ?>"></script>
<?php endforeach; ?>

</head>
<body>
	<div class="container"></div>
</body>