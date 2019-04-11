<?php
include 'dbconnect.php';
    $success = ' ';
	$notFound =  ' ';
	if (isset($_POST['submit'])) {
		
		// Define $username and $password
		$cust_id = $_POST['cust_id'];
		$name = $_POST['name'];
		$staff_id = $_POST['staff_id'];
		$device = $_POST['device'];
		$brand = $_POST['brand'];
		$model = $_POST['model'];		
		$work_done= $_POST['work_done'];	
		$amount= $_POST['amount'];
		$profit= $_POST['profit'];
		$status= $_POST['status'];
		$comment= $_POST['comment'];
		
		
		/* Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$conn= mysqli_connect("localhost", "root", "", "compsys");
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}*/
		
		// To protect MySQL injection for Security purpose			
		$cust_id = stripslashes($cust_id);
		$name = stripslashes($name);
		$staff_id = stripslashes($staff_id);
		$device = stripslashes($device);
		$brand = stripslashes($brand);
		$model = stripslashes($model);
		$work_done= stripslashes($work_done);
		$amount= stripslashes($amount);
		$profit= stripslashes($profit);
		$status= stripslashes($status);
		$comment= stripslashes($comment);
		
		$cust_id = mysqli_real_escape_string($conn, $cust_id);
		$name = mysqli_real_escape_string($conn, $name);
		$staff_id = mysqli_real_escape_string($conn, $staff_id);
		$device = mysqli_real_escape_string($conn, $device);
		$brand = mysqli_real_escape_string($conn, $brand);
		$model = mysqli_real_escape_string($conn, $model);
		$work_done= mysqli_real_escape_string($conn, $work_done);	
		$amount= mysqli_real_escape_string($conn, $amount);
		$profit= mysqli_real_escape_string($conn, $profit);
		$status= mysqli_real_escape_string($conn, $status);		
		$comment= mysqli_real_escape_string($conn, $comment);
		
		
		if( is_numeric( $cust_id ) ) {
			$query = "SELECT * FROM repairs";
			$valid = mysqli_query($conn, $query);
			
			if (!$valid) {
				$notFound = "Could not connect to the database!<br><br>";
			}
			
			$sql = "INSERT INTO repairs (cust_id, cust_name, staff_id, devicetype, brand, model, workdone, amount, profit, comment, status)
			VALUES ('$cust_id', '$name', '$staff_id', '$device', '$brand', '$model', '$work_done', '$amount', '$profit', '$comment', '$status')";
			$res = mysqli_query($conn, $sql);
			
			if (!$res) {
				$notFound = "Error adding...<br><br>";
			}
			if (mysqli_affected_rows($conn) == 1) {
                $success =  "Repair added successfully. Redirecting.....<br><br>";
				$id = $cust_id;
				header("refresh:3; url=repairs.php");

				} else {
				$notFound =  "Could not add due to system error!<br><br>";
			}
			
			} else {
			$id = $cust_id;
			$notFound = "Customer wasn't found in the system. Please go back and enter a valid customer ID <br><br>";
		}
		mysqli_close($conn);
	}
?>