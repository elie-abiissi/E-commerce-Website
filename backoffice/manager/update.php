<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="update.css">
   </head>
   <body>
      <form action="update.php" method="POST">
         <div id="container">
            <div id="main_div">
               <div id="close">
                  <a href="../backoffice.php">
                     <svg  width="30px" height="30px" fill="red"  viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                     </svg>
                  </a>
               </div>
               <fieldset>
                  <legend><img src="manager.png"></legend>
                  <table id="login">
                     <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" placeholder="Username"></td>
                     </tr>
                     <tr>
                        <td>Old Password</td>
                        <td><input type="password" name="old" placeholder="Old Password"></td>
                     </tr>
                     <tr>
                        <td>New Password</td>
                        <td><input type="password" name="new" placeholder="New Password"></td>
                     </tr>
                     <tr>
                        <?php
                           if(isset($_GET['error']) && !empty($_GET['error'])){
                               echo "<td colspan='2'>"."<label class=error>".($_GET['error'])."</label></td>";
                           }
                           if(isset($_GET['success']) && !empty($_GET['success'])){
                               echo "<td colspan='2'>"."<label class='success'>". ($_GET['success'])."</label></td>";
                           }
                           ?>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <input type="submit" value="Submit">
                        </td>
                     </tr>
                  </table>
               </fieldset>
            </div>
         </div>
      </form>
   </body>
</html>
<?php
    if(isset($_POST['username'])  
        && !empty($_POST['new']) && !empty($_POST['new'])
            && !empty($_POST['old']) && !empty($_POST['old'])){
    $username = $_POST['username'];
    $new = $_POST['new'];
    $md5new = md5($new);
    $old = $_POST['old'];
    $md5old = md5($old);
    $link = mysqli_connect ('localhost', 'root', '','web3_project')
    or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
    $query = "SELECT username , password FROM manager WHERE username = '".$username."' and password = '".$md5old."'";
    $result = mysqli_query($link,$query);
    if(mysqli_num_rows($result)>0){
    $query = "UPDATE manager SET password = '".$md5new."'". " WHERE username = '".$username."' and password = '".$md5old."'" ;
    $result = mysqli_query($link,$query);
    if($result){
        header("Location:update.php?success=Password Changed");
    }
        else {header("Location:update.php?error=Incorrect Values");}
    }
    else{
        header("Location:update.php?error=Incorrect Values");
    }
}