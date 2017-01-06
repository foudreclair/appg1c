<?php
session_start();
$titre = 'Domicile | Créez votre scénario';
include 'gabarit.php';
require 'Modele/fonctions.php';

if(isset($_POST['options'])){
	foreach ($_POST['options'] as $key => $value) {
	$value;
}
}
if (!empty($_POST['date_debut'])){
	$_SESSION['date_debut']= $_POST['date_debut'];
}
if (!empty($_POST['date_fin'])){
	$_SESSION['date_fin']= $_POST['date_fin'];
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
	<div class ="corps">
		<h1>Vous allez pouvoir configurer votre scénario :</h1>
		
		<?php
		if (!empty($_SESSION['date_debut']) && !empty($_SESSION['date_fin'])){
		if (isset($_SESSION['idappart'])){
			if($_POST['appart']!= 'rien'){
		?>
		<h2>Choisissez des pièces : </h2>
		<form method = "post" action = "Vue/varscenar.php">
		<?php
				$appart = $_POST['appart'];
				
				include('Modele/connexion_bdd.php');
				$sql ="SELECT * FROM Pieces WHERE Id_Appartements = '$appart'";
				$i = 0;
				$reqpiece = $mysqli->query($sql);
				while ($piece = $reqpiece -> fetch_array(MYSQLI_ASSOC)) {
					?>
					<input type="checkbox" id="" name = "options[]" value="<?php echo $piece['Nom'] ?>"><?php echo $piece['Nom'] ?><br>
					<?php
				}
				?>
				<input type="submit" name="pieces" value = "Etape suivante">
				</form>
				<?php	
				
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
				$result = $mysqli->query('SELECT * FROM Appartements');
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
			<input type="date" name="date_debut" placeholder ="jj/mm/aaaa">
			<h2>Sélectionnez une date de fin : </h2>
			<input type="date" name="date_fin" placeholder ="jj/mm/aaaa"><br>
			<input type="submit" name="date" value = "Etape suivante">
			</form>
			<?php
		}
		?>
		<br><br><br>
		<p>Date de début : <?php echo $_SESSION['date_debut'] ?></p>
		<p>Date de fin : <?php echo $_SESSION['date_fin'] ?></p>
		<p>Appartement : <?php echo $_SESSION['idappart'] ?></p>

	</div>
</body>
</html>