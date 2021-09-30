<?php
$con = mysqli_connect("localhost","root","","web3_project");
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'FirstName');
        data.addColumn('string', 'LastName');
        data.addColumn('string', 'Date');
        data.addColumn('string', 'Cart Cost');
        data.addRows([
            <?php
         $sql = "SELECT  c.firstname as fn, c.lastname as ln, ca.date as date, sum(p.price) as cost from orders o, clients c, carts ca, products p where ca.idclient = c.idclient and o.idcart = ca.idcart and o.idproduct = p.idproduct group BY (o.idcart) ORDER BY cost DESC";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['fn']."','".$result['ln']."','".$result['date']."','".$result['cost']."$'],";
          }

         ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '1000px', height: '300px'});
      }
    </script>
  </head>
  <body>
    <div id="table_div"></div>
  </body>
</html>