<?php
session_start();
unset($_SESSION['date_debut']);
unset($_SESSION['date_fin']);
unset($_SESSION['appart']);
header('Location:../Vue/newscenario.php');
?>