<?php  
 
 $connect = mysqli_connect("localhost", "root", "", "web3_project");  
 if(isset($_GET["id"]))  
 {  
      $id = $_GET["id"];  
 $query = "SELECT name FROM categories WHERE idcategorie = $id";  

 $result = mysqli_query($connect, $query);  
$name = mysqli_fetch_row($result)[0];
$data["name"] = $name;
$data["image"] = "<img class='myimage' src='../../mainpage/images/"."$name".".jpg'>";
echo json_encode($data);

 }
 