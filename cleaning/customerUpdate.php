<?php
require_once "config.php";
$id=$_GET['id'];

$name=$_POST['name'];
$price=$_POST['price'];
$desc=$_POST['desc'];

if($_FILES['logo']['name']==''){
	
	$que="Select service_logo from service where service_id=$id";
	$test=	 mysqli_query($link, $que);
	 while($row = mysqli_fetch_array($test))
      {
				
   		$file=$row["service_logo"];
					

	}
	
}
else
{
	$file="http://localhost:8080/cleaning/".$_FILES['logo']['name'];
}
 
$query="update service set service_logo='$file',service_name='$name', service_price='$price', 
service_nodolist='$desc' where service_id=$id";

mysqli_query($link, $query);
  
 
 move_uploaded_file($_FILES['logo']['tmp_name'],"$file");
 
header('location:customer.php');
 
?>