<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="account.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   </head>
   <?php include '../navbar/navbar.php' ?>
   <body>
      <div id="main_container">
         <?php
            if(!isset($_SESSION['id'])){
               ?>
         <div id='account'>
            <svg  width="80" height="80" fill="#068da5" viewBox="0 0 16 16">
               <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
               <path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
            </svg>
            <span class='empty'>Not Logged In </span>
            <div class="link"><a href="../login/login.php">Login In</a></div>
         </div>
         <?php
            }
            else{
                $id = $_SESSION['id'];
                $link = mysqli_connect ('localhost', 'root', '','web3_project')
            or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
            
            
            $query = "SELECT count(*) FROM orders o, carts c  WHERE c.idclient = ".$_SESSION['id'] ." and c.idcart = o.idcart";
                $result_client = mysqli_query($link,$query);
                $nbr1= mysqli_fetch_row($result_client)[0];
            $query = "SELECT count(*) FROM orders o WHERE idcart = ".$_SESSION['cart'];
                $result_client = mysqli_query($link,$query);
                $nbr2= mysqli_fetch_row($result_client)[0];
                if($nbr1==0 && $nbr2 ==0){
                    ?>
         <div id='account'>
            <svg  width="80" height="80" fill="#068da5" viewBox="0 0 16 16">
               <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
               <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
            <span class='empty'>No Carts Found</span>
            <?php
               }
               else{
               
               $query = "SELECT idcart FROM carts  ";
               $result_carts = mysqli_query($link,$query);
               $carts=[];
               while($row = mysqli_fetch_row($result_carts)){
                   if($row[0] != $_SESSION['cart'])
                   $carts[] = $row[0];
               }
               
               $query = "SELECT DISTINCT idcart FROM orders  ";
               $result_orders = mysqli_query($link,$query);
               $carts_orders=[];
               while($row = mysqli_fetch_row($result_orders)){
                   $carts_orders[] = $row[0];
               }
               
               for($i=0;$i<count($carts);$i++){
                   if(!in_array($carts[$i], $carts_orders)){
                       $query = "DELETE FROM carts WHERE idcart = $carts[$i]";
                       $result_delete = mysqli_query($link,$query);
                   }
               }
               
               $query = "SELECT count(*) FROM orders WHERE idcart = ".$_SESSION['cart'] ;
               $result_count = mysqli_query($link,$query);
               $count = mysqli_fetch_row($result_count)[0];
               if($nbr2 ==0 ){
                       
                       $query = "SELECT idcart, date FROM carts where idclient = $id and idcart != ".$_SESSION['cart'];
                   }
               
                   else
                  { 
                   $query = "SELECT idcart, date FROM carts where idclient = $id ";
                  }
               $result = mysqli_query($link,$query);
               $nbr_carts = mysqli_num_rows($result);
               
               $output="";
               $counter = 0;
               
               while($row = mysqli_fetch_assoc($result)){
                   $counter++;
                   $idcart = $row['idcart'];
                       $output.= "<div class='container'>";
                       $output.= "<table>";
                       $output.= "<caption>CART ".$counter."----------". $row['date']."</caption>";
                       $output.="<tr>";
                       $output.="<th><input type='text' value='Product Name' class='text' readonly></th>";
                       $output.="<th><input type='text' value='QUANTITY' class='text' readonly></th>";
                       $output.="<th><input type='text' value='IMAGE' class='text' readonly></th>";
                       $output.="<th><input type='text' value='PRICE' class='text' readonly></th>";
                       $output.="<th><input type='text' value='DELETE' class='text' readonly></th>";
                       $output.="</tr>";
                       $requete = "SELECT DISTINCT idproduct,sum(quantity) as quantity FROM orders where idcart =$idcart group by idproduct; ";
                       $resultat = mysqli_query($link,$requete);
                       $total = 0;
                       while($ligne = mysqli_fetch_assoc($resultat)){
                           $output.= "<tr>";
                           $output.= "<td width='30%'>";
                           $requete1 = "SELECT c.image , p.name, p.price, p.idproduct FROM products p , categories c where idproduct = ".$ligne['idproduct'] ." and p.idcategorie = c.idcategorie";
                           $resultat1 = mysqli_query($link,$requete1);
                           $row = mysqli_fetch_row($resultat1);
                           $name = $row[1];
                           $product = $row[3];
                           $category = $row[0];
                           $output.= "<input type='text' value='".ucfirst($name)."' class='text' readonly>";
                           $output.= "</td>";
                          
                           $output.= "<td>";
                           $output.= "<input type='text' value='".$ligne['quantity']."' class='text' readonly>";
                           $output.= "</td>";
                           $output.= "<td>";
                           
                           $output.= "<img src='$category/$name.jpg.'>";
                           $output.= "</td>";
               
                           $output.= "<td>";
                           $total += $ligne['quantity']*$row[2];
                           $output.= "<input type='text' value='".$ligne['quantity']*$row[2]." $"."' class='text' readonly>";
                           $output.= "</td>";
               
                           $output.= "<td><span id='".$idcart."' class='".$product."'>";
                           $output.= '<svg  width="36" height="36" fill="#068da5" viewBox="0 0 16 16">
                           <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                           <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                         </svg>';
                           $output.= "</span></td>";
                           $output.= "</tr>";
                       }
                       $output.="<tr>";
                       $output.="<th colspan = 4>";
                       $output.="<input type='text' value='PRODUCTS PRICE' class='text' readonly></th>";
                       $output.="<td><input type='text' value='".($total)." $' class='text' readonly> </td>";
                       $output.="</tr>";
               
                       $requete1 = "SELECT l.fees  FROM clients c, location l  where c.idclient = $id and c.district = l.district and c.governorate = l.governorate";
                       $resultat1 = mysqli_query($link,$requete1);
                       $fees = mysqli_fetch_row($resultat1)[0];
               
                       $output.="<tr>";
                       $output.="<th colspan = 4>";
                       $output.="<input type='text' value='DELIVERY FEES' class='text' readonly></th>";
                       $output.="<td><input type='text' value='".($fees)." $' class='text' readonly></td>";
                       $output.="</tr>";
               
                       $output.="<tr>";
                       $output.="<th colspan = 4>";
                       $output.="<input type='text' value='TOTAL' class='text'></th>";
                       $output.="<td><input type='text' value='".($fees+$total)." $' class='text' readonly></td>";
                       $output.="</tr>";
                       $output.= "</table>";
                       $output.="</div>";
                       
                   }
               echo $output;
               }
               }
               ?>
         </div>
      </div>
      <?php include '../footer/footer.php' ?> 
      <script src="account.js"></script>
   </body>
</html>