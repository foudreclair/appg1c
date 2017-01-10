<?php
	require("Vue/fonctions.php");
	session_start();
	if (isset($_SESSION['id']) && isset($_SESSION['mail'])){
		if (isset($_GET["page"])) { // On test la page a afficher
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
			}
		}
	
	}
	
	else {	//La page par default pour l'instant la page connexion
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
		}
		else {
			include("Controleur/connexion.php");
		}
	}
?>