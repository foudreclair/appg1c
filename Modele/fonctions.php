<?php

function select_user($user) {
	include('connexion_bdd.php');
	$result = $mysqli->query('SELECT Id, Password FROM utilisateur where Mail="' .$user.'"');
	$row = $result->fetch_array(MYSQLI_NUM);
	print_r($row);
	return $row;
	$result->close();
}

?>