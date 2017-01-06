<?php

if(isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['confirm']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['confirm']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))
{
	echo "ok";
	$mail = htmlspecialchars($_POST['mail']); //Sécurisation de la variable
	$password_user = htmlspecialchars($_POST['password']);
	$confirm = htmlspecialchars($_POST['confirm']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	
	include('../Modele/connexion_bdd.php');
	$mail1 = $mysqli -> query ('SELECT mail FROM utilisateur WHERE Mail="' . $mail . '"');
	$row = $mail1->fetch_array(MYSQLI_NUM);
	if($row[0] == $mail) {
		$erreur = "Votre mail est déjà utilisé par un membre";
	}
	else {
		if ($password_user != $confirm || empty($confirm) || empty($password_user))
		{
			$erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
		}
		else {
			//$password_user = sha1($password);
			$insert_user = $mysqli -> query ("INSERT INTO utilisateur (Mail, Password, Nom, Prenom, Date_naissance, Permission) VALUES ('$mail', '$password_user', '$nom', '$prenom', NULL, NULL)");
			header('Location:../index.php?page=register');
		}
	}
	
	
}
else {
	$erreur = "Au moins un des champs est vide";
}

if(isset($erreur)) {
	header('Location:../index.php?page=register');
	echo "<div class='corps'>" . $erreur . "</div>";
}

?>