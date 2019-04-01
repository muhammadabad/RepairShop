<?php
	require_once('session.php');
	require_once('delete/inventoryDelete.php');
	include 'header.php';
?>

			
			<!--Breadcrumb -->
			<div class="bread">
				<div class="submenu">
					<ul>
						<li><a href="estimates.php">Go Back</a></li>
						<li id="add"><a href="chooseRepair.php">Order Now</a></li>
					</ul>
				</div>
				<h3>Choose Products</h3>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				
				<div class=" full-widget">
					
					<?php require_once('displayProducts.php'); ?>
					
				</div> 
				<!-- END OF FULL WIDGET-->
				
				
			</div> 
			<!-- END OF FLOATS-->
		</div>
		<!-- END OF MAIN-->
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/angular.min.customer.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.customer.js"></script>
		<script src="app/inventory.js"></script>  
		
		<script>	
			$( "#products" ).click(function() {
				$( "#productDiv" ).toggle( "slow", function() {
					// Animation complete.
				});
			});
		</script>
		
	</body>
	
</html>