<?php
$titre = "Domisile | Page de connexion";

if(isset($_GET["erreur"])) {
	$contenu = "Erreur de saisi";
	$contenu .= formulaire_connexion();
}
else {

	$contenu .= formulaire_connexion();
}

include 'gabarit.php';
include 'form_con.html';

?>