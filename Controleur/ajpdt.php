<?php
$cat =  $_POST['ajc'];
$nom = $_POST['nomaj'];
$desc =  $_POST['descriptionaj'];
$eur = $_POST['eur'];
$cent = $_POST['cent'];
$prix = "";
$prix.=strval($eur);
$prix.=",";
$prix.=strval($cent);


include '../Modele/connexion_bdd.php';
$mysqli -> query("INSERT INTO `bdd`.`Catalogue` (`Id`, `Nom`, `Description`, `Prix`, `Id_categorie`) VALUES (NULL, '$nom', '$desc','$prix', '$cat')");
header('Location: ../index.php?page=catalogue');
?>
