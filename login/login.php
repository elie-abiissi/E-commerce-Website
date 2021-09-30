<link rel="stylesheet" href="login.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php include '../navbar/navbar.php' ?>

<form method="POST" action="verify.php">
<div id="container">
    <table id="tab">
        <caption>Login</caption>
        <tr>
            <td>
                <?php if(isset($_GET['logged']) && (!empty($_GET['logged']))){ 
                echo "<input type='text' id='correct' class='logged' readonly value='Logged In'>";
                }
                if(isset($_GET['notlogged']) && (!empty($_GET['notlogged']))){
                    echo "<input type='text' id='correct' class='notlogged' readonly value='Not Logged In'>";
                }
                ?>
                 
            </td>
        </tr>
        <tr>
        <td><input type='email' name='email' id="email" placeholder="Email"></td>
        </tr>
        <tr>
            <td><input type='password' name='password' id="password" placeholder="Password"></td>
        </tr>
        <tr>
            <td><input type='submit' name='submit' id="submit" value='Sign In'></td>
        </tr>
        <tr>
            <td class='mainpage'
              
            ><a id='main' href='../mainpage/mainpage.php' 
                <?php  if(isset($_SESSION['id'])){
                  echo "style=display:block;";
              }
              ?> >Main Page</a></td>
        </tr>
        <tr>
            <td><a href='../register/register.php'>Create an account</a></td>
        </tr>
        <tr>
            <td><a href='forgetpassword.php'>Forget Password</a></td>
        </tr>
    </table>
    </div>
</form>

<?php include '../footer/footer.php' ?>

