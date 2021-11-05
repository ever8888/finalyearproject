<?php
require "DataBaseConfig.php";

$id=$_REQUEST["id"];
	 
$sql="SELECT * FROM worker WHERE worker_id='$id'";

$result=mysqli_query($conn,$sql);
$user= array();


while($row=mysqli_fetch_assoc($result)){
	$index['name']= $row['worker_name'];
	$index['email']= $row['worker_email'];
	$index['earning']= $row['worker_salary'];

	array_push($user,$index);
}

echo json_encode($user);
?>