<?php
$titre = "Domisep | Contact";
include 'gabarit.php';

if (isset ( $_POST ["email"] ) and isset ( $_POST ["name"] ) and isset ( $_POST ["objet"] )) {
	include ('Controleur/send_mail.php');
	$email = htmlspecialchars($_POST ["email"]);
	$name = htmlspecialchars($_POST ["name"]);
	$objet = htmlspecialchars($_POST ["objet"]);
	$message = htmlspecialchars($_POST ["body"]);
	sendMail($_POST ["email"], $_POST ["objet"], $_POST ["body"]);
	$text = "Votre mail a bien ete envoye. Nous vous contacterons prochainement !";
}
?>
<div class="module3">
	<div class="form-block">
		<div id="info_client">
			<?php
			if(isset($text)) {
				echo '<font color="green">' . $text . '</font>';
			}
			?>
			<p>Adresse :XX rue XXXXXX</p>
			<p>Horraire : Lundi à Vendredi de 8h à 17h</p>
			<p>Telephone : 01 XX XX XX XX</p>
			<br />
			<p>Suivez-nous sur les réseaux sociaux : <br />
				<a href="https://www.youtube.com/channel/UCjjcGKR9mVnNxyWZSVWVO5A" style="color:#0080FF;"> Notre chaîne YouTube</a><br />
				<a href="https://www.facebook.com/Domisep-1204103683040258/" style="color:#0080FF;">Notre FaceBook</a>
			</p>
		</div>
		<div id="champ_saisie">
			<h2>Nous contacter par email :</h2>
			<form method="post" action="index.php?page=contact">
				<input type="email" name="email" placeholder="Entrer votre email"></br>
				<input type="text" name="name" placeholder="Entrez votre nom"></br>
				<input type="text" name="objet"
					placeholder="Entrez l'object du message"></br>
				<input name="body" id="body"
					placeholder="Entrez votre message"
					style="width: 100%; height: 100px;"></input>
				</br>
				<button class="button" type="submit" name="envoyer">Envoyer</button>
			</form>
		</div>
		<br />
		<h1>Vous pouvez aussi venir nous voir :)</h1>
		<br />
		<iframe width="100%" height="450" frameborder="0" style="border: 0"
			src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBIt8hoxhdyDdXNJSj02q2wnru7iW_75Cg
    &q=I.S.E.P+Institut+Supérieur+d'Electronique+de+Paris"
			allowfullscreen> </iframe>

	</div>
</div>
