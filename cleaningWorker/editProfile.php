<?php
require "DataBaseConfig.php";

$id=$_REQUEST["id"];

$cust_name=$_POST["cust_name"];
$cust_phoneNo=$_POST["cust_phoneNo"];
$cust_address=$_POST["cust_address"];


$sql="UPDATE customer set cust_name='$cust_name',cust_phoneNo='$cust_phoneNo',cust_address='$cust_address' where cust_id=$id";

if(mysqli_query($conn,$sql))
{
		echo "Succesfully Edit";  
}
else{
	    echo"Connection Error";
}

?>