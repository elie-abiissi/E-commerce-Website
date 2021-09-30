<?php
   if(isset($_GET['id']) && !empty($_GET['id'])){
       $id = strtolower($_GET['id']);
       $productdeleted = "Product has been deleted successfully";
       $link = mysqli_connect("localhost", "root", "", "web3_project");
       // get the product name then its category name  
       $query = "SELECT p.name,c.name  FROM products p, categories c where idproduct = ".$id ." and p.idcategorie = c.idcategorie";
   $result = mysqli_query($link,$query);
   $row =  mysqli_fetch_row($result);
   $name = $row[0];
   $category = $row[1];
   // delete the product from database
       
   $image = "../../images/$category/$name".".jpg";
   // delete the image related to this product
   if (file_exists($image)){
   unlink( $image);
   }
   else{
   $productdeleted = "Product has not been deleted";
   }
   $query = "DELETE FROM orders WHERE idproduct = $id";
   $result = mysqli_query($link, $query);
   $query = "DELETE FROM products WHERE idproduct = $id";
       if($result = mysqli_query($link, $query)){
       }
       else{
           $productdeleted = "Product has not been deleted";
       }
   
   header("Location:product.php?productdeleted=$productdeleted");
   }
   ?>