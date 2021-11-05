<?php
require_once "config.php"; 

?>
 
<?php
$id=$_REQUEST['id'];


 $query2 = "DELETE FROM list WHERE service_name ='$id'";
		
		
   if (mysqli_query($link, $query2)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
 $query3="update booking_history set service_status=0 where service_name='$id'"; 
mysqli_query($link, $query3);


   
    
        $query = "DELETE FROM service WHERE service_name ='$id'";
		
		
        if (mysqli_query($link, $query)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
   
header("Location: services.php"); 
   

?>




