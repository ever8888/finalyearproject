<?php
require "DataBaseConfig.php";

$id=$_REQUEST["id"];
$cust_coin=$_POST["cust_coin"];


$a=mysqli_query($conn,"SELECT cust_coin FROM customer where cust_id=$id");

 while($row2 = mysqli_fetch_array($a))
 {
	 $b=$row2["cust_coin"]+$cust_coin;
	 
 }


$result="UPDATE customer SET cust_coin='$b' where cust_id=$id";
	  
	  if(mysqli_query($conn,$result))
	  {
		echo "Succesfully Topup";  
	  }
	  else{
	    echo"Connection Error";
      }


?>