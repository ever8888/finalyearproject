<?php
require_once "config.php";
$id=$_GET['id'];

$type=$_POST['type'];
$amount=$_POST['amount'];
$desc=$_POST['desc'];
	
 
$query="update expense set expense_type='$type',expense_amount='$amount',expense_desc='$desc' where expense_id=$id";

mysqli_query($link, $query);
  
 
header('location:expense.php');
 
?>