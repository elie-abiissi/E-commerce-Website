<?php
$inputValues = $_POST['input'];

$conn = mysqli_connect('localhost', 'root', '', 'web3_project');

if(!$conn){
  die('Could not connect: ' . mysqli_error($conn));
}

$sql_query = "SELECT * FROM products WHERE `name` LIKE '%$inputValues%'";

$result = mysqli_query($conn, $sql_query);

$output = "<div id='display'>";
if(mysqli_num_rows($result) > 0) {

$output .= '<table class="myTable">';
$output .= '<tr class="header">';
$output .= '</tr>';

  while ($row = mysqli_fetch_array($result)) {

    $output .= '<tr>';
    $output .= '<td>' . "<a href = '" . "searchimage.php?id=".$row['idproduct']."'>".
    "<button>".ucfirst($row['name']) . '</button><a/></td>';
    $output .= '</tr>';
  }
    $output .= '</table></div>';
} else {
  $output .= 'No data matched.';
}

echo $output;

?>