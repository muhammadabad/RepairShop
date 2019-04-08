<?php
	include('../includes/config.php');
	$edit = '';
	$query="SELECT DISTINCT r.rep_id, r.cust_id, r.description, r.devicetype, r.model, r.brand, r.date, r.amount, r.profit, r.comment, r.workdone, r.paymentreceiveddate, r.paymentstatus, r.repairdate, r.collectiondate, r.status FROM repairs r ORDER BY r.rep_id desc";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$arr = array();
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$arr[] = $row;	  
		}
	}
	# JSON-encode the response
	$json_response = json_encode($arr);
	
	// # Return the response
	echo $json_response;
?>
