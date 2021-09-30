<link rel="stylesheet" href="image.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php 

session_start();
if(isset($_GET['id']) && isset($_GET['type']) && isset($_GET['page'])){
$id = $_GET['id'];
$page = $_GET['page'];
$type = $_GET['type'];

$link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
$requete = "SELECT p.idproduct,p.name,p.description,p.price,p.stock, c.image FROM products p, categories c where c.idcategorie = p.idcategorie and p.idproduct = $id";
$result = mysqli_query($link,$requete);
$ligne = mysqli_fetch_assoc($result);

$name = $ligne['name'];
$description = $ligne['description'];
$price = $ligne['price'];
$image = $ligne['image'].$name.".jpg";
$stock = $ligne['stock'];

$output ='<div id="container">';
$output .='<div id="mini">';
$output .= "<div id='div_image'>";
$output .= "<img src='".$image."' id='".$id."' class='image'>";
$output .= "</div><div id='div_infos'>";
$output .= "<table id='infos'><tr><td class='name'>";
$output .= ucfirst($name);
$output .= "</td></tr><tr><td class='price'>";
$output .= "$".$price;
$output .= "</td></tr><tr><td>";
$output .= "<label>Quantity</label>";
$output .= "</td></tr><tr><td class='quantity'>";
$output .= "<button class='remove'><svg  width='16' height='16' fill='#068da5' viewBox='0 0 16 16'>
<path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/>
</svg></button>";
$output .= "<input type='text' class='number' value='1' readonly>";
$output .= "<button class='add'><svg width='16' height='16' fill='#068da5' viewBox='0 0 16 16'>
<path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
</svg></button>";
$output .= "</td></tr><tr>";
if($stock==0) $output .="<td>";
else $output .="<td class='exist'>";
if($stock == 0  || !isset($_SESSION['cart'])) $output .= "<input type='text' value='Sold Out' class='soldout' readonly>";
else $output .= "<input type='text' value='Item Added' class='soldout' readonly>";
$output .= "</td></tr><tr><td>";
$output .= "<input id='add' type='submit' value='Add to cart' class='";
if($stock == 0  || !isset($_SESSION['cart'])) $output .= "none'";
else $output .= "cart'";
$output .= ">";

$output .= "</td></tr><tr><td class='description'>";
$output .= printing($description);
$output .= "</td></tr></table></table></div></div></div>";

$output .="<div id='bottom'><label>Go back to products</label>";
$output .="<a href='products.php?page=".$page."&type=".$type."'><svg class='svg'  width='25' height='25' fill='#068da5' viewBox='0 0 16 16'>
<path d='M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z'/>
</svg></a></div>";

echo $output;
}

function printing($string){
        $array = explode(".", $string);
        $output = '<ul>';
        for($i=0;$i<count($array)-1;$i++){
                $output .= "<li>".$array[$i].".</li>";
        }
        $output .= '</ul>';
        return $output;
}

?>
<script src="image.js"></script>
<script src="addorder.js"></script>