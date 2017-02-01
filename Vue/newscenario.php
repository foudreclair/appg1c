<?php

$titre = 'Domicile | Créez votre scénario';
include 'gabarit.php';
require 'Modele/fonctions.php';
$iduser = $_SESSION['id'];
if(isset($_POST['options'])){
	$_SESSION['sce_pieces'] = [];
	foreach ($_POST['options'] as $key => $value) {
	array_push($_SESSION['sce_pieces'], $value);
	}
}
if (!empty($_POST['nom'])){
	$_SESSION['nom_scenar']= $_POST['nom'];
}
if (!empty($_POST['recurrence'])){
	$_SESSION['recurrence']= $_POST['recurrence'];
}
if (!empty($_POST['date_debut'])){
	$_SESSION['date_debut']= $_POST['date_debut'];
}
if (!empty($_POST['date_fin'])){
	$_SESSION['date_fin']= $_POST['date_fin'];
}
if (!empty($_POST['heure_debut'])){
	$_SESSION['heure_debut']= $_POST['heure_debut'];
}
if (!empty($_POST['heure_fin'])){
	$_SESSION['heure_fin']= $_POST['heure_fin'];
}
if (!empty($_POST['appart'])){
	
	$_SESSION['idappart']= $_POST['appart'];
	
}

?>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="module3">
	<div class ="module form-block">
		<a href="index.php?page=accueil">
			<div class="form">
		<h2>Pour voir vos scénarios, cliquez ici</h2></a>
		<h1>Vous allez pouvoir configurer votre scénario :</h1>
		
		<?php
		if (isset($_SESSION['nom_scenar'])){
		if (isset($_SESSION['recurrence'])&&$_SESSION['recurrence']!='rien'){
		if ($_SESSION['recurrence']=='Non'){
			$_SESSION['true_rec']='Non';
		if (!empty($_SESSION['date_debut']) && !empty($_SESSION['date_fin'])){
		if (isset($_SESSION['idappart'])){
			if($_SESSION['idappart']!= 'rien'){
				if (!isset($_SESSION['sce_pieces'])){
		?>
		<h2>Choisissez des pièces : </h2>
		<form method = "post" action = "">
		<?php
				$appart = $_POST['appart'];
				
				include('Modele/connexion_bdd.php');
				$sql ="SELECT * FROM Pieces WHERE Id_Appartements = '$appart'";
				$i = 0;
				$reqpiece = $mysqli->query($sql);
				$_SESSION['pscenar']=[];
				while ($piece = $reqpiece -> fetch_array(MYSQLI_ASSOC)) {
					
					?>
					<input type="checkbox" id="" name = "options[]" value="<?php echo $piece['Id'] ?>"><?php echo $piece['Nom'] ?><br>
					<?php
				}
				?>
				<input type="submit" name="pieces" value = "Etape suivante">
				</form>
				<?php	
			}
			else {
				include 'Vue/programmation.php';
			}	
		}
		}
		else {
			?>
			<h2>Séléctionnez un appartement :</h2>
			<form id ="myform" method = "post">
			<select name = 'appart' style = 'position: relative' onchange="change()">
				<option value="rien">--</option>
				<?php 
				include('Modele/connexion_bdd.php');
				$result = $mysqli->query("SELECT * FROM Appartements WHERE Id_Utilisateur = '$iduser'");
				while ($donnees = $result ->fetch_array(MYSQLI_ASSOC)){
				?>
			    <option value="<?php echo $donnees['Id'] ?>"><?php echo $donnees['Nom'] ?></option>
			    
			    <?php
			}
			?>
			</select>
			<script>
			function change(){
			    document.getElementById("myform").submit();
			}
			</script>
		</form>
		<?php
		}
		}
		else
		{
			?>
			<form method = "post">
			<h2>Sélectionnez une date de début : </h2>
			<input type="date" name="date_debut" placeholder ="jj/mm/aaaa"><br>
			<input type="time" name="heure_debut" placeholder ="hh:mm">
			<h2>Sélectionnez une date de fin : </h2>
			<input type="date" name="date_fin" placeholder ="jj/mm/aaaa"><br>
			<input type="time" name="heure_fin" placeholder ="hh:mm"><br>
			<input type="submit" name="date" value = "Etape suivante">
			</form>
			<?php
		}
		}
		else {
			
			?>
			<form id ="" method = "post">
			<h2>Chosissez le jour de début :</h2><br>
			<select name = 'date_debut' style = 'position: relative' >
				<option value="Lundi">Lundi</option>
				<option value="Mardi">Mardi</option>
				<option value="Mercredi">Mercredi</option>
				<option value="Jeudi">Jeudi</option>
				<option value="Vendredi">Vendredi</option>
				<option value="Samedi">Samedi</option>
				<option value="Dimanche">Dimanche</option>
			</select><br>
			<input type="time" name="heure_debut" placeholder ="hh:mm"><br>
			<h2>Chosissez le jour de fin :</h2><br>
			<select name = 'date_fin' style = 'position: relative' >
				<option value="Lundi">Lundi</option>
				<option value="Mardi">Mardi</option>
				<option value="Mercredi">Mercredi</option>
				<option value="Jeudi">Jeudi</option>
				<option value="Vendredi">Vendredi</option>
				<option value="Samedi">Samedi</option>
				<option value="Dimanche">Dimanche</option>
			</select><br>
			<input type="time" name="heure_fin" placeholder ="hh:mm"><br>
			<br>
			<input type="submit" name="date" value = "Etape suivante">
		</form>
		<?php
		$_SESSION['true_rec'] = $_SESSION['recurrence'];
		$_SESSION['recurrence']='Non';
		}
		}
		else
		{
		?>
		<h2>Ce scénario doit-il être récurent ?</h2>
		<form id ="myform2" method = "post">
			<select name = 'recurrence' style = 'position: relative' onchange="change2()">
				<option value="rien">--</option>
				<option value="Oui">Oui</option>
				<option value="Non">Non</option>
			</select>
			<script>
			function change2(){
			    document.getElementById("myform2").submit();
			}
			</script>
		<?php
		}
		}
		else {
		?>
		<form method = "post">
			<h2>Entrez le nom du scénario : </h2>
			<input type = "text" name = "nom" placeholder = "Nom">
			<input type ="submit" name = "valid_nom" value = "Valider">
		</form>

		<?php
		}
		?>
		<br><br>
		<p>Merci d'annuler avant de changer de page</p>
		<form method = "post" action = "Controleur/annul_scenar.php?page=scenarios"><input type = "submit" name ="annuler" value ="Annuler"></form>
		<br><br><br>
		<?php if(isset($_SESSION['nom_scenar'])) {?>
		<p>Nom du scénario : <?php echo $_SESSION['nom_scenar'] ?></p>
		<p>Scénario récurrent : <?php echo $_SESSION['true_rec'] ?></p>
		<p>Date de début : <?php echo $_SESSION['date_debut'] ?></p>
		<p>Date de fin : <?php echo $_SESSION['date_fin'] ?></p>
		<p>Appartement : <?php echo $_SESSION['idappart'] ?></p>
		<?php }?>
	</div>
	</div>
	</div>
</body>
</html>