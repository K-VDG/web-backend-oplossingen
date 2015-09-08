<?php
session_start();
$_SESSION['notification'] = '';
include 'classes/database.php';
$dbInst = new Database;
$db = $dbInst->connectToDatabase();  
// $dbInst->connectToDatabase();  -> niet nodig?

var_dump($_POST);
$dezeUser = ($_POST['email']);

// timestamp toevogen aan filename:
$_FILES["bestand"]["name"] =  time() . '_' . $_FILES["bestand"]["name"];

try
{
	if (isset($_POST['submit'])) 
	{

		if ((($_FILES["bestand"]["type"] == "image/gif")
		|| ($_FILES["bestand"]["type"] == "image/jpeg")
		|| ($_FILES["bestand"]["type"] == "image/png"))
		&& ($_FILES["bestand"]["size"] < 2000000)) 
		{

		if ($_FILES["bestand"]["error"] > 0) 
			{
				throw new Exception( "Return Code: " . $_FILES["bestand"]["error"] );
				header('location: gebruiker-toevoegen.php');
			} 
			else 
			{
				
				define('ROOT', dirname(__FILE__));
				
				if (file_exists(ROOT . "/img/" . $_FILES["bestand"]["name"])) { // dit in een while loop zetten
					
					$_FILES["bestand"]["name"] =  time() . '_' . $_FILES["bestand"]["name"];

					$_SESSION['notification'][] = 'Gegevens werden succesvol gewijzigd.';

				} 
				else 
				{
					move_uploaded_file($_FILES["bestand"]["tmp_name"], (ROOT . "/img/" . $_FILES["bestand"]["name"]));
				}

				$afbeeldingNaam = $_FILES['bestand']['name'];
				$dbInst->uploadImgName($dezeUser, $afbeeldingNaam);
				header('location: gebruiker-toevoegen.php');
			}
		} 
		else 
		{
			throw new Exception( 'Ongeldig bestand' );
		}
	}
}
catch( Exception $e )
{
	$_SESSION['notification'][]	=	$e->getMessage();
}

var_dump($_FILES);
?>