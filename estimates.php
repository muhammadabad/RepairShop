<?php
	require_once('session.php');
	require_once('delete/inventoryDelete.php');
	include 'header.php';
?>

	<div class="bread">
				<div class="submenu">
					<ul>
						<li id="products" value="Choose Products" onclick="hideList()">Update Estimate</li>
						<li id="add"><a href="chooseProducts.php">Choose Products</a></li>
					</ul>
				</div>
				<h3>Estimates</h3>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">

			<div class="full-widget" id="productDiv" style="display:none;">
					
					<form class="form-4" method="post" action="updateEstimate.php">	
						<p>Enter Estimate ID number:</p> <br>
						<input type="number" name="estimaterecord" placeholder="Enter ID number e.g. 1" min="1" maxlength="10" required>
						<input type="submit" name="go" value="Go to update >>">	
					</form>
					
				</div>
				
	
				<div class=" full-widget">
					
					<div ng-controller="inventoryCrtl">
						
						<div class="row">
							<div class="col-md-2">PageSize:
								<select ng-model="entryLimit" class="form-control">
									<option>5</option>
									<option>10</option>
									<option>20</option>
									<option>50</option>
									<option>100</option>
								</select>
							</div>
							<div class="col-md-3">Filter:
								<input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
							</div>
							<div class="col-md-4">
								<p>Filtered {{ filtered.length }} of {{ totalItems}} total customers</p>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12" ng-show="filteredItems > 0">
								<table class="table table-striped table-bordered">
									<thead>
										<th>ID&nbsp;<a ng-click="sort_by('stock_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Description&nbsp;<a ng-click="sort_by('description');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Quantity&nbsp;<a ng-click="sort_by('quantity');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Price&nbsp;<a ng-click="sort_by('price');"><i class="glyphicon glyphicon-sort"></i></a></th>
									</thead>
									<tbody>
										<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
											<td>{{data.stock_id}}</td>
											<td>{{data.description}}</td>
											<td>{{data.quantity}}</td>
											<td>{{data.price}}&nbsp;AED</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-12" ng-show="filteredItems == 0">
								<div class="col-md-12">
									<h4>No estimates found</h4>
								</div>
							</div>
							<div class="col-md-12" ng-show="filteredItems > 0">    
								<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
								
							</div>
						</div>
					</div> 
					<!-- END OF CUSTOMERS LIST-->	
					
					
					
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
			function hideList() {
				document.getElementById('list').style.display = "none";
			}
			
			$( "#products" ).click(function() {
				$( "#productDiv" ).toggle( "slow", function() {
					// Animation complete.
				});
			});
		</script>
		
	</body>
	
</html>