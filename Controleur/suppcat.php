<?php
include '../Modele/connexion_bdd.php';

$cat = $_POST['suppc'];
$mysqli ->query("DELETE FROM `bdd`.`Catalogue` WHERE Id_categorie = '$cat'");
$mysqli ->query("DELETE FROM `bdd`.`categories` WHERE `categories`.`Id` = '$cat'");
header('Location: ../index.php?page=catalogue');
?>
