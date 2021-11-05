<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];



$sql="SELECT * FROM booking_history WHERE worker_id=$id OR worker2_id=$id OR worker3_id=$id OR worker4_id=$id";

$result=mysqli_query($conn,$sql);
$user= array();


while($row=mysqli_fetch_assoc($result)){
	$index['list_name']= $row["list_name"];
	$index['booking_price']= $row["booking_price"];
	$index['service_name']= $row["service_name"];
	$index['booking_time']= $row["booking_time"];
	$index['booking_date']= $row["booking_date"];
	
	array_push($user,$index);
}

echo json_encode($user);
?>