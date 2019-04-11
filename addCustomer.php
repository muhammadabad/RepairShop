<?php
	require_once('session.php');
	require_once('addNewCustomer.php');
	include "header.php";
?>

			
			<!--Breadcrumb -->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						<li id="add"><a href="addCustomer.php">Add Customer</a></li>
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="customer.php">Customers</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Add Customer</span>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class="full-widget">		
					
					<form class="form-4" action="" method="post">
						<h1>Adding a new customer/vendor: </h1>
						<span id="msg">
							<?php 
								echo $success; 
								echo $error;
							?>
						</span>
						<input type="text" name="name" placeholder="Name" required>

						<input type="text" name="town" placeholder="Town" required>
						
						<input type="text" name="county" placeholder="County" required>
						
						<input type="text" name="telephone" placeholder="Telephone/Mobile" required>

						<select name="type">
                        <option value="Vendor">Vendor</option>
                        <option value="Customer">Customer</option>
						</select>

						<input type="submit" name="submit" value="Submit">
					</form>
					
				</div>
				
			</div> 
			<!-- END OF FLOATS-->
		</div>
		<!-- END OF MAIN-->
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		
	</body>
	
</html> 								