<?php
require ('../Modele/connexion_bdd.php');
//////////////////////////////////////////////////////////////////////////////
/////////////////////// AJOUTER UN APPARTEMENT ///////////////////////////////
//////////////////////////////////////////////////////////////////////////////

//Premier formulaire
//On teste le type d'appartement car la donnée à stocker dans le bdd est un entier


if ($_POST['type_appartement'] == 'primaire') {
	$type_appartement = 1;
}
elseif ($_POST['type_appartement'] == 'secondaire') {
	$type_appartement = 2;
}
//il faut : ('NULL','nom','type','adresse','ville','pays','nbpersonne','NULL(qui deviendra ID_utilisateur')
$nom_appartement = $_POST['nom_appartement'];
$adresse_appartement = $_POST['adresse_appartement'];
$ville_appartement = $_POST['ville_appartement'];
$pays_appartement = $_POST['pays_appartement'];
$nombre_personne_appartement = $_POST['nombre_personne_appartement'];



//On stocke les donées renseignées dans une BDD dans la table 'appartements'
$mysqli -> query ("INSERT INTO `bdd`.`appartements` VALUES (NULL, '$nom_appartement', '$type_appartement', '$adresse_appartement', '$ville_appartement', '$pays_appartement', '$nombre_personne_appartement', NULL)");


$result = $mysqli -> query ('SELECT Nom FROM appartements');

//////////////////////////////////////////////////////////////////////////////
//////////////////////////// AJOUTER UNE PIECE ///////////////////////////////
//////////////////////////////////////////////////////////////////////////////

$mysqli -> query ("INSERT INTO `bdd`.`piece` VALUES (NULL, '$nom_piece', NULL)");




?>