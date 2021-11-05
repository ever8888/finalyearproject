<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];


$sql="SELECT * FROM voucherlist WHERE cust_id='$id' AND voucher_use=0";

$result=mysqli_query($conn,$sql);
$user= array();

while($row=mysqli_fetch_assoc($result)){
	$index['voucher_name']= $row['voucher_name'];
	$index['voucher_amount']= $row['voucher_amount'];
	array_push($user,$index);
	
}

echo json_encode($user);
?>