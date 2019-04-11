<?php
	// Connect to the database server
	if (isset($_POST['record']) and is_numeric($_POST['record'])) {
		include 'dbconnect.php';
		
		/*$dbcnx = mysqli_connect("localhost", "root", "", "compsys");
		if (mysqli_connect_errno($dbcnx ))
		{
			echo "Failed to connect to MySQL: " .mysqli_connect_error();
			exit();
		}*/
		
		
		$cid = $_POST['record'];
		
		$sql = "SELECT * FROM customers WHERE cust_id=$cid";
		
		$res = mysqli_query($conn, $sql);
		if ( !$res ) {
			echo('Query failed ' . $sql . ' Error:' . mysqli_error($sql));
			exit();
		}
		
		else 
		{
			$row = mysqli_fetch_array($res); 
			$id = $row['cust_id'];
			$name = $row['name'];
			$town = $row['town'];
			$county = $row['county'];
			$tel = $row['tel'];
			$type = $row['type'];
		}
		//free results
		mysqli_free_result($res);
		
		//close connection
		mysqli_close($conn);
	}
?>