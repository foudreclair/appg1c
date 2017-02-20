<?php
$cat = $_POST['suppc'];
include '../Modele/connexion_bdd.php';
$mysqli ->query("DELETE FROM `bdd`.`catalogue` WHERE Id_categorie = '$cat'");
$mysqli ->query("DELETE FROM `bdd`.`categories` WHERE `categories`.`Id` = '$cat'");
header('Location: ../index.php?page=catalogue');
?>