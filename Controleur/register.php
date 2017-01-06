<?php
//Get variables

if(isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['confirm']) AND isset($_POST['nom']) AND isset($_POST['prenom'])) {
}
elseif()
{
	$mail = htmlspecialchars($_POST['mail']); //Sécurisation de la variable
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	
	include('../Modele/connexion_bdd.php');
	$mail1 = $mysqli -> query ('SELECT mail FROM utilisateurs WHERE mail=' . $mail);
	
	if(!$mail1) {
		$mail_erreur = "Votre mail est déjà utilisé par un membre";
	}
	if ($password != $confirm || empty($confirm) || empty($password))
	{
		$mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
		$password = sha1($password);
		echo $password;
		$insert_user = $mysqli -> query ('INSERT INTO utilisateurs (mail, password, ,    VALUES         ')
	}
}
else {
	$erreur_empty = "Au moins un des champs est vide";
}

?>