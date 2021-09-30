<?php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "web3_project");
 $output = '';
 if($_POST["action"] == "governorate")
 {
  $query = "SELECT district FROM location WHERE governorate = '".$_POST["query"]."' GROUP BY district";
  $result = mysqli_query($connect, $query);

  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["district"].'">'.$row["district"].'</option>';
  }
 }
echo $output;
}
?>