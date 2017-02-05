<?php

session_start();
$iduser = $_SESSION['id'];
//include ('Modele/connexion_bdd.php');



//require ('Modele/connexion_bdd.php');

//////////////////////////////////////////////////////////////////////////////
/////////////////////// AJOUTER UN APPARTEMENT ///////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//Premier formulaire
//On teste le type d'appartement car la donnée à stocker dans le bdd est un entier
if (isset($_POST['declencheur']) AND $_POST['declencheur'] == 1){  //on déclenche uniquement si le bouton "valider" a été appuyé pour le formulaire 1
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
include ('../Modele/connexion_bdd.php');
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
	//echo 'pièce';
include ('../Modele/connexion_bdd.php');
$idappart = $_POST['appartement_selectionne'];
$nom_piece=$_POST['nom_piece'];
$mysqli -> query ("INSERT INTO `bdd`.`Pieces` VALUES (NULL, '$nom_piece', '$idappart')");
header('Location: ../index.php?page=reglages');
	//$nombre_capteurs=$_POST['nombre_capteurs'];
	//$mysqli -> query ("INSERT INTO `bdd`.`capteur` (`Id`, `Nom`) VALUES (NULL, '$nombre_capteurs')");
}
if (isset($_POST['declencheur']) AND $_POST['declencheur'] == 4){
	$idpiece = $_SESSION['pie'];
	/*if ($_POST['type_capteur']=='temperature'){
		$fonc = "Température";
	}
	elseif ($_POST['type_capteur']=='lumiere'){
		$fonc = "Luminosité";
	}
	*/
	$fonc = $_POST['type_capteur'];
	$nomcapt = $_POST['nom_capteur'];
	$clecapt = $_POST['id_capteur'];
	include ('../Modele/connexion_bdd.php');
	$mysqli -> query ("INSERT INTO `bdd`.`Capteur` VALUES (NULL, '$nomcapt','$clecapt')");
	$reqid = $mysqli->query("SELECT * FROM Capteur");
	$a = 0;
	while ($idma = $reqid -> fetch_array(MYSQLI_NUM)){
		if ($idma['0']>$a){
			$a = $idma['0'];
		}
	}
	//$a+=1;
	//echo $a;
	//echo '<br>';
	/*$reqidfoncs = "SELECT Id FROM Fonctionnalite WHERE Nom= '$fonc'";
	include ('../Modele/connexion_bdd.php');
	$reqidfonc = $mysqli -> query("SELECT Id FROM Fonctionnalite WHERE Nom= '$fonc'");
	$foncid = $reqidfonc ->fetch_array(MYSQLI_NUM);
	$idofnc = $foncid['0'];
	echo '<br>';
	echo $reqidfoncs;
	echo '<br>';
	print_r($reqidfonc);
	echo '<br>';
	print_r($foncid);*/

	//echo '<br>';
	//echo $fonc;
	//print_r($foncid);
	include ('../Modele/connexion_bdd.php');
	$sqlaff="INSERT INTO `bdd`.`Affectation` VALUES ('$a', '$idpiece','$fonc')";
	//echo $sqlaff;
	$mysqli -> query ($sqlaff);
	header('Location: ../index.php?page=accueil');
}




if (isset($_POST['declencheur']) AND $_POST['declencheur'] == 2) {
	include ('../Modele/connexion_bdd.php');
	include ('Modele/connexion_bdd.php');
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

//include ('../Modele/connexion_bdd.php');
//$result = $mysqli -> query ('SELECT Id FROM appartements');
//print_r ($result);
if (isset($_POST['declencheur']) AND $_POST['declencheur']  == '10'){
	$Id = intval($_POST['Nom']);
	//echo "Id = ".$Id;
	include ('../Modele/connexion_bdd.php');
	include ('Modele/connexion_bdd.php');
	//echo (supprimer_appart_succes.php);
	$sq = "SELECT * FROM Pieces WHERE Id_Appartements = $Id";
	echo $sq;
	$res = $mysqli -> query($sq);
	//print_r($res);
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
	//if ($result) echo "OK";
	//else echo "$queryDELETE";
	//$mysqli -> query ("DELETE FROM 'bdd'.'Appartements' WHERE 'Appartements'.'Nom' =67");
	
	header ("Location: ../index.php?page=accueil");
	
exit();
	}
	

?>
