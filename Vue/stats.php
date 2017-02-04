<?php
$titre = "Domicile | Statistiques";

include 'gabarit.php';
$iduser = $_SESSION['id'];

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

          <option value = "<?php echo $idcapt ?>"><?php echo $appart['Nom'] ?> // <?php echo $pie['Nom'] ?> // <?php echo $captnom ?> (<?php echo $foncnom ?>)</option>
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
  $idcapt = $_POST['capt'];
  include 'Modele/connexion_bdd.php';
  $reqaffect = $mysqli->query("SELECT * FROM Affectation WHERE Id = '$idcapt'");
  while ($fonct = $reqaffect ->fetch_array(MYSQLI_ASSOC)){
    $idfonct = $fonct['Id_Fonctionnalite'];
  }
  
  $reqfonct =$mysqli->query("SELECT * FROM Fonctionnalite WHERE Id = '$idfonct");
  while ($fon = $reqfonct ->fetch_array(MYSQLI_ASSOC)){
    $fonnom = $fon['Nom'];
  }
  
  echo $fonnom;


?>

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
      data.addColumn('number', 'X');
      data.addColumn('number', 'Dogs');

      data.addRows([
        [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
        [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
        [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
        [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
        [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
        [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
        [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
        [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
        [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
        [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
        [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
        [66, 70], [67, 72], [68, 75], [69, 80]
      ]);

      var options = {
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Popularity'
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
<?php include 'footer.php' ?>
