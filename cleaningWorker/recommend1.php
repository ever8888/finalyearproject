<?php

require "DataBaseConfig.php";

include("recommend2.php");

$id=$_REQUEST["id"];
$id=9;

$service=mysqli_query($conn,"select * from booking_history where rating!=0");
$matrix=array();

while($serv=mysqli_fetch_array($service))
{                                                                  //$serv[cust_id]
	$user=mysqli_query($conn,"select cust_name from customer where cust_id=$id");
	$username=mysqli_fetch_array($user);
	$j=$username['cust_name'];
	$matrix[$username['cust_name']][$serv['service_name']]=$serv['rating'];
}

//echo '<pre>';
//print_r($matrix);
//echo '</pre>';


//var_dump(getRecommendation($matrix,"Ken"));
?>

<?php
$recom=array();
$user2= array();
$max=0;
$recom=getRecommendation($matrix,$j);

if (empty($recom)) {
	
	$que=mysqli_query($conn,"select * from service where service_status!=0");
	
	$min=0;
	while($test=mysqli_fetch_array($que))
    {  
      $min++;
	  
	  if($min==1)
	  {
		  $abc=$test["service_name"];
		  $cover=$test["service_cover"];
		  
	  }
    }
	
$index['service_name']= $abc;
$index['service_cover']= $cover;
   array_push($user2,$index);
}
else
{
foreach($recom as $service->$rating)
{
 $max++;
 if($max==1)
 {
	$index['service_name']= $service;
	$que2=mysqli_query($conn,"select * from service where service_name='$service'");
	while($test2=mysqli_fetch_array($que2))
    { 
	   $jj=$test2['service_cover'];
	   
	}
     $index['service_cover']= $jj;
	array_push($user2,$index);
 }
}
}

echo json_encode($user2);
?>

