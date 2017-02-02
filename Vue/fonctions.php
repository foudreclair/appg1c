<?php

//Active li pour le menu 

function activepage($requestUri)
{
	if (isset($_GET["page"])) {
		$current_file_name = htmlentities($_GET["page"]);
	}
	else {
		$current_file_name = "";
	}

	if ($current_file_name == $requestUri)
		echo 'class="active"';
}

function formulaire_connexion() {
	ob_start();
	
	?>
	<div class="corps">
	<center>
		<h1>Connectez-vous : </h1>
		<div class ="form">
			<form method ="post" action = "controleur/connexion.php">
				<input type = "text" name ="mail" placeholder="Entrez votre email"><br>
				<input type ="password" name ="password" placeholder="Mot de passe"><br>
				<input class ="button" type = "submit" name ='connexion' value ='Se connecter'>
			</form>
		</div>
		</center>
	</div>
	<?php 
	$formulaire_connexion = ob_get_clean();
	return $formulaire_connexion;
}

?>