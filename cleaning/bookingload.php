<?php

//load.php

require_once "config.php";




$data = array();

$query = "SELECT * FROM booking";

$result=mysqli_query($link, $query);

foreach($result as $row)
{
 $data[] = array(

  'title'   => $row["booking_phone"],
  'start'   => $row["booking_date"]
 );
}

echo json_encode($data);


?>
