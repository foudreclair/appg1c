<?php
$titre = "Domicile | Contact";


include 'gabarit.php';

?>


<div class="contact">
  <form method="post" action="">
    <input type="email" name="email" placeholder="Entrer votre email"></br>
    <input type="text" name"name" placeholder="Entrez votre nom"></br>
    <input type="text" name="objet" placeholder="Entrez l'object du message"></br>
    <input type="text" name="message_complet" placeholder="Entrez votre message"></br>
    <input class="button" type="submit" name="envoyer" value="Envoyer">
  </form>
</div>

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
