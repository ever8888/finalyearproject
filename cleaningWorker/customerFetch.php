<?php
require "DataBaseConfig.php";

$id=$_REQUEST["id"];



	 
	 
$sql="SELECT * FROM customer WHERE cust_id='$id'";

$result=mysqli_query($conn,$sql);
$user= array();


while($row=mysqli_fetch_assoc($result)){
	$index['cust_name']= $row['cust_name'];
	$index['cust_phoneNo']= $row['cust_phoneNo'];
	$index['cust_email']= $row['cust_email'];
	$index['cust_address']= $row['cust_address'];

	array_push($user,$index);
}

echo json_encode($user);
?>