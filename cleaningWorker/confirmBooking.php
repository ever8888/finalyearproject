<?php
require "DataBaseConfig.php";


$book_id=$_POST["book_id"];
$worker_id=$_POST["worker_id"];

$sql2="SELECT * FROM booking WHERE booking_id='$book_id'";
$result2=mysqli_query($conn,$sql2);
 while($row2 = mysqli_fetch_array($result2)) {
	
	$cust_id=$row2["cust_id"];
	$booking_phone=$row2["booking_phone"];
	$service_name=$row2["service_name"];
	$list_name=$row2["list_name"];
	$booking_address=$row2["booking_address"];
	$booking_price=$row2["booking_price"];
	$booking_date=$row2["booking_date"];
	$booking_time=$row2["booking_time"];
	$booking_message=$row2["booking_message"];
	$booking_tools=$row2["booking_tools"];
	$worker_id=$row2["worker_id"];
	$worker2_id=$row2["worker2_id"];
	$worker3_id=$row2["worker3_id"];
	$worker4_id=$row2["worker4_id"];
	
	
	$sql3="INSERT into booking_history (cust_id,booking_phone,service_name,list_name,booking_address,booking_price, booking_date, booking_time, booking_message, booking_tools, worker_id, worker2_id, worker3_id, worker4_id) values ('$cust_id','$booking_phone','$service_name','$list_name','$booking_address','$booking_price','$booking_date','$booking_time','$booking_message','$booking_tools','$worker_id','$worker2_id','$worker3_id','$worker4_id')";
    $result3=mysqli_query($conn,$sql3);
	 
 }

	 
$sql="DELETE FROM booking WHERE booking_id='$book_id'";

if(mysqli_query($conn,$sql))
{
		echo "Succesfully Service";  
}
else{
	    echo"Connection Error";
} 

?>