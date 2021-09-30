<link rel="stylesheet" href="contact.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="contact.js"></script>
<script src="contacting.js"></script>
<?php include '../navbar/navbar.php' ?>
<form method='POST' action="contact.php">
<div id="container">

    <div id="left">
        <table id="tab">
        <tr>
          <td>
            <?php if(isset($_GET['send']) && (!empty($_GET['send']))){ 
                echo "<input type='text' id='send' class='correct' readonly value='Message Sent'>";
                }
                if(isset($_GET['notsend']) && (!empty($_GET['notsend']))){
                    echo "<input type='text' id='notsend' class='correct' readonly value=''>";
                }
                ?>
                </td>
        </tr>
        
        <tr>
        <td><input type='email' id='email' value=<?php 
            // session_start();
            if(isset($_SESSION['id'])){
                $link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
           
               $query = "SELECT email FROM clients WHERE idclient = ".$_SESSION['id'];
            //    echo $query."<br>";
               $result = mysqli_query($link,$query);
               echo "'".mysqli_fetch_row($result)[0]."'";
               echo " readonly";
            }
            else{
                echo "''";
            }
        ?> name='email' placeholder="Email"></td>
        </tr>
        <tr>
            <td><textarea id="text" id='text' name='text'></textarea></td>
        </tr>
        <tr>
            <td><input id='submit' type='submit' name='send' value='Send'></td>
        </tr>
        </table>
        </form>
    </div>
  
    <div id="right">
    <iframe id="location" src="https://maps.google.com/maps?q=Lebanon%20amchit&t=&z=19&ie=UTF8&iwloc=&output=embed">
        </iframe>
        <iframe id="loader" src="loader.gif"></iframe>
    </div>
</div>
</form>

<?php
    if(isset($_POST['email']) && isset($_POST['text'])){
        if(!empty($_POST['email']) && !empty($_POST['text'])){
            $email = $_POST['email'];
            $text = $_POST['text'];
            $link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
        $requete = "SELECT MAX(idmessage) from messages";
        $result = mysqli_query($link,$requete);
        $last_id = mysqli_fetch_row($result)[0]+1;
        $requete = "INSERT INTO messages(idmessage,email,message) VALUES ($last_id".", '".$email."','".$text."')";
        $result = mysqli_query($link,$requete);
    }
}
?>

<?php include '../footer/footer.php' ?>


