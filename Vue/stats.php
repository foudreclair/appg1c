<?php
$titre = "Domicile | Statistiques";

include 'gabarit.php';
$iduser = $_SESSION['id'];
function php2js($var) {
    if (is_array($var)) {
        $res = "[";
        $array = array();
        foreach ($var as $a_var) {
            $array[] = php2js($a_var);
        }
        return "[" . join(",", $array) . "]";
    }
    elseif (is_bool($var)) {
        return $var ? "true" : "false";
    }
    elseif (is_int($var) || is_integer($var) || is_double($var) || is_float($var)) {
        return $var;
    }
    elseif (is_string($var)) {
        return "\"" . addslashes(stripslashes($var)) . "\"";
    }
    // autres cas: objets, on ne les gère pas
    return FALSE;
}
?>
<div class="module3">
	<div class="module form-block">
		<h1>Choisissez le capteur :</h1>
    <form id = "choixcapt" method = "post" action ="">
    <select name ="capt" onchange="change()">
    <option>--</option>
    <?php
    include 'Modele/connexion_bdd.php';
    $reqappart = $mysqli->query("SELECT * FROM Appartements WHERE Id_Utilisateur = '$iduser'");
    while($appart = $reqappart ->fetch_array(MYSQLI_ASSOC)){
      echo $appart['Nom'];
      $idappart = $appart['Id'];
      $reqpie = $mysqli->query("SELECT * FROM Pieces WHERE Id_Appartements = '$idappart'");
      while($pie = $reqpie ->fetch_array(MYSQLI_ASSOC)){
        $idpie = $pie['Id'];
        $reqaffec = $mysqli->query("SELECT * FROM Affectation WHERE Id_Pieces = '$idpie'");
        while($affec = $reqaffec ->fetch_array(MYSQLI_ASSOC)){
          $idcapt = $affec['Id'];
          $idfonc = $affec['Id_Fonctionnalite'];
          $reqnomcapt = $mysqli->query("SELECT * FROM Capteur WHERE Id = '$idcapt'");
          while($capt = $reqnomcapt ->fetch_array(MYSQLI_ASSOC)){
            $captnom = $capt['Nom'];
          }
          $reqnomfonc = $mysqli->query("SELECT * FROM Fonctionnalite WHERE Id = '$idfonc'");
          while($fonc = $reqnomfonc ->fetch_array(MYSQLI_ASSOC)){
            $foncnom = $fonc['Nom'];
          }
          ?>

          <option value = "<?php echo $idcapt ?>"><?php echo $appart['Nom'] ?> // <?php echo $pie['Nom'] ?> // <?php echo $captnom ?> (<?php echo utf8_encode($foncnom) ?>)</option>
          <?php
        }
        ?>
        
        <?php

      }
    }

    ?>
    </select>
    </form>
    <script>
      function change(){
          document.getElementById("choixcapt").submit();
      }
      </script>
		<br>

<?php

if (isset($_POST['capt'])){
  $capt = $_POST['capt'];
  $renom = $mysqli->query("SELECT * FROM Capteur WHERE Id = '$capt'");
  while($captn = $renom ->fetch_array(MYSQLI_ASSOC)){
    $nomcapt = $captn['Nom'];
  }
  $repi = $mysqli->query("SELECT * FROM Affectation WHERE Id = '$capt'");
  while($pi = $repi ->fetch_array(MYSQLI_ASSOC)){
    $piid = $pi['Id_Pieces'];
  } 
  $repie = $mysqli->query("SELECT * FROM Pieces WHERE Id = '$piid'");
  while($piec = $repie ->fetch_array(MYSQLI_ASSOC)){
    $pinom = $piec['Nom'];
    $idapp = $piec['Id_Appartements'];
  } 
  $reapp = $mysqli->query("SELECT * FROM Appartements WHERE Id = '$idapp'");
  while($app = $reapp ->fetch_array(MYSQLI_ASSOC)){
    $appnom = $app['Nom'];
  }  
  $ref = $mysqli->query("SELECT * FROM Affectation WHERE Id = '$capt'");
  while($af = $ref ->fetch_array(MYSQLI_ASSOC)){
    $idf = $af['Id_Fonctionnalite'];
  }
  $refon = $mysqli->query("SELECT * FROM Fonctionnalite WHERE Id = '$idf'");
  while($fo = $refon ->fetch_array(MYSQLI_ASSOC)){
    $fonctnom = $fo['Nom'];
  }
  $requnit = $mysqli->query("SELECT * FROM Statistiques WHERE Id_Capteur = '$capt'");
  $stat = [];
  while($st = $requnit ->fetch_array(MYSQLI_ASSOC)){
    $unite = $st['Type'];
    array_push($stat, [$st['Date'],$st['Valeur']]);
  }
?>
<h2>Capteur : <?php echo utf8_encode($nomcapt) ?></h2>
<h2>Pièce : <?php echo utf8_encode($pinom) ?></h2>
<h2>Appartement : <?php echo utf8_encode($appnom) ?></h2>
    <script type="text/javascript"
			src="https://www.gstatic.com/charts/loader.js"></script>
		<div id="chart_div"></div>
		<script>
  for (var i = 0; i < 2; i++) {
  google.charts.load('current', {packages: ['corechart', 'line']});
  google.charts.setOnLoadCallback(drawBasic);
  }

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'X');
      data.addColumn('number', '<?php echo utf8_encode($fonctnom) ?>');
      <?php

      foreach ($stat as $key => $value) {
        # code...
      
        ?>
        data.addRows([["<?php echo $value[0] ?>",<?php echo $value[1] ?>]]);
        <?php
      }
      ?>
      

      var options = {
        hAxis: {
          title: 'Date'
        },
        vAxis: {
          title: '<?php echo $unite ?>'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);

    }
    </script>
    <?php
  }
    ?>
		<br>
		<br>
    
</div>
</div>
