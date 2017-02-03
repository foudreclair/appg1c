<?php
require '../Modele/fonctions.php';
include '../Modele/connexion_bdd.php';

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

$reqid = $mysqli->query("SELECT * FROM Scenario");
$i = 0;
while ($idma = $reqid -> fetch_array(MYSQLI_NUM)){
	if ($idma['0']>$i){
		$i = $idma['0'];
				}
		}
			$i+=1;

$reqscenar = $mysqli->query("INSERT INTO `bdd`.`Scenario` (`Id`, `Nom`, `Recurrence`,`Id_Utilisateur`) VALUES (NULL, '$nom', '$rec','$id')");
$tab = $_SESSION['tab_scenar'];

foreach ($_POST['consigne'] as $key => $value) {
	$capt = $tab[$key]['0'];
	$piece = $tab[$key]['1'];
	$fonc = $tab[$key]['2'];
	$sql = "INSERT INTO `bdd`.`Programmation` (`Id`, `Date_start`, `Date_end`, `Time_start`, `Time_end`, `Consigne`, `Correction`, `Id_Fonctionnalite`, `Id_Capteur`, `Id_Pieces`,`Id_scenario`) VALUES (NULL, '$Date_start', '$Date_end', '$Time_start', '$Time_end', '$value', NULL,  '$fonc','$capt', '$piece',$i)";
	$req = $mysqli->query($sql);
	header('Location: annul_scenar.php?page=accueil');
	}

?>
