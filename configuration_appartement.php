<?php include ('../modele/connexion_bdd.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta charset="utf-8">
</head>
  <body>
    <!- Menu déroulant pour choisir la pièce que l'on veut modifier ->
  <ul id="menu-accordeon">
    <li><a href="#">Appartement #1</a>
    <ul><!- On fait des listes de liste  afin d'avoir la vision en accorde ->
      <li><a href="#">Pièce #1</a></li>
        <ul>
          <li><a href="#">Capteur #1</a></li>
          <li><a href="#">Capteur #2</a></li>
        </ul>
      <li><a href="#">Pièce #2</a></li>
      <li><a href="#">Pièce #3</a></li>
      <li><a href="#">Pièce #4</a></li>
    </ul>
    </li>
    <li><a href="#">Appartement #2</a>
      <ul>
        <li><a href="#">Pièce #1</a></li>
        <li><a href="#">Pièce #2</a></li>
        <li><a href="#">Pièce #3</a></li>
        <li><a href="#">Pièce #4</a></li>
      </ul>
    </li>
    <li><a href="#">Appartement #3</a>
      <ul>
        <li><a href="#">Pièce #1</a></li>
        <li><a href="#">Pièce #2</a></li>
        <li><a href="#">Pièce #3</a></li>
        <li><a href="#">Pièce #4</a></li>
      </ul>
    </li>
  </ul>
</body>
</html>
