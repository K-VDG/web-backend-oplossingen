<?php
	// cookie verwijderen:
	if (isset($_GET['cookie'])) {
	
		if ($_GET['cookie'] == 'delete') {
		
			setcookie('ingelogd','', time() - 3600 );
			
			header('location: cookies.php');
		}
	}
	
	//


?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-</title>
	<meta charset="UTF-8">
	<style>
	li {list-style-type: none;}
	body {font-family: helvetica;}
	.error {color: red; font-weight: bold;}
	</style>
</head>
<body>
<h1>Dashboard</h1>

<p>U bent ingelogd.</p>

<a href="?cookie=delete">Uitloggen</a>

</body>
</html>

<?php
	echo($_POST['username']);
?>