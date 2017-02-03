<?php
include '../Modele/connexion_bdd.php';

if ($_SESSION['admin'] !="1"){
	header('Location: index.php?page=accueil');
	}elseif ($_SESSION['admin']=='1') {
	$id = $_GET['id'];
		if ($_GET['val']=="pay"){
			$mysqli ->query("UPDATE Commande SET Payement='Oui' WHERE Id='$id'");
			header('Location: ../index.php?page=cmd');
		}
		elseif ($_GET['val']=="suppay") {
			$mysqli ->query("UPDATE Commande SET Payement='Non' WHERE Id='$id'");
			header('Location: ../index.php?page=cmd');
		}
	}else {
	header('Location: index.php?page=accueil');
	}

?>
