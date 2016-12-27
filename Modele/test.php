<?php

require('fonctions.php');

$test1 = select('Utilisateur',['*'],'1=1');
echo $test1['Nom'];
echo $test1['Prenom'];

insertion('Utilisateur',['Nom','Mail', 'Password'],['Encule','encule@gmail.com','Lourd!']);


	
?>