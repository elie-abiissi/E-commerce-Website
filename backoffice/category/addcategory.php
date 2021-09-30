<?php
   if(isset($_POST['cat_name']) && isset($_FILES['cat_photo']) && $_FILES['cat_photo']['error'] ==0 ){
       if(!empty($_POST['cat_name']) && !empty($_FILES['cat_photo'])){
           $catname = strtolower($_POST['cat_name']);
           $catphoto = $_FILES['cat_photo']['name'];
           $connect = mysqli_connect("localhost", "root", "", "web3_project");  
           $query = "SELECT count(*) from categories where name = '".$catname."'";
           $result = mysqli_query($connect, $query);
           $count = mysqli_fetch_row($result)[0];
           if($count == 0){
             mkdir("../../images/$catname");
   if(move_uploaded_file($_FILES['cat_photo']['tmp_name'],"../../mainpage/images/$catname.jpg")){
        if(preg_match("/'/",$catname)){
          $catname=str_replace("'","&apos;",$catname);
      }
      if(preg_match("/\"/",$catname)){
        $catname=str_replace("\"","&quot;",$catname);
      }
           $query = "INSERT INTO categories (name,image)VALUES('".$catname."', '../images/".$catname."/');";  
   if($result = mysqli_query($connect, $query)){
    header("Location:category.php?addstate=New category added");
   }  
   else{
   header("Location:category.php?addstate=New category not added");
   }
   }
   else{
            header("Location:category.php?addstate=Photo not uploaded");
          }	
        }
          else{
            header("Location:category.php?addstate=Category already exists");
            }
    }
   }
   else{
       header("Location:category.php?addstate=Fill out all fields");
   }
   ?>