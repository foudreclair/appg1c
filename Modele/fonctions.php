<?php

function select_user($user) {
	include('connexion_bdd.php');
	$result = $mysqli->query('SELECT Id, Password FROM utilisateur where Mail="' .$user.'"');
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
		$va .= ','
	}
	$selection = substr($selection, 0, -1);
	$va substr($va, 0, -1);
	$req = $mysqli->prepare('INSERT INTO '.$table.'('.$selection.') VALUES('.$va.')');
	$req -> execute($valeurs);

}

?>