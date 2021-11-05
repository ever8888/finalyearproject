<?php
require_once "config.php";
$success  = "";
    if(isset($_POST['add']))
    {  
        $name  = $_POST['name'];
        $price = $_POST['price'];
        $desc   = $_POST['desc'];
		$admin  =$_SESSION["id"];
    
        
        $sql = "INSERT INTO service (service_name,service_price,service_desc,admin_id)
        VALUES ('$name','$price','$desc',$admin)";
        if (mysqli_query($conn, $sql))
        {
            $success    =   "New record created successfully !";
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

	

?>  