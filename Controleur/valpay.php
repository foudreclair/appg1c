<?php
session_start();
if ($_SESSION['admin'] !="1"){
	header('Location: index.php?page=accueil');
}
elseif ($_SESSION['admin']=='1') {
include '../Modele/connexion_bdd.php';
$id = $_GET['id'];

	if ($_GET['val']=="pay"){
		
		$mysqli ->query("UPDATE commande SET Payement='Oui' WHERE Id='$id'");
		header('Location: ../index.php?page=cmd');
	}
	elseif ($_GET['val']=="suppay") {
		$mysqli ->query("UPDATE commande SET Payement='Non' WHERE Id='$id'");
		header('Location: ../index.php?page=cmd');
	}


	
	
}

else {
	header('Location: index.php?page=accueil');
}

?>