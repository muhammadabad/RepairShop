<?php
	require_once('session.php');
	require_once('addNewRepair.php');
	require_once('update/customerForm.php');
	require_once('update/functions.php');
	include 'header.php';
?>
			
			
			<!--Breadcrumb -->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li id="back"><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="repairs.php">Repairs</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Add Repair</span>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class="full-widget">		
					
					<form class="form-4" action="addNewRepair.php" method="post">
						<h1>Adding a new repair: </h1>
						<span id="msg">
							<?php 
								echo $success; 
								echo $notFound;
							?>
						</span>
						Customer ID: <input type="text" name="cust_id" placeholder="Customer ID is invalid" value="<?php echo $id; ?>" readonly>
						<input type="hidden" name="staff_id" value="<?php echo $login_id; ?>" readonly>
						<?php echo enumDropdown("repairs", "DeviceType", "device"); ?>
						<input type="text" name="brand" placeholder="Brand" required>
						<input type="text" name="model" placeholder="Model" required>
                        
						<input type="text" name="work_done" placeholder="Work Done" required>
						
						<input type="Number" name="amount" placeholder="Amount">
						<input type="Number" name="profit" placeholder="Profit">
						Date: <input type="Date" name="date" required>
						<?php echo enumDropdown("repairs", "Status", "status"); ?>
						
						<input type="text" name="comment" Placeholder="Comment">
						<textarea rows="5" name="description" placeholder="Description"></textarea>
						<input type="submit" name="submit" value="ADD NEW REPAIR">
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