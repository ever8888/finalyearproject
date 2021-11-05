<?php
require_once "config.php"; 

?>
 
<?php
$id=$_REQUEST['id'];
$id2=$_REQUEST['id2'];

            $query2 = "SELECT * FROM booking where booking_id=$id";
			 $q=mysqli_query($link, $query2);
			   while($row2 = mysqli_fetch_array($q))
                {
					if($row2["worker_id"]>0)
					{
						$j=$row2["worker_id"];
						$fw = "update worker set worker_status=0 where worker_id=$j";
			              if (mysqli_query($link, $fw)) {
						  }

					}
					if($row2["worker2_id"]>0)
					{
						$j2=$row2["worker2_id"];
						$fw2 = "update worker set worker_status=0 where worker_id=$j2";
			              if (mysqli_query($link, $fw2)) {
						  }
					}
					if($row2["worker3_id"]>0)
					{
						$j3=$row2["worker3_id"];
						$fw3 = "update worker set worker_status=0 where worker_id=$j3";
			              if (mysqli_query($link, $fw3)) {
						  }
					}
					if($row2["worker4_id"]>0)
					{
						$j4=$row2["worker4_id"];
						$fw4 = "update worker set worker_status=0 where worker_id=$j4";
			              if (mysqli_query($link, $fw4)) {
						  }
					}
				}


    
        $query = "DELETE FROM booking WHERE booking_id =$id";
		
		
   if (mysqli_query($link, $query)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
   
header("Location: bookingManage.php?id=$id2"); 
   

?>