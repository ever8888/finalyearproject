<?php
require "DataBaseConfig.php";

$worker_email=$_POST["worker_email"];
$worker_pw=$_POST["worker_pw"];

$sql3=mysqli_query($conn,"select SUM(worker_salary) AS total from worker");
$fetch=mysqli_fetch_array($sql3);
$total7=0;
if($fetch['total']==0)
{
	$total7=0;
}
else
{
	$total7=$fetch['total'];
}

$month = date('m');

$text="Salary for month ".$month;


 $sql5=mysqli_query($conn,"SELECT count('1') FROM expense where expense_desc='$text'");
$row5=mysqli_fetch_array($sql5);

$total=$row5[0];

if($total==0)
{
	$sql4 = "INSERT INTO expense(expense_type,expense_amount,expense_desc)
        VALUES ('Salary','$total7','$text')";
mysqli_query($conn,$sql4);
}
				


	$sql="select * from worker where worker_email='$worker_email' AND worker_pw='$worker_pw'";
	$result=array();
$response=mysqli_query($conn,$sql);
if(mysqli_num_rows($response)===1)
{
	
	$sql2="select * from worker where worker_email='$worker_email' AND worker_pw='$worker_pw'";
	
	$response2=mysqli_query($conn,$sql2);
	$row=mysqli_fetch_assoc($response2);
	
	    $result['status']='Login Success';	
	   $result['status2']=$row["worker_id"];
	   $result['status3']=$row["worker_name"];
		 echo json_encode($result);
		  mysqli_close($conn);
}
else{
 $result['status']='Wrong name or password!';
	  echo json_encode($result);
      mysqli_close($conn);
}
?>

