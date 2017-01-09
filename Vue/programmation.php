<?php
print_r($_SESSION['sce_pieces']);
echo 'Vous êtes sur la programmation !';
echo '<br>';
echo '<br>';
foreach ($_SESSION['sce_pieces'] as $key => $value) {

include('Modele/connexion_bdd.php');
$sql ="SELECT * FROM Affectation WHERE Id_Pieces =$value";
echo '<br>';
echo '<br>';
echo $sql;
$reqcapteur = $mysqli->query($sql);
print_r($reqcapteur);

while ($capt = $reqcapteur ->mysqli_fetch_array(MYSQLI_ASSOC)) {
	echo '<br>';
	

	$id_capteur = $capt['Id'];
	
	$id_fonc = $capt['Id_Fonctionnalite'];
	
	$id_piece = $capt['Id_Pieces'];
	print_r($capt);


	$sqlcapt ="SELECT * FROM Capteur WHERE Id = $id_capteur";
	
	
	$reqcapteur = $mysqli->query($sqlcapt);
	$capt_nom = $reqcapteur -> fetch_array(MYSQLI_ASSOC);
	$nom_capt = $capt_nom['Nom'];
	

	$sqlpiece ="SELECT * FROM Pieces WHERE Id = $id_piece";
	$reqpiece = $mysqli->query($sqlpiece);
	$piece_nom = $reqpiece -> fetch_array(MYSQLI_ASSOC);
	$nom_piece = $piece_nom['Nom'];

	$sqlfonc ="SELECT * FROM Fonctionnalite WHERE Id = $id_fonc";
	$reqfonc = $mysqli->query($sqlfonc);
	$fonc_nom = $reqfonc -> fetch_array(MYSQLI_ASSOC);
	$nom_fonc = $fonc_nom['Nom'];

	echo "Nom capt ".$nom_capt;
?>
<div class = "capt">
	<ul>
		
		<li>Nom du capteur : <?php echo $nom_capt ?></li>
		<li>Pièce : <?php echo utf8_encode($nom_piece) ?></li>
		<li>Type : <?php echo utf8_encode($nom_fonc) ?></li>
		<p>Valeur demandée : </p>
		<form method = "post" action = "">
			<input type ="text" name = "consigne" placeholder = "">
		</form>
		
	</ul>
	
	</div>
	
<?php

}
}

?>

</body>
</html>