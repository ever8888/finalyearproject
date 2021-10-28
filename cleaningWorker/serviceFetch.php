<?php
require "DataBaseConfig.php";

$sql2="SELECT * FROM voucher where voucher_status=1";
$result2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_array($result2)) {
	 
	 $vid=$row2['voucher_id'];
	 $exp_date=$row2['expiry_date'];
	 $today=date('Y-m-d');
	 
	 if($today>$exp_date)
	 {
		 $resultv="UPDATE voucher SET voucher_status=0 where voucher_id=$vid";
		 if(mysqli_query($conn,$resultv))
	     {
		  echo "Succesfully";  
	     }
	  
	   $resultvl="Delete FROM voucherlist where voucher_id=$vid";
	   if(mysqli_query($conn,$resultvl))
	     {
		  echo "Succesfully";  
	     }
	  
	 }
	 else
	 {
		 
		$sql3="SELECT count('1') FROM voucherlist where cust_id=$id AND voucher_id=$vid";
        $result3=mysqli_query($conn,$sql3);
        $row3=mysqli_fetch_array($result3);
        $tot=$row3[0];

		 if($tot==0)
		 {
	
			 $name=$row2['voucher_name'];
			 $amount=$row2['voucher_amount'];
			 $date=$row2['expiry_date'];
			 
			$sql22 = "INSERT INTO voucherlist (voucher_name,voucher_amount,expiry_date,cust_id,voucher_id)
           VALUES ('$name','$amount','$date',$id,$vid)";
			      if (mysqli_query($conn, $sql22))
				  {
					 echo "Succesfully";   
				  }
             
     
		 }
	 } 
}

$sql="SELECT * FROM service WHERE service_status=1";

$result=mysqli_query($conn,$sql);
$user= array();

while($row=mysqli_fetch_assoc($result)){
	$index['service_id']= $row['service_id'];
	$index['service_name']= $row['service_name'];
	$index['service_logo']= $row['service_logo'];
	$index['service_cover']= $row['service_cover'];
	array_push($user,$index);
	
}

echo json_encode($user);
?>