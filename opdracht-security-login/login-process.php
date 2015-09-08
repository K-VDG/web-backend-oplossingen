<?php
session_start();
require 'functions-db.php';
require 'function-createcookie.php';
$db = connectToDatabase(); 

if(isset($_POST)){
	var_dump($_POST);
	$emailInput = $_POST['email'];

	try{
	// query
	$selecteerUser = 'SELECT * FROM users WHERE email = :email';
	$statement = $db->prepare( $selecteerUser);
    $statement->bindParam(':email', $emailInput);
    $statement->execute();

    $dezeUser = array();
    while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
    {
      $dezeUser[]  = $row; 
    }
    echo('resultaat databaseQuery:');
    var_dump($dezeUser);

    // check of user wel bestaat in DB
    if(empty($dezeUser)){
    	$_SESSION['notification'][] = "Deze user bestaat niet.";
    	header('Location: login-form.php');
			break;	
    }

    // check of paswoord valid is
    $salt = $dezeUser[0]['salt'];
    $hashed_password_DB = $dezeUser[0]['hashed_password'];
    $passwordInput = $_POST['paswoord'];

    $saltyUserPassword = hash('SHA512',  $passwordInput . $salt);

    // check of deze gelijk zijn:
    echo $hashed_password_DB  . '</br>';
    echo $saltyUserPassword;

    if($hashed_password_DB === $saltyUserPassword){	
		createCookie($emailInput, $hashed_password_DB);
			header('Location: dashboard.php');
			break;	

    }



	} catch( PDOException $e ){
			$_SESSION['notification'][] =	'Er ging iets mis: ' . $e->getMessage();
	  header('Location: registratie-form.php');
			break;	
	}
}

?>

<!--
$selecteerUser = 'SELECT email, salt, hashed_password FROM users WHERE email = :email';
    $statement = $db->prepare( $selecteerUser);
    $statement->bindParam(':email', $cookieEmail);
    $statement->execute();

    $dezeUser = array();
    while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
    {
      $dezeUser[]  = $row; 
    }
    echo('resultaat databaseQuery:');
    var_dump($dezeUser);
--> 