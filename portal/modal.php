<?php
if ($_POST['function'] == "modal") {
  modal();
}
function modal(){
  include("db_connection.php");
  $ID = $_POST['id'];
  


  $sql ="SELECT * FROM `signin` where `user_id`='$ID' ORDER BY auto DESC LIMIT 1";
  
  $result = mysqli_query($conn, $sql);
  $array = [];
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

      array_push($array, $row['user_id'],$row['Name'],$row['Signin'],$row['Signout'],$row['Date'],$row['Status'],$row['activity']);;
    };
 
  };
  $sql2 ="SELECT user_image FROM `users` where `user_id`='$ID'";
  
  $result2 = mysqli_query($conn, $sql2);
  $array2 = [];
  if ($result2->num_rows > 0) {
    // output data of each row
    while ($row = $result2->fetch_assoc()) {

      array_push($array2, $row['user_image']);};
  
  };
  array_push($array, $array2);
  echo json_encode($array);
  
}
  ?>