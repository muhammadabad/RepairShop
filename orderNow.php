<?php
	require_once('session.php');
	require_once('newOrder.php');
	require_once('ordered.php');
	include 'header.php';
?>
	<style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); 
			
			table {
            width: 100%;
			}
			
            table th {
			padding: 10px;
			background-color: #48577D;
			color: #fff;
			text-align: left;
            }
			
            table td {
			padding: 5px;
            }
			table tr {
			background-color: #d3dcf2;
            }
			
		</style>	
			<!--Breadcrumb -->
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="estimatse.php">Estimates</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Order Now</span>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class="full-widget">		
					<span id="msg">
						<?php 
							echo $success; 
							echo $error;
						?>
					</span>
					<form class="form-4" action="" method="post">
						
						Repair ID: <input type="text" name="rep_id" placeholder="Repair ID Isn't valid, redirecting..." value="<?php echo $repair; ?>" readonly>
					    
						<table>
							<tr>
								<th>Stock#</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Items Price</th>
							</tr>
							<?php
								$conn= mysqli_connect("localhost", "root", "", "compsys");
								$sql="SELECT * FROM stock WHERE stock_id IN (";
								
								foreach($_SESSION['cart'] as $id => $value) {	
									$sql .= $id .",";
								}
								
								//$sql[37] = ' ';  
								$sql=substr($sql, 0, -1) .") ORDER BY stock_id ASC";
								//$query=mysql_query($sql);
								
								$res = mysqli_query($conn, $sql);
								if (!$res) {
									printf("Nothing in the basket: %s\n", "Go back");
									exit();
								}
								
								$totalprice=0;
								while($row = mysqli_fetch_array($res)){
									$subtotal = $_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'];
									$totalprice += $subtotal;
								?>
								<tr>
									<td><?php echo $row['description'] ?></td>
									<td><input type="text" name="quantity[<?php echo $row['stock_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['stock_id']]['quantity'] ?>" readonly /></td>
									<td><?php echo  $row['price'].'&nbsp'.'AED' ?></td>
									<td><?php echo $_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'].'&nbsp'.'AED' ?></td>
								</tr>
								<?php
									
								}
							?>
							<tr>
								<td colspan="4"><h4>Total Price: <?php echo $totalprice .'&nbsp'.'AED' ?></h3></td>
							</tr>
							
						</table>
						<input type="submit" name="order" value="Confirm Order">
						
					</form>
					
				</div>
				
			</div> 
			<!-- END OF FLOATS-->
		</div>
		<!-- END OF MAIN-->
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		
	</body>
	
</html>