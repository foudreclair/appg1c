<?php
	if (isset($_POST['mail']) || isset($_POST['password'])) {
		if(!empty($_POST['mail']) && !empty($_POST['password'])){ 
			include('../Modele/fonctions.php');
			echo 'test';
			$bdd = "bdd";
			$user = "root";
			$password = "root";
			
			$mysqli = new mysqli("localhost", $user, $password, $bdd);
			if ($mysqli->connect_errno) {
				echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$result = $mysqli->query('SELECT Id, Mail, Password FROM utilisateur where Mail="' .$_POST['mail'].'"');
			$row = $result->fetch_array(MYSQLI_NUM);
			if ($row[2] == $_POST['password']) {
				echo "VICTORY";
			}
			
		}
		else {
			include('Vue/connexion_erreur.php');
			
		}
		} else { 
			include('Vue/connexion_erreur.php');
		}
?>