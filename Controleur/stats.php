<?php

include('Modele/connexion_bdd.php');

$stattot=[];
$statnom =[];
$resultstattot = $mysqli->query("SELECT DISTINCT Type FROM Statistiques");
//print_r($resultstattot);
while ($statstot = $resultstattot ->fetch_array(MYSQLI_ASSOC)) {
	//print_r($statstot);
	$type = $statstot['Type'];
	$stat=[];
	array_push($statnom, $type);
	$resultstat = $mysqli->query("SELECT * FROM Statistiques WHERE Type = '$type' ");
	while ($stats = $resultstat ->fetch_array(MYSQLI_ASSOC)){
		array_push($stat, $stats['Valeur']);
	}
	array_push($stattot, $stat);
}


function php2js($var) {
    if (is_array($var)) {
        $res = "[";
        $array = array();
        foreach ($var as $a_var) {
            $array[] = php2js($a_var);
        }
        return "[" . join(",", $array) . "]";
    }
    elseif (is_bool($var)) {
        return $var ? "true" : "false";
    }
    elseif (is_int($var) || is_integer($var) || is_double($var) || is_float($var)) {
        return $var;
    }
    elseif (is_string($var)) {
        return "\"" . addslashes(stripslashes($var)) . "\"";
    }
    // autres cas: objets, on ne les gère pas
    return FALSE;
}



include 'Vue/stats.php';
?>