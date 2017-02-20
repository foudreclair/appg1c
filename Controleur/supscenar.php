<?php
$idscenar = htmlspecialchars($_GET['id']);
session_start();
$iduser = $_SESSION['id'];
include '../Modele/connexion_bdd.php';
$reqiduser = $mysqli -> query("SELECT * FROM scenario WHERE Id = '$idscenar'");
while($scenario = $reqiduser->fetch_array(MYSQLI_ASSOC)){
	if ($scenario['Id_Utilisateur']!=$iduser){
		header('Location: ../index.php?pae=accueil');
		exit();
	}

}
$mysqli->query("DELETE FROM programation WHERE Id_scenario = '$idscenar'");
$mysqli->query("DELETE FROM scenario WHERE Id = '$idscenar'");
header('Location: ../index.php?pae=accueil');
?>