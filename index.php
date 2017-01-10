<?php
	require("Vue/fonctions.php");
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
			if (htmlentities($_GET["page"]) == "register") {
				include("Vue/register.php");
			}
		}
	
	}
	
	else {	//La page par default pour l'instant la page connexion
		if(isset($_GET["page"])) {
			if (htmlentities($_GET["page"]) == "register") {
				include("Controleur/register.php");
			}
			if (htmlentities($_GET["page"]) == "connexion") {
				include("Controleur/connexion.php");
			}
		}
		else {
			include("Controleur/connexion.php");
		}
	}
?>