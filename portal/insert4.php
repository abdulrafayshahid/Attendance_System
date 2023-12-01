<?php
include 'db_connection.php';
$array = [];

$ID = $_POST['id'];

$sql = "SELECT * FROM `users` where `user_id`='$ID'";
$query = mysqli_query($conn, $sql) or die("Query Unsuccessful");
$str = "";


while ($row = mysqli_fetch_assoc($query)) {

    $str = "{$row['employee_name']}";
}
array_push($array, $str);

date_default_timezone_set("Asia/karachi");
$name = $str;


$sign_in = date("h:i:sa");
$date = date("n, j, Y");
$emp_time = "";
$query = mysqli_query($conn, $sql) or die("Query Unsuccessful");

$row = mysqli_fetch_assoc($query);
$emp_time = $row['time_in'];

if ($sign_in > $emp_time) {
    $status = 'Late';
} else {
    $status = "On Time";
}

$activity = "";
$curr_date = "";
array_push($array, $sign_in);
$sql2 = "SELECT * FROM `signin` WHERE Name='$name'  ORDER BY auto DESC LIMIT 1;";
$result = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $activity = $row["activity"];
        $curr_date = $row["Date"];
        array_push($array, null);
    }
}
$emp_timeout = '';
$query = mysqli_query($conn, $sql) or die("Query Unsuccessful");

$row = mysqli_fetch_assoc($query);
$emp_timeout = $row['time_out'];

if ($activity == "Signed in") {
    if ($emp_timeout < '04:00:00am' && $sign_in > "06:00:00pm") {
        $day1 = '11,01,2022 ';
        $day2 = '11,02,2022 ';
        $new_signin = $day1 . $sign_in;
        $new_timeout = $day2 . $emp_timeout;

        if ($new_signin < $new_timeout) {
            $status1 = 'Early going';
        } else {
            $status1 = 'Over Time';
        }
    } else {
        if ($sign_in < $emp_timeout) {

            array_push($array, $sign_in);
            array_push($array, $emp_timeout);


            $status1 = 'Early Going';
        } else {
            $status1 = 'Overtime';
        }
    }
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if ($activity == "Signed In") {
        // Update the previous record with 'Signed Out' activity and set 'Signout_Status' to '$status1'
        $sql = "UPDATE `signin` SET `activity`='Signed Out', `Signout_Status`='$status1' WHERE Name='$name' ORDER BY auto DESC LIMIT 1;";
        $result = mysqli_query($conn, $sql);
    
        // Insert a new record with 'Signed In' activity and the current date
        $sql4 = "INSERT INTO `signin` (`user_id`, `Name`, `Signin`, `Status`, `Signout_Status`, `Signout`, `activity`, `Date`, `attendance`) VALUES (?, ?, ?, 'Welcome Back', '', '', 'Signed In', ?, '-')";
        $stmt = mysqli_prepare($conn, $sql4);
        
        // Bind parameters and execute the prepared statement
        mysqli_stmt_bind_param($stmt, "ssss", $ID, $name, $sign_in, $date);
        $result = mysqli_stmt_execute($stmt);
    
        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        }
    
        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } elseif ($activity == "Signed Out" && $curr_date == $date) {
        // Update the previous record with 'Signout' time
        $sql = "UPDATE `signin` SET `Signout`='$sign_in' WHERE Name='$name' ORDER BY auto DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
    } else {
        // Insert a new record with 'Signed In' activity, status, and attendance
        $sql = "INSERT INTO `signin` (`user_id`, `Name`, `Signin`, `Status`, `Signout`, `activity`, `Date`, `attendance`) VALUES ('$ID', '$name', '$sign_in', '$status', '-', 'Signed In', '$date', 'Present')";
        $result = mysqli_query($conn, $sql);
    
        // Retrieve the latest status for the user
        $sql1 = "SELECT STATUS FROM `signin` WHERE Name='$name' ORDER BY auto DESC LIMIT 1";
        $result = mysqli_query($conn, $sql1);
    
        if ($result) {
            // Initialize an array to store statuses
            $array = array();
    
            // Fetch and store the status in the array
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($array, $row["STATUS"]);
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}


if ($activity == "Signed in" and $date == $curr_date and $sign_in>="09:00:00pm") {
  
    $emparr = [];
    $sqlll = "SELECT * FROM `users` where user_status='Active   '";
    $query = mysqli_query($conn, $sqlll) or die("Query Unsuccessful");
    while ($row = mysqli_fetch_assoc($query)) {
        
        $empnames = "{$row['employee_name']}";
        array_push($emparr, $empnames);
    }
    //  
    $dailyarr = [];
    $sqo = "SELECT * FROM `signin` WHERE  Date='$date'";
    $query5 = mysqli_query($conn, $sqo) or die("Query Unsuccessful");
    while ($row = mysqli_fetch_assoc($query5)) {
       
        $dailynames = "{$row['user_id']}";
        array_push($dailyarr, $dailynames);
    }
    //   array_push($array,$dailyarr);
    $b = array_diff($emparr, $dailyarr);
    array_push($array, $b);
    $arrayLength = count($b);
    $i = 0;
    $absenties = '';
    while ($i < $arrayLength) {
      
        $absenties = $b[$i];
        $sql69 = "INSERT INTO `signin`(`user_id`,`Name`,`Signin`,`Status`,`Signout_Status`,`Signout`,`activity`,`Date`,`attendance`) VALUES ('$ID','$absenties','sign_in','Welcome Back','-','-','Signed in','$date','Absent')";
        $query6 = mysqli_query($conn, $sql69) or die("Query Unsuccessful");
        $i++;
    }
}


echo json_encode($array);
