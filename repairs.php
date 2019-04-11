<?php
	require('session.php');
	include 'header.php';
?>

			<div class="bread">
				<div class="submenu">
					<ul>
						<li id="update" value="Update Repair">Update Repair</li>
						<li id="add"><a href="addRepair.php">Add Repair</a></li>
						<li id="invoice" value="Generate Invoice">Generate Invoice</li>
					</ul>
				</div>
				<h3>Repairs</h3>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class="full-widget" id="searchDiv" style="display:none;">
					
					<form class="form-4" method="post" action="updateRepair.php">	
						<p>Enter Repair ID number:</p> <br>
						<input type="number" name="record" placeholder="Enter ID number e.g. 1" min="1" maxlength="10" required>
						<input type="submit" name="go" value="Go to update >>">	
						</form>
					
				</div>

				<div class="full-widget" id="invoiceDiv" style="display:none;">
					
					<form class="form-4" method="post" action="generateInvoice.php">	
						<p>Enter Repair Id for Generating Invoice:</p> <br>
						<input type="number" name="invoice_id" placeholder="Enter ID number e.g. 1" min="1" maxlength="10" required>
						<input type="submit" name="submit" value="Go for Invoice >>">	
						</form>
					
				</div>
				
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
										<th>Name&nbsp;<a ng-click="sort_by('Name');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>DeviceType&nbsp;<a ng-click="sort_by('device');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Brand&nbsp;<a ng-click="sort_by('brand');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Model&nbsp;<a ng-click="sort_by('model');"><i class="glyphicon glyphicon-sort"></i></a></th>
										
										<th>WorkDone&nbsp;<a ng-click="sort_by('work_done');"><i class="glyphicon glyphicon-sort"></i></a></th>
										
										<th>Amount&nbsp;<a ng-click="sort_by('amount');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Profit&nbsp;<a ng-click="sort_by('profit');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>PaymentReceivedDate&nbsp;<a ng-click="sort_by('pay_date');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>PaymentStatus&nbsp;<a ng-click="sort_by('pay_status');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>DateAdded&nbsp;<a ng-click="sort_by('repairdate');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>UpdateDate&nbsp;<a ng-click="sort_by('collectiondate');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Status&nbsp;<a ng-click="sort_by('status');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Comment&nbsp;<a ng-click="sort_by('comment');"><i class="glyphicon glyphicon-sort"></i></a></th>

									</thead>
									<tbody>
										<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
											<td>{{data.rep_id}}</td>
											<td>{{data.cust_name}}</td>
											<td>{{data.devicetype}}</td>
											<td>{{data.brand}}</td>
											<td>{{data.model}}</td>
											
											<td>{{data.workdone}}</td>
											
											<td>{{data.amount}}</td>
											<td>{{data.profit}}</td>
											<td>{{data.paymentreceiveddate}}</td>
											<td>{{data.paymentstatus}}</td>
											<td>{{data.repairdate}}</td>
											<td>{{data.collectiondate}}</td>
											<td>{{data.status}}</td>
											<td>{{data.comment}}</td>
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
		<script src="js/angular.min.repair.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.repair.js"></script>
		<script src="app/repair.js"></script>  
		
		<script>	
			function showDiv() {
				document.getElementById('searchDiv').style.display = "block";
			}
			
			$( "#update" ).click(function() {
				$( "#searchDiv" ).toggle( "slow", function() {
					// Animation complete.
				});
			});
			function showInvoice() {
				document.getElementById('invoiceDiv').style.display = "block";
			}
			
			$( "#invoice" ).click(function() {
				$( "#invoiceDiv" ).toggle( "slow", function() {
					// Animation complete.
				});
			});
		</script>
		
	</body>
	
</html> 								