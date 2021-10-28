<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];
$sql="SELECT * FROM booking_history WHERE worker_id=$id OR worker2_id=$id OR worker3_id=$id OR worker4_id=$id";

$result=mysqli_query($conn,$sql);

$user= array();
$total=0;


while($row=mysqli_fetch_assoc($result)){
	 $j=$row["booking_price"];
	 $a=$j*0.1;
	 $total=$total+$a;
	 
	 $index['earn']= $total;
	 array_push($user,$index);
}
	


echo json_encode($user);
?>