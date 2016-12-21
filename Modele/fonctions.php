<?php

function select_user($user) {
	$bdd = "bdd";
	$user = "root";
	$password = "root";
	
	$mysqli = new mysqli("localhost", $user, $password, $bdd);
	if ($mysqli->connect_errno) {
		echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$result = $mysqli->query('SELECT Id, Mail, Password FROM utilisateur where Mail="' .$user.'"');
	$row = $result->fetch_array(MYSQLI_NUM);
	print_r($row);
	return $row;
	$result->close();
}


function select($table,$quoi,$cond) {
	include('connexion_bdd.php');
	$selection ='';
	foreach ($quoi as $key => $value) {
		$selection .= $value;
		$selection .= ',';
	}
	$selection = substr($selection, 0, -1);
	$result = $mysqli->query('SELECT '.$selection .' FROM '.$table.' where '.$cond);
	$donnees = $result ->fetch_array(MYSQLI_ASSOC);
	return $donnees;
	$result -> close();

}

function insert($table,$quoi,$valeurs) {
	include('connexion_bdd.php');
	$selection ='';
	$va='';
	foreach ($quoi as $key => $value) {
		$selection .= $value;
		$selection .= ',';
		$va .= '?';
		$va .= ',';
	}
	$selection = substr($selection, 0, -1);
	$va = substr($va, 0, -1);
	$req = $mysqli->prepare('INSERT INTO '.$table.'('.$selection.') VALUES('.$va.')');
	$req -> execute($valeurs);

}

?>