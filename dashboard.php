<?php
	require('session.php');
	require('piechart.php');
	include 'header.php';
?>

			
			
			<!--Breadcrumb -->
			<div class="bread dash"><h3>Home</h3></div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				
				<!-- Easy access links -->
				<div class="widget-content small-widget">
					<h1 class="center">Get Started</h1>
					<ul>
						
						<li>
							<a href="addCustomer.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>New Customer</span>
							</a>
						</li>
						
						<li>
							<a href="addRepair.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>New Repair</span>
							</a>
						</li>
						
						<!-- <li>
							<a href="chooseProducts.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>New Estimate</span>
							</a>
						</li>
						
						<li>
							<a href="addInventory.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>New Stock Item</span>
							</a>
						</li> -->
						
					</ul>
				</div>
				<!-- Easy access links -->
				
				
				<!-- Repair Summary -->
				<div class="widget-content wide-widget">
					<h1 class="center">Repair Summary</h1>
					<!--Div that will hold the pie chart-->
					<div id="pie_chart" style="width: 100%; height: 362px;"></div>
				</div>
				<!-- Repair Summary -->
				
				
			</div>
		</div>
		
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		
	</body>
	
</html> 				