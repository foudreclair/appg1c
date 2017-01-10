<?php
session_start();

$Date_start = $_SESSION['date_debut'];
$Date_end = $_SESSION['date_fin'];
$Time_start = $_SESSION['heure_debut'];
$Time_end = $_SESSION['heure_fin'];
if ($Time_start==''){
	$Time_start='00:00';
}
if ($Time_end==''){
	$Time_end='00:00';
}
require '../Modele/fonctions.php';
$tab = $_SESSION['tab_scenar'];
include '../Modele/connexion_bdd.php';
foreach ($_POST['consigne'] as $key => $value) {
	$capt = $tab[$key]['0'];
	$piece = $tab[$key]['1']; 
	$fonc = $tab[$key]['2']; 
	$sql = "INSERT INTO `bdd`.`Programmation` (`Id`, `Date_start`, `Date_end`, `Time_start`, `Time_end`, `Consigne`, `Correction`, `Id_Fonctionnalite`, `Id_Capteur`, `Id_Pieces`) VALUES (NULL, '$Date_start', '$Date_end', '$Time_start', '$Time_end', '$value', NULL,  '$fonc','$capt', '$piece')";
	$req = $mysqli->query($sql);
	
	
	//insertion('Programmation',['Date_start','Date_end','Time_start','Time_end','Consigne','Id_Fonctionnalite','Id_Capteur','Id_Pieces'],['$Date_start','$Date_end','$Time_start','$Time_end','$value','$capt','$piece','$fonc']);
	header('Location: annul_scenar.php');
	
	//include '../Modele/deconnexion_bdd.php';
}

?>
