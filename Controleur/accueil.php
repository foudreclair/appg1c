<?php
require('Modele/fonctions.php');
include('Modele/connexion_bdd.php');

$result = $mysqli->query('SELECT * FROM Programmation');
$val=[];
while($donnees = $result ->fetch_array(MYSQLI_ASSOC)){
	
	$capt = select('Capteur',['Nom'],'Id='.$donnees['Id_Capteur']);
	$donnees['Id_Capteur']=$capt['Nom'];
	$fonc = select('Fonctionnalite',['Nom','Type_donnees'],'Id='.$donnees['Id_Fonctionnalite']);
	$donnees['Id_Fonctionnalite']=[$fonc['Nom'],$fonc['Type_donnees']];
	$piece = select('Pieces',['Nom'],'Id='.$donnees['Id_Pieces']);
	$donnees['Id_Pieces']=$piece['Nom'];
	array_push($val, [$donnees]);
}	


include('Vue/accueil.php');
?>