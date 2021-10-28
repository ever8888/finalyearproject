<?php
require_once "config.php"; 

?>
 
<?php
$id=$_REQUEST['id'];

    
        $query = "DELETE FROM booking WHERE booking_id =$id";
		
		
        if (mysqli_query($link, $query)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
   
header("Location: bookingManage.php"); 
   

?>