<?php
require "DataBaseConfig.php";

$id=$_REQUEST["id"];


$sql="SELECT * FROM booking_history WHERE service_name='$id' AND rating!=0";

$sql2="SELECT count('1') FROM booking_history WHERE service_name='$id' AND rating!=0";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($result2);
$tot=$row2[0];

$result=mysqli_query($conn,$sql);
$user= array();
$index['total']= $tot;

if($tot!=0)
{
while($row=mysqli_fetch_assoc($result)){
	
	
	$a=$row['cust_id'];
	$sql2="SELECT * FROM customer WHERE cust_id='$a'";

    $result2=mysqli_query($conn,$sql2);
	while($row2=mysqli_fetch_assoc($result2)){
		$index['customer_name']= $row2['cust_name'];
	}
	
	$index['rate']= $row['rating'];
	$index['review']=$row['review'];
	
	array_push($user,$index);
}
}
else
{
	$index['customer_name']= "";
	$index['rate']= "";
	$index['review']="";
	array_push($user,$index);
}
echo json_encode($user);
?>