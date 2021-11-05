<?php
require "DataBaseConfig.php";


$book_id=$_POST["book_id"];
$worker_id=$_POST["worker_id"];

$book_id=54;

$sqlc="SELECT * FROM booking WHERE booking_id='$book_id'";
$resultc=mysqli_query($conn,$sqlc);
$totc=0;
$conw=0;
 while($row2c = mysqli_fetch_array($resultc)) {
	 
	 if($row2c['worker_id']>0)
	 {
		 $totc++;
		 if($worker_id==$row2c['worker_id'])
		 {
			$conw=1; 
		 }
	 }
	 
	 if($row2c['worker2_id']>0)
	 {
		 $totc++;
		 if($worker_id==$row2c['worker2_id'])
		 {
			$conw=2; 
		 }
	 }
	 
	 if($row2c['worker3_id']>0)
	 {
		 $totc++;
		 if($worker_id==$row2c['worker3_id'])
		 {
			$conw=3; 
		 }
	 }
	 
	 if($row2c['worker4_id']>0)
	 {
		 $totc++;
		 if($worker_id==$row2c['worker4_id'])
		 {
			$conw=4; 
		 }
	 }
 }

if($conw==1)
{
$sqlww="update worker set worker_status=0 WHERE worker_id='$worker_id'";
if(mysqli_query($conn,$sqlww))
{
}	
	
$sqlc="update booking set worker_confirm='$worker_id' WHERE booking_id='$book_id'";
if(mysqli_query($conn,$sqlc))
{
	echo "Succesfully Service";  
} 
}


if($conw==2)
{
$sqlww="update worker set worker_status=0 WHERE worker_id='$worker_id'";
if(mysqli_query($conn,$sqlww))
{
}	

$sqlc="update booking set worker2_confirm='$worker_id' WHERE booking_id='$book_id'";
if(mysqli_query($conn,$sqlc))
{
	echo "Succesfully Service";  
} 
}

if($conw==3)
{
$sqlww="update worker set worker_status=0 WHERE worker_id='$worker_id'";
if(mysqli_query($conn,$sqlww))
{
}	

	
$sqlc="update booking set worker3_confirm='$worker_id' WHERE booking_id='$book_id'";
if(mysqli_query($conn,$sqlc))
{
	echo "Succesfully Service";  
} 
}

if($conw==4)
{
$sqlww="update worker set worker_status=0 WHERE worker_id='$worker_id'";
if(mysqli_query($conn,$sqlww))
{
}	

$sqlc="update booking set worker4_confirm='$worker_id' WHERE booking_id='$book_id'";
if(mysqli_query($conn,$sqlc))
{
	echo "Succesfully Service";  
} 
}


$sqlcc="SELECT * FROM booking WHERE booking_id='$book_id'";
$resultcc=mysqli_query($conn,$sqlcc);
$totcc=0;
 while($row2cc = mysqli_fetch_array($resultcc)) {
	 
	 if($row2cc['worker_confirm']>0)
	 {
		 $totcc++;
	 }
	 
	 if($row2cc['worker2_confirm']>0)
	 {
		 $totcc++;
	 }
	 
	 if($row2cc['worker3_confirm']>0)
	 {
		 $totcc++;
	 }
	 
	 if($row2cc['worker4_confirm']>0)
	 {
		 $totcc++;
	 }
 }


if($totc==$totcc)
{
	
	
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
	
}
else{
} 
}




?>