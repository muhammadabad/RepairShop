<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
$(document).ready(function () {
    window.print();
});
</script>
<?php
session_start();
// Require composer autoload
// require_once __DIR__ . '../vendor/autoload.php';
require '../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->text_input_as_HTML = false;
$stylesheet = file_get_contents('style.css');
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$html = '<!DOCTYPE html>
<body>
<div id="printContainer">
    <h2 id="slogan" style="margin-top:0" class="text-center">M/s Akhtar Sweets</h2>
	<p style="
    font-size: 12px;">
	7,Kassaban, Main Road, Khalapar, Muzaffarnagar (UP)-251002
	Phone:7017852885<br>
	GSTIN:09DOGPR7800C1ZW</p>
	<hr>
    <table>
        <tr>
            <td><p style="
			font-size: 12px;">Invoice No.</p></td>
            <td><b>'.$_REQUEST['invoice_no'].'</b></td>
        </tr>
        <tr>
            <td><p style="
			font-size: 12px;">Created At</p></td>
            <td><b>'.$_REQUEST['order_date'].'<br></b></td>
        </tr>

        <tr>
            <td><p style="
			font-size: 12px;">Customer Name</p></td>
            <td><b>'.$_REQUEST['cust_name'].'</b></td>
        </tr>
    </table>
    <hr>

    <table>
		<tr>
			<td><b>S.No.</b></td>
			<td><b>Item</b></td>
			<td><b>Qty.</b></td>
			<td><b>Price</b></td>
			<td><b>Total</b></td>
        </tr>
        <tr><td colspan="6"><hr></td></tr>';
		for ($i=0; $i < count($_GET["pid"]) ; $i++) {
			$html.='<tr><td>'.($i+1).'</td>
			<td>'.$_GET["pro_name"][$i].'</b></td>
			<td>'.$_GET["qty"][$i].'</td>
			<td>'.$_GET["price"][$i].'</td>
			<td>'.$_GET["tamt"][$i].'</td></tr>';
		}
        $html.='
    </table>
    <hr>

    <table>
        <tr>
			<td><b>Sub Total</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
	
			<td colspan="16"></td>

            <td><b>'.$_GET["sub_total"].'</b></td>
        </tr>
       
        <tr>
		<td><b>Grand Total</b></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>

		<td colspan="16"></td>
		<td><b>'.$_GET["net_total"].'</b></td>
        </tr>
    </table>
	<hr><br>
	<br>
	<br>
	<br>
	<h2 style="text-align:center;">TOKEN</h2>
<table>
<tr>
			<td><b>S.N Name</b></td>
			<td><b>Item Name</b></td>
			<td><b>Qty.</b></td>
        </tr>
<tr><td colspan="6"><hr></td></tr>';
for ($i=0; $i < count($_GET["pid"]) ; $i++) {
	$html.='<tr><td>'.($i+1).'</td>
	<td>'.$_GET["pro_name"][$i].'</b></td>
	<td>'.$_GET["qty"][$i].'</td>';
}
$html.='
</table>
</div>
</body>
</html>';
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output("../PDF_INVOICE/PDF_INVOICE_".$_GET['invoice_no'].".pdf","F");
// Output a PDF file directly to the browser
$mpdf->Output();
?>

