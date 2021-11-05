<?php

require "DataBaseConfig.php";
$id=$_REQUEST["id"];


include("recommend2.php");
$user2= array();

$jj=mysqli_query($conn,"select count('1') from booking_history where cust_id=$id");
$jj2=mysqli_fetch_array($jj);
$tot2=$jj2[0];

if($tot2==0)
{
	$mins=0;
$services=mysqli_query($conn,"select * from service where service_status=1");
while($sss=mysqli_fetch_array($services))
{ 
$mins++;
if($mins==1)
	  {
		  $abcs=$sss["service_name"];
		  $covers=$sss["service_cover"];
		  
	  }

}
$index['service_name']= $abcs;
$index['service_cover']= $covers;
array_push($user2,$index);
}
else
{
$service=mysqli_query($conn,"select * from booking_history where rating!=0 AND service_status=1");
$matrix=array();

while($serv=mysqli_fetch_array($service))
{                                                                  //$serv[cust_id]
	$user=mysqli_query($conn,"select cust_name from customer where cust_id=$serv[cust_id]");
	$username=mysqli_fetch_array($user);
	

	$matrix[$username['cust_name']][$serv['service_name']]=$serv['rating'];
}

//echo '<pre>';
//print_r($matrix);
//echo '</pre>';

$uu=mysqli_query($conn,"select cust_name from customer where cust_id=$id");
$uu2=mysqli_fetch_array($uu);
//var_dump(getRecommendation($matrix,"Ken"));
?>

<?php
$recom=array();

$max=0;
$recom=getRecommendation($matrix,$uu2['cust_name']);


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
foreach($recom as $service=>$rating)
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
}
echo json_encode($user2);
?>

