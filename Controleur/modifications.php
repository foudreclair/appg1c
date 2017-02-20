<?php


if (empty($_POST['consigne'])){
	echo "Vous n'avez pas rentré de valeur";
	header("location:".  $_SERVER['HTTP_REFERER']);
}
else {
	require('../Modele/fonctions.php');
	include('../Modele/connexion_bdd.php');
	$sql = "UPDATE programmation SET Consigne = ".$_POST['consigne'] ." Where Id= ".$_GET['id'];
	$result = $mysqli->query($sql);
	header("location:".  $_SERVER['HTTP_REFERER']);
}

?>