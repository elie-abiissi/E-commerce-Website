<?php
    if(isset($_POST['fname'])&&!empty($_POST['fname']) && isset($_POST['lname'])&&!empty($_POST['lname']) && isset($_POST['date'])&&!empty($_POST['date']) && isset($_POST['password'])&&!empty($_POST['password']) && isset($_POST['repassword'])&&!empty($_POST['repassword']) && isset($_POST['email'])&&!empty($_POST['email']) && isset($_POST['phone'])&&!empty($_POST['phone']) && isset($_POST['governorate'])&&!empty($_POST['governorate']) && isset($_POST['recaptcha'])&&!empty($_POST['recaptcha'])){
        
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $date = $_POST['date'];
    $password = test_input($_POST['password']);
    
    $repassword = test_input($_POST['repassword']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $governorate = $_POST['governorate'];
    $recaptcha = $_POST['recaptcha'];

    $district;

        if($governorate!='Beirut' && !isset($_POST['district'])){
            $district = "";
        }
        elseif($governorate=='Beirut'){
            $district = "";
        } 
        else{
            $district = $_POST['district'];
        } 

        

    $link = mysqli_connect ('localhost', 'root', '','web3_project')
 or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
    $password_error = '';
    $email_error = '';
    $phone_error = '';
        
        $query = "SELECT count(email) AS email FROM clients WHERE email ='". $email."' ";
        $result = mysqli_query($link,$query);
        $email_count = mysqli_fetch_assoc($result)['email'];
       
        $query = "SELECT count(phone) AS phone FROM clients WHERE phone =". $phone;
        $result = mysqli_query($link,$query);
        $phone_count = mysqli_fetch_assoc($result)['phone'];
        
        $password_count = 2;
        
        if(strcmp($password, $repassword)!==0){
            $password_count = 0;
            $password_error  = 'Passwords don\'t match';
        }
        if($email_count>0){
            $email_error  = 'Email already exists';
        }
        if($phone_count>0){
            $phone_error  = 'Phone number already exists';
        }
    
    if($email_count==0 && $phone_count==0 && $password_count==2){
        $password = md5(test_input($password));
        $query = "INSERT INTO clients (firstname, lastname, date, password, email, phone, governorate, district) VALUES ('".$firstname."','".$lastname."','".$date."','".$password."','".$email."',".$phone.",'".$governorate."','".$district."')";
        $result = mysqli_query($link,$query);
        if($result){
            $last_id = mysqli_insert_id($link);
            $_SESSION['id'] = $last_id;
            header('Location:register.php?register=Client Registered');
            
                }
        else{
           
        }
    }
    else{
        header('Location:register.php?emailerror='.$email_error.'&phoneerror='.$phone_error.'&passworderror='.$password_error);
    }
    
}
else{
    header('Location:register.php?register=Client Not Registered');
}
    

    function test_input($data){ 
        $data = stripslashes($data); 
        $data = trim($data); 
        $data = htmlspecialchars($data); 
        return($data);
    }

 ?>