<?php
require ("Vue/fonctions.php");
session_start ();
// var_dump($_GET);
if (isset ( $_SESSION ['id'] ) && isset ( $_SESSION ['mail'] )) {
	if (isset ( $_GET ["page"] )) { // On test la page a afficher
		
		
		switch (htmlentities ( $_GET ["page"] )) {
			case "register" :
				include ("Vue/register.php");
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
				include ("Vue/reglages.php");
				break;
			case "ajoutcapteur" :
				include "Vue/ajouter_capteurs2.php";
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
			case "admin" :
				include("Controleur/admin.php");
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
			case "reglages" :
				include ("Vue/reglages.php");
				break; 
			case "admin" :
				include("Controleur/admin.php");
				break;
			case "register" :
				include ("Vue/register.php");
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