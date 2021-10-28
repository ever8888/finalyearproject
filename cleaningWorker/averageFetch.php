<?php
require "DataBaseConfig.php";

$id=$_REQUEST["id"];

$sql="SELECT count('1') FROM booking_history WHERE service_name='$id' AND rating!=0";
$sql2="SELECT * FROM booking_history WHERE service_name='$id' AND rating!=0";
$result=mysqli_query($conn,$sql);
$result2=mysqli_query($conn,$sql2);
$row=mysqli_fetch_array($result);
$tot=$row[0];

$index['total']= $tot;

$user= array();
$tot2=0.0;

while($row2=mysqli_fetch_assoc($result2)){
	
	$tot2=$tot2+$row2['rating'];
}

if($tot!=0)
{
    $avg=(double)$tot2/$tot;	
}
else
{
	$avg=0;
}

	
	$index['average']=$avg;
	
	array_push($user,$index);
	
echo json_encode($user);
?>