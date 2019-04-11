<?php
	require('session.php');
	//require_once('update/searchupdate.php');
	include 'header.php';
?>

			<!--Breadcrumb -->
			<div class="bread">
				<div class="submenu">
					<ul>
						<li id="back"><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="repairs.php">Repairs</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Add Repair</span>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class=" full-widget">
					<div ng-controller="customerCrtl">
						
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
										<th>ID&nbsp;<a ng-click="sort_by('cust_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Name&nbsp;<a ng-click="sort_by('name');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Town&nbsp;<a ng-click="sort_by('town');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>County&nbsp;<a ng-click="sort_by('county');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Telephone&nbsp;<a ng-click="sort_by('tel');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Type&nbsp;<a ng-click="sort_by('type');"><i class="glyphicon glyphicon-sort"></i></a></th>
									</thead>
									<tbody>
										<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
											<td>{{data.cust_id}}</td>
											<td>{{data.name}}</td>
											<td>{{data.town}}</td>
											<td>{{data.county}}</td>
											<td>{{data.tel}}</td>
											<td>{{data.type}}</td>
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
						
					</div> 
					<!-- END OF CUSTOMERS LIST-->	
					
					<div>
					<form class="form-4" method="post" action="addRepairForm.php">	
							<p>Enter Customer's ID to Proceed with Repair:</p> <br>
							<input type="number" name="record" placeholder="Enter ID number e.g. 1" min="1" maxlength="10" required>
							<input type="submit" name="go" value="Go to repair form >>">	
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
		<script src="js/angular.min.customer.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.customer.js"></script>
		<script src="app/customer.js"></script> 

    </body>
	
</html> 