<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];
$id2=$_REQUEST['id2'];


$sql2="SELECT * FROM booking where booking_id=$id";
$a=0;
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
	
	if($id2==$row2['worker_id'])
	{
		$a=1;
	}
	if($id2==$row2['worker2_id'])
	{
		$a=2;
	}
	if($id2==$row2['worker3_id'])
	{
		$a=3;
	}
	if($id2==$row2['worker4_id'])
	{
		$a=4;
	}
	
}


$sql="SELECT * FROM booking where booking_id=$id";

$result=mysqli_query($conn,$sql);
$user= array();

while($row=mysqli_fetch_assoc($result)){
	
	
	   if($row['worker_confirm']>0 && $a==1)
	   {
		   
		   if($id2==$row['worker_confirm'])
		   {
			  $index['status']= "Yes"; 
		   }
		   else
		   {
		   $index['status']= "No"; 
		   }
		
	   }
	   else if($row['worker2_confirm']>0 && $a==2)
	   {
		 if($id2==$row['worker2_confirm'])
		   {
			  $index['status']= "Yes"; 
		   } 
		   else
		   {
		   $index['status']= "No"; 
		   }
		   
	   }
	   else if($row['worker3_confirm']>0 && $a==3)
	   {
		 if($id2==$row['worker3_confirm'])
		   {
			  $index['status']= "Yes"; 
		   }
		    else
		   {
		   $index['status']= "No"; 
		   } 
		   
	   }
	   else if($row['worker4_confirm']>0 && $a==4)
	   {
		 if($id2==$row['worker4_confirm'])
		   {
			  $index['status']= "Yes"; 
		   } 
		    else
		   {
		   $index['status']= "No"; 
		   }
		   
	   }
	   else
	   {
		 $index['status']= "No"; 
		   
	   }
      
	
	array_push($user,$index);
}

echo json_encode($user);
?>