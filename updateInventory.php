<?php
	require_once('session.php');
	require_once('update/inventoryForm.php');
	require_once('update/inventoryUpdated.php');
	include 'header.php';	
?>

			<!--Breadcrumb -->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						<li id="add"><a href="addInventory.php">Add New Item</a></li>
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="inventory.php">Inventory</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Update Inventory</span>
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
						Stock ID: <input type="text" name="ud_id" placeholder="Stock ID is invalid" value="<?php echo $id; ?>" readonly>
						Description: <input type="text" name="ud_description" value="<?php echo $description; ?>" required>
						Quantity: <input type="number" name="ud_quantity" value="<?php echo $quantity; ?>" required>
						Price: <input type="text" name="ud_price" value="<?php echo $price; ?>" required>
						<input type="submit" name="submit" value="Update Inventory Details">
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