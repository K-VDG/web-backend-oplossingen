<?php
// var_dump($_FILES);
$message = array();
define('ROOT', dirname(__FILE__));
$output = 'img/placeholder.gif';
try
{
	if (isset($_POST['submit'])) 
	{
		if ((($_FILES["bestand"]["type"] == "image/gif")
		|| ($_FILES["bestand"]["type"] == "image/jpeg")
		|| ($_FILES["bestand"]["type"] == "image/png"))
		&& ($_FILES["bestand"]["size"] < 5000000)) 
		{
			if ($_FILES["bestand"]["error"] > 0) 
			{
				// Als er een fout in het bestand wordt gevonden (bv. corrupte file door onderbroken upload), moet er een foutboodschap getoond worden
				throw new Exception( "Return Code: " . $_FILES["bestand"]["error"] );
			} 
			else 
			{
				// De root van het bestand moet achterhaald worden om de absolute pathnaam (de plaats op de schijf van de server) te achterhalen

				// Zo weet de server waar het bestand moet terecht komen.
				// We kunnen dit doen door de functie dirname() toe te passen op dit bestand (=__FILE__)
				if (file_exists(ROOT . "/img/" . $_FILES["bestand"]["name"])) {
					//Als het bestand reeds bestaat in de map, moet er een foutboodschap getoond worden
					throw new Exception( $_FILES["bestand"]["name"] . " bestaat al. " );
				} 
				else 
				{
					// Anders mag het bestand geüpload worden naar de map


					move_uploaded_file($_FILES["bestand"]["tmp_name"], (ROOT . "/img/" . $_FILES["bestand"]["name"]));
					
					$message[ 'type' ]	=	'success';
					$message[ 'text' ]	=	'<p>Upload: ' . $_FILES["bestand"]["name"] .'</p>';
					$message[ 'text' ]	=	'<p>Type: ' . $_FILES["bestand"]["type"] .'</p>';
					$message[ 'text' ]	=	'<p>Size: ' . $_FILES["bestand"]["size"] / 1024 .'</p>';
					$message[ 'text' ]	=	'<p>Temp file: ' . $_FILES["bestand"]["tmp_name"] .'</p>';
					$message[ 'text' ]	=	'<p>Opgeslagen in: : ' . ROOT . "/img/" . $_FILES["bestand"]["name"] .'</p>';
				}
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
	$message[ 'type' ]	=	'error';
	$message[ 'text' ]	=	$e->getMessage();
}

// image info ophalen
$pathname = ROOT . "/img/" . $_FILES["bestand"]["name"];
$fileParts	=	pathinfo($pathname);
$fileName	=	$fileParts['filename'];
$ext		=	$fileParts['extension'];
var_dump($fileParts);

// Controleer om welke extensie het gaat en voer de overeenstemmende methode uit
	switch ($ext)
	{
		case ('jpg'):
		case ('jpeg'):
			$source 	= 	imagecreatefromjpeg($pathname);
			break;
			
		case ('png'):
			$source 	=	imagecreatefrompng($pathname);
			break;

		case ('gif'):
			$source 	=	imagecreatefromgif($pathname);
			break;
	}



//
$imageSizeArray = getimagesize($pathname);
$imageWidth = $imageSizeArray[0]; 	// 		X
$imageHeight = $imageSizeArray[1]; 	// 		Y

// resizen
	// vereiste dimensies:
$thumbDimensions['w']	=	100;
$thumbDimensions['h']	=	100;
$thumb 	=	imagecreatetruecolor($thumbDimensions['w'], $thumbDimensions['h']);

if($imageWidth === $imageHeight){
	$orientation = 'vierkant';

	imagecopyresized($thumb, $source, 0,0,0,0, $thumbDimensions['w'],$thumbDimensions['h'], $imageWidth, $imageHeight);
	
} else if($imageWidth > $imageHeight){
	$orientation = 'landscape';

	imagecopyresized($thumb, $source,0,0,0,0, $thumbDimensions['w'],$thumbDimensions['h'], $imageWidth, $imageHeight);
	

} else if($imageWidth < $imageHeight){
	$orientation = 'portrait';
}
/*
ENKEL DE POSITIES VAN DE CANVAS INSTELLEN
landscape: X = (breedte - hoogte) / 2 	& 	Y = 0 
(($imageWidth - $imageHeight) / 2)

portrait: Y = (hoogte - breedte) / 2 	& 	X = 0
(($imageHeight - $imageWidth) / 2)

*/

echo 'Breedte : ' . $imageWidth . ' - ' . 'Hoogte: ' . $imageHeight . ' - ' . $orientation; 
// afbeelding omzetten naar JPG en opslaan:
imagejpeg($thumb, ('img/' . $fileName . ' - ' . time() . '_thumb.' . 'jpg'), 100);
$output = 'img/' . $fileName . '.jpg';
$outputThumb = 'img/' . $fileName . ' - ' . time() . '_thumb.' . 'jpg';



?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Opdracht Image manip</title>
	<meta charset="UTF-8">
	<link href="http://web-backend.local/css/global.css"
	rel="stylesheet">
</head>
<body>
<h1>Thumbnail genereren</h1>
	<div>
		<img src="<?= $outputThumb ?>">
	</div>	
	<form method="post" action="#" enctype="multipart/form-data">
		<input type="file" name="bestand">
		<p><input type="submit" name="submit"></p>
	</form>	
</body>
</html>
<?= var_dump($message); ?>