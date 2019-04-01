<?php
	// Connect to the database server
	$success = '';
	$error =  '';
	
	if (isset($_POST['submit'])) {
		
		$dbcnx = mysqli_connect("localhost", "root", "", "compsys");
		
		if (mysqli_connect_errno($dbcnx )) {
			$error = "Failed to connect to MySQL: " .mysqli_connect_error();
			exit();
		}
		
		
		
		$id = $_POST['stock_id'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		
		
		$sql = "UPDATE stock SET description = '$description', quantity = '$quantity', price = '$price' WHERE stock_id = $id";
		
		$res = mysqli_query($dbcnx, $sql);	
		if ( !$res ) {
			$error = ('Query failed ' . $sql . ' Error:' . mysqli_error());
			exit();
		}
		
		else
		{
			//echo $res;
			if(mysqli_affected_rows($dbcnx)< 1){
				
				$error = "<br><br><p><em>You have not amended anything! Redirecting....</em></p>";  
				header("refresh:2; url=estimates.php");
			}
			else
			{
				$success =  "<br><p><em>Repair details have been updated successfully! Redirecting....</em></p>";
				header("refresh:2; url=estimates.php");
			}
			
			
			// if ( isset($_POST['submit']) ) {
				//Display the results again
			// 	$sql="SELECT * FROM stock WHERE stock_id = $id";
				
			// 	$res = mysqli_query($dbcnx, $sql);
			// 	if ( !$res ) {
			// 		echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
			// 		exit();
			// 	}
				
			// 	else 
			// 	{
			// 		$row = mysqli_fetch_array($res); 
			// 		$cust_id = $row['Cust_ID'];
			// 		$brand = $row['Brand'];
			// 		$model = $row['Model'];
			// 		$description = $row['Description'];
			// 	}
			// }
			//free results
			mysqli_free_result($res);
			
			//close the connection
			mysqli_close($dbcnx);
			
		}
	}
?>	