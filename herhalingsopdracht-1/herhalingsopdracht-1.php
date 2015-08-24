<?php

if(isset($_GET['link'])) {
	$keuzeGemaakt = TRUE;
	$gekozenLink = $_GET['link'];
	echo $gekozenLink;
}

switch($gekozenLink){
	case 'cursus':
		$gekozenURL = 
		break;	
	case 'voorbeelden':
		$gekozenURL = 
		break;	
	case 'opdrachten':
		$gekozenURL = 
		break;


	default:
	$gekozenURL = '';
}
	
http://oplossingen.web-backend.local/



?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Herhalingsopdracht</title>
	<meta charset="UTF-8">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<h1>Indexpagina</h1>
	<ul>
		<li>
			<a href="herhalingsopdracht-1.php?link=cursus">Cursus</a>
		</li>		
		<li>
			<a href="herhalingsopdracht-1.php?link=voorbeelden">Voorbeelden</a>
		</li>		
		<li>
			<a href="herhalingsopdracht-1.php?link=opdrachten">Oplossingen</a>
		</li>
	</ul>

	<form action="#" method ="GET">
		<label for="zoeken">Zoeken naar: </label>
		<input type="search" name="zoeken" id="zoeken"/>

	</form>

	<h2>Inhoud</h2>
	<iframe src="http://www.w3schools.com"></iframe>

</body>
</html>
	<!--  
		- 
		- 
	-->
