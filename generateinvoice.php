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
        $invoice_id = $_POST['invoice_id'];

        if( is_numeric( $invoice_id ) ) 
        {
            $query="SELECT customers.cust_id,customers.forename as customerforename,customers.surname as customersurname,repairs.Cust_ID,
            repairs.DeviceType,repairs.Brand,repairs.Description,repairs.Staff_ID,staff.surname as staffsurname,staff.forename as staffforename 
            FROM customers INNER JOIN repairs on repairs.Cust_ID = customers.cust_id INNER JOIN staff on repairs.staff_ID = staff.staff_id WHERE repairs.Rep_ID = $invoice_id";
            $run = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($run);
            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$html = '<!DOCTYPE html>
<body>
<div id="printContainer">
    <h2 id="slogan" style="margin-top:0" class="text-center">P C Solution</h2>
    <p style="font-size: 12px;">Address : xyz Phone:8273067009<br>
	<hr>
    <table>
        <tr>
            <td><p style="font-size: 15px;">Invoice No :'. $_POST['invoice_id'].' </p></td>
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
            <td><p style="font-size: 15px;">Device Type : '.$row['DeviceType'].'</p></td>
        </tr>
        <tr>
            <td><p style="font-size: 15px;">Brand : '.$row['Brand'].'</p></td>
        </tr>
		<tr>
            <td><p style="
			font-size: 15px;">Service: '.$row['Description'].'</p></td>
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

//$mpdf->Output("slip/".$row['customerforename']."_".$_POST['cust_id'].".pdf","F");
// Output a PDF file directly to the browser
$mpdf->Output();
			

        }

        else
        {
        $notFound = "Invoice Id should be a Number";
        }
    }
?>