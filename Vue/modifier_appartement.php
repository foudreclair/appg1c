<?php
//ajouter le modele de la page d'ADRIEN

/*On doit pouvoir modifier:
NOM/ADRESSE/type /nb_personne( à quoi cela nous sert ?)
ajouter supprimer et visualiser les pièce
ajouter des capteurs dans les dites pièce  .?
*/
$titre = "Domisep | Modifier un appartement";
include 'gabarit.php';

include 'Modele/connexion_bdd.php';
include 'Controleur/traitement.php';
$contenu="";
try {
  $bdd=new PDO('mysql:host=localhost;dbname=bdd','root','root');
}
catch (Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

?>
<body>
  <div class = "corps">
  <div id="menu_1">
  <h2>Liste des appartement</h2>
  <form method="post" action="../Controleur/action.php">
    <label for="nom">Choix de l'appartement :</label>
    <select name="nom_appart" id="nom_appart">
      <?php
      $reponse = $mysqli->query('SELECT * FROM Appartements');
      while($donnees = $reponse->fetch_assoc()) {
              ?>
      <option value="<?php echo $donnees['Nom']; ?>"><?php echo $donnees['Nom'];?></option>
        <?php
      }

    // vider donner si sa ram trop
      ?>
    </select>
    </br>
    <p>Nouveau nom attribuer à l'appartement :</p>
    <input type="text" name="new_name"></br>
    <!--<input class="button" type="submit" name="add_appartement"value="Ajouter">-->
    <input class="button" type="submit" name="modi_appartement"value="Modifier">
    <!--<input class="button" type="submit" name="dell_appartement"value="Supprimer">-->
  </from>
  </div>



</div>


</body>
<?php include 'footer.php' ?>
