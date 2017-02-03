<?php
$iduser =$_GET['id'];
include '../Modele/connexion_bdd.php';
$sqlscenar = "SELECT * FROM Scenario WHERE Id_Utilisateur ='$iduser'";
$reqscenar = $mysqli -> query($sqlscenar);
//$tabprog = [];
while ($don = $reqscenar -> fetch_array(MYSQLI_ASSOC)){
	//array_push($tabprog, $don['Id']);
	$idscenar = $don['Id'];
	$mysqli-> query("DELETE FROM Programmation WHERE Id_scenario = '$idscenar'");
	$mysqli-> query("DELETE FROM Scenario WHERE Id = '$idscenar'");
}
$sqlappart = "SELECT * FROM Appartements WHERE Id_Utilisateur ='$iduser'";
$reqappart = $mysqli -> query($sqlappart);
//$tabprog = [];
while ($don = $reqappart -> fetch_array(MYSQLI_ASSOC)){
	//array_push($tabprog, $don['Id']);
	$idappart = $don['Id'];
	$sqlpie = "SELECT * FROM Pieces WHERE Id_Appartements = '$idappart'";
	$reqpie = $mysqli -> query($sqlpie);

	while ($donne = $reqpie -> fetch_array(MYSQLI_ASSOC)){
		$pie = $donne['Id'];
		$sqlcapt = "SELECT * FROM Affectation WHERE Id_Pieces = '$pie'";
		$reqcapt = $mysqli -> query($sqlcapt);
		while ($donne = $reqpie -> fetch_array(MYSQLI_ASSOC)){
			$capt = $donne['Id'];
			$mysqli-> query("DELETE FROM Capteur WHERE Id = '$capt'");
		}
		$mysqli-> query("DELETE FROM Affectation WHERE Id_Pieces = '$pie'");
	}
	$mysqli-> query("DELETE FROM Pieces WHERE Id_Appartements = '$idappart'");
	$mysqli-> query("DELETE FROM Appartements WHERE Id = '$idappart'");
}

$mysqli-> query("DELETE FROM Utilisateur WHERE Id = '$iduser'");
header('Location: ../index.php?page=admin');
?>
