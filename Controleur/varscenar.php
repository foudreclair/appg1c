<?php
session_start();
$_SESSION['date_debut']= $_POST['date_debut'];
$_SESSION['date_fin']= $_POST['date_fin'];
echo 'Valeurs enregistrées';
header('Location:newscenario.php');

?>