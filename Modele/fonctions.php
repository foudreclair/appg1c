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
	//On se connecte à la base de données
	include('connexion_bdd.php');
	//On crée une variable selection qui sera une chaine de caractère contenant tous les colonnes que l'on veut récupérer dans la base
	$selection ='';
	//On ajoute à selection toutes les valeurs du tableau 'quoi', séparés par une virgule
	foreach ($quoi as $key => $value) {
		$selection .= $value;
		$selection .= ',';
	}
	//On enlève la dernière virgule
	$selection = substr($selection, 0, -1);
	//On effectue la sélection dans la table demandée
	$result = $mysqli->query('SELECT '.$selection .' FROM '.$table.' where '.$cond);
	//On récupère un tableau associant le nom des colonnes aux valeurs qu'elle contiennent
	$donnees = $result ->fetch_array(MYSQLI_ASSOC);
	return $donnees;
	$result -> close();

}

function insertion($table,$quoi,$valeurs) {
	echo '/////insertion : ';
	//On se connecte à la base de données
	include('connexion_bdd.php');
	//Idem, on crée une variable selection (qui représente enfaite ce qu'on veut insérer)
	$selection ='';
	foreach ($quoi as $key => $value) {
		$selection .= $value;
		$selection .= ',';
	}
	$selection = substr($selection, 0, -1);
	//On crée une chaine de caractère qui représente les valurs à insérer, avec la mise en forme (parenthèse et quotes)
	$vaexec = "(";
	foreach ($valeurs as $key => $value) {
		$vaexec.="'";
		$vaexec.= $value;
		$vaexec.="'";
		$vaexec.= ',';
	}
	$vaexec = substr($vaexec, 0, -1);
	$vaexec .= ")";
	//On assemble la commande sql
	$sql = "INSERT INTO ".$table."(".$selection.") VALUES".$vaexec."";
	//On execute la commande
	$req = $mysqli->query($sql);

	

}

?>