<?php
require "DataBaseConfig.php";

$cust_email=$_POST["cust_email"];
$cust_pw=$_POST["cust_pw"];


$sql="SELECT * FROM customer where cust_email='$cust_email'";
$check=mysqli_query($conn,$sql);
if (!filter_var($cust_email, FILTER_VALIDATE_EMAIL)) 
{
      echo "Invalid email format";
	 
}
else
{
	if(mysqli_num_rows($check))
    {
	echo "Email already existed,Please Login!";
    }
	else
	{
	  $result=mysqli_query($conn,"insert into customer(cust_name,cust_email,cust_pw)values('Guest#','$cust_email','$cust_pw')");
	  
	  if(mysqli_query($conn,$sql))
	  {
		echo "Succesfully Registered";  
	  }
	  else{
	    echo"Connection Error";
      }
	}
}
?>
