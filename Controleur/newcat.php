<?php
include '../Modele/connexion_bdd.php';

$nom = $_POST['nom'];
$description = $_POST['description'];
//echo $nom;
//echo $description;
$mysqli -> query("INSERT INTO `bdd`.`categories` (`Id`, `Nom`, `Description`) VALUES (NULL, '$nom', '$description')");
header('Location: ../index.php?page=catalogue');

?>