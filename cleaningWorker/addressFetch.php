<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];

$sql="SELECT * FROM address WHERE cust_id=$id";

$result=mysqli_query($conn,$sql);
$user= array();


while($row=mysqli_fetch_assoc($result)){
	$index['cust_address']= $row['cust_address'];
	array_push($user,$index);
	
}

echo json_encode($user);
?>