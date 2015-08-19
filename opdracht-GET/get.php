<?php
$artikels[0] = array(
				'titel' => 'Details van Nvidia GeForce GTX 950 komen online',
				'datum' => '17 augustus 2015',
				'inhoud' => 'Er zijn meer details online verschenen over de Nvidia GeForce GTX 950. Volgens de site Videocardz.com komt de nieuwe kaart uit op 20 augustus. Overige details lekten de afgelopen weken al uit, onder andere via een niet-uitgebrachte driver, versie 353.58. e videokaartensite meldt dat de nooit naar buiten gebrachte driver naar een apparaat-id verwijst met nummer 1402. Apparaat-nummer 1401 verwijst naar de GTX 960, wat het vermoeden bevestigt dat de GTX 950 gebruik maakt van dezelfde Maxwell GM 206-gpu.

De site meldt in een tweede bericht dat het nu ook lukte om afbeeldingen te bemachtigen van verschillende merken die binnenkort met een kaart op de markt komen die gebruik maakt van de op 28nm gebakken GM206-250-gpu, waar Tweakers begin juli ook al over berichtte.

De tussen de GTX 960 en GTX 750 gepositioneerde kaart met 768 rekeneenheden, 48 tmu\'s, 32 rop\'s meet kloksnelheden tussen de 1089 en 1266MHz. Het 2GB grote ddr5-geheugen draait op maximaal vier keer 1652Mhz of 6,6Ghz over een 128-bit bus met een bandbreedte van 106GB/s.

Om dat alles aan te sturen, trekt de kaart maximaal 90W wat wordt geleverd via een 6-pins stekker. De kaarten kunnen beschikken over 1 dvi-, 1 hdmi- en 3 displayportuitgangen. Wat de prijs wordt, is nog niet bekend, maar er circuleren berichten over bedragen van tussen de 130 en 150 dollar.

Videocardz wist de hand te leggen op verschillende afbeeldingen, waaronder twee kaarten van Gigabyte. De volledige specificaties zijn nog onduidelijk. Zotac komt met drie kaarten, waarvan twee al overgeklokt zijn. De ZT-90601-10L op referentiesnelheid, de ZT-90602-10M met een kloksnelheid 1102/1279Mhz en de GTX 950 AMP! die gekokt is op 1203/1403Mhz met geheugen geklokt op 7GHz in plaats van 6,6.',
				'afbeelding' => 'images/geforce.jpeg',
				'afbeeldingBeschrijving' => 'Nvidia GeForce GTX 950'
			);

$artikels[1] = array(
				'titel' => 'Software-update: Mozilla Thunderbird 38.2.0',
				'datum' => '15 augustus 2015',
				'inhoud' => 'De Mozilla Foundation heeft versie 38.2.0 van Thunderbird uitgebracht. Mozilla Thunderbird is een opensourceclient voor e-mail en nieuwsgroepen, met features als ondersteuning voor verschillende mail- en newsaccounts, een spamfilter, spellingscontrole en een aanpasbaar uiterlijk. In versie 38 is onder meer oauth2-authenticatie voor gmail toegevoegd, wordt de kalender-addon Lightning nu standaard meegeleverd en kunnen er ook filters op verzonden en gearchiveerde berichten worden losgelaten. Deze update bevat alleen bugfixes. Changed: Hardware acceleration is now disabled by default to avoid crashing Thunderbird. Fixed: A few bugs have been fixed to avoid crashing Thunderbird. Known Issues: The "maildir" storage type can no longer be set through the UI due to various issues. Power users can still set the storage type using the config editor.',
				'afbeelding' => 'images/thunderbird.png',
				'afbeeldingBeschrijving' => 'Logo Thunderbird'
			);

