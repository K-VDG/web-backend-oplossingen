<?php

session_start();

	if ( isset($_SESSION['email']) ) {	

		$email = $_SESSION['email'];

	} else {
		$email = '';
	}

	 if ( isset($_SESSION['nickname']) ) {	

		$nickname = $_SESSION['nickname'];	
	} else {
		$nickname = '';
	}

	if ( isset($_POST['straat']) ) {				
		$_SESSION['straat'] = $_POST['straat'];	
		$straat = $_SESSION['straat'];			
	} else {
		$straat = '';
	}

	 if ( isset($_POST['nummer']) ) {			
		$_SESSION['nummer'] = $_POST['nummer'];	
		$nummer = $_SESSION['nummer'];				
	} else {
		$nummer = '';
	}

	
	 if ( isset($_POST['gemeente']) ) {			
		$_SESSION['gemeente'] = $_POST['gemeente'];	
		$gemeente = $_SESSION['gemeente'];				
	} else {
		$gemeente = '';
	}

	
	 if ( isset($_POST['postcode']) ) {			
		$_SESSION['postcode'] = $_POST['postcode'];	
		$postcode = $_SESSION['postcode'];				
	} else {
		$postcode = '';
	}


?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Overzichtspagina</title>
	<meta charset="UTF-8">
	<style>
	li {list-style-type: none;}
	body {font-family: helvetica; color: darkblue;}
	input {margin: 5px 0; padding: 5px;}
	</style>
</head>
<body>
<h1>Overzichtspagina</h1>
<ul>
	<li>e- mail: <?= $email ?> | <a href='sessions-registratie.php?autofocus=email'>wijzig</a></li>
	<li>nickname: <?= $nickname ?> | <a href='sessions-registratie.php?autofocus=nickname'>wijzig</a></li>
	<li>straat: <?= $straat ?> | <a href='sessions-adresgegevens.php?autofocus=straat'>wijzig</a></li>
	<li>nummer: <?= $nummer ?> | <a href='sessions-adresgegevens.php?autofocus=nummer'>wijzig</a></li>
	<li>gemeente: <?= $gemeente ?> | <a href='sessions-adresgegevens.php?autofocus=gemeente'>wijzig</a></li>
	<li>postcode: <?= $postcode ?> | <a href='sessions-adresgegevens.php?autofocus=postcode'>wijzig</a></li>
</ul>

</body>
</html>
<pre><?php var_dump( $_SESSION ) ?></pre>