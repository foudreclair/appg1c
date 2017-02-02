<?php
$titre = "Domicile | Contact";
<<<<<<< HEAD
=======

>>>>>>> origin/master


include 'gabarit.php';

?>


include 'gabarit.php';
?>
<!--bon les gars j'arrive pas à lier le css avec ça je sais pas pourquoi, quoi que je mette il se passe rien essayer et on en parle -->
<<<<<<< HEAD
=======

>>>>>>> origin/master
<div id=info_client>
  <p>Adresse :XX rue XXXXXX</p>
  <p>Horraire : Lundi à Vendredi de 8h à 17h</p>
  <p>Telephone : 01 XX XX XX XX</p>
</div>
<div class="contact">
  <form method="post" action="">

</div>
<div id=champ_saisie>
  <form method="post" action=".../Controleur/envoie_demail.php">
<<<<<<< HEAD
=======

>>>>>>> origin/master
    <input type="email" name="email" placeholder="Entrer votre email"></br>
    <input type="text" name"name" placeholder="Entrez votre nom"></br>
    <input type="text" name="objet" placeholder="Entrez l'object du message"></br>
    <input type="text" name="message_complet" placeholder="Entrez votre message"></br>
    <input class="button" type="submit" name="envoyer" value="Envoyer">
  </form>
</div>

<<<<<<< HEAD
=======

>>>>>>> origin/master
<?php
/////////////// A COUPER ET METTRE DANS UN FICHIER DANS LE CONTROLER
/////////////// ET L'AJOUTER EN TANT QUE CIBLE DE CE forme
if(!empty($_POST['envoyer'])){ //Si le formulaire est envoyer
  $destinataire = 'domicilecontact@domain.com';// A modifier par l'adress email du support class_implements
  $expediteur = $_POST['email'];
  $objet = $_POST['objet'];
  $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
  $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
  $message = '<div style="width: 100%; text-align: center; font-weight: bold"> Bonjour'.$_POST['name'].'! \n'.$_POST['message_complet'].'</div>';
  if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
    {
      echo 'Votre message a bien été envoyé ';
    }
  else // Non envoyé
    {
      echo "Votre message n'a pas pu être envoyé";
    }
}
?>
<<<<<<< HEAD
=======

>>>>>>> origin/master
</select>
<div id=plan>
    <img src="https://www.jeedom.com/market/filestore/market/widget/images/dashboard.info.string.maps.jpg" alt="Plan autour de votre entreprise" style="width:250px;height:250px;">
</div>
