<?php
	require_once('session.php');
	include 'header.php';
?>

			<!--Breadcrumb -->
			<div class="bread">
				<div class="submenu">
					<ul>
						<li><a href="chooseProducts.php">Go Back</a></li>
						<li id="add"><a href="chooseRepair.php">Order Now</a></li>
					</ul>
				</div>
				<h3>Choose Products</h3>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				
				<div class=" full-widget">
					
					<div ng-controller="repairsCrtl">
						
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
								<br><br><p>Filtered {{ filtered.length }} of {{ totalItems}} total repairs</p>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12" ng-show="filteredItems > 0">
								<table class="table table-striped table-bordered">
									<thead>
										<th>ID&nbsp;<a ng-click="sort_by('rep_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Description&nbsp;<a ng-click="sort_by('description');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Model&nbsp;<a ng-click="sort_by('model');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>DateAdded&nbsp;<a ng-click="sort_by('repairdate');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>UpdateDate&nbsp;<a ng-click="sort_by('collectiondate');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Status&nbsp;<a ng-click="sort_by('status');"><i class="glyphicon glyphicon-sort"></i></a></th>
									</thead>
									<tbody>
										<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
											<td>{{data.rep_id}}</td>
											<td>{{data.description}}</td>
											<td>{{data.model}}</td>
											<td>{{data.repairdate}}</td>
											<td>{{data.collectiondate}}</td>
											<td>{{data.status}}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-12" ng-show="filteredItems == 0">
								<div class="col-md-12">
									<h4>No repairs found</h4>
								</div>
							</div>
							<div class="col-md-12" ng-show="filteredItems > 0">    
								<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
								
							</div>
						</div>
						
					</div> 
					<div>
						
						<form class="form-4" method="post" action="orderNow.php">	
							<p>Enter Repair ID to place a new order:</p> <br>
							<input type="number" name="record" placeholder="Enter ID number e.g. 1" min="1" maxlength="10" required>
							<input type="submit" name="go" value="Order Now >>">	
						</form>
						
					</div>
				</div> 
				<!-- END OF FULL WIDGET-->
				
				
			</div> 
			<!-- END OF FLOATS-->
		</div>
		<!-- END OF MAIN-->
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/angular.min.repair.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.repair.js"></script>
		<script src="app/repair.js"></script>  
		
		<script>	
			$( "#products" ).click(function() {
				$( "#productDiv" ).toggle( "slow", function() {
					// Animation complete.
				});
			});
		</script>
		
	</body>
	
</html>