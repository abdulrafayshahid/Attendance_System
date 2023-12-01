
<?php
// Fetch query
function fetch_data()
{
  include("db_connection.php");
  $id = $_POST["a"];
  $name = '';
  
  // Query to retrieve data from the 'users' table
  $sql = "SELECT * FROM `users` WHERE `user_id`='$id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      $name .= $row['employee_name'];
    }
  } 
  // else {
  //   echo "0 results for users table";
  // }

  date_default_timezone_set("Asia/Karachi");
  $date = date("n, j, Y");
  $previous_date = date("n, j, Y", strtotime("-1 day"));
  $current_time = date("H:i:s");
 

  // Query to retrieve data from the 'signin' table
  if (strtotime($current_time) >= strtotime("00:00:00") && strtotime($current_time) < strtotime("12:00:00")) {
  $query = "SELECT * FROM `signin` WHERE `Date` = '$date' or `Date` = '$previous_date'";
  $exec = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($exec) > 0) {
    $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;
  } else {
    // echo "0 results for signin table";
    return [];
  }
} else{
  $query = "SELECT * FROM `signin` WHERE `Date` = '$date'";
  $exec = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($exec) > 0) {
    $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;
  } else {
    // echo "0 results for signin table";
    return [];
  }
}
}

$fetchData = fetch_data();
show_data($fetchData);

function show_data($fetchData)
{
  echo '<table class="container bg-primary">
        <thead>
        <tr>
            <th>S.N</th>
            <th>Full Name</th>  
            <th>Sign in</th>
            <th>Sign out</th>
            <th>Status</th>
            <th>Signout Status</th>
            <th>Activity</th>
            <th>Date</th>
            <th>Attendance</th>
        </tr>
        </thead>';

  if (count($fetchData) > 0) {
    $sn = 1;
    echo '<tbody>';
    foreach ($fetchData as $data) {
      echo "<tr>
          <td>" . $sn . "</td>
          <td>" . $data['Name'] . "</td>
          <td>" . $data['Signin'] . "</td>
          <td>" . $data['Signout'] . "</td>
          <td>" . $data['Status'] . "</td>
          <td>" . $data['Signout_Status'] . "</td>
          <td>" . $data['activity'] . "</td>
          <td>" . $data['Date'] . "</td>
          <td>" . $data['attendance'] . "</td>
      </tr>";
      $sn++;
    }
    echo '</tbody>';
  } else {
    echo "<tr>
        <td colspan='8'>No Data Found</td>
       </tr>";
  }
  echo "</table>";
}
?>
