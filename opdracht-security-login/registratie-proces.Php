<?php
session_start();
echo( 'post: '); var_dump($_POST);
echo('session: '); var_dump($_SESSION);
require 'functions-generate.php';
require 'functions-db.php';
require 'function-createcookie.php';

function checkEmailExists($inputEmail){
	//verbinding maken:
	$db = connectToDatabase(); 

	// alles ophalen:
	try {

		$selecteerAlles = 'SELECT * FROM users';
		$statement = $db->prepare( $selecteerAlles);
		$statement->execute();
		$alleUsers = array();

		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$alleUsers[] 	=	$row;	
		}
	// check of emailadres voorkomt in $alleUsers
		//var_dump($alleUsers);
		$emailArray = array();
		foreach($alleUsers as $key => $value){
			$emailArray[] = $alleUsers[$key]['email'];
		}
		if(in_array($inputEmail, $emailArray)){
			$_SESSION['notification'][] = "emailadres gevonden in database";
			return TRUE;

		} else {
			$_SESSION['notification'][] = "emailadres NIET gevonden in database";
			return FALSE;
		}

	} catch ( PDOException $e )
		{
			$_SESSION['notification'][] =	'Er ging iets mis: ' . $e->getMessage();
		}
}

function checkInput(){
	if($_POST['email'] !== '' && $_POST['paswoord'] !== '' && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		return true;
	} else {
		//$_SESSION['notification'][] = 'Foute invoer';
		return false;
	}
}

if(isset($_POST["registreer"])){
		// controleer geldigheid e-mailadres en of velden zijn ingevuld
		if(!checkInput()){
			$_SESSION['notification'][] = 'Foute invoer';
			header('Location: registratie-form.php');
			break; //  vervangen door een Throw exception??
		} 

		// check of ingevuld email bestaat:
		if(!checkEmailExists($_POST['email'])){

			 $_SESSION['email'] = $_POST['email'];
			 $_SESSION['paswoord'] = $_POST['paswoord'];

			 $ingevoerdPaswoord = $_SESSION['paswoord'];
			 $ingevoerdEmail = $_SESSION['email'];
			 $salt = generateSalt();
			 $HashedSaltPlusPaswoord = hash('SHA512', $ingevoerdPaswoord . $salt);

			// connectie maken:
			$db = connectToDatabase(); 

			// data inputten
			try {

			$nieuweUserAanmaken = "INSERT INTO users(id, email, salt, hashed_password, last_login_time) VALUES('', :email, '$salt', :hashed_password, NOW())";
			
			$statement = $db->prepare( $nieuweUserAanmaken );

			$statement->bindValue( ':email', $ingevoerdEmail );	
			$statement->bindValue( ':hashed_password', 
			$HashedSaltPlusPaswoord);

			$statement->execute();

			$_SESSION['notification'][] = 'Input geslaagd';

			// cookie aanmaken:
			$HashedSaltPlusEmail = hash('SHA512', $ingevoerdEmail . $salt);
			createCookie($ingevoerdEmail, $HashedSaltPlusEmail);
			header('Location: dashboard.php');
			break;

			}

			catch(PDOException $e){
				$_SESSION['notification'][]	=	'Er ging iets mis: ' . $e->getMessage();
			}
		}
}
			header('Location: registratie-form.php');
?>