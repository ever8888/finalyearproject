<?php
require_once "config.php";
$id=$_GET['id'];

$name=$_POST['name'];
$phone=$_POST['phone'];
$addr=$_POST['addr'];
$coin=$_POST['coin'];

 
$query="update customer set cust_name='$name',cust_phoneNo='$phone',cust_address='$addr', 
cust_coin='$coin' where cust_id=$id";

mysqli_query($link, $query);
  
 
header('location:customer.php');
 
?>