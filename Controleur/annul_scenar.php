<?php
session_start();
unset($_SESSION['date_debut']);
unset($_SESSION['date_fin']);
unset($_SESSION['idappart']);
unset($_SESSION['sce_pieces']);
unset($_SESSION['recurrence']);
unset($_SESSION['true_rec']);
unset($_SESSION['recurrence']);
unset($_SESSION['nom_scenar']);

if ($_GET['page']=='scenarios'){
	header('Location:../index.php?page=scenarios');
}
elseif ($_GET['page']=='accueil'){
	header('Location:../index.php?page=accueil');
}
else
{
	header('Location:../index.php?page=accueil');
}
?>
