<?php  

  require_once "config.php";

  if(isset($_POST["serv_id"]))
 {  
     $output='';
	 $message      = ''; 
     $name         =$_POST["name"];  
     $price      =$_POST["price"];  
     $desc       =$_POST["desc"];  
     $servid =$_POST["serv_id"];
    
          $query = "  
          UPDATE service  
          SET service_name       ='$name',   
          service_price        ='$price',   
          service_desc         ='$desc'  
   
          WHERE service_id='$servid'";  
		  $message       = 'Data Update has been Successfully!'; 
	
   
mysqli_query($link, $query);
  
      
}  
 

?>