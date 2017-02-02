<?php

session_start();
include '../Modele/connexion_bdd.php';
$iduser = $_SESSION['id'];
$prix = $_SESSION['prixtot'];
$adresse = $_POST['adresse'];
$cp = $_POST['CodePostal'];
$ville = $_POST['ville'];
$date = date("F j, Y, g:i a");
$req = $mysqli ->query("SELECT * FROM Utilisateur WHERE id = '$iduser'");
while ($don = $req->fetch_array(MYSQLI_ASSOC)){
	$nom = $don['Nom'];
	$prenom = $don['Prenom'];

}
$reqid = $mysqli -> query("SELECT * FROM Commande");
$idcom= 0;
while($donne = $reqid->fetch_array(MYSQLI_ASSOC)){
	if($donne['Id']>$idcom){
		$idcom = $donne['Id'];
	}
}
$idcom+=1;
//echo $idcom;
foreach ($_SESSION['panier'] as $key => $value) {
	$cat = $value['0'];
	$quant = $value['1'];
	$mysqli -> query("INSERT INTO `bdd`.`Achats` (`Id`, `Id_Catalogue`, `Quantite`, `Expedition`, `Id_Commande`) VALUES (NULL, '$cat', '$quant', 'Non', '$idcom')");
	
}
$mysqli ->query("INSERT INTO `bdd`.`Commande` (`Id`, `Id_Utilisateur`, `Nom`, `Prenom`, `Adresse`, `CodePostal`, `Ville`, `Date`, `Prix`, `Payement`) VALUES (NULL, '$iduser', '$nom', '$prenom', '$adresse', '$cp', '$ville', '$date', $prix, 'Non')");
unset($_SESSION['panier']);
//unset($_SESSION['prixtot']);
header('Location: ../index.php?page=validachat');
?>