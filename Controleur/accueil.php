<?php
if (!isset($_SESSION['id'])) {
		include ("Controleur/connexion.php");
}

$iduser = $_SESSION['id'];
require('Modele/fonctions.php');
include('Modele/connexion_bdd.php');
$val=[];
$resultappart = $mysqli->query("SELECT * FROM Appartements WHERE Id_Utilisateur = '$iduser'");
while ($appart = $resultappart ->fetch_array(MYSQLI_ASSOC)){
	$appartid = $appart['Id'];

	$resultpieces = $mysqli->query("SELECT * FROM Pieces WHERE Id_Appartements = '$appartid'");
	while ($pieces = $resultpieces ->fetch_array(MYSQLI_ASSOC)){
		$pieceid = $pieces['Id'];
		$result = $mysqli->query("SELECT * FROM Programmation WHERE Id_Pieces = '$pieceid'");
		
		$captid = [];
		while($donnees = $result ->fetch_array(MYSQLI_ASSOC)){
			
			
			array_push($captid, $donnees['Id_Capteur']);
			$donnees['Id_Capteur']=$capt['Nom'];
			$fonc = select('Fonctionnalite',['Nom','Type_donnees'],'Id='.$donnees['Id_Fonctionnalite']);
			$donnees['Id_Fonctionnalite']=[$fonc['Nom'],$fonc['Type_donnees']];
			$piece = select('Pieces',['Nom'],'Id='.$donnees['Id_Pieces']);
			$donnees['Id_Pieces']=$piece['Nom'];
			array_push($val, [$donnees]);
		}

	}	

}
include('Vue/accueil.php');
?>