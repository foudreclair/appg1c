<?php
$titre = "Domicile | Page de connexion";

if(isset($_GET["erreur"])) {
	$contenu = "Erreur de saisi";
	$contenu .= formulaire_connexion(); //ça sert à rien ici
}
else {
	$contenu = formulaire_connexion();
}

include 'gabarit.php';

?>
