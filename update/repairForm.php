<?php
	require_once('update/functions.php');
	// Connect to the database server
	if (isset($_POST['record']) and is_numeric($_POST['record'])) {
		include 'dbconnect.php';
		/*$dbcnx = mysqli_connect("localhost", "root", "", "compsys");
		if (mysqli_connect_errno($dbcnx ))
		{
			echo "Failed to connect to MySQL: " .mysqli_connect_error();
			exit();
		}*/
		
		
		$id = $_POST['record'];
		
		$sql="SELECT * FROM repairs WHERE rep_id=$id";
		
		$res = mysqli_query($conn, $sql);
		if ( !$res ) {
			echo('Query failed ' . $sql . ' Error:' . mysqli_error($conn));
			exit();
		}
		
		else 
		{
			$row = mysqli_fetch_array($res); 
			$cust_id = $row['Cust_ID'];
			$staff_id = $row['Staff_ID'];
			$device = $row['DeviceType'];
			$brand = $row['Brand'];
			$model = $row['Model'];
			$work_done = $row['WorkDone'];
			
			$amount = $row['Amount'];
			$profit = $row['Profit'];
			$date = $row['Date'];
			$pay_date = $row['PaymentReceivedDate'];
			$pay_status = $row['PaymentStatus'];
			$comment = $row['Comment'];
			$description = $row['Description'];
		}
		

			//free results
			mysqli_free_result($res);
			
			//close connection
			mysqli_close($conn);
		}
	?>			