<?php
	// Connect to the database server
	$success = '';
	$error =  '';
	
	if (isset($_POST['submit'])) {
		include 'dbconnect.php';
		
		/*$dbcnx = mysqli_connect("localhost", "root", "", "compsys");
		
		if (mysqli_connect_errno($dbcnx )) {
			$error = "Failed to connect to MySQL: " .mysqli_connect_error();
			exit();
		}*/
		
		
		
		$ud_id=$_POST['ud_id'];
		$ud_name=$_POST['ud_name'];
		$ud_town=$_POST['ud_town'];
		$ud_county=$_POST['ud_county'];
		$ud_tel = $_POST['ud_tel'];
		$ud_type = $_POST['ud_type'];
		
		$sql = "UPDATE customers SET name = '$ud_name', town = '$ud_town', county = '$ud_county', tel = '$ud_tel', type = '$ud_type' WHERE cust_id=$ud_id";
		
		$res = mysqli_query($conn, $sql);	
		if ( !$res ) {
			$error = ('Query failed ' . $sql . ' Error:' . mysqli_error());
			exit();
		}
		
		else
		{
			//echo $res;
			if(mysqli_affected_rows($conn)< 1){
				
				$error = "<br><br><p><em>You have not amended anything! Redirecting....</em></p>";  
				header("refresh:2; url=customer.php");
			}
			else
			{
				$success =  "<br><p><em>Customer details have been updated successfully! Redirecting....</em></p>";
				header("refresh:2; url=customer.php");
			}
			
			
			
			//Display the results again
			
			
			$sql="SELECT * FROM customers WHERE cust_id = $ud_id";
			
			$res = mysqli_query($conn, $sql);
			if ( !$res ) {
				$error = ('Query failed ' . $sql . ' Error:' . mysqli_error($conn));
				exit();
			}
			
			else 
			{
				$row = mysqli_fetch_array($res); 
				$id = $ud_id;
				$name = $row['name'];
				$town = $row['town'];
				$county = $row['county'];
				$tel = $row['tel'];
				$type = $type['type'];
			}
			//free results
			mysqli_free_result($res);
			
			
			
			//close the connection
			mysqli_close($conn);
			
		}
	}
?>




