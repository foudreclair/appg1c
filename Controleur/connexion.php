<?php
	if (isset($_POST['mail']) || isset($_POST['password'])) {
		if(!empty($_POST['mail']) && !empty($_POST['password'])){ 
			include('../Modele/fonctions.php');
			include('../Modele/connexion_bdd.php');
			
			$result = $mysqli->query('SELECT Id, Mail, Password FROM utilisateur where Mail="' .$_POST['mail'].'"');
			$row = $result->fetch_array(MYSQLI_NUM);
			$id = $row[0];
			$mail = $row[1];
			$password_user = $row[2];
			//HASH du mdp en sha1
		    $password_hash = hash('sha1', $_POST['password']);

			if ($password_user == $password_hash) {		//password ok
				/*
				$session_name = 'session_id';   // Attribue un nom de session
				$httponly = true;
				$secure = true;
				// Force la session à n’utiliser que les cookies
				if (ini_set('session.use_only_cookies', 1) === FALSE) {
					header("Location: ../error.php");
					exit();
				}
				// Récupère les paramètres actuels de cookies
				$cookieParams = session_get_cookie_params();
				session_set_cookie_params($cookieParams["lifetime"],
						$cookieParams["path"],
						$cookieParams["domain"],
						$secure,
						$httponly);
				// Donne à la session le nom configuré plus haut
				session_name($session_name);
				*/
				session_start();            // Démarre la session PHP
				//session_regenerate_id();    // Génère une nouvelle session et efface la précédente
				$_SESSION['mail'] = $mail;
				$_SESSION['id'] = $id;
				header('Location:../index.php?page=accueil');
			}
			else {
				header('Location:../index.php?page=connexion&erreur=2');
			}
			
		}
		else {
			header('Location:../index.php?page=connexion&erreur=1');	
		}
<<<<<<< HEAD
		require('Vue/connexion.php')
	

=======
}
		include('Vue/connexion.php')
>>>>>>> 1933726074f1a3d61060ae90304eb71e021a7b4c
		
?>