  <?php
  require_once "config.php";
$id=$_GET['id'];
$id2=$_REQUEST['id2'];

  $wid2         =$_POST["list"];  
     $servid =$_POST["serv_id"];
    
          $queryy = "  
          UPDATE booking  
          SET worker2_id   ='$wid2'  
          WHERE booking_id='$id2'";  
	
   
mysqli_query($link, $queryy);


			     $query3 = "  
          UPDATE worker  
          SET worker_status  =1  
          WHERE worker_id='$wid2'";  
		  
		  mysqli_query($link, $query3);  

		  
		  $sqlService6="SELECT * FROM worker WHERE worker_status=1";
		   $result7 = mysqli_query($link, $sqlService6);
		     while($row7 = mysqli_fetch_array($result7)) {
				 
				 $qq=$row7['worker_id'];
				 $sqlService5="SELECT count('1') FROM booking WHERE worker_id='$qq' OR worker2_id='$qq' OR worker3_id='$qq' OR worker4_id='$qq'";
				 $result6 = mysqli_query($link, $sqlService5);
				  $row6=mysqli_fetch_array($result6);
                  $tot=$row6[0];
				  
				  if($tot==0)
				  {
					     $query2 = "  
          UPDATE worker  
          SET worker_status  =0  
          WHERE worker_id='$qq'";  
		  
		  mysqli_query($link, $query2);  
					  
				  }
				  
			 }
			 
	   header("location:bookingManage.php?id=$id");
					   
     
?>
  
      