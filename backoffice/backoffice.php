<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="backoffice.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   </head>
   <body>
      <div id="main">
         <table id="mytable">
            <tr>
               <td id="separator1"></td>
            </tr>
            <tr>
               <td id="time"></td>
            </tr>
            <tr>
               <td id="day"></td>
            </tr>
            <tr>
               <td id="date"></td>
            </tr>
            <tr>
               <td id="separator2"></td>
            </tr>
            <tr>
               <td><a href="category/category.php"><button class='button'>Category</button></a></td>
            </tr>
            <tr>
               <td><a href="product/product.php"><button class='button'>Product</button></a></td>
            </tr>
            <tr>
               <td><a href="manager/update.php"><button class='button'>Manager</button></a></td>
            </tr>
            <tr>
               <td><a href="client/client.php"><button class='button'>Clients</button></a></td>
            </tr>
            <tr>
               <td><a href="message/message.php"><button class='button'>Messages</button></a></td>
            </tr>
            <tr>
               <td><a href="cart/cart.php"><button class='button'>Carts</button></a></td>
            </tr>
            <tr>
               <td><a href="statistics/statistics.php"><button class='button'>Statistics</button></a></td>
            </tr>
            <tr>
               <td id="separator3"></td>
            </tr>
         </table>
      </div>
      <script src="backoffice.js"></script>
   </body>
</html>