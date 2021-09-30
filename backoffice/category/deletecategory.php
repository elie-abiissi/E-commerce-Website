<?php
    if(isset($_POST['category_name'])&& !empty($_POST['category_name'])){
        $id = $_POST['category_name'];
        echo $id."<br>";
        $link = mysqli_connect ('localhost', 'root', '','web3_project')
           or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
          $state = "Category has been deleted successfully";
          
          $query = "DELETE FROM orders where idproduct  = (SELECT idproduct FROM products WHERE idcategorie = $id)";
               if(!($result = mysqli_query($link,$query))){
                $state = "Orders has not been deleted successfully";
               }

               $query = "DELETE FROM products where idcategorie = $id";
               if(!($result = mysqli_query($link,$query))){
                $state = "Category has not been deleted successfully";
               }

               
            // getting the name of the selected category   
               $query = "SELECT name FROM categories where idcategorie = $id";
               $result = mysqli_query($link,$query);
               $name= mysqli_fetch_row($result)[0];
            // deleting the background-image of this category
               $path="../../mainpage/images";
               $filename =  $path . "/" . $name. ".jpg"; // build the full path here
    if (file_exists($filename)) {
        unlink($filename);
   }




delete_directory("../../images/$name");

// deleting the category
    $query = "DELETE FROM categories where idcategorie = $id";
    if(!($result = mysqli_query($link,$query))){
     $state = "Category has not been deleted successfully";
    }
            header("Location:category.php?deletestate=".$state);
    }

// function used to delete the directory that refers to this category with its content
    function delete_directory($dirname) {
    if (is_dir($dirname))
    $dir_handle = opendir($dirname);
while($file = readdir($dir_handle)) {
    if ($file != "." && $file != "..") {
         if (!is_dir($dirname."/".$file)){
              unlink($dirname."/".$file);
         }
   }
}
closedir($dir_handle);
rmdir($dirname);
}

?>