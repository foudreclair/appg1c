<?php
include 'gabarit.php';
include 'Modele/connexion_bdd';
$result = $mysqli->query('SELECT * FROM Programmation');
while($donnees = $result ->fetch_array(MYSQLI_ASSOC)){
?>

<div class = "corps">
	<div class = "capt">
	<ul>
		
		<li>Date de début :  <?php echo $val[$key][0]['Id_Capteur'] ?></li>
		<li>Date de fin :  <?php echo $val[$key][0]['Id_Pieces'] ?></li>
		<li>Heure de début :  <?php echo $val[$key][0]['Id_Pieces'] ?></li>
		<li>Heure de fin :  <?php echo $val[$key][0]['Id_Pieces'] ?></li>
		<li>Type : <?php echo utf8_encode($val[$key][0]['Id_Fonctionnalite'][0])?></li>
		<p>Valeur demandée : </p>
		<form method = "post" action = "Controleur/modifications.php?id=<?php echo $val[$key][0]['Id'] ?>">
			<input type ="text" name = "consigne" placeholder = "<?php echo $val[$key][0]['Consigne'] ?>">
			<input type = "submit" name = 'Modifier' value = "Modifier">
		</form>
		
	</ul>
	</div>
</div>
<?php
}
?>