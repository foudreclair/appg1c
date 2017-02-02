<?php
$titre = "Domicile | Statistiques";


include 'gabarit.php';
print_r($stattot);
print_r($statnom);

?>
<div class ="corps">
	<h1>Consultez vos dernières valeurs et statistiques :</h1><br>
<?php

foreach ($statnom as $key => $value) {
/*
$tabnom = "['Degré','Lux']";

$titretable = $value['0'];*/
$tabtest1 = [[1,120],[2,8],[3,2]];
$tabtest = php2js($tabtest1);
echo $value;
?>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

      data.addRows(<?php echo $tabtest ?>);

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
    <br><br>
    <?php
    
}

?>
</div>