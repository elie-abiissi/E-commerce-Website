<?php

if(isset($_POST['email']) && isset($_POST['new']) && isset($_POST['confirm']) &&
!empty($_POST['email']) && !empty($_POST['new']) && !empty($_POST['confirm'])){

    $email = $_POST['email'];
    $new = test_input($_POST['new']);
    $confirm = test_input($_POST['confirm']);

    $link = mysqli_connect ('localhost', 'root', '','web3_project')
    or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));

    if(strcmp($new, $confirm)==0){
        $query = "SELECT idclient FROM clients WHERE email ='".$email."' ;";
           $result = mysqli_query($link,$query);
           $idclient = mysqli_fetch_row($result)[0];
           $rowcount = mysqli_num_rows($result);
           if($rowcount>0) {
               $md5new = md5($new);
               $query = "UPDATE clients SET password = '".$md5new."' WHERE idclient = $idclient;";
           $result = mysqli_query($link,$query);
           header("Location:forgetpassword.php?changed=Password changed");
       
           }
           else{
            header("Location:forgetpassword.php?error=Client doesnt exist");
           }
    }
    else{
        header("Location:forgetpassword.php?error=Passwords dont match");
    }   
}


function test_input($data){ 
    $data = stripslashes($data); 
    $data = trim($data); 
    $data = htmlspecialchars($data); 
    return($data);
}

?>