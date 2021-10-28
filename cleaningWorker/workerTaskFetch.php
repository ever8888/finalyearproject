<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];

$sql="SELECT count('1') FROM booking WHERE worker_id=$id OR worker2_id=$id OR worker3_id=$id OR worker4_id=$id";

$result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($result);
$tot=$row[0];


$user= array();

if($tot>0)
{
    $index['task']= $tot;	
}
else
{
	 $index['task']= "0";
}
	
	array_push($user,$index);


echo json_encode($user);
?>