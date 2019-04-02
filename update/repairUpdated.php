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
		
		
		$id = $_POST['ud_id'];
		$description = $_POST['ud_description'];
		$device = $_POST['ud_device'];
		$brand = $_POST['ud_brand'];
		$model = $_POST['ud_model'];
		
		$work_done = $_POST['ud_work_done'];
		
		$amount = $_POST['ud_amount'];
		$profit = $_POST['ud_profit'];
		$date = $_POST['ud_date'];
		$status = $_POST['ud_status'];
		$pay_date = $_POST['ud_pay_date'];
		$pay_status = $_POST['ud_pay_status'];
		$comment = $_POST['ud_comment'];
		
		$sql = "UPDATE repairs SET description = '$description',  devicetype = '$device', brand = '$brand', model = '$model', status = '$status', workdone= '$work_done', amount = '$amount', profit = '$profit', date = '$date', paymentreceiveddate = '$pay_date', paymentstatus = '$pay_status', comment = '$comment' WHERE rep_id = $id" ;
		
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
				header("refresh:2; url=repairs.php");
			}
			else
			{
				$success =  "<br><p><em>Repair details have been updated successfully! Redirecting....</em></p>";
				header("refresh:2; url=repairs.php");
			}
			
			
			if ( isset($_POST['submit']) ) {
				//Display the results again
				$sql="SELECT * FROM repairs WHERE rep_id = $id";
				
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
			}
			//free results
			mysqli_free_result($res);
			
			//close the connection
			mysqli_close($conn);
			
		}
	}
?>	