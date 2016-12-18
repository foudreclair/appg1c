<?php
require('connexion_bdd.php');

function select_user($user) {
	$result = $mysqli->query('SELECT Id, Password FROM utilisateur where Mail="' .$mail.'"');
	return $result;
}

?>