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
          ['categories', 'count'],
         <?php
         $sql = "SELECT c.name AS name, count(p.idcategorie) AS count FROM products p , categories c WHERE c.idcategorie = p.idcategorie GROUP BY c.idcategorie;";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['name']."',".$result['count']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Number of products in each category'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width:100%; height:400px"></div>
  </body>
</html>
