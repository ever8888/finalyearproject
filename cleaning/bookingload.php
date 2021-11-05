<?php

//load.php

require_once "config.php";




$data = array();

$query = "SELECT * FROM booking";

$result=mysqli_query($link, $query);

foreach($result as $row)
{
 $data[] = array(

  'title'   => $row["service_name"],
  'start'   => $row["booking_date"]
 );
}

echo json_encode($data);


?>
