<?php
$titre = "Domicile | Contact";
include 'gabarit.php';
?>
<div class ="corps">
<div id="info_client">
  <p>Adresse : XX rue XXXXXX, 75006 PARIS</p>
  <p>Horraire : Lundi à Vendredi de 8h à 17h</p>
  <p>Telephone : 01 XX XX XX XX</p>
</div>
<div id="champ_saisie">
  <form method="post" action=".../Controleur/envoie_demail.php">
    <input type="email" name="email" placeholder="Entrer votre email"></br>
    <input type="text" name"name" placeholder="Entrez votre nom"></br>
    <input type="text" name="objet" placeholder="Entrez l'object du message"></br>
    <textarea name="message_complet" rows="5" cols="30" placeholder="Entrez votre message"></textarea></br>
    <input class="button" type="submit" name="envoyer" value="Envoyer">
  </form>
</div>

</select>
<div id="plan">
 <iframe
  width="500"
  height="350"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBIt8hoxhdyDdXNJSj02q2wnru7iW_75Cg
    &q=I.S.E.P+Institut+Supérieur+d'Electronique+de+Paris" allowfullscreen>
</iframe>

</div>
</div>

<?php include 'Vue/footer.php'?>
