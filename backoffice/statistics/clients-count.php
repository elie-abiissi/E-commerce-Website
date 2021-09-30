<?php
$con = mysqli_connect("localhost","root","","web3_project");
  
  
?>
<html>
  <head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          <?php
         $sql = "SELECT count(*) as count from clients ";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['Clients',".$result['count']."],";
          }

         ?>
        ]);

        var options = {
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 300px;"></div>
  </body>
</html>