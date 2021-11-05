<?php
require "DataBaseConfig.php";


$book_id=$_POST["book_id"];

$sql2="SELECT * FROM booking WHERE booking_id='$book_id'";
$result2=mysqli_query($conn,$sql2);
 while($row2 = mysqli_fetch_array($result2)) {
	$a= $row2['worker_id'];
	$a2= $row2['worker2_id'];
	$a3= $row2['worker3_id'];
	$a4= $row2['worker4_id'];
	
	if($a!="0")
	{
		$sql22="UPDATE worker set worker_status=0 WHERE worker_id=$a";
		$result22=mysqli_query($conn,$sql22);
	}
	if($a2!="0")
	{
		$sql33="UPDATE worker set worker_status=0 WHERE worker_id=$a2";
		$result33=mysqli_query($conn,$sql33);
	}
	if($a3!="0")
	{
	    $sql44="UPDATE worker set worker_status=0 WHERE worker_id=$a3";
		$result44=mysqli_query($conn,$sql44);
	}
	
	if($a4!="0")
	{
		$sql55="UPDATE worker set worker_status=0 WHERE worker_id=$a4";
		$result55=mysqli_query($conn,$sql55);
	}

 }


$sql="DELETE FROM booking WHERE booking_id='$book_id'";

if(mysqli_query($conn,$sql))
{
		echo "Succesfully Cancel";  
}
else{
	    echo"Connection Error";
}

?>