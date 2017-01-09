<?php
session_start();
require ('../Modele/connexion_bdd.php');

//////////////////////////////////////////////////////////////////////////////
/////////////////////// AJOUTER UN APPARTEMENT ///////////////////////////////
//////////////////////////////////////////////////////////////////////////////

//Premier formulaire
//On teste le type d'appartement car la donnée à stocker dans le bdd est un entier

if ($_POST['declencheur'] == '1'){  //on déclenche uniquement si le bouton "valider" a été appuyé pour le formulaire 1
	//il faut : ('NULL','nom','type','adresse','ville','pays','nbpersonne','NULL(qui deviendra ID_utilisateur')
	if ($_POST['type_appartement'] == 'primaire') {
	$type_appartement = 1;
	}
	elseif ($_POST['type_appartement'] == 'secondaire') {
	$type_appartement = 2;
	}
$nom_appartement = $_POST['nom_appartement'];
$adresse_appartement = $_POST['adresse_appartement'];
$ville_appartement = $_POST['ville_appartement'];
$pays_appartement = $_POST['pays_appartement'];
$nombre_personne_appartement = $_POST['nombre_personne_appartement'];
//On stocke les donées renseignées dans une BDD dans la table 'appartements'
$mysqli -> query ("INSERT INTO `bdd`.`appartements` VALUES (NULL, '$nom_appartement', '$type_appartement', '$adresse_appartement', '$ville_appartement', '$pays_appartement', '$nombre_personne_appartement', NULL)");
header ("Location: ../Vue/ajouter_piece.php");
exit();
}






//////////////////////////////////////////////////////////////////////////////
//////////////////////////// AJOUTER UNE PIECE ///////////////////////////////
//////////////////////////////////////////////////////////////////////////////
$result = $mysqli -> query ('SELECT Nom FROM appartements');
if ($_POST['declencheur']=='2') {
	$mysqli -> query ("INSERT INTO `bdd`.`piece` VALUES (NULL, '$nom_piece', '$donnes[$i]')");
	
header("Location: ../Vue/ajouter_capteurs.php");
exit();
}

//////////////////////////////////////////////////////////////////////////////
/////////////////////////// AJOUTER DES CAPTEURS /////////////////////////////
//////////////////////////////////////////////////////////////////////////////

if($_POST['declencheur']=='3'){
	
	$nombre_capteurs = $_POST['nombre_capteurs'];

	$_SESSION['nombre_capteurs'] = $nombre_capteurs;
	header("Location: ../Vue/ajouter_capteurs2.php");
}


//////////////////////////////////////////////////////////////////////////////
////////////////////////// AJOUTER DES CAPTEURS 2 ////////////////////////////
//////////////////////////////////////////////////////////////////////////////
if ($_POST['declencheur']=='4') {
	for ($a=0; $a < $_SESSION['nombre_capteurs']; $a++) { 
		$nomcapteur = $_POST['nom_capteur_$i'];
		echo ($nomcapteur);
		$fonctioncapteur = $_POST['type_capteur_$i'];
		echo ($fonctioncapteur);
		$mysqli -> query ("INSERT INTO `bdd`.`capteur` VALUES (NULL, '$nomcapteur, '$fonctioncapteur')");
	}
	

}

/////////////////////////////////////////////////////////////////////////////
/////////////////////// SUPPRIMER UN APPART //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
if ($_POST['declencheur'] == 10){

	$mysqli -> query ("DELETE FROM `bdd`.`appartements` WHERE `appartements`.`Id` = 148");


exit();
	}

?>


?>