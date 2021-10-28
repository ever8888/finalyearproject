<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];
$cust_address=$_POST["cust_address"];


$result="insert into address(cust_address,cust_id)values('$cust_address',$id)";
	  
if(mysqli_query($conn,$result))
{
		echo "Succesfully Added";  
}
else{
	  echo"Connection Error";
   }
	

?>
