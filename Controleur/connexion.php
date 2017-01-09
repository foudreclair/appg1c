<?php
	if (isset($_POST['mail']) || isset($_POST['password'])) {
		if(!empty($_POST['mail']) && !empty($_POST['password'])){ 
			include('../Modele/fonctions.php');
			$bdd = "bdd";
			$user = "root";
			$password = "root";
			
			$mysqli = new mysqli("localhost", $user, $password, $bdd);
			if ($mysqli->connect_errno) {
				echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$result = $mysqli->query('SELECT Id, Mail, Password FROM utilisateur where Mail="' .$_POST['mail'].'"');
			$row = $result->fetch_array(MYSQLI_NUM);
			$id = $row[0];
			$mail = $row[1];
			$password_user = $row[2];
		//	$password_hash = sha1($_POST['password']);
			if ($password_user == $_POST['password']) {		//password ok
				session_start();
				$_SESSION['mail'] = $mail;
				$_SESSION['id'] = $id;
				header('Location:../index.php?page=accueil');
			}
			
		}
		else {
			echo '';
			
		}
		} else { 
			echo '';
		}
?>