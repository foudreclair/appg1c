<?php
	require("Vue/fonctions.php");
	session_start();
	if (isset($_SESSION['id']) && isset($_SESSION['mail'])){
		if (isset($_GET["page"])) { // On test la page a afficher
<<<<<<< HEAD
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
				include("Controleur/stats.php");
			}
			if (htmlentities($_GET["page"]) == "contact") {
				include("Vue/contact.php");
			}
			if (htmlentities($_GET["page"]) == "register") {
				include("Vue/register.php");
	
	
=======
			switch(htmlentities($_GET["page"])) {
				case "register" :
					include("Controleur/register.php");
					break;
				case "deconnexion" :
					include("Controleur/deconnexion.php");
					break;
				case "connexion" :
					include("Controleur/connexion.php");
					break;
			    case "scenarios" :
					include("Controleur/scenario.php");
					break;
			    case "reglages" :
					include("Controleur/reglages.php");
					break;
				case "contact" :
					include("Vue/contact.php");
					break;
				case "stats" :
					include("Controleur/stats.php");
					break;
				default :
					include("Controleur/accueil.php");
					break;
>>>>>>> 1933726074f1a3d61060ae90304eb71e021a7b4c
			}
		}
	
	}
	
	else {	//La page par default pour l'instant la page connexion
<<<<<<< HEAD
		if (htmlentities($_GET["page"]) == "register") {
			include("Controleur/register.php");
=======
		if(isset($_GET["page"])) {
			switch(htmlentities($_GET["page"])) {
				case "register" :
					include("Controleur/register.php");
					break;
				case "deconnexion" :
					include("Controleur/deconnexion.php");
					break;
				case "connexion" :
					include("Controleur/connexion.php");
					break;
				case "contact" :
					include("Vue/contact.php");
					break;
				default :
					include("Controleur/connexion.php");
					break;
			}
>>>>>>> 1933726074f1a3d61060ae90304eb71e021a7b4c
		}
		else {
			include("Controleur/connexion.php");
		}
	}
?>