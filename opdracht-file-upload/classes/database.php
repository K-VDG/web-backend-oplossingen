<?php

class Database {

	public $db;

	public function connectToDatabase(){	
		try
			{
			$this->db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', ''); 

			$_SESSION['notification'][] = 'Connectie dmv PDO geslaagd.';

			return $this->db;

		} catch ( PDOException $e )
			{
				$_SESSION['notification'][] = 'Er ging iets mis: ' . $e->getMessage();
			}	

	}



	public function selecteerDezeUser($dezeUser){
		$selecteerUser = 'SELECT email, profile_picture FROM users WHERE email = :email';
		$statement = $db->prepare($selecteerUser);
	    $statement->bindParam(':email', $dezeUser);
	    $statement->execute();

	    while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
	    {
	      $userData[]  = $row; 
	    }

		  return($userData);

	}


	public function selecteerIedereen(){
		$selecteerIedereenQuery = 'SELECT * FROM users';
		$statement = $this->db->prepare($selecteerIedereenQuery);
	    $statement->bindParam(':email', $dezeUser);
	    $statement->execute();

	    while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
	    {
	      $userData[]  = $row; 
	    }
		  return($userData);
	}


	public function uploadImgName($dezeUser, $imgName) {
		$uploadQuery = 'UPDATE users SET profile_picture = :imgname WHERE email = :email';
		$statement = $this->db->prepare($uploadQuery);
		$statement->bindParam(':email', $dezeUser);
		$statement->bindParam(':imgname', $imgName);
		$statement->execute();
	}




}	
?>



<!--
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
-->