<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
$(document).ready(function () {
    window.print();
});
</script>

<?php
include 'dbconnect.php';
require 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->text_input_as_HTML = false;
$stylesheet = file_get_contents('style.css');


	$success = '';
	$notFound =  '';
	if (isset($_POST['submit'])) {
		
		// Define $username and $password
		$cust_id = $_POST['cust_id'];
		$staff_id = $_POST['staff_id'];
		$description = $_POST['description'];
		$device = $_POST['device'];
		$brand = $_POST['brand'];
		$model = $_POST['model'];
		
		$work_done= $_POST['work_done'];
		
		$amount= $_POST['amount'];
		$profit= $_POST['profit'];
		$date= $_POST['date'];
		$status= $_POST['status'];
		
		$comment= $_POST['comment'];
		
		
		/* Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$conn= mysqli_connect("localhost", "root", "", "compsys");
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}*/
		
		// To protect MySQL injection for Security purpose			
		$cust_id = stripslashes($cust_id);
		$staff_id = stripslashes($staff_id);
		$description = stripslashes($description);
		$device = stripslashes($device);
		$brand = stripslashes($brand);
		$model = stripslashes($model);
		
		$work_done= stripslashes($work_done);
		
		$amount= stripslashes($amount);
		$profit= stripslashes($profit);
		$date= stripslashes($date);
		$status= stripslashes($status);
		
		$comment= stripslashes($comment);
		
		$cust_id = mysqli_real_escape_string($conn, $cust_id);
		$staff_id = mysqli_real_escape_string($conn, $staff_id);
		$description = mysqli_real_escape_string($conn, $description);
		$device = mysqli_real_escape_string($conn, $device);
		$brand = mysqli_real_escape_string($conn, $brand);
		$model = mysqli_real_escape_string($conn, $model);
		
		$work_done= mysqli_real_escape_string($conn, $work_done);
		
		$amount= mysqli_real_escape_string($conn, $amount);
		$profit= mysqli_real_escape_string($conn, $profit);
		$date= mysqli_real_escape_string($conn, $date);
		$status= mysqli_real_escape_string($conn, $status);
		
		$comment= mysqli_real_escape_string($conn, $comment);
		
		
		if( is_numeric( $cust_id ) ) {
			$query = "SELECT * FROM repairs";
			$valid = mysqli_query($conn, $query);
			
			if (!$valid) {
				$notFound = "Could not connect to the database!<br><br>";
			}
			
			
			$sql = "INSERT INTO repairs (cust_id, staff_id, description, devicetype, brand, model, workdone, amount, profit, comment, status, date)
			VALUES ('$cust_id', '$staff_id', '$description', '$device', '$brand', '$model', '$work_done', '$amount', '$profit', '$comment', '$status', '$date')";
			$res = mysqli_query($conn, $sql);
			
			if (!$res) {
				$notFound = "Error adding...<br><br>";
			}else{
				// for custommer name on the basis of repair
				$sql="SELECT customers.cust_id,customers.forename as customerforename,customers.surname as customersurname,repairs.Cust_ID,repairs.Staff_ID,staff.surname as staffsurname,staff.forename as staffforename FROM customers INNER JOIN repairs on repairs.Cust_ID = customers.cust_id INNER JOIN staff on repairs.staff_ID = staff.staff_id WHERE repairs.Cust_ID = $cust_id";
				$query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($query);


			$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$html = '<!DOCTYPE html>
<body>
<div id="printContainer">
    <h2 id="slogan" style="margin-top:0" class="text-center">P C Solution</h2>
	<p style="font-size: 12px;">Address : xyz Phone:8273067009<br>
	
	<hr>
    <table>
        <tr>
            <td><p style="font-size: 15px;">Invoice No :'. $_POST['cust_id'].' </p></td>
        </tr>
        <tr>
            <td><p style="font-size: 15px;">Created At: '.date('Y/m/d').'</p4></td>
        </tr>

        <tr>
            <td><p style="font-size: 15px;">Customer Name : '.$row['customerforename']."    ". $row['customersurname'].'</p></td>
        </tr>
    </table>
	<hr>
	<table>
        <tr>
            <td><p style="font-size: 15px;">Device Type : '.$_POST['device'].'</p></td>
        </tr>
        <tr>
            <td><p style="font-size: 15px;">Brand : '.$_POST['brand'].'</p></td>
        </tr>

        <tr>
            <td><p style="
			font-size: 15px;">Operation System : '.$_POST['os'].'</p></td>
		</tr>
		<tr>
            <td><p style="
			font-size: 15px;">Service: '.$_POST['description'].'</p></td>
		</tr>
		
		
	</table>
	
	<hr>
	
	<p style = "font-size : 15px;"> Delivery Date : '.date('Y-m-d',strtotime('+10 day')).'</p>
	<p style = "font-size : 15px;"> Staff Name : '.$row['staffforename']." " .$row['staffsurname'].'</p>
	<p style = "fornt-size : 15px"> Staff Sign : </p>

    

</div>
</body>
</html>';
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output("slip/".$row['customerforename']."_".$_POST['cust_id'].".pdf","F");
// Output a PDF file directly to the browser
$mpdf->Output();
			}
			
			if (mysqli_affected_rows($conn) == 1) {

				$success =  "Repair added successfully. Redirecting.....<br><br>";
				$id = $cust_id;
				// header("refresh:5; url=repairs.php");
				
				} else {
				$notFound =  "Could not add due to system error!<br><br>";
			}
			
			} else {
			$id = $cust_id;
			$notFound = "Customer wasn't found in the system. Please go back and enter a valid customer ID <br><br>";
		}
		mysqli_close($conn);
	}
?>

