<?php

function createCookie($ingevoerdEmail, $HashedSaltPlusEmail){

	setcookie('login', $ingevoerdEmail . ',' . $HashedSaltPlusEmail, time() + 2592000);
}

/*
Wanneer de user succesvol is toegevoegd, mag ook de cookie met key login aangemaakt worden.
Als value krijgt dit het e-mailadres geconcateneerd met een ',' en gevolgd door de SHA512 hash van het e-mailadres geconcateneerd met de salt
Deze cookie is 30 dagen geldig
Nadat de cookie geset is, moet er geredirect worden naar dashboard.php
Normaal gezien mag je niet zomaar iemand automatisch inloggen na registratie. Je moet wachten tot hij zijn account bevestigd heeft via een link die doorgestuurd werd naar het opgegeven e-mailadres. Zo ben je zeker dat de gebruiker is wie hij beweert te zijn. Je mag dit altijd proberen te implementeren, maar hoeft niet. Technisch is deze opdracht al veeleisend genoeg.
*/
?>


