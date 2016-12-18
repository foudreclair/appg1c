<?php
$titre = "Domisile | Page de connexion";
include('Modele/connexion_bdd.php');

if(isset($_GET["erreur"])) {
	$contenu = "Erreur de saisi";
	$contenu .= formulaire_connexion();
}
else {
	$contenu = formulaire_connexion();
}

if (isset($_POST["mail"]) && isset($_POST["password"])) {
	
}

include 'gabarit.php';

?>