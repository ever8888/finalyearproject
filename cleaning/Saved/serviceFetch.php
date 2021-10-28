<?php                                                        
    //fetch.php  
    require_once "config.php";
	

    if(isset($_POST["serv_id"]))  
    {  
    $query  = "SELECT * FROM service WHERE service_id ='".$_POST["serv_id"]."'";  
    $result = mysqli_query($link, $query);  
 
  $row    = mysqli_fetch_array($result);
foreach($result as $row)
 {
      $row['service_logo']=$row['service_logo'];
 } 
            echo json_encode($row);  
    }  

 ?>