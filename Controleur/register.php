<?php
include('../Vue/register.php');

if (isset ( $_POST ['mail'] ) && isset ( $_POST ['password'] ) && isset ( $_POST ['confirm'] ) && isset ( $_POST ['nom'] ) && isset ( $_POST ['prenom'] ) && isset ( $_POST ['datepicker'] )) {
	if (! empty ( $_POST ['mail'] ) and ! empty ( $_POST ['password'] ) && ! empty ( $_POST ['confirm'] ) && ! empty ( $_POST ['nom'] ) && ! empty ( $_POST ['prenom'] )) {

		$mail = htmlspecialchars ( $_POST ['mail'] ); // Sécurisation de la variable
		$password_user = htmlspecialchars ( $_POST ['password'] );
		// Hash du mot de passe
		$password_user_hash = hash ( 'sha1', $password_user );
		$confirm = htmlspecialchars ( $_POST ['confirm'] );
		$nom = htmlspecialchars ( $_POST ['nom'] );
		$prenom = htmlspecialchars ( $_POST ['prenom'] );
		$date_naissance = htmlspecialchars ( $_POST ['datepicker'] );

		include ('../Modele/connexion_bdd.php');
		$mail1 = $mysqli->query ( 'SELECT mail FROM utilisateur WHERE Mail="' . $mail . '"' );
		$row = $mail1->fetch_array ( MYSQLI_NUM );
		if ($row [0] == $mail) {
			header ( 'Location:../index.php?page=connexion&erreur=3' );
		} else {
			if ($password_user != $confirm || empty ( $confirm ) || empty ( $password_user )) {
				header ( 'Location:../index.php?page=connexion&erreur=2' );
			} else {
				$insert_user = $mysqli->query ( "INSERT INTO utilisateur (Mail, Password, Nom, Prenom, Date_naissance, Permission) VALUES ('$mail', '$password_user_hash', '$nom', '$prenom', '$date_naissance', NULL)" );
				header ( 'Location:../index.php?page=connexion&succes' );
			}
		}
	}
	else {
		header ( 'Location:../index.php?page=register&erreur=1' );
	}
}

?>
