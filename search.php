<?php
	$error = '';
	$customer = '';
	if(isset($_POST['search_box'])) {
		
		if(preg_match("/^[A-Za-z0-9]+/", $_POST['search_box'])){ 
			
			$name = $_POST['search_box']; 
			if (strlen($name) <= 15) {
				include 'dbconnect.php';
				/*adding connection
				$conn= mysqli_connect("localhost", "root", "", "compsys");
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}*/
				
				$query = "SELECT * FROM customers WHERE  cust_id LIKE '%" . $name . "%' OR name LIKE '%" . $name . "%' OR town LIKE '%" . $name . "%' OR county LIKE '%" . $name . "%' OR type LIKE '%" . $name . "%'";
				
				$result= mysqli_query($conn, $query);
				
				if (!$result) {
					$error = "Could not connect to the database!";
				}
				
				if(mysqli_num_rows($result) == 0) {
					$error = "<ul> <li>Sorry, your search query (\"" .$name ."\") did not find any results!</li></ul>";
				}
				//-create  while loop and loop through result set
				while($row = mysqli_fetch_array($result)){
					$ID = $row['cust_id'];
					$name = $row['name'];
					$town = $row['town'];
					$county = $row['county'];
					$tel = $row ['tel'];
					$type = $row ['type'];
					
					//-display the result of the array
				    $customer = $customer . "<ul>\n  <li>".$ID." ".$name.  " "   .$town . " "   .$county . " "   .$tel . "</li>\n\n\n\n\n</ul>";
				}
				mysqli_close($conn);
				
				} else {
				$error = "<ul> <li>Sorry, too many characters!</li></ul>";
			}	//end of string lenght check	
		} 	
	}
?>
