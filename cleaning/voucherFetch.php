<?php                                                        
    //fetch.php  
    require_once "config.php";
	

    if(isset($_POST["serv_id"]))  
    {  
    $query  = "SELECT * FROM voucher WHERE voucher_id =           '".$_POST["serv_id"]."'";  
    $result = mysqli_query($link, $query);  
    $row    = mysqli_fetch_array($result);  
            echo json_encode($row);  
    }  

 ?>