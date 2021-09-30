<?php

if(isset($_POST['idcart']) && isset($_POST['idproduct'])){
    if(!empty($_POST['idcart']) && !empty($_POST['idproduct'])){
        $cart = $_POST['idcart'];
        $product = $_POST['idproduct'];
        $link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
           
               $query = "DELETE FROM orders WHERE idproduct = $product";
               $result = mysqli_query($link,$query);
            header("Location:account.php");
    }
}
?>