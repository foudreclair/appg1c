<?php
$bdd = "bdd";
$user = "root";
$password = "root";

$mysqli = new mysqli("localhost", $user, $password, $bdd);
if ($mysqli->connect_errno) {
	echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}	

	
?>