<?php
    if(isset($_POST['email']) && isset($_POST['password']) && 
                !empty($_POST['email']) && !empty($_POST['password'])){
session_start();

        $email = $_POST['email'];     
        $password = $_POST['password'] ;
        $md5 = md5($password);
        
        $link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
           
               $query = "SELECT idclient FROM clients WHERE email ='".$email."' and password = '".$md5."' ;";
               $result = mysqli_query($link,$query);
               $rowcount = mysqli_num_rows($result);
               if($rowcount>0) {
                   $id = mysqli_fetch_row($result)[0];
               $_SESSION['id'] = $id;
              
              if(!isset($_SESSION['cart'])){
           
               $myDate = date('Y/m/d');

               $query = "INSERT INTO carts (date, idclient) VALUES ('".$myDate."',".$id.")";
               $result = mysqli_query($link,$query);
               $last_id = mysqli_insert_id($link);
               $_SESSION['cart'] = $last_id;
               header("Location:login.php?logged=yes");
               }
               else{
                header("Location:login.php?logged=yes");
               }
            }
            else{
                header("Location:login.php?notlogged=yes");
               }
       
    }
    else{
        header("Location:login.php?notlogged=yes");
    }

    function verify_password($pass,$md5){
        return (strcmp(md5($pass),$md5)==0);
    }
?>