<?php
$idpdt = $_POST['pdtsup'];
include '../Modele/connexion_bdd.php';
$mysqli ->query("DELETE FROM `bdd`.`Catalogue` WHERE Id = '$idpdt'");
header('Location: ../index.php?page=catalogue');
?>