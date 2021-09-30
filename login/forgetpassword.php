<link rel="stylesheet" href="forgetpassword.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php include '../navbar/navbar.php' ?>

<form method="POST" action="verifypassword.php">
<div id="container">
    <table id="tab">
        <caption>Forget Password</caption>
        <tr>
            <td>
                <?php if(isset($_GET['changed']) && (!empty($_GET['changed']))){ 
                echo "<input type='text' id='correct' class='logged' readonly value='Password Changed'>";
                }
                if(isset($_GET['error']) && (!empty($_GET['error']))){
                    echo "<input type='text' id='correct' class='notlogged' readonly value='".($_GET['error'])."'>";
                }
                ?>
                 
            </td>
        </tr>
        <tr>
        <td><input type='email' name='email' id="email" placeholder="Email"></td>
        </tr>
        <tr>
            <td><input type='password' name='new' id="password" placeholder="New Password"></td>
        </tr>

        <tr>
            <td><input type='password' name='confirm' id="password" placeholder="Confirm Password"></td>
        </tr>
        <tr>
            <td><input type='submit' name='submit' id="submit" value='Sign In'></td>
        </tr>
        <tr>
            <td class='mainpage'
              
            ><a id='main' href='../mainpage/mainpage.php' 
                
              >Main Page</a></td>
        </tr>
        
    </table>
    </div>
</form>


<?php include '../footer/footer.php' ?>