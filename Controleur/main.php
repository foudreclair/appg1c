<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['mail'])){
if (isset($_GET["page"])) { // On test la page a afficher
	if (htmlentities($_GET["page"]) == "accueil") {
		include("Controleur/accueil.php");
	}
	if (htmlentities($_GET["page"]) == "scenarios") {
		include("Controleur/scenario.php");
	}
	if (htmlentities($_GET["page"]) == "reglages") {
		include("Vue/reglages.php");
	}
	if (htmlentities($_GET["page"]) == "stats") {
		include("Vue/stats.php");
	}
	if (htmlentities($_GET["page"]) == "contact") {
		include("Vue/contact.php");
	}
	if (htmlentities($_GET["page"]) == "check") {
		include("Vue/connexion.php");
		include("Controleur/connexion.php");
	}
	if (htmlentities($_GET["page"]) == "register") {
		include("Vue/register.php");
<<<<<<< HEAD
		
	}
}
=======
	}
>>>>>>> 4ff936d586c539137aef764263c21fa0f73f71d1
}
else {	//La page par default pour l'instant la page connexion
	include("Vue/connexion.php");
}