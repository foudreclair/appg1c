<?php

require ('../Modele/connexion_bdd.php');
if (isset ($_POST['declencheur']))
	$declencheur=$_POST['declencheur'];
	else $declencheur="";
//////////////////////////////////////////////////////////////////////////////
/////////////////////// AJOUTER UN APPARTEMENT ///////////////////////////////
//////////////////////////////////////////////////////////////////////////////

//Premier formulaire
//On teste le type d'appartement car la donnée à stocker dans le bdd est un entier

if ($declencheur == '1'){  //on déclenche uniquement si le bouton "valider" a été appuyé pour le formulaire 1
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
if ($declencheur  == '2') {
	$mysqli -> query ("INSERT INTO `bdd`.`piece` VALUES (NULL, '$nom_piece', NULL)");
	$nombre_capteurs=$_POST['nombre_capteurs'];
	$mysqli -> query ("INSERT INTO `bdd`.`capteur` (`Id`, `Nom`) VALUES (NULL, '$nombre_capteurs')");
}

//////////////////////////////////////////////////////////////////////////////
/////////////////////// SUPPRIMER UN APPART //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//$result = $mysqli -> query ('SELECT Nom FROM Appartements');
//print_r ($result);
if ($declencheur  == '10'){

	$Id = intval($_POST['Nom']);
	//echo "Id = $Id";
	//echo (supprimer_appart_succes.php);
	$queryDELETE = "DELETE FROM Appartements WHERE Id = $Id";
	$result=$mysqli -> query($queryDELETE);
	//if ($result) echo "OK";
	//else echo "$queryDELETE";
	//$mysqli -> query ("DELETE FROM 'bdd'.'Appartements' WHERE 'Appartements'.'Nom' =67");
	header ("Location: ../Vue/supprimer_appartement_succes.php");
exit();
	}

?>
