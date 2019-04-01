<?php
	require_once('session.php');
	require_once('update/estimate/updateForm.php');
	require_once('update/estimate/estimateUpdate.php');
	require_once('update/functions.php');
	include 'header.php';
?>

			<!--Breadcrumb -->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						<li id="add"><a href="addRepair.php">Add Estimate</a></li>
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="estimates.php">Estimate</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Update Estimate</span>
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
	
						Estimate_ID: <input type="text" name="stock_id" value="<?php echo $stock_id; ?>" readonly>
						Description: <input type="text" name="description" value="<?php echo $description;?>">
						Quantity: <input type="text" name="quantity" value="<?php echo $quantity; ?>" required>
						Price: <input type="text" name="price" value="<?php echo $price; ?>" required>
						<input type="submit" name="submit" value="Update Estimate Details">
						
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