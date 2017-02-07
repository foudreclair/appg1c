<?php

session_start();
include '../Modele/connexion_bdd.php';
$iduser = $_SESSION['id'];
$prix = $_SESSION['prixtot'];
$adresse = htmlspecialchars($_POST['adresse']);
$cp = htmlspecialchars($_POST['CodePostal']);
$ville = htmlspecialchars($_POST['ville']);
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
$mess = "Bonjour,

Merci de votre commande sur Domisep.
Elle sera expédiée dès la récepetion d'un chèque de ".$prix." €.
Voici le bilan de votre commande : ";
//echo $idcom;
foreach ($_SESSION['panier'] as $key => $value) {
	$cat = $value['0'];
	$quant = $value['1'];
	$mysqli -> query("INSERT INTO `bdd`.`Achats` (`Id`, `Id_Catalogue`, `Quantite`, `Expedition`, `Id_Commande`) VALUES (NULL, '$cat', '$quant', 'Non', '$idcom')");
	$reqcat = $mysqli -> query("SELECT * FROM Catalogue WHERE Id = '$cat'");
	while($categ = $reqcat->fetch_array(MYSQLI_ASSOC)){
		$nompdt = $categ['Nom'];
		$prixpdt = $categ['Prix'];
	}
	$mess.= "
	- ".$quant." x ".$nompdt." à ".$prixpdt. " € (soit ".(floatval(str_replace(',', '.', $prixpdt))*$quant)." €)";
	
}
require 'genal.php';
$code_aleatoire = gen();
$mess.="

Vous pouvez consulter votre facture ici : http://localhost/appg1c/Vue/pdf.php?cmd=".$code_aleatoire;
$mess.="

Bonne journée et à bientôt chez Domisep !";
include 'send_mail.php';
$reqmail = $mysqli -> query("SELECT * FROM Utilisateur WHERE Id = '$iduser'");
while($mailuser = $reqmail->fetch_array(MYSQLI_ASSOC)){
	$mail = $mailuser['Mail'];
}
sendMail($mail,'Confirmation de votre commande', $mess);
$mysqli ->query("INSERT INTO `bdd`.`Commande` (`Id`, `Id_Utilisateur`, `Nom`, `Prenom`, `Adresse`, `CodePostal`, `Ville`, `Date`, `Prix`, `Payement`,`KeyCom`) VALUES (NULL, '$iduser', '$nom', '$prenom', '$adresse', '$cp', '$ville', '$date', $prix, 'Non','$code_aleatoire')");
unset($_SESSION['panier']);
//unset($_SESSION['prixtot']);
header('Location: ../index.php?page=validachat');
?>