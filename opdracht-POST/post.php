<?php
	$username ='koen';
	$password = 'qsdf';
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<link href="stylesheet.css" rel="stylesheet">
</head>
<body>

<h1>POST</h1>
<form method="post" action="#">
<li>
	<label for='username'>Username: </label>
	<input type="text" name="username" id="username"/></li>
<li>
	<label for="paswoord">paswoord: </label>
	<input type="password" name="paswoord" id="paswoord"/></li>
		<input type="submit" value="Verzenden">
</form>

</body>
</html>
<?php
	$usernameInput = $_POST['username'];
	$paswoordInput = $_POST['paswoord'];
	echo('TEST:' . $usernameInput . ' ' . $paswoordInput);
	//if(isset)
	if(isset($usernameInput) && isset($usernameInput)){
		
	};

?>