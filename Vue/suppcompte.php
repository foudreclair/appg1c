<?php
$iduser =$_GET['id'];
include '../Modele/connexion_bdd.php';
$sqlscenar = "SELECT * FROM scenario WHERE Id_Utilisateur ='$iduser'";
$reqscenar = $mysqli -> query($sqlscenar);
//$tabprog = [];
while ($don = $reqscenar -> fetch_array(MYSQLI_ASSOC)){
	//array_push($tabprog, $don['Id']);
	$idscenar = $don['Id'];
	$mysqli-> query("DELETE FROM programmation WHERE Id_scenario = '$idscenar'");
	$mysqli-> query("DELETE FROM scenario WHERE Id = '$idscenar'");
}
$sqlappart = "SELECT * FROM appartements WHERE Id_Utilisateur ='$iduser'";
$reqappart = $mysqli -> query($sqlappart);
//$tabprog = [];
while ($don = $reqappart -> fetch_array(MYSQLI_ASSOC)){
	//array_push($tabprog, $don['Id']);
	$idappart = $don['Id'];
	$sqlpie = "SELECT * FROM pieces WHERE Id_Appartements = '$idappart'";
	$reqpie = $mysqli -> query($sqlpie);

	while ($donne = $reqpie -> fetch_array(MYSQLI_ASSOC)){
		$pie = $donne['Id'];
		$sqlcapt = "SELECT * FROM affectation WHERE Id_Pieces = '$pie'";
		$reqcapt = $mysqli -> query($sqlcapt);
		while ($donne = $reqpie -> fetch_array(MYSQLI_ASSOC)){
			$capt = $donne['Id'];
			$mysqli-> query("DELETE FROM capteur WHERE Id = '$capt'");
		}
		$mysqli-> query("DELETE FROM affectation WHERE Id_Pieces = '$pie'");
	}
	$mysqli-> query("DELETE FROM pieces WHERE Id_Appartements = '$idappart'");
	$mysqli-> query("DELETE FROM appartements WHERE Id = '$idappart'");
}

$mysqli-> query("DELETE FROM utilisateur WHERE Id = '$iduser'");
header('Location: ../index.php?page=admin');
?>
