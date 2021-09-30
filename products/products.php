<link rel="stylesheet" href="products.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php include '../navbar/navbar.php' ;?>  
<div id="main_div">
<div class="sort">
   <div id="search_div">
      <table id="search">
         <tr>
            <td> <input type="text" id='searching' class='myInput'  value="" placeholder="Search"></td>
         </tr>
      </table>
   </div>
   <span>
      <select id='sorting'>
         <option value="0" <?php if(isset($_GET['type'])&&$_GET['type']==0) echo "selected" ?>>All Products</option>
         <option value="1" <?php if(isset($_GET['type'])&&$_GET['type']==1) echo "selected" ?>>Name A-Z</option>
         <option value="2" <?php if(isset($_GET['type'])&&$_GET['type']==2) echo "selected" ?>>Name Z-A</option>
         <option value="3" <?php if(isset($_GET['type'])&&$_GET['type']==3) echo "selected" ?>>Price Low-High</option>
         <option value="4" <?php if(isset($_GET['type'])&&$_GET['type']==4) echo "selected" ?>>Price High-Low</option>
      </select>
   </span>
</div>
<div class="container">
   <div class='search_container'></div>
   <?php  
      $connect = mysqli_connect("localhost", "root", "", "web3_project");  
      $record_per_page = 12;  
      $page = '';  
      $output = '';  
      if(isset($_GET["page"]))  
      {  
           $page = $_GET["page"];  
      }  
      else  
      {  
           $page = 1;  
      }  
      
      if(isset($_GET["type"]))  
      {  
           $type = $_GET["type"];  
      }  
      else  
      {  
         $type = 0;
      }   
      
      if($type==0){$identifier = 'idproduct'; $order = 'asc';}
      if($type==1){$identifier = 'Name';$order = 'asc';}
      if($type==2){$identifier = 'Name';$order = 'desc';}
      if($type==3){$identifier = 'Price';$order = 'asc';}
      if($type==4){$identifier = 'Price';$order = 'desc';}
      
      
      
      $page_query = "SELECT * FROM products ORDER BY $identifier $order";  
      $page_result = mysqli_query($connect, $page_query);  
      $total_records = mysqli_num_rows($page_result);  
      $total_pages = ceil($total_records/$record_per_page); 
      
      
      $start_from = ($page - 1)*$record_per_page;  
      $query = "SELECT p.idproduct, p.name,p.stock , c.image FROM products p, categories c where 
      p.idcategorie = c.idcategorie ORDER BY $identifier $order LIMIT $start_from, $record_per_page";
      
      $result = mysqli_query($connect, $query);  
      
      $divs_nbr = 4;
      if(($total_records - $start_from)<12){
          $divs_nbr = ceil(($total_records - $start_from)/4);
      }
      
      $index =0;
      $output .= '<div class="maincontainer">';
        $output .= '<div id="divline">';
         while($row = mysqli_fetch_assoc($result))  
      {   
        
         if($index%4 ==0 && $index>0){
             $output .= '</div>';$output .= '<div id="divline">';
          }
          if($index%2==0)$output .= '<div id="mini">';
           $output .= '<table id="tab"><tr>';
           if($row['stock']==0) {$output .= "<td class='empty'><span>Out Of Stock</span><svg  width='25px' height='25px' fill='white'  viewBox='0 0 16 16'>
             <path d='M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z'/>
             <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
           </svg></td></tr>";}
           else {$output .= "<td class='exist'></td></tr>";}
        
           $output .= '<tr><td><img class="'.$row['idproduct']." ".$page.'" id="image" src="'.$row['image'].$row['name'].'.jpg"></td>';
           $output .= '</tr><tr><td>';
           $output .='<label>'.ucfirst($row['name']).'</label>';
           $output .='</td></tr></table>';
           if($index%2 ==1)$output .= '</div>';
           $index++;
      }
      
      $output .= '</div>';
      $output .= '</div>';
      
      $pagination = '<div class="page">';  
      
      for($i=1; $i<=$total_pages; $i++)  
      {  
         $pagination  .= "<label class='pagination_link ";
         if($i<$total_pages)$pagination  .="last ";
         if($i== $page)$pagination  .="selected";
         $pagination  .="' id='".$i."'>".$i."</label>";  
      }  
      
      $pagination  .= '</div></div>'; 
      
      echo $output;  
      echo $pagination; 
      ?>  
</div>
<script src="../products/products.js"></script>
<?php include '../footer/footer.php' ?>