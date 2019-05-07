<?php
	require('session.php');
	include 'header.php';
?>

			<div class="bread">
				<div class="submenu">
					<ul>
						<!-- <li id="update" value="Update Repair">Update Repair</li> -->
					 <li id="add" data-toggle="modal" data-target="#exampleModal">Add Repair</li> 
						<!-- <li>
						<button type="button" style="background: #634056;color: white;border: none;" data-toggle="modal" data-target="#exampleModal">
							Add Repair</button>
					</li> -->
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
										<th>PaymentDate<a ng-click="sort_by('pay_date');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>PaymentStatus&nbsp;<a ng-click="sort_by('pay_status');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>DateAdded&nbsp;<a ng-click="sort_by('repairdate');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>UpdateDate&nbsp;<a ng-click="sort_by('collectiondate');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Status&nbsp;<a ng-click="sort_by('status');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Comment&nbsp;<a ng-click="sort_by('comment');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Action&nbsp;<a ng-click=""><i class="glyphicon glyphicon-sort"></i></a></th>

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
											<td>
											<form  method="post" action="updateRepair.php">	
											<input type="hidden" name="record" value="{{data.rep_id}}">
						<input type="submit" name="go" class="btn btn-primary" value="Update Repair">	
						</form>
											</td>
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
		
		<div class="modal fade in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h1>Adding a new repair: </h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form class="form-4" action="" method="post">
						<h1>Adding a new repair: </h1>
					
						Customer Name: 
						<input type="text" name="name" id="name" class="txtname" value=''>

						<input type="hidden" name="cust_id"  id='cust_id' value="" >

						<input type="hidden" name="staff_id"  id='staff_id' value="<?php echo $login_id; ?>" >



						<select id="device_type" name="DeviceType" class="" >
							<option value="Laptop" >Laptop</option> 
							<option value="Desktop" >Desktop</option>  
							<option value="Printer" >Printer</option>  
							<option value="Other" >Other</option>  
						</select>
						<input type="text" name="brand" id="brand" placeholder="Brand" required>
						<input type="text" name="model" id="model" placeholder="Model" required>
						<input type="text" name="work_done" id="work_done" placeholder="Work Done" required>	
						<input type="Number" name="amount" id="amount" placeholder="Amount">
						<input type="Number" name="profit" id="profit" placeholder="Profit">
						<select id="status" name="Status" class="" required="">
							<option value="New" >New</option> 
							<option value="InProgress" >InProgress</option>  
							<option value="Resolved" >Resolved</option>  
							<option value="WaitingForParts" >WaitingForParts</option>  
							<option value="WaitingForCustomer" >WaitingForCustomer</option> 
							<option value="Validated" >Validated</option>  
							<option value="Invoiced" >Invoiced</option>  
							<option value="EstimateAssigned" >EstimateAssigned</option>  
						</select>
						<input type="text" name="comment" id="comment" Placeholder="Comment">
						<input type="submit"  id="addRepair" value="ADD NEW REPAIR">
					</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
.fade {
    opacity: 1;
    -webkit-transition: opacity .15s linear;
    transition: opacity .15s linear;
}
.table th{
	padding: 5px!important;
    font-size: 13px!important;
}
}
</style>
	<script src="js/jjquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/maxbootstrap.min.js"></script>
<link rel="stylesheet" href="css/modal.css">


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
		<script type="text/javascript">

$(document).ready(function(){
	$( ".txtname" ).autocomplete({
source: function( request, response ) {
// Fetch data
$.ajax({
url: "ajax_autocomplete.php",
type: 'post',
dataType: "json",
data: {
 search: request.term
},
success: function( data ) {
 response( data );
}
});
},
select: function (event, ui) {
// Set selection
$('.txtname').val(ui.item.label); // display the selected text
$('#cust_id').val(ui.item.value); // save selected id to input
return false;
}
});

$('#addRepair').on('click',function(e){
 debugger;
	e.preventDefault();
				var tdata = {
										cust_id: $('#cust_id').val(),
										name: $('#name').val(),
										staff_id: $('#staff_id').val(),
										device: $("#device_type").val(),
										brand: $("#brand").val(),
										model: $("#model").val(),
										work_done: $('#work_done').val(),
										amount: $("#amount").val(),
										profit: $("#profit").val(),
										status: $("#status").val(),
										comment: $("#comment").val(),

				}
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
		type: 'POST',
		url: 'addNewRepair.php',
		data: tdata,
		success: function(res){
						debugger;
			if(res=='true'){
				$('#exampleModal').modal('hide');
				location.reload();
				alert("Done New Repair saved successfully!","success");


			}else{
								alert( "Oops Something went wrong!" ,  "error" );

			}
		},
	});
			});

});
</script>
	</body>
	
</html> 								