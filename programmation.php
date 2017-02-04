<?php

echo 'Vous êtes sur la programmation !';
foreach ($_SESSION['sce_pieces'] as $key => $value) {
	

$sql ="SELECT * FROM Affectation WHERE Id_Pieces = '$value'";
$reqcapteur = $mysqli->query($sql);
while ($capt = $reqcapteur ->fetch_array(MYSQLI_ASSOC)) {
	$id_capteur = $capt['Id_Capteur'];
	$id_fonc = $capt['Id_Fonctionnalite'];
	$id_piece = $capt['Id_Pieces'];

	$sqlcapt ="SELECT * FROM Capteurs WHERE Id = '$id_capteur'";
	$reqcapteur = $mysqli->query($sql);
	$capt_nom = $reqcapteur -> fetch_array(MYSQLI_ASSOC);
	$nom_capt = $capt_nom['Nom'];

	$sqlpiece ="SELECT * FROM Pieces WHERE Id = '$id_piece'";
	$reqpiece = $mysqli->query($sql);
	$piece_nom = $reqpiece -> fetch_array(MYSQLI_ASSOC);
	$nom_piece = $piece_nom['Nom'];

	$sqlpiece ="SELECT * FROM Fonctionnalite WHERE Id = '$id_fonc'";
	$reqfonc = $mysqli->query($sql);
	$fonc_nom = $reqfonc -> fetch_array(MYSQLI_ASSOC);
	$nom_fonc = $fonc_nom['Nom'];
?>
<div class = "capt">
	<ul>
		
		<li>Nom du capteur : <?php echo $nom_capt ?></li>
		<li>Pièce : <?php echo $nom_piece ?></li>
		<li>Type : <?php echo $nom_fonc ?></li>
		<p>Valeur demandée : </p>
		<form method = "post" action = "Controleur/modifications.php?id=<?php echo $val[$key][0]['Id'] ?>">
			<input type ="text" name = "consigne" placeholder = "<?php echo $val[$key][0]['Consigne'] ?>">
			<input type = "submit" name = 'Modifier' value = "Modifier">
		</form>
		
	</ul>
	</div>
<?php
}
}
?>