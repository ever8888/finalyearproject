<?php

//insert.php
require_once "config.php";

if(isset($_POST["title"]))
{
 $query = "";
 $message=$_POST['title'];
 $start=$_POST['start'];
 $end=$_POST['end'];
 
 $sql="INSERT INTO booking
 (message, booking_start, booking_end) 
 VALUES ('$message', '$start', '$end')
 ";
 
  if (mysqli_query($link, $sql)) {
      echo "Record added successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
}


?>
