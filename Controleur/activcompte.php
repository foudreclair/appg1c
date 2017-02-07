<?php
$key = htmlspecialchars($_GET['cle']);
include '../Modele/connexion_bdd.php';
$mysqli ->query("UPDATE `bdd`.`Utilisateur` SET `Activee` = 'Oui' WHERE `utilisateur`.`KeyUser` = '$key'");
header ( 'Location:../index.php?page=connexion&valid' );
?>