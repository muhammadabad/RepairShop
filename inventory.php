<?php
	require_once('session.php');
	require_once('delete/inventoryDelete.php');
	include 'header.php';
?>

			<!--Breadcrumb -->
			<div class="bread">
				<div class="submenu">
					<ul>
						<li value="Update Inventory" onclick="showUpdate()">Update Inventory</li>
						<li id="add"><a href="addInventory.php">Add New Item</a></li>
						<li id="del" value="Delete Inventory" onclick="showDelete()">Delete Inventory Item</li>
					</ul>
				</div>
				<h3>Inventory</h3>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
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
									<h4>No customers found</h4>
								</div>
							</div>
							<div class="col-md-12" ng-show="filteredItems > 0">    
								<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
								
							</div>
						</div>
						<span id="msg">
							<?php 
								echo $deleted;
								echo $notDeleted;
							?>
						</span>
					</div> 
					<!-- END OF CUSTOMERS LIST-->	
				</div> 
				<!-- END OF FULL WIDGET-->
				
				<div class="full-widget" id="updateDiv" style="display:none;">
					
					<form class="form-4" method="post" action="updateInventory.php">	
						<p>Enter ID number:</p> <br>
						<input type="number" name="record" placeholder="Enter stock number e.g. 1" min="1" maxlength="10" required>
						<input type="submit" name="go" value="Go to update >>">	
					</form>
					
				</div>
				
				<div class="full-widget" id="deleteDiv" style="display:none;">
					<form class="form-4" method="post" action="inventory.php">	
						<p>Enter the Stock ID you want to delete: </p> <br>
						<input type="number" name="stock_id" placeholder="Enter stock number e.g. 1" min="1" maxlength="10" required>
						<input type="submit" name="delete" value="Click to Delete" >	
					</form>
					
				</div>
				
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
			function showUpdate() {
				document.getElementById('updateDiv').style.display = "block";
				document.getElementById('deleteDiv').style.display = "none";
				document.getElementById('msg').style.display = "none";
			}
			
			function showDelete() {
				document.getElementById('deleteDiv').style.display = "block";
				document.getElementById('msg').style.display = "block";
				document.getElementById('updateDiv').style.display = "none";
			}
		</script>
		
	</body>
	
</html>