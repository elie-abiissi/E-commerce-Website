<?php
$con = mysqli_connect("localhost","root","","web3_project");
  ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['product', 'price'],
          <?php
         $sql = "SELECT name ,price FROM products ORDER BY price DESC LIMIT 10";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['name']."',".$result['price']."],";
          }

         ?>
        ]);

        var options = {
          title: '10 most expensive products',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 90%; height: 500px;"></div>
  </body>
</html>
