<?php
	$type = $_GET['t'];
	
	if ($type == 1) {
		echo "<h1>Rekisteröityminen onnistui!</h1>";
		echo "<h2>Tarkista sähköpostisi aktivoidaksesi tunnuksesi.</h2>";
	} elseif ($type == 2) {
		echo "<h1>Tunnus aktivoitu!</h1>";
		echo "<h2>Voit nyt kirjautua sisään sivun vasemmasta laidasta.</h2>";
	}
?>