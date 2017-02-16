<?php
$titre = "Domisep | Contact";
include 'gabarit.php';

if (isset ( $_POST ["email"] ) and isset ( $_POST ["name"] ) and isset ( $_POST ["objet"] )) {
	include ('Controleur/send_mail.php');
	$email = htmlspecialchars($_POST ["email"]);
	$name = htmlspecialchars($_POST ["name"]);
	$objet = htmlspecialchars($_POST ["objet"]);
	$message = htmlspecialchars($_POST ["body"]);
	sendMail($_POST ["email"], $_POST ["objet"], $_POST ["body"],$_POST["name"]);
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
			<p>Suivez-nous sur les réseaux sociaux :</p>
			<!--boutton youtube -->
			<p>Notre chaîne YouTube</p>
			<script src="https://apis.google.com/js/platform.js"></script>
			<div class="g-ytsubscribe" data-channelid="UCjjcGKR9mVnNxyWZSVWVO5A" data-layout="default" data-count="default"></div>
			<!-- boutton facebook-->
				<p>Notre FaceBook</p>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
  			var js, fjs = d.getElementsByTagName(s)[0];
  			if (d.getElementById(id)) return;
  			js = d.createElement(s); js.id = id;
  			js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
  			fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like" data-href="https://www.facebook.com/Domisep-1204103683040258/?ref=aymt_homepage_panel&amp;__mref=message_bubble" data-width="200" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		</div>
		<br />
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
