<?php

if (isset($_GET["page"])) { // On test la page a afficher
	if (htmlentities($_GET["page"]) == "accueil") {
		include("Vue/accueil.php");
	}
	if (htmlentities($_GET["page"]) == "scenarios") {
		include("Vue/scenarios.php");
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
		include("Controleur/register.php");
	}
}

else {	//La page par default pour l'instant la page connexion
	include("Vue/connexion.php");
}