$artikels[2] = array(
				'titel' => 'Windows 10 op 8 procent Nederlandse pc\'s',
				'datum' => '14 augustus 2015',
				'inhoud' => 'Inmiddels is op 7,8 procent van de Nederlandse computers die deze maand verbinding maakten met de servers van Statcounter, Windows 10 geïnstalleerd. Dat blijkt uit de openbare statistieken van het bedrijf. Windows 10 is daarmee al populairder dan Vista en XP. Dat betekent dat het aantal Nederlandse gebruikers van Windows 10 snel stijgt. Vorige maand, waarin de nieuwe Windows-versie werd geïntroduceerd, was het aandeel gebruikers van die versie nog zo klein dat Statcounter Windows 10 nog onder \'overig\' schaarde. Inmiddels heeft Windows 10 al een groter marktaandeel op de desktopmarkt dan alle Linux-distributies bij elkaar, en is de nieuwe Windows-versie ook groter dan Windows XP, Vista en 8. Wereldwijd is het procentuele aandeel Windows 10-gebruikers kleiner: daar ligt het aantal Windows 10-gebruikers op 4 procent. Ook in België staat Windows 10 procentueel gezien op minder pc\'s.',
				'afbeelding' => 'images/windows10.jpg',
				'afbeeldingBeschrijving' => 'Desktop Windows 10'
			);

/*
function toonVolledigArtikel($gekozenArtikel, $artikels){
 	echo('<div class="grootartikel">' . 
 		'<h2>' . $artikels[$gekozenArtikel]["titel"] . '</h2>' .
 		'<p class="datum">' . $artikels[$gekozenArtikel]['datum'] .'</p>' .
 		'<p class="groteAlinea">' . $artikels[$gekozenArtikel]['inhoud'] . '</p>' .
 		'<img class="fullPic" src="' . $artikels[$gekozenArtikel]['afbeelding'] . '" alt="' . $artikels[$gekozenArtikel]['afbeeldingBeschrijving'] . '" />' .
 		 '</div>'
 		 );
}
*/

$individueelArtikel = FALSE;

$gekozenArtikel = '';
	if(isset($_GET['id'])){
		$individueelArtikel = TRUE;
		$id = $_GET['id'];
 	 	$gekozenArtikel = $artikels[$id];
 	 	/* toonVolledigArtikel($gekozenArtikel, $artikels); */
	} else {
		
	}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>
		<?php
		if(isset($id)){
			echo($artikels[$id]["titel"]);
		} else {
			echo('GET');
		}
		?>
	</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="theme.css"/>
</head>
<body>
	<h1>De krant van vandaag</h1>

<?php if ($individueelArtikel): ?>

 	<div class="grootartikel"> 
 		<h2><?= $artikels[$id]["titel"] ?></h2> 

 		<p class="datum"> <?= $artikels[$id]['datum'] ?></p>
 		<p class="groteAlinea"><?= $artikels[$id]['inhoud'] ?></p>
 		<img class="fullPic" src="<?= $artikels[$id]['afbeelding']?>" alt="<?= $artikels[$id]['afbeeldingBeschrijving']?>" />
 	 </div>
 	
<?php else: ?>

	<?php foreach($artikels as $key => $value): ?>
			<div class='artikel'>
				<h2><?= $artikels[$key]['titel'] ?></h2>
				<p class='datum'><?= $artikels[$key]['datum'] ?></p>
				<p><?= substr($artikels[$key]['inhoud'], 0, 50) . '...' ?></p>
				<p><a href='get.php?id=<?= $key ?>'>Lees meer...</a></p>
				<img class='artikelPic' src='<?= $artikels[$key]['afbeelding']?>' alt='<?= $artikels[$key]['afbeeldingBeschrijving']?>'/>
			</div>	
	<?php endforeach ?>

<?php endif ?>



	




</body>
</html>
<!-- ARTIKELS
http://tweakers.net/nieuws/104791/details-van-nvidia-geforce-gtx-950-komen-online.html

http://tweakers.net/downloads/35260/mozilla-thunderbird-3820.html

http://tweakers.net/nieuws/104767/windows-10-op-8-procent-nederlandse-pcs.html

-->