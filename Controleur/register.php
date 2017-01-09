<?php
<<<<<<< HEAD
if(isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['confirm']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['confirm']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))
{
	echo "ok";
	$mail = htmlspecialchars($_POST['mail']); //SÃ©curisation de la variable
=======

if(isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['confirm']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['confirm']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))
{
	echo "ok";
	$mail = htmlspecialchars($_POST['mail']); //Sécurisation de la variable
>>>>>>> 4ff936d586c539137aef764263c21fa0f73f71d1
	$password_user = htmlspecialchars($_POST['password']);
	$confirm = htmlspecialchars($_POST['confirm']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	
	include('../Modele/connexion_bdd.php');
	$mail1 = $mysqli -> query ('SELECT mail FROM utilisateur WHERE Mail="' . $mail . '"');
	$row = $mail1->fetch_array(MYSQLI_NUM);
	if($row[0] == $mail) {
<<<<<<< HEAD
		$erreur = "Votre mail est dÃ©jÃ  utilisÃ© par un membre";
=======
		$erreur = "Votre mail est déjà utilisé par un membre";
>>>>>>> 4ff936d586c539137aef764263c21fa0f73f71d1
	}
	else {
		if ($password_user != $confirm || empty($confirm) || empty($password_user))
		{
<<<<<<< HEAD
			$erreur = "Votre mot de passe et votre confirmation diffÃ¨rent, ou sont vides";
=======
			$erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
>>>>>>> 4ff936d586c539137aef764263c21fa0f73f71d1
		}
		else {
			//$password_user = sha1($password);
			$insert_user = $mysqli -> query ("INSERT INTO utilisateur (Mail, Password, Nom, Prenom, Date_naissance, Permission) VALUES ('$mail', '$password_user', '$nom', '$prenom', NULL, NULL)");
<<<<<<< HEAD
			header('Location:index.php?page=accueil');
=======
			header('Location:../index.php?page=register');
>>>>>>> 4ff936d586c539137aef764263c21fa0f73f71d1
		}
	}
	
	
}
else {
	$erreur = "Au moins un des champs est vide";
}
<<<<<<< HEAD
=======

>>>>>>> 4ff936d586c539137aef764263c21fa0f73f71d1
if(isset($erreur)) {
	header('Location:../index.php?page=register');
	echo "<div class='corps'>" . $erreur . "</div>";
}
<<<<<<< HEAD
=======

>>>>>>> 4ff936d586c539137aef764263c21fa0f73f71d1
?>