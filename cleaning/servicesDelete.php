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
   
           
    
        $query = "DELETE FROM service WHERE service_name ='$id'";
		
		
        if (mysqli_query($link, $query)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
   
header("Location: services.php"); 
   

?>




