<?php
require "DataBaseConfig.php";

$service_name=$_POST["service_name"];
$list_name=$_POST["list_name"];
$list_price=$_POST["list_price"];
$list_date=$_POST["list_date"];
$list_start=$_POST["list_start"];
$list_end=$_POST["list_end"];
$list_message=$_POST["list_message"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$tools=$_POST["tools"];
$cust_id=$_POST['cust_id'];
$vouName=$_POST['vname'];
$vouAmount=$_POST['vamount'];
$paym=$_POST['paym'];

if($tools=="Yes (+RM20)")
{
	$num=1;
}
else
{
	$num=0;
}

if($vouName!="No Voucher")
{
  $sql2="UPDATE voucherlist SET voucher_use=1 WHERE cust_id=$cust_id AND voucher_name='$vouName'";
  if(mysqli_query($conn,$sql2))
	  {
	 
	  }
}
 $sql222="UPDATE customer SET cust_address='$address',cust_phoneNo='$phone' WHERE cust_id=$cust_id";
  if(mysqli_query($conn,$sql222))
	  {
	 
	  }



if($paym=="Pay by Wallet")
{
  $sql3="SELECT * FROM customer WHERE cust_id=$cust_id";
  $result3=mysqli_query($conn,$sql3);
  while($row3 = mysqli_fetch_array($result3)) {
	  
	  $a=$row3['cust_coin'];
	  
	  if($list_price>$a)
	  {
		  echo "No enough wallet coin.Please Topup"; 
	  }
	  else
	  {
		  
		$tc=$a-$list_price;
$sql2222="UPDATE customer SET cust_coin='$tc' WHERE cust_id=$cust_id";
 if(mysqli_query($conn,$sql2222))
	  {
	 
	  }


		
		  
		$sql="insert into booking(booking_phone,service_name,list_name,booking_address,booking_price,booking_date,booking_time,booking_tools,cust_id,pay_method)values('$phone','$service_name','$list_name','$address','$list_price','$list_date','$list_start','$num',$cust_id,'wallet')";

	  
	  if(mysqli_query($conn,$sql))
	  {
		echo "Succesfully Make Booking";  
	  }
	  else{
	    echo"Connection Error";
	  }  
	  }
  }
	  
  
}
else
{
	$sql="insert into booking(booking_phone,service_name,list_name,booking_address,booking_price,booking_date,booking_time,booking_tools,cust_id,pay_method)values('$phone','$service_name','$list_name','$address','$list_price','$list_date','$list_start','$num',$cust_id,'cash')";

	  
	  if(mysqli_query($conn,$sql))
	  {
		echo "Succesfully Make Booking";  
	  }
	  else{
	    echo"Connection Error";
	  }
}

  

?>