<?php
if (!isset($_SESSION ["Id"])) {
		include ("Controleur/connexion.php");
		}
require('Modele/fonctions.php');
include('Modele/connexion_bdd.php');

$result = $mysqli->query('SELECT * FROM Programmation');
$val=[];
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


include('Vue/accueil.php');
?>