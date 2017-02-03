<?php
session_start();
if ($_SESSION['admin'] !="1"){
	header('Location: index.php?page=accueil');
}
elseif ($_SESSION['admin']=='1') {
	include '../Modele/connexion_bdd.php';
$id = $_GET['id'];
if($_GET['type']=="art"){
	//echo "Article";
	if ($_GET['val']=="exp"){
		
		$mysqli ->query("UPDATE Achats SET Expedition='Oui' WHERE Id='$id'");
		header('Location: ../index.php?page=cmd');
	}
	elseif ($_GET['val']=="supexp") {
		$mysqli ->query("UPDATE Achats SET Expedition='Non' WHERE Id='$id'");
		header('Location: ../index.php?page=cmd');
	}
}
else{
	//echo "Commande";
	
	if ($_GET['val']=="exp"){
		
		$mysqli ->query("UPDATE Achats SET Expedition='Oui' WHERE Id_Commande='$id'");
		header('Location: ../index.php?page=cmd');
	}
	elseif ($_GET['val']=="supexp") {
		$mysqli ->query("UPDATE Achats SET Expedition='Non' WHERE Id_Commande='$id'");
		header('Location: ../index.php?page=cmd');
	}
}
}
else {
	header('Location: index.php?page=accueil');
}

?>