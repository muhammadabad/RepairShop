<?php
	require_once('session.php');
	require_once('update/repairForm.php');
	require_once('update/repairUpdated.php');
	require_once('update/functions.php');
	include 'header.php';
?>

			<!--Breadcrumb -->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						<li id="add"><a href="addRepair.php">Add Repair</a></li>
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="repairs.php">Repairs</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Update Repair</span>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class="full-widget">		
					<span id="msg">
						<?php 
							echo $success; 
							echo $error;
						?>
					</span>
					<form class="form-4" action="" method="post">
						<input type="hidden" name="ud_id" value="<?php echo $id; ?>" readonly>
						Customer_ID: <input type="text" name="ud_cust_id" value="<?php echo $cust_id; ?>" readonly>
						<input type="hidden" name="ud_staff_id" value="<?php echo $staff_id; ?>" readonly>
						Device Type: <select id="" name="ud_device" class="" required="">
							<option value="Laptop" <?php if($row['DeviceType'] == 'Laptop') { ?> selected="selected"<?php } ?>>Laptop</option> 
							<option value="Desktop" <?php if($row['DeviceType'] == 'Desktop') { ?> selected="selected"<?php } ?>>Desktop</option>
							<option value="Printer" <?php if($row['DeviceType'] == 'Printer') { ?> selected="selected"<?php } ?>>Printer</option>
							<option value="Other" <?php if($row['DeviceType'] == 'Other') { ?> selected="selected"<?php } ?>>Other</option>  
						</select>
						Brand: <input type="text" name="ud_brand" value="<?php echo $brand; ?>" required>
						Model: <input type="text" name="ud_model" value="<?php echo $model; ?>" required>
						
						Work Done: <input type="text" name="ud_work_done" value="<?php echo $work_done;?>" required>
						
						Amount: <input type="Number" name="ud_amount" value="<?php echo $amount;?>">
						Profit: <input type="Number" name="ud_profit" value="<?php echo $profit;?>">
						Date: <input type="date" name="ud_date" value="<?php echo $date;?>" required><br>
						Status: <select id="" name="ud_status" class="" required="">
							<option value="New" <?php if($row['Status'] == 'New') { ?> selected="selected"<?php } ?>>New</option> 
							<option value="In Progress" <?php if($row['Status'] == 'In Progress') { ?> selected="selected"<?php } ?>>In Progress</option>
							<option value="Resolved" <?php if($row['Status'] == 'Resolved') { ?> selected="selected"<?php } ?>>Resolved</option>
							<option value="Waiting for Parts" <?php if($row['Status'] == 'Waiting for Parts') { ?> selected="selected"<?php } ?>>Waiting for Parts</option>
							<option value="Waiting for Customer" <?php if($row['Status'] == ' Waiting for Customer') { ?> selected="selected"<?php } ?>>Waiting for Customer</option> 
							<option value="Validated" <?php if($row['Status'] == 'Validated') { ?> selected="selected"<?php } ?>>Validated</option>
							<option value="Invoiced" <?php if($row['Status'] == 'Invoiced') { ?> selected="selected"<?php } ?>>Invoiced</option> 
							<option value="Estimate Assigned" <?php if($row['Status'] == 'Estimate Assigned') { ?> selected="selected"<?php } ?>>Estimate Assigned</option> 
						</select>
						Payment Received Date: <input type="date" name="ud_pay_date" value="<?php echo $pay_date;?>"><br>
						PaymentStatus: <select id="" name="ud_pay_status" class="" required="">
							<option value="Pending" <?php if($row['PaymentStatus'] == 'Pending') { ?> selected="selected"<?php } ?>>Pending</option> 
							<option value="Partially Paid" <?php if($row['PaymentStatus'] == 'Partially Paid') { ?> selected="selected"<?php } ?>>Partially Paid</option>
							<option value="Paid" <?php if($row['PaymentStatus'] == 'Paid') { ?> selected="selected"<?php } ?>>Paid</option>
						</select>
						Comment: <input type="text" name="ud_comment" value="<?php echo $comment;?>">
						Description: <textarea rows="5" name="ud_description"><?php echo $description; ?></textarea>
						<input type="submit" name="submit" value="Update Repair Details">
						
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