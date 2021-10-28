<?php
require_once "config.php";
//delete.php
$id=$_REQUEST["id"];

 $query = "DELETE from setting WHERE off_date='$id'";
 
 
 if (mysqli_query($link, $query)) {
      echo "Record deleted successfully";
	header("location:setting.php");
   } 
   else {
	   	header("location:setting.php");
      echo "Error deleting record: " . mysqli_error($conn);
   }


?>