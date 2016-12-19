<?php
	if (isset($_POST['mail']) || isset($_POST['password'])) {
		if(!empty($_POST['mail']) && !empty($_POST['password'])){ 
			include('Modele/fonctions.php');
			$test = select_user($_POST['mail']);
			if ($test == $_POST['password']) {
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