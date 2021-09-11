<link rel="stylesheet" href="login.css">
<script src="../jquery-3.5.1.min.js"></script>
<?php include '../navbar/navbar.php' ?>
<form method="POST">

<div id="container">
    <table id="tab">
        <caption>Login</caption>
        <tr>
            <td><input type='text' class='correct'></td>
        </tr>
        <tr>
        <td><input type='email' name='email' placeholder="Email"></td>
        </tr>
        <tr>
            <td><input type='password' name='password' placeholder="Password"></td>
        </tr>
        <tr>
            <td><input type='submit' name='submit' value='Sign In'></td>
        </tr>
        <tr>
            <td><a href='../register/register.php'>Create an account</a></td>
        </tr>
    </table>
    </div>
</form>

<?php include '../footer/footer.php' ?>