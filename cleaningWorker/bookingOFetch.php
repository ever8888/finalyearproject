<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];

$sql="SELECT * FROM booking WHERE cust_id='$id' AND booking_status='OnGoing'";

$result=mysqli_query($conn,$sql);





$user= array();

while($row=mysqli_fetch_assoc($result)){
	
	$a=$row['service'];
	$sql2="SELECT service_name FROM service WHERE service_id='$a'";

    $result2=mysqli_query($conn,$sql2);

while($row2=mysqli_fetch_assoc($result2)){
	$index['service_name']= $row2['service_name'];
	array_push($user,$index);
}
	
}

echo json_encode($user);
?>
