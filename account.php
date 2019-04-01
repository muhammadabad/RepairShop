<?php
	require_once('session.php');
	include 'header.php';
	include 'dbconnect.php';
?>

			
			
			<div class="floats">
				<div class=" full-widget">
					<?php
						$staff = '';
						/*$conn= mysqli_connect("localhost", "root", "", "compsys");
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}*/
						
						$query = "SELECT * FROM staff WHERE staff_id = $login_id";
						
						$result= mysqli_query($conn, $query);
						
						if (!$result) {
							$error = "Could not connect to the database!";
						}
						
						if(mysqli_num_rows($result) == 0) {
							$error = "<ul> <li>Sorry, your search query (\"" .$name ."\") did not find any results!</li></ul>";
						}
						//-create  while loop and loop through result set
						while($row = mysqli_fetch_array($result)){
							$ID = $row['staff_id'];
							$firstname  =$row['forename'];
							$lastname=$row['surname'];
							$town = $row['town'];
							$county = $row['county'];
							$tel = $row ['tel'];
							
							//-display the result of the array
							$staff = "<ul><h1><li>" .$firstname . " " . $lastname .  "</li><li> "   .$town . "</li><li> "   .$county . "</li><li> "   .$tel . "</li></h1></ul>";
							echo $staff;
						}
						mysqli_close($conn);

				?>
				
			</div> 
			<!-- END OF FULL WIDGET-->
		</div> 
		<!-- END OF FLOATS-->
	</div>
	<!-- END OF MAIN-->
	
	<!-- SCRIPT FOR THE MENU -->
	<script src="js/menu.js"></script>
	<!-- SCRIPT FOR THE MENU --> 
	
</body>

</html>