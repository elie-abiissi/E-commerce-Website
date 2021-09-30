<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="login.css">
   </head>
   <body>
      <form action="login.php" method="POST">
         <div id="container">
            <fieldset>
               <legend><img src="manager.png"></legend>
               <table id="login">
                  <tr>
                     <td>Username</td>
                     <td><input type="text" name="username" placeholder="Username"></td>
                  </tr>
                  <tr>
                     <td>Password</td>
                     <td><input type="password" name="password" placeholder="Password"></td>
                  </tr>
                  <tr>
                     <?php
                        if(isset($_GET['error']) && !empty($_GET['error'])){
                            echo "<td colspan='2'>"."<label class=error>".($_GET['error'])."</label></td>";
                        }
                        
                        ?>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <input type="submit" value="Submit">
                     </td>
                  </tr>
               </table>
            </fieldset>
         </div>
      </form>
   </body>
</html>
<?php
   if(isset($_POST['username']) && isset($_POST['password']) 
               && !empty($_POST['username']) && !empty($_POST['password'])){
   
                   $username = $_POST['username'];
                   $password = $_POST['password'];
                   $md5password = md5($password);
   $link = mysqli_connect ('localhost', 'root', '','web3_project')
   or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
   
       
   $query = "SELECT username , password FROM manager WHERE username = '".$username."' and password = '".$md5password."'";
   $result = mysqli_query($link,$query);
   if(mysqli_num_rows($result)>0){
       header("Location:../backoffice.php");
   }
   else{
       header("Location:login.php?error=Incorrect Values");
   }
   }
   ?>