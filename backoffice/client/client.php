<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="client.css">
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
                  <svg width="40px" height="40px" fill="#068da5"  viewBox="0 0 16 16">
                     <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                  </svg>
               </legend>
               <div class='header'>
                  <div class="select_list">
                     <select name="clients_list" id="clients_list">
                        <option value="">Select Client</option>
                        <?php 
                           $connect = mysqli_connect("localhost", "root", "", "web3_project");
                           $query = "SELECT * FROM clients ORDER BY firstname ASC, lastname asc";
                           $result = mysqli_query($connect, $query);
                           while($row = mysqli_fetch_array($result))
                           {
                            echo '<option value="'.$row["idclient"].'">'.$row["firstname"]." ".$row["lastname"].'</option>';
                           }
                           ?>
                     </select>
                  </div>
                  <div class="button">
                     <button id="display">Display</button>
                  </div>
               </div>
               <table id="clients">
                  <tr>
                     <th class="identity">First Name</th>
                     <td  id="first_name"></td>
                  </tr>
                  <tr>
                     <th class='identity'>Last Name</th>
                     <td  id="last_name"></td>
                  </tr>
                  <tr>
                     <th class="identity">Date of birth</th>
                     <td  id="date"></td>
                  </tr>
                  <tr>
                     <th class='identity'>Email</th>
                     <td  id="email"></td>
                  </tr>
                  <tr>
                     <th class="identity">Phone Number</th>
                     <td  id="phone"></td>
                  </tr>
                  <tr>
                     <th class='identity'>Governorate</th>
                     <td  id="governorate"></td>
                  </tr>
                  <tr>
                     <th class='identity'>District</th>
                     <td  id="district"></td>
                  </tr>
               </table>
            </fieldset>
         </div>
      </div>
      <script src="client.js"></script>
   </body>
</html>