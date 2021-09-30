<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="message.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   </head>
   <body>
      <div id="container">
         <div id="close">
            <a href="../backoffice.php">
               <svg  width="30px" height="30px" fill="red"  viewBox="0 0 16 16">
                  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
               </svg>
            </a>
         </div>
         <div id="main_div">
            <fieldset>
               <legend>
                  <svg  width="40px" height="40px" fill="#068da5"  viewBox="0 0 16 16">
                     <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                     <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                  </svg>
               </legend>
               <table id="messages">
                  <?php echo load_messages() ?>
               </table>
            </fieldset>
         </div>
      </div>
      <script src="message.js"></script>
   </body>
</html>
<?php
   function load_messages(){
       $counter = 0;
     $link = mysqli_connect ('localhost', 'root', '','web3_project')
     or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
     $output= "<tr>";
         $output.= '<th>Messages</th>';
         $output.= "</tr>";
     $query = "SELECT email, message FROM messages";
     $result = mysqli_query($link,$query);
     while($ligne = mysqli_fetch_assoc($result)){
       $output.= '<tr><td>'.$ligne['email']."</td></tr>";
         $output.= "<tr><td>".$ligne['message']."</td>";
         $output.= "</tr>";
         $counter++;
      }
      $output.= "</tr>";
     return $output;
   }
   
   ?>