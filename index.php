<?php
	require("Vue/fonctions.php");
	include ("Controleur/main.php");
	
	// Choix du cont�leur
	if (!isset($_SESSION ["Id_User"])) {
		include ("Controleur/connexion.php");
	} else {
		include ("Controleur/main.php");
	}
?>