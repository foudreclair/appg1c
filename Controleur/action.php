<?php
//No NEED à supprimer
if ($_POST['validation']=='Valider'){//Si le formulaire est envoyer
$_SESSION['modif_app']=1;
$_SESSION['id_appart']=$_POST['nom_appart'];
header('location:  ../Vue/modifier_appartement.php');
}
if ($_POST['choix_modif']=='Modifier'){//Si le formulaire est envoyer
$_SESSION['modif_app']=2;
$_SESSION['id_appart']=$_POST['nom_appart'];
header('location:  ../Vue/modifier_appartement.php');
}
if($_POST['choix_modif2']=='Modifier'){
$_SESSION['modif_app']=3;
$_SESSION['id_piece']=$_POST['nom_piece'];
header('location: ../Vue/modifier_appartement.php');
}
if($_POST['validation2']=='Valider'){
$_SESSION['modif_app']=4;
$_SESSION['id_piece']=$_POST['nom_piece'];
header('location: ../Vue/modifier_appartement.php');
}
if ($_POST['modi_appartement']=='Modifier') {
echo 'troll'
# code...
}
 ?>
