<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];
$id2=$_REQUEST['id2'];



$sql="SELECT * FROM list WHERE service_name='$id'";
$sql2="SELECT count('1') FROM setting WHERE off_date='$id2'";

$result=mysqli_query($conn,$sql);
$result2=mysqli_query($conn,$sql2);

$row2=mysqli_fetch_array($result2);

$tot=$row2[0];
$user= array();
if($tot==1)
{
	
while($row=mysqli_fetch_assoc($result)){
	$index['list_name']= "No service";
	$index['list_price']= "No price";
	$index['service_name']= "No";
	   $index['list_start']= "No";
	$index['list_end']= "No";
	$index['list_date']= "No";
	array_push($user,$index);
}

}
else
{
while($row=mysqli_fetch_assoc($result)){
	$index['list_name']= $row['list_name'];
	$index['list_price']= $row['list_price'];
	$index['service_name']= $id;
    $index['list_start']= $row['list_start'];
	$index['list_end']= $row['list_end'];
	$index['list_date']= $id2;
	array_push($user,$index);
}
}
echo json_encode($user);
?>
