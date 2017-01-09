<?php
session_start();
unset($_SESSION['date_debut']);
unset($_SESSION['date_fin']);
unset($_SESSION['idappart']);
unset($_SESSION['sce_pieces']);
header('Location:../index.php?page=scenarios');
?>