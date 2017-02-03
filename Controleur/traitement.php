<?php
include ('../Modele/connexion_bdd.php');

$iduser = $_SESSION['id'];

//////////////////////////////////////////////////////////////////////////////
/////////////////////// AJOUTER UN APPARTEMENT ///////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//Premier formulaire
//On teste le type d'appartement car la donnée à stocker dans le bdd est un entier
if (isset($_POST['declencheur']) AND $_POST['declencheur'] == 1){  //on déclenche uniquement si le bouton "valider" a été appuyé pour le formulaire 1
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
$mysqli -> query ("INSERT INTO `bdd`.`appartements` VALUES (NULL, '$nom_appartement', '$type_appartement', '$adresse_appartement', '$ville_appartement', '$pays_appartement', '$nombre_personne_appartement', '$iduser')");
header ("Location: ../index.php?page=ajoutpiece");
exit();

	$nom_appartement = $_POST['nom_appartement'];
	$adresse_appartement = $_POST['adresse_appartement'];
	$ville_appartement = $_POST['ville_appartement'];
	$pays_appartement = $_POST['pays_appartement'];
	$nombre_personne_appartement = $_POST['nombre_personne_appartement'];
//On stocke les donées renseignées dans une BDD dans la table 'appartements'
	$mysqli -> query ("INSERT INTO `bdd`.`appartements` VALUES (NULL, '$nom_appartement', '$type_appartement', '$adresse_appartement', '$ville_appartement', '$pays_appartement', '$nombre_personne_appartement', NULL)");
	header ("Location: ../Vue/ajouter_piece.php");

}


//////////////////////////////////////////////////////////////////////////////
//////////////////////////// AJOUTER UNE PIECE ///////////////////////////////
//////////////////////////////////////////////////////////////////////////////

if (isset($_POST['declencheur']) AND $_POST['declencheur'] == '2'){
	$idappart = $_POST['appartement_selectionne'];
	$nom_piece=$_POST['nom_piece'];
	$mysqli -> query ("INSERT INTO `bdd`.`Pieces` VALUES (NULL, '$nom_piece', '$idappart')");
	header('Location: ../index.php?page=reglages');
	}
if (isset($_POST['declencheur']) AND $_POST['declencheur'] == 4){
	$idpiece = $_SESSION['pie'];
	$fonc = $_POST['type_capteur'];
	$nomcapt = $_POST['nom_capteur'];
	$mysqli -> query ("INSERT INTO `bdd`.`Capteur` VALUES (NULL, '$nomcapt')");
	$reqid = $mysqli->query("SELECT * FROM Capteur");
	$a = 0;
	while ($idma = $reqid -> fetch_array(MYSQLI_NUM)){
		if ($idma['0']>$a){
			$a = $idma['0'];
		}
	}


	$sqlaff="INSERT INTO `bdd`.`Affectation` VALUES ('$a', '$idpiece','$fonc')";
	//echo $sqlaff;
	$mysqli -> query ($sqlaff);
	header('Location: ../index.php?page=accueil');
}




if (isset($_POST['declencheur']) AND $_POST['declencheur'] == 2) {
	$appartement_select=$_POST['appartement_selectionne'];
	echo($nom_piece);
	$nom_piece = $_POST['nom_piece'];
	echo($nom_piece);
	$Id_appartement_select = $mysqli -> query ("SELECT Id FROM appartements WHERE Nom = '$appartement_select'");
	echo($Id_appartement_select);
	$Id_appartement_select2 = $Id_appartement_select -> fetch_array();
	$mysqli -> query ("INSERT INTO `bdd`.`pieces` VALUES (NULL, '$nom_piece', '$Id_appartement_select2')");
header("Location: ../Vue/ajouter_capteurs.php");
}
//////////////////////////////////////////////////////////////////////////////
/////////////////////////// AJOUTER DES CAPTEURS /////////////////////////////
//////////////////////////////////////////////////////////////////////////////

if(isset($_POST['declencheur']) AND $_POST['declencheur']=='page_ajouter_capteur'){

	$nombre_capteurs = $_POST['nombre_capteurs'];

	$_SESSION['nombre_capteurs'] = $nombre_capteurs;
	header("Location: ../Vue/ajouter_capteurs2.php");
}


//////////////////////////////////////////////////////////////////////////////
////////////////////////// AJOUTER DES CAPTEURS 2 ////////////////////////////
//////////////////////////////////////////////////////////////////////////////

if (isset($_POST['declencheur']) AND $_POST['declencheur']  == '10'){
	$Id = intval($_POST['Nom']);
	$sq = "SELECT * FROM Pieces WHERE Id_Appartements = $Id";
	echo $sq;
	$res = $mysqli -> query($sq);
	echo '<br>';
	while ($sup = $res -> fetch_array(MYSQLI_ASSOC)){
		echo '<br>';
		$Idp = $sup['Id'];
		$reqsql= "DELETE FROM Affectation WHERE Id_Pieces = $Idp";
		echo $reqsql;
		$mysqli -> query($reqsql);
		$sqfonc = "DELETE FROM Programmation WHERE Id_Pieces = '$Idp'";
		echo $sqfonc;
		$mysqli -> query($sqfonc);
		$sqpiece = "DELETE FROM Pieces WHERE Id = '$Idp'";
		echo $sqpiece;
		$mysqli -> query($sqpiece);
		}
	$queryDELETE = "DELETE FROM Appartements WHERE Id = $Id";
	echo $queryDELETE;
		$mysqli -> query($queryDELETE);
		header ("Location: ../index.php?page=accueil");
	exit();
	}

?>
