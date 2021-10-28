<?php
require "DataBaseConfig.php";
$cust_email=$_POST["cust_email"];
$cust_pw=$_POST["cust_pw"];

$sql="select * from customer where cust_email='$cust_email' AND cust_pw='$cust_pw'";
$result=array();
$response=mysqli_query($conn,$sql);
if(mysqli_num_rows($response)===1)
{
	
	$sql2="select cust_id from customer where cust_email='$cust_email' AND cust_pw='$cust_pw'";
	
	$response2=mysqli_query($conn,$sql2);
	$row=mysqli_fetch_assoc($response2);
	
	
 $result['status']='Login Success';
 $result['status2']=$row['cust_id'];
 echo json_encode($result);
 mysqli_close($conn);
}
else{
	 $result['status']='Wrong email or password!';
	  echo json_encode($result);
      mysqli_close($conn);
}
?>
