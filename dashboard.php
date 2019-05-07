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
						
						<li data-toggle="modal" data-target="#exampleModal">
							<!-- <a href="addRepair.php"> -->
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
</style>
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/jjquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
		<script src="js/menu.js"></script>
<script src="js/maxbootstrap.min.js"></script>

 <link rel="stylesheet" href="css/modal.css">
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

 