<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="category.css">
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
         <div id="content">
            <div id="top_div">
            <form method="POST" enctype="multipart/form-data" action="addcategory.php">
                  <fieldset id="add">
                     <legend>
                        <svg height="40px" fill="#068da5" viewBox="0 0 448 448" width="40px" >
                           <path d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0"/>
                        </svg>
                     </legend>
                     <table>
                        <tr class="top">
                           <td>Category Name</td>
                           <td><input type="text" name="cat_name" ></td>
                        </tr>
                        <tr>
                           <td>Add a photo</td>
                           <td><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="cat_photo" accept=".jpg"></td>
                        </tr>
                        <?php
                                 
                                    if(isset($_GET['addstate'])&& !empty($_GET['addstate'])){
                                       echo "<tr><td colspan='2'><span>";
                                       echo $_GET['addstate'];
                                       echo "</span></td></tr>";
                                    }
                                    
                            ?>
                        <tr>
                           <td colspan="2"><input type="submit" value="Add Category"></td>
                        </tr>
                     </table>
                  </fieldset>
                  </form>
               </div>
            
               <div id="center_div">
               <form method = "POST" enctype="multipart/form-data" action="updatecategory.php">
                  <fieldset id="update">
                     <legend>
                        <svg version="1.1" 
                           width="40px" height="40px" viewBox="0 0 438.529 438.528" fill="#068da5">
                           <path d="M433.109,23.694c-3.614-3.612-7.898-5.424-12.848-5.424c-4.948,0-9.226,1.812-12.847,5.424l-37.113,36.835
                              c-20.365-19.226-43.684-34.123-69.948-44.684C274.091,5.283,247.056,0.003,219.266,0.003c-52.344,0-98.022,15.843-137.042,47.536
                              C43.203,79.228,17.509,120.574,5.137,171.587v1.997c0,2.474,0.903,4.617,2.712,6.423c1.809,1.809,3.949,2.712,6.423,2.712h56.814
                              c4.189,0,7.042-2.19,8.566-6.565c7.993-19.032,13.035-30.166,15.131-33.403c13.322-21.698,31.023-38.734,53.103-51.106
                              c22.082-12.371,45.873-18.559,71.376-18.559c38.261,0,71.473,13.039,99.645,39.115l-39.406,39.397
                              c-3.607,3.617-5.421,7.902-5.421,12.851c0,4.948,1.813,9.231,5.421,12.847c3.621,3.617,7.905,5.424,12.854,5.424h127.906
                              c4.949,0,9.233-1.807,12.848-5.424c3.613-3.616,5.42-7.898,5.42-12.847V36.542C438.529,31.593,436.733,27.312,433.109,23.694z"/>
                           <path d="M422.253,255.813h-54.816c-4.188,0-7.043,2.187-8.562,6.566c-7.99,19.034-13.038,30.163-15.129,33.4 c-13.326,21.693-31.028,38.735-53.102,51.106c-22.083,12.375-45.874,18.556-71.378,18.556c-18.461,0-36.259-3.423-53.387-10.273
                              c-17.13-6.858-32.454-16.567-45.966-29.13l39.115-39.112c3.615-3.613,5.424-7.901,5.424-12.847c0-4.948-1.809-9.236-5.424-12.847
                              c-3.617-3.62-7.898-5.431-12.847-5.431H18.274c-4.952,0-9.235,1.811-12.851,5.431C1.807,264.844,0,269.132,0,274.08v127.907
                              c0,4.945,1.807,9.232,5.424,12.847c3.619,3.61,7.902,5.428,12.851,5.428c4.948,0,9.229-1.817,12.847-5.428l36.829-36.833
                              c20.367,19.41,43.542,34.355,69.523,44.823c25.981,10.472,52.866,15.701,80.653,15.701c52.155,0,97.643-15.845,136.471-47.534
                              c38.828-31.688,64.333-73.042,76.52-124.05c0.191-0.38,0.281-1.047,0.281-1.995c0-2.478-0.907-4.612-2.715-6.427
                              C426.874,256.72,424.731,255.813,422.253,255.813z"/>
                        </svg>
                     </legend>
                     <table>
                        <tr  class="top">
                           <td>Category Name</td>
                           <td><?php echo loadcategories() ?></td>
                        </tr>
                        <tr>
                           <td>New Name</td>
                           <td><input type="text" name="new_name" id='name' value=<?php getCategoyName()?>></td>
                        </tr>
                        <tr>
                           <td>New Image (.jpg)</td>
                           <td><input type="hidden" name="MAX_FILE_SIZE" value="300000000" /><input type="file" name="image" id='file' accept=".jpg"></td>
                        </tr>
                        <tr>
                           <td colspan="2" id='image_container'>
                              <img class="myimage" src="../../mainpage/images/boards.jpg">
                           </td>
                        </tr>
                        <?php
                                 
                                    if(isset($_GET['updatecat'])&& !empty($_GET['updatecat'])){
                                       echo "<tr><td colspan='2'><span>";
                                       echo $_GET['updatecat'];
                                       echo "</span></td></tr>";
                                    }
                                    
                            ?>
                        <tr>
                           <td colspan="2">
                              <input type='submit' value='Update Category' name='submit'> 
                           </td>
                        </tr>
                     </table>
                  </fieldset>
                  </form>
               </div>
         
            
               <div id="bottom_div">
               <form action="deletecategory.php" method="POST">
                  <fieldset id="remove">
                     <legend>
                        <svg version="1.1"
                           width="40px" height="40px" viewBox="0 0 124 124" fill="#068da5">
                           <g>
                              <path d="M112,50H12C5.4,50,0,55.4,0,62c0,6.6,5.4,12,12,12h100c6.6,0,12-5.4,12-12C124,55.4,118.6,50,112,50z"/>
                           </g>
                        </svg>
                     </legend>
                     <table>
                        <tr  class="top">
                           <td>Delete a category</td>
                           <td><?php echo loadcategories() ?></td>
                        </tr>
                        
                        <?php
                                 
                                 if(isset($_GET['deletestate'])&& !empty($_GET['deletestate'])){
                                    echo "<tr><td colspan='2'><span>";
                                    echo $_GET['deletestate'];
                                    echo "</span></td></tr>";
                                 }
                                 
                         ?>   
                             
                        <tr>
                           <td colspan="2">
                              <input type='submit' value='Delete Category' name='submit'> 
                           </td>
                        </tr>
                     </table>
                  </fieldset>
                  </form>
               </div>
         </div>
      </div>
      <script src="category.js"></script>
   </body>
</html>
<?php
   function loadcategories(){
   $link = mysqli_connect ('localhost', 'root', '','web3_project')
           or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
          
               $requete = "SELECT idcategorie, name  from categories";
               $result = mysqli_query($link,$requete);
               $creation =  "<select id='categorie' name='category_name'>";
               while($ligne = mysqli_fetch_row($result)){
                   $creation.= "<option value='".$ligne[0]."'>".ucfirst($ligne[1])."</option>";
                }    
               $creation.= "</select>";
               return $creation;
               }

               function getCategoyName(){
                  $link = mysqli_connect ('localhost', 'root', '','web3_project')
                  or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
                  $requete = "SELECT name  from categories  where idcategorie = 1";
                  $result = mysqli_query($link,$requete);
                  return mysqli_fetch_row($result)[0];
                }
   ?>