<?php
require "DataBaseConfig.php";

$id=$_REQUEST["id"];


$sql="SELECT * FROM booking_history WHERE bhistory_id='$id'";

$result=mysqli_query($conn,$sql);
$user= array();


while($row=mysqli_fetch_assoc($result)){
	$index['rating']= $row['rating'];
	$index['review']=$row['review'];
	
	array_push($user,$index);
}

echo json_encode($user);
?>