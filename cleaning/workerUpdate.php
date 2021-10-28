<?php
require_once "config.php";
$id=$_GET['id'];

$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$salary=$_POST['salary'];

if($_FILES['wimg']['name']==''){
	
	$que="Select worker_image from worker where worker_id=$id";
	$test=	 mysqli_query($link, $que);
	 while($row = mysqli_fetch_array($test))
      {
				
   		$file=$row["worker_image"];
				
	}
	
}
else
{
	$file="http://192.168.0.151:8080/cleaning/".$_FILES['wimg']['name'];
}
 
$query="update worker set worker_image='$file',worker_name='$name',worker_email='$email',worker_pw='$pass',worker_salary='$salary' where worker_id=$id";

mysqli_query($link, $query);
  
 
header('location:worker.php');
 
?>