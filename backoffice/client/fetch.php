<?php
if(isset($_POST["id"]))
{
 $connect = mysqli_connect("localhost", "root", "", "web3_project");
 $query = "SELECT * FROM clients WHERE idclient = '".$_POST["id"]."'";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  $data["firstname"] = $row["firstname"];
  $data["lastname"] = $row["lastname"];
  $data["date"] = $row["date"];
  $data["phone"] = $row["phone"];
  $data["email"] = $row["email"];
  $data["district"] = $row["district"];
  $data["governorate"] = $row["governorate"];
 }

 echo json_encode($data);
}
?>