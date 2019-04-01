<?php
	require_once('session.php');
	require_once('addNewItem.php');
	include "header.php";
?>

			
			
			<!--Breadcrumb -->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li id="back"><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="inventory.php">Inventory</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Add New Item</span>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class="full-widget">		
					
					<form class="form-4" action="" method="post">
						<h1>Adding a new item to the inventory: </h1>
						<span id="msg">
							<?php 
								echo $success; 
								echo $error;
							?>
						</span>
						<input type="text" name="description" placeholder="Description" required>
						<input type="number" name="quantity" placeholder="Quantity" required>
						<input type="text" name="price" placeholder="Price" required>
						<input type="submit" name="submit" value="ADD NEW ITEM">
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