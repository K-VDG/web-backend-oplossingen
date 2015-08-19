<?php

session_start();

$teFocussenVeld= '';
if( isset($_GET['autofocus'])){
	$teFocussenVeld = $_GET['autofocus'];
}
//

$email 	=	( isset( $_SESSION['email'] ) ? $_SESSION['email'] : '' );

$nickname 	=	( isset( $_SESSION['nickname'] ) ? $_SESSION['nickname'] : '' );


$straat 	=	( isset( $_SESSION['straat'] ) ? $_SESSION['straat'] : '' );


$nummer 	=	( isset( $_SESSION['nummer'] ) ? $_SESSION['nummer'] : '' );


$gemeente 	=	( isset( $_SESSION['gemeente'] ) ? $_SESSION['gemeente'] : '' );


$postcode 	=	( isset( $_SESSION['postcode'] ) ? $_SESSION['postcode'] : '' );




// DESTROY!
	if (isset($_GET['session']))
	{
		if($_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location:sessions-adresgegevens.php');
		}
	}

// herhaling registratiegegevens:
	if ( isset($_POST['email']) ) {				
		$_SESSION['email'] = $_POST['email'];	
		$email = $_SESSION['email'];			
	}

	 if ( isset($_POST['nickname']) ) {			
		$_SESSION['nickname'] = $_POST['nickname'];	
		$nickname = $_SESSION['nickname'];				
	} 


// adres values onthouden:
	if ( isset($_POST['straat']) ) {				
		$_SESSION['straat'] = $_POST['straat'];	
		$straat = $_SESSION['straat'];		
	} 


	if ( isset($_POST['nummer']) ) {			
		$_SESSION['nummer'] = $_POST['nummer'];	
		$nummer = $_SESSION['nummer'];				
	} 
if ( isset($_POST['gemeente']) ) {			
		$_SESSION['gemeente'] = $_POST['gemeente'];	
		$gemeente = $_SESSION['gemeente'];				
	} 
if ( isset($_POST['postcode']) ) {			
		$_SESSION['postcode'] = $_POST['postcode'];	
		$postcode = $_SESSION['postcode'];				
	} 

?>



<!DOCTYPE HTML>
<html>
<head>
	<title>Adresgegevens</title>
	<meta charset="UTF-8">
	<style>
	li {list-style-type: none;}
	body {font-family: helvetica; color: darkblue;}
	input {margin: 5px 0; padding: 5px;}
	</style>
</head>
<body>

<h2>Registratiegegevens</h2>
	<ul>
		<li>e:mail: <?= $email ?></li>		
		<li>nickname: <?= $nickname ?></li>
	</ul>
<h2>Deel 2: Adres</h2>
<form method="post" action="sessions-overzicht.php">
<ul>
<li>
	<label for='straat'>straat: </label>
</li>
<li>
	<input type="text" name="straat" id="straat" 
	value = "<?= $straat ?>" 
	<?= ($teFocussenVeld == 'straat')? 'autofocus' : '' ?> />
</li>

<li>
	<label for="nummer">nummer: </label>
</li>
<li>	
	<input type="text" name="nummer" id="nummer"  
	value = "<?= $nummer ?> "
	<?= ($teFocussenVeld == 'nummer')? 'autofocus' : '' ?> /> 
</li>

<li>
	<label for="gemeente">gemeente: </label>
</li>
<li>	
	<input type="text" name="gemeente" id="gemeente" 
	value = "<?= $gemeente ?>"
	<?= ($teFocussenVeld == 'gemeente')? 'autofocus' : '' ?>/> 
</li>


<li>
	<label for="postcode">postcode: </label>
</li>
<li>	
	<input type="text" name="postcode" id="postcode" 
	value = "<?= $postcode ?>"
	<?= ($teFocussenVeld == 'postcode')? 'autofocus' : '' ?> /> 
</li>

<li>	<input type="submit" value="Verzenden"></li>
<li>	<a href="sessions-adresgegevens.php?session=destroy">DESTROY!</a></li>
</ul>
</form>
</body>
</html>
<pre><?php var_dump( $_SESSION ) ?></pre>