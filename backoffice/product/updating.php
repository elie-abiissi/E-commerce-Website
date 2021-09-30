<?php


if(isset($_POST['new_name']) &&isset($_POST['id']) && isset($_FILES['image']) && isset($_POST['cat']) && isset($_POST['description']) && isset($_POST['stock']) &&  isset($_POST['price'])
    && $_FILES['image']['error']==0){
        if(!empty($_POST['new_name']) && !empty($_POST['id'])  && !empty($_POST['cat']) && !empty($_POST['description']) && !empty($_POST['stock']) && !empty($_POST['price'])){

            $newname = $_POST['new_name'];
            $image = $_FILES['image']['name'];
            $category = $_POST['cat'];
            $description = $_POST['description'];
            $idproduct = $_POST['id'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
        
            $array = explode('.', $image);
        $extension = end($array);
        
        if($extension=="jpg"){

        $directory="../../images/".getCategoryName($idproduct);
        
        if(unlink("$directory/".getProductName($idproduct).".jpg")){
            echo "deleted<br>";
        
    echo $directory.getProductName($idproduct).".jpg"."<br>";

     $newcategory =  getNewCategory($category);
     echo $newcategory."<br>";

    if(move_uploaded_file($_FILES['image']['tmp_name'],"../../images/".$newcategory."/".$newname.".jpg")){
        echo "done";
        

        $link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
        $requete = "UPDATE products SET name = '".$newname."' , description = '".$description."' , price = $price , stock = $stock , idcategorie = $category where idproduct = $idproduct";
        $result = mysqli_query($link,$requete);
     echo $requete;
     header("Location:product.php?updateprod=Product has been updated successfully");
    }
    else{
        header("Location:product.php?updateprod=Product has not been updated");
    }
    }
    else{
        header("Location:product.php?updateprod=Product has not been updated");
    }
}
else{
    header("Location:product.php?updateprod=Product has not been updated");
}

    }
    else{
        header("Location:product.php?updateprod=Product has not been updated");
    }
    
}
else{
    header("Location:product.php?updateprod=Product has not been updated");
}


    function getProductName($id){
        $link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
        $requete = "SELECT name  from products where idproduct = ".$id;
        $result = mysqli_query($link,$requete);
        return mysqli_fetch_row($result)[0];
      }

      function getCategoryName($id){
        $link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
        $requete = "SELECT c.name  from products p, categories c where c.idcategorie = p.idcategorie and p.idproduct = $id";
        $result = mysqli_query($link,$requete);
        return mysqli_fetch_row($result)[0];
      }

      function getNewCategory($idcategory){
        $link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
        $requete = "SELECT name  from  categories  where idcategorie = $idcategory";
        $result = mysqli_query($link,$requete);
        return mysqli_fetch_row($result)[0];
      }

?>