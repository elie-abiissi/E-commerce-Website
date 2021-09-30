<link rel="stylesheet" href="loadcategories.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php include '../navbar/navbar.php' ?>
<script src="loadcategories.js"></script>
<div id="container">
<div class="container">
            <?php  
 
 $connect = mysqli_connect("localhost", "root", "", "web3_project");  
 $record_per_page = 12;  
 $page = '';  
 $output = '';  
 if(isset($_GET["cat"]))  
 {  
     $cat = $_GET["cat"];
     if(isset($_GET["page"])) { 
    $page = $_GET["page"];  
     }
     else $page = 1;
    $page_query = "SELECT * FROM products where idcategorie = $cat ORDER BY idproduct asc";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page); 


 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT p.idproduct, p.name,p.stock,  c.image FROM products p, categories c where 
 p.idcategorie = c.idcategorie and c.idcategorie=$cat ORDER BY idproduct asc LIMIT $start_from, $record_per_page";
$result = mysqli_query($connect, $query);  
 
$divs_nbr = 4;
if(($total_records - $start_from)<12){
     $divs_nbr = ceil(($total_records - $start_from)/4);
}

$index =0;
$output .= '<div class="maincontainer" id="'.$cat.'">';
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
}
 ?>  
        </div>   
</div>
<?php include '../footer/footer.php' ?>