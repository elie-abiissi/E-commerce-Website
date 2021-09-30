<?php
   if(isset($_GET['idcart']) && !empty($_GET['idcart'])){
       $idcart = $_GET['idcart'];
   
       $link = mysqli_connect ('localhost', 'root', '','web3_project')
           or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));

           $query = "DELETE FROM carts where idcart in (SELECT idcart form orders GROUP BY idcart HAVING count(*) = 0 AND idcart != $idcart)";
           $result = mysqli_query($link,$query);
   
           $query = "DELETE FROM carts WHERE idcart NOT IN(SELECT idcart FROM orders)";
           $result = mysqli_query($link,$query);
   
           $query = "SELECT count(*)  FROM orders where idcart = $idcart ";
           $result = mysqli_query($link,$query);
           $count= mysqli_fetch_row($result)[0];
   if($count>0){
       $query = "SELECT idcart, date FROM carts WHERE idcart = $idcart ";
   
   $result = mysqli_query($link,$query);
   $nbr_carts = mysqli_num_rows($result);
   
   $output="";
   $counter = 0;
   while($row = mysqli_fetch_assoc($result)){
       $counter++;
       $idcart = $row['idcart'];
           $output.= "<table id='cart'>";
           $output.="<tr>";
           $output.="<th><input type='text' value='Product Name' class='text' readonly></th>";
           $output.="<th><input type='text' value='QUANTITY' class='text' readonly></th>";
           $output.="<th><input type='text' value='IMAGE' class='text' readonly></th>";
           $output.="<th><input type='text' value='PRICE' class='text' readonly></th>";
           $output.="</tr>";
           $requete = "SELECT idproduct,quantity FROM orders where idcart = $idcart ";
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
               
               $output.= "<img src='../$category"."$name.jpg'>";
               $output.= "</td>";
   
               $output.= "<td>";
               $total += $ligne['quantity']*$row[2];
               $output.= "<input type='text' value='".$ligne['quantity']*$row[2]." $"."' class='text' readonly>";
               $output.= "</td>";
            $output.= "</tr>";
           }
               $output.="<tr>";
               $output.="<th colspan = 3>";
               $output.="<input type='text' value='PRODUCTS PRICE' class='text' readonly></th>";
               $output.="<td><input type='text' value='".($total)." $' class='text' readonly> </td>";
               $output.="</tr>";
           
           $output.= "</table>";
   echo $output;
   }
   }
   }
   
   ?>