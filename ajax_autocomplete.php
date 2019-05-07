<?php
include'dbconnect.php';
// $dbHost = 'localhost';
// $dbUsername = 'root';
// $dbPassword = '';
// $dbName = 'compsys';
//connect with the database
// $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if(isset($_POST['search'])){
 $search = $_POST['search'];

 $query = "SELECT * FROM customers WHERE name like'%".$search."%'";
 $result = mysqli_query($conn,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
   $response[] = array("value"=>$row['cust_id'],"label"=>$row['name']);
 }

 echo json_encode($response);
}

exit;
?>