<?php
require 'functions-db.php';

if(!isset($_COOKIE['login'])){
   		header('Location: login-form.php');
   		break; 		
} else{
	// info uit cookie ophalen
    $cookieValue = $_COOKIE['login'];
    $cookieValueArray = explode(",",$cookieValue);
    echo('inhoud cookie:');
    var_dump($cookieValueArray);
    $cookieEmail = $cookieValueArray[0];
    $cookieHash = $cookieValueArray[1];

    // juiste user uit DB halen op basis van e-mailadres
    $db = connectToDatabase(); 
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

}
  // for testing purposes:
  echo $cookieHash;  
  echo "</br>";
  $vereisteHash = hash('SHA512', $dezeUser[0]['email'] . $dezeUser[0]['salt']);
  echo $vereisteHash;

  //
  if(!($cookieHash === $vereisteHash)){
    unset($_COOKIE['login']);
    header('Location: login-form.php');
    break;  
  }

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht-Security</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
</head>
<body>
<h2>Dashboard</h2>
	<a href="logout.php" title="uitloggen">uitloggen</a>
  <div><a href="registratie-form.php">Naar registratiepagina</a></div>
</body>
</html>