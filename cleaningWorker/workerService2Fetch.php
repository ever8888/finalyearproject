<?php
require "DataBaseConfig.php";

$id=$_REQUEST['id'];

$sql="SELECT * FROM booking WHERE booking_id=$id";

$result=mysqli_query($conn,$sql);
$user= array();

while($row=mysqli_fetch_assoc($result)){
	
	
	   if($row['worker_id']>0)
	   {
		   $a=$row['worker_id'];
		$sql2="SELECT * FROM worker WHERE worker_id=$a";

        $result2=mysqli_query($conn,$sql2);   
		while($row2=mysqli_fetch_assoc($result2)){
			
			 $index['worker_name']= $row2["worker_name"];
		}
		
	   }
	   else
	   {
		 $index['worker_name']= "";  
		   
	   }
	  
	   if($row['worker2_id']>0)
	   {
		   $a2=$row['worker2_id'];
		$sql3="SELECT * FROM worker WHERE worker_id=$a2";

        $result3=mysqli_query($conn,$sql3);   
		while($row3=mysqli_fetch_assoc($result3)){
			
			 $index['worker2_name']= $row3["worker_name"];
		}
		
	   }
	   else
	   {
		 $index['worker2_name']= "";  
		   
	   }
	   
	   	if($row['worker3_id']>0)
	   {
		   $a3=$row['worker3_id'];
		$sql4="SELECT * FROM worker WHERE worker_id=$a3";

        $result4=mysqli_query($conn,$sql4);   
		while($row4=mysqli_fetch_assoc($result4)){
			
			 $index['worker3_name']= $row4["worker_name"];
		}
		
	   }
	   else
	   {
		 $index['worker3_name']= "";  
		   
	   }
	  
	  
	  	if($row['worker4_id']>0)
	   {
		   $a4=$row['worker4_id'];
		$sql5="SELECT * FROM worker WHERE worker_id=$a4";

        $result5=mysqli_query($conn,$sql5);   
		while($row5=mysqli_fetch_assoc($result5)){
			
			 $index['worker4_name']= $row5["worker_name"];
		}
		
	   }
	   else
	   {
		 $index['worker4_name']= "";  
		   
	   }
      
	
	array_push($user,$index);
}

echo json_encode($user);
?>
