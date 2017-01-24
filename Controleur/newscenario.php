<?php
session_start();
$id = $_SESSION['id'];
$nom = $_SESSION['nom_scenar'];
$rec = $_SESSION['true_rec'];
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
include '../Modele/connexion_bdd.php';
$reqid = $mysqli->query("SELECT * FROM Scenario");
$i = 0;
while ($idma = $reqid -> fetch_array(MYSQLI_NUM)){
	if ($idma['0']>$i){
		$i = $idma['0'];
	}
}
$i+=1;
//echo $i;

$reqscenar = $mysqli->query("INSERT INTO `bdd`.`Scenario` (`Id`, `Nom`, `Recurrence`,`Id_Utilisateur`) VALUES (NULL, '$nom', '$rec','$id')");
require '../Modele/fonctions.php';
$tab = $_SESSION['tab_scenar'];
include '../Modele/connexion_bdd.php';

foreach ($_POST['consigne'] as $key => $value) {
	$capt = $tab[$key]['0'];
	$piece = $tab[$key]['1']; 
	$fonc = $tab[$key]['2']; 
	$sql = "INSERT INTO `bdd`.`Programmation` (`Id`, `Date_start`, `Date_end`, `Time_start`, `Time_end`, `Consigne`, `Correction`, `Id_Fonctionnalite`, `Id_Capteur`, `Id_Pieces`,`Id_scenario`) VALUES (NULL, '$Date_start', '$Date_end', '$Time_start', '$Time_end', '$value', NULL,  '$fonc','$capt', '$piece',$i)";
	$req = $mysqli->query($sql);
	
	
	//insertion('Programmation',['Date_start','Date_end','Time_start','Time_end','Consigne','Id_Fonctionnalite','Id_Capteur','Id_Pieces'],['$Date_start','$Date_end','$Time_start','$Time_end','$value','$capt','$piece','$fonc']);
	header('Location: annul_scenar.php?page=accueil');
	
	//include '../Modele/deconnexion_bdd.php';
}

?>
