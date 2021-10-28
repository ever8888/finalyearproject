<?php

//load.php

require_once "config.php";




$data = array();

$query = "SELECT * FROM setting";

$result=mysqli_query($link, $query);

foreach($result as $row)
{
 $data[] = array(

  'date'   => $row["off_date"],
  'title'   => $row["off_reason"]
 );
}

echo json_encode($data);


?>
