<?php
require_once "config.php";
$id=$_GET['id'];


$name=$_POST['name'];
$type=$_POST['type'];
$amount=$_POST['amount'];
$date=$_POST['end'];
$status=1;

$query="update voucher set voucher_name='$name', 
voucher_type='$type',
voucher_amount='$amount', 
expiry_date='$date',
voucher_status='$status' where voucher_id=$id";

mysqli_query($link, $query);
  
 
header('location:voucher.php');
 
?>