<?php

if (!isset($_SESSION['id'])) {
		include ("Controleur/connexion.php");
}

$iduser = $_SESSION['id'];
require('Modele/fonctions.php');
include('Modele/connexion_bdd.php');

$reqscernar = $mysqli->query("SELECT * FROM Scenario WHERE Id_Utilisateur = '$iduser'");
$valscenar = [];
$nomscenar = [];
while ($scenar = $reqscernar ->fetch_array(MYSQLI_ASSOC)) {

	$val=[];
	$scenarid = $scenar['Id'];
	$result = $mysqli->query("SELECT * FROM Programmation WHERE Id_scenario = '$scenarid'");

	while($donnees = $result ->fetch_array(MYSQLI_ASSOC)){



		$idcapt = $donnees['Id_Capteur'];
		$resultcapt = $mysqli->query("SELECT * FROM Capteur WHERE Id = '$idcapt'");
		$idcapteur = $resultcapt->fetch_array(MYSQLI_ASSOC);
		$donnees['Id_Capteur']=$idcapteur['Nom'];
		$fonc = select('Fonctionnalite',['Nom','Type_donnees'],'Id='.$donnees['Id_Fonctionnalite']);
		$donnees['Id_Fonctionnalite']=[$fonc['Nom'],$fonc['Type_donnees']];
		$piece = select('Pieces',['Nom'],'Id='.$donnees['Id_Pieces']);
		$donnees['Id_Pieces']=$piece['Nom'];
		array_push($val, $donnees);
		}




	array_push($nomscenar, $scenar['Nom']);
	array_push($valscenar, $val);

}

include('Vue/accueil.php');
?>
