<?php

$tab=[];
$iduser = $_SESSION['id'];
include 'Modele/connexion_bdd.php';
$req= $mysqli->query("SELECT * FROM utilisateur WHERE id != $iduser");

while ($donne = $req ->fetch_array(MYSQLI_ASSOC)) {
	array_push($tab,$donne);
}
include 'Vue/admin.php';
?>