<?php

require('fonctions.php');

$test1 = select('Utilisateur',['*'],'1=1');
echo $test1['Nom'];

$test2 = select('Utilisateur',['Nom','Prenom'],'1=1');
echo $test2['Prenom'];
?>