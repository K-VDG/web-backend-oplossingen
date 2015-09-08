<?php
function connectToDatabase(){	
	try
		{

		$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', ''); 

		$_SESSION['notification'][] = 'Connectie dmv PDO geslaagd.';

	} catch ( PDOException $e )
		{
			$_SESSION['notification'][] = 'Er ging iets mis: ' . $e->getMessage();
		}	
		return $db;
}

?>

