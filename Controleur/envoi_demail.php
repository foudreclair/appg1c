<?php
if (! empty ( $_POST ['envoyer'] )) { // Si le formulaire est envoyer
	$destinataire = 'domicilecontact@domain.com'; // A modifier par l'adress email du support
	$expediteur = $_POST ['email'];
	$onje = $_POST ['objet'];
  $headers = "From :".$expediteur"\n";
	$headers .= 'Content-type: text/plain; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
	$headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
  $message = "Bonjour'.$_POST['name'].'! \n'.$_POST['message_complet']";
	$message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"";
mail($destinataire, $objet, $message, $headers)) // Envoi du message
echo 'Votre message a bien été envoyé ';
}
?>
