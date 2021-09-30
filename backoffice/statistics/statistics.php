<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="statistics.css">
   </head>
   <body>
      <div id="maincontainer">
         <div id="close">
            <a href="../backoffice.php">
               <svg  width="30px" height="30px" fill="red"  viewBox="0 0 16 16">
                  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
               </svg>
            </a>
         </div>
         <div id="top">
            <div id="top-left">
               <?php include 'mostcheapest.php'?>
            </div>
            <div id="top-right">
               <?php include 'categories-count.php'?>
            </div>
         </div>
         <div id="middle">
            <?php include 'mostexpensive.php'?>
         </div>
         <div id="bottom">
            <div id="bottom-left">
               <?php include 'clients-count.php'?>
            </div>
            <div id="bottom-right">
               <?php include 'expensivecarts.php'?>
            </div>
         </div>
      </div>
   </body>
</html>