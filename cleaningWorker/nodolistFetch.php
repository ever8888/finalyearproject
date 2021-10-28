<?php
require "DataBaseConfig.php";

$id=$_REQUEST["id"];

$sql="SELECT * FROM service WHERE service_name='$id'";

$result=mysqli_query($conn,$sql);
$user= array();


while($row=mysqli_fetch_assoc($result)){
	$index['service_nodolist']= $row['service_nodolist'];

	array_push($user,$index);
}

echo json_encode($user);
?>