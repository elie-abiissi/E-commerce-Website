<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="cart.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   </head>
   <body>
      <div id="main">
         <div id="close">
            <a href="../backoffice.php">
               <svg  width="30px" height="30px" fill="red"  viewBox="0 0 16 16">
                  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
               </svg>
            </a>
         </div>
         <div id="top">
            <table id="tab">
               <?php
                  $link = mysqli_connect ('localhost', 'root', '','web3_project')
                  or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
                  $counter = 1;
                  $output= "<tr>";
                  $output.= '<th>No Cart</th>';
                      $output.= '<th>Full Name</th>';
                      $output.= '<th>Date</th>';
                      $output.= '<th>View</th>';
                      $output.= "</tr>";
                  $query = "SELECT cl.firstname, cl.lastname, c.date, c.idcart FROM carts c, clients cl where c.idclient = cl.idclient";
                  $result = mysqli_query($link,$query);
                  while($ligne = mysqli_fetch_row($result)){
                      $output.= "<td>".$counter."</td>";
                    $output.= '<td>'.$ligne[0]." ".$ligne[1]."</td>";
                      $output.= "<td>".$ligne[2]."</td>";
                      $output.= '<td><svg id="'.$ligne['3'].'"  width="45" height="45" fill="#068da5"  viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg></td>';
                      $output.= "</tr>";
                      $counter++;
                   }
                   $output.= "</tr>";
                  echo $output;
                  ?>
            </table>
         </div>
         <div id="bottom">
         </div>
      </div>
      <script src="cart.js"></script>
   </body>
</html>