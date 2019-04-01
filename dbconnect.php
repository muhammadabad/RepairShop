<?
	$conn = mysqli_connect("localhost","root","", "compsys");
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
?>