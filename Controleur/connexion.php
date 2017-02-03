<?php
	if (isset($_POST['mail']) || isset($_POST['password'])) {
		if(!empty($_POST['mail']) && !empty($_POST['password'])){
			include('../Modele/fonctions.php');
			include('../Modele/connexion_bdd.php');

			$result = $mysqli->query('SELECT Id, Mail, Password, Permission, Prenom FROM utilisateur where Mail="' .$_POST['mail'].'"');
			$row = $result->fetch_array(MYSQLI_NUM);
			$id = $row[0];
			$mail = $row[1];
			$password_user = $row[2];
			$prenom = $row[4];
			//HASH du mdp en sha1
		    $password_hash = hash('sha1', $_POST['password']);

			if ($password_user == $password_hash) {
				//password ok
				$_SESSION['mail'] = $mail;
				$_SESSION['id'] = $id;
				$_SESSION['prenom'] = $prenom;
				$_SESSION['admin']=$row[3];
				header('Location:../index.php?page=accueil');
			}
			else {
				header('Location:../index.php?page=connexion&erreur=2');
			}
		}
		else {
			header('Location:../index.php?page=connexion&erreur=1');
		}
		require('../Vue/connexion.php');
	}
		include('Vue/connexion.php');


?>
