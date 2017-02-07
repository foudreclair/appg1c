<?php

echo 'Vous êtes sur la programmation !';
echo '<br>';
echo '<br>';
$tab =[];
?>

<form method = "post" action = "Controleur/newscenario.php">

<?php
foreach ($_SESSION['sce_pieces'] as $key => $value) {

include('Modele/connexion_bdd.php');
$sql ="SELECT * FROM Affectation WHERE Id_Pieces =$value";

$reqcapteur = $mysqli->query($sql);


while ($donnees = $reqcapteur ->fetch_array(MYSQLI_ASSOC)) {

	$id2 = $donnees['Id'];

	$id_piece2 = $donnees['Id_Pieces'];

	$id_fonc2 = $donnees['Id_Fonctionnalite'];

	array_push($tab, ["$id2","$id_piece2","$id_fonc2"]);

}
}
$_SESSION['tab_scenar']= $tab;


foreach ($tab as $key => $value) {

	$id = $value['0'];
	$id_piece = $value['1'];
	$id_fonc = $value['2'];

	$sqlcapt ="SELECT * FROM Capteur WHERE Id = $id";
	$reqcapteur = $mysqli->query($sqlcapt);
	$capt_nom = $reqcapteur -> fetch_assoc();
	$nom_capt = $capt_nom['Nom'];


	$sqlpiece ="SELECT * FROM Pieces WHERE Id = $id_piece";
	$reqpiece = $mysqli->query($sqlpiece);
	$piece_nom = $reqpiece -> fetch_assoc();
	$nom_piece = $piece_nom['Nom'];


	$sqlfonc ="SELECT * FROM Fonctionnalite WHERE Id = $id_fonc";
	$reqfonc = $mysqli->query($sqlfonc);
	$fonc_nom = $reqfonc -> fetch_assoc();
	$nom_fonc = $fonc_nom['Nom'];

	?>

<div class = "capt">
<ul>
<li>Nom du capteur : <?php echo $nom_capt ?></li>
<li>Pièce : <?php echo utf8_encode($nom_piece) ?></li>
<li>Type : <?php echo utf8_encode($nom_fonc) ?></li>
<p></p>

<input type ="text" name = "consigne[]" placeholder = "Valeur demandée">

</ul>
</div>

	<?php
}
?>
<br>
<br>
<input type ="submit" name = "enregistrer" value = "Enregistrer">
</form>
 
