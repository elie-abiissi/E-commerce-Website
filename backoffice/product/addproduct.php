<?php
   $prodname = strtolower($_POST['prod_name']);
   $description = $_POST['description'];
   $price = $_POST['price'];
   $stock = $_POST['stock'];
   $category = $_POST['cat'];
   
   if(isset($_POST['prod_name']) && isset($_FILES['prod_photo'])  && isset($_POST['description'])
       &&  isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['cat'])
       && !empty($_POST['prod_name']) && !empty($_FILES['prod_photo']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['stock']) && !empty($_POST['cat'])){
         
           $prodname = strtolower($_POST['prod_name']);
           $description = $_POST['description'];
           $price = $_POST['price'];
           $stock = $_POST['stock'];
           $category = $_POST['cat'];
   
      if($price>0){
              $prodphoto = $_FILES['prod_photo']['name'];
              $connect = mysqli_connect("localhost", "root", "", "web3_project");  
              $query = "SELECT name from categories where idcategorie = $category";
              $result = mysqli_query($connect, $query);
              $name = mysqli_fetch_row($result)[0];
              
              
              $query = "SELECT count(*) from products where name = '".$prodname."'";
              
              $result = mysqli_query($connect, $query);
              $count = mysqli_fetch_row($result)[0];
   
              if($count == 0){
                
      if(move_uploaded_file($_FILES['prod_photo']['tmp_name'],"../../images/$name/$prodname.jpg")){
              
              if(preg_match("/'/",$description)){
               $description=str_replace("'","&apos;",$description);
           }
           if(preg_match("/\"/",$description)){
               $description=str_replace("\"","&quot;",$description);
           }
              $query = "INSERT INTO products (name,description,price, stock, idcategorie)VALUES('".$prodname."', '".$description."',".$price.",".$stock.",".$category.");"; 
              if($result = mysqli_query($connect, $query)){
                   header("Location:product.php?addprod=New product added");
                  }  
                  else{
                  header("Location:product.php?addprod=New product not added");
                  }
              echo $query."<br>";
              }
              else{
               header("Location:product.php?addprod=Photo not uploaded");
              } 
           
             } 
             else{
               header("Location:product.php?addprod=Product already exists");
           }     
        }else{
           header("Location:product.php?addprod=Price must be greater than 0");
       }
              
    }
       
      ?>