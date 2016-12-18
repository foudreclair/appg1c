<?php
$titre = "Domisile | Page de connexion";

if(isset($error)) {
	$contenu = "Erreur de saisi";
	$contenu .= formulaire_connexion();
}
else {
	$contenu = formulaire_connexion();
}

?>