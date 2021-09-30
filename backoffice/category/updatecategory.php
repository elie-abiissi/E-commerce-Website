<?php
if(isset($_POST['category_name']) && !empty($_POST['category_name']) 
  && isset($_POST['new_name']) && !empty($_POST['new_name'])){
        $update ="Category has been updated successfully";
        $catid = $_POST['category_name'];
        $catname = strtolower($_POST['new_name']);
        $connect = mysqli_connect("localhost", "root", "", "web3_project");  
        $query = "SELECT name from categories where idcategorie = $catid";
        echo $query."<br>";
        $result = mysqli_query($connect, $query);
        $name = mysqli_fetch_row($result)[0];

        $image = $_FILES['image']['name'];
        

        echo "name : ". $catname."<br>";
        echo "id : ".$catid."<br>";
        echo "image : ".$image."<br>";

    
        echo $name."<br>";
        $query = "UPDATE categories SET name = '".$catname."' where idcategorie = $catid";
        echo $query."<br>";
        $result = mysqli_query($connect, $query);
        $query =  "UPDATE categories SET image='../images/$catname/'  where idcategorie = $catid";
        $result = mysqli_query($connect, $query);
        $directory="../../images";
        if(!rename("$directory/$name","$directory/$catname")){
            $update ="Category has not been updated";
        }
       }
       $directory="../../mainpage/images";
       unlink("$directory/$name.jpg");

if(isset($_FILES['image'])  && !empty($_FILES['image'])){
    if(move_uploaded_file($_FILES['image']['tmp_name'],"../../mainpage/images/$catname.jpg")){
       
        header("Location:category.php?updatecat=$update");
    }
    
}

   ?>