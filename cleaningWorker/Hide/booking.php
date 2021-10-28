<?php
require "DataBaseConfig.php";


$booking_name=$_POST["booking_name"];
$booking_phone=$_POST["booking_phone"];
$booking_date=$_POST["booking_date"];


if($conn){


	  
	  	$result=mysqli_query($conn,"insert into booking(booking_name,booking_phone,booking_date)values('$booking_name','$booking_phone','$booking_date')");
		echo "Succesfully Booking";
	   
  

}
else{
	echo"Connection Error";
}
?>