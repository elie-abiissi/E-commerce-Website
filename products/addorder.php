<?php

session_start();

    if(isset($_GET['prod']) && isset($_SESSION['id']) && isset($_SESSION['cart']) &&             isset($_GET['quantity'])){
        if(!empty($_GET['prod']) && !empty($_SESSION['id']) && !empty($_SESSION['cart']) && 
        !empty(isset($_GET['quantity']))){
            $client =  $_SESSION['id'];
            $cart = $_SESSION['cart'];
            $product = $_GET['prod'];
            $quantity = $_GET['quantity'];

            $link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
$query = "INSERT INTO orders (idproduct, quantity, idcart) VALUES ($product, $quantity, $cart)";
$result = mysqli_query($link,$query);
        }
    }
?>