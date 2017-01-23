<?php
require ("Vue/fonctions.php");
session_start ();
// var_dump($_GET);
if (isset ( $_SESSION ['id'] ) && isset ( $_SESSION ['mail'] )) {
	if (isset ( $_GET ["page"] )) { // On test la page a afficher
		/*
		 * if (htmlentities ( $_GET ["page"] ) == "accueil") {
		 * include ("Controleur/accueil.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "admin") {
		 * include ("Controleur/admin.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "scenarios") {
		 * include ("Controleur/scenario.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "reglages") {
		 * include ("Vue/reglages.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "stats") {
		 * include ("Controleur/stats.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "contact") {
		 * include ("Vue/contact.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "deconnexion") {
		 * include ("Controleur/deconnexion.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "modifappart") {
		 * include ("Vue/modifier_appartement.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "ajoutpiece") {
		 * include ("Vue/ajouter_piece.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "ajoutcapteur") {
		 * include ("Vue/ajouter_capteurs2.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "suppappart") {
		 * include ("Vue/supprimer_appart.php");
		 * }
		 * if (htmlentities ( $_GET ["page"] ) == "register") {
		 * include ("Vue/register.php");
		 * }
		 */
		
		switch (htmlentities ( $_GET ["page"] )) {
			case "register" :
				include ("Controleur/register.php");
				break;
			case "deconnexion" :
				include ("Controleur/deconnexion.php");
				break;
			case "connexion" :
				include ("Controleur/connexion.php");
				break;
			case "scenarios" :
				include ("Controleur/scenario.php");
				break;
			case "reglages" :
				include ("Controleur/reglages.php");
				break;
			case "ajoutcapteur" :
				include "Vue/ajouter_capteur2.php";
				break;
			case "ajoutpiece" :
				include ("Vue/ajouter_piece.php");
				break;
			case "suppappart" :
				include ("Vue/supprimer_appart.php");
				break;
			case "contact" :
				include ("Vue/contact.php");
				break;
			case "stats" :
				include ("Controleur/stats.php");
				break;
			default :
				include ("Controleur/accueil.php");
				break;
		}
	}
} 

else { // La page par default pour l'instant la page connexion
	
	if (isset ( $_GET ["page"] )) {
		switch (htmlentities ( $_GET ["page"] )) {
			case "register" :
				include ("Controleur/register.php");
				break;
			case "deconnexion" :
				include ("Controleur/deconnexion.php");
				break;
			case "connexion" :
				include ("Controleur/connexion.php");
				break;
			case "contact" :
				include ("Vue/contact.php");
				break;
			default :
				include ("Controleur/connexion.php");
				break;
		}
	} 

	else {
		include ("Controleur/connexion.php");
	}
}

?>