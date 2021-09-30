
        

<?php
$con = mysqli_connect("localhost","root","","web3_project");
 ?>
<html>
  <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
     
      var data = google.visualization.arrayToDataTable([
        ["Element", "Price", { role: "style" } ],
        <?php
         $colors = array("#3ACBF7", "#3AF75E", "#FB6B6B", "#FBD66B", "#FB6BF4 ", "#AAAAAA", "#F9FF1C", "#00FCA2", "#FC8500", "#FC00AF ");
         $index = 0;
         $sql = "SELECT name ,price FROM products ORDER BY price ASC LIMIT 10";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".ucfirst($result['name'])."',".$result['price'].",'".$colors[$index++]."'],";
          }

         ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "10 most cheap products",
        width: 700,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>

  </head>
  <body>
  <div id="barchart_values" style="width: 100%; "></div>
  </body>
</html>
