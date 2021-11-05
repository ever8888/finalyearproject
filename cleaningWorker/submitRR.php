<?php
require "DataBaseConfig.php";


$review=$_POST["review"];
$rating=$_POST["rating"];
$book_id=$_POST["book_id"];



$result="UPDATE booking_history SET rating='$rating',review='$review' where bhistory_id=$book_id";
	  
	  if(mysqli_query($conn,$result))
	  {
		echo "Succesfully Rating and Review";  
	  }
	  else{
	    echo"Connection Error";
      }


?>