<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    header("location: login.php");
    exit;
}
?>
<?php
require_once "config.php";

date_default_timezone_set('Asia/Taipei');
$date = date('Y-m-d');

if(isset($_POST['month']))
{
	$sort=$_POST['month'];

}
else
{
	$sort="January";
}


//booking
if($sort=="January")
{
	$sortt=1;
}
if($sort=="February")
{
	$sortt=2;
}
if($sort=="March")
{
	$sortt=3;
}
if($sort=="April")
{
	$sortt=4;
}
if($sort=="May")
{
	$sortt=5;
}
if($sort=="June")
{
	$sortt=6;
}
if($sort=="July")
{
	$sortt=7;
}
if($sort=="August")
{
	$sortt=8;
}
if($sort=="September")
{
	$sortt=9;
}
if($sort=="October")
{
	$sortt=10;
}
if($sort=="November")
{
	$sortt=11;
}
if($sort=="December")
{
	$sortt=12;
}
$sql="select count('1') from booking";

$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);

$total=$row[0];

$sqla="select count('1') from booking where booking_date='$date'";

$result2=mysqli_query($link,$sqla);
$row2=mysqli_fetch_array($result2);

$tot=$row2[0];



$sql2 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> $sortt");
$fetch = mysqli_fetch_array($sql2);

$total2=$fetch['total'];



$sql3 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> $sortt");
$fetch2 = mysqli_fetch_array($sql3);

$total3=$fetch2['total'];


$sql4 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE expense_type='Salary'");
$fetch3 = mysqli_fetch_array($sql4);

if($fetch3['total']==0)
{
	$total4=0;
}
else
{
	$total4=$fetch3['total'];
}


$sql5 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE expense_type='Tools'");
$fetch4 = mysqli_fetch_array($sql5);


if($fetch4['total']==0)
{
	$total5=0;
}
else
{
	$total5=$fetch4['total'];
}

$sql6 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE expense_type='Promote'");
$fetch5 = mysqli_fetch_array($sql6);

if($fetch5['total']==0)
{
	$total6=0;
}
else
{
	$total6=$fetch5['total'];
}

$sql7 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE expense_type='Others'");
$fetch6 = mysqli_fetch_array($sql7);

if($fetch6['total']==0)
{
	$total7=0;
}
else
{
	$total7=$fetch6['total'];
}


$month = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=> $sortt");
$cm=mysqli_fetch_array($month);

$countM=$cm[0];


?>



<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="UTF-8">	 
  <title>Dashboard</title>

 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="shortcut icon" type="image/png" href="Saved/favicon.png"/>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
  <style>
  body {
font-family: "Times New Roman", Times, serif;
    background-color: #F5F5F5;

}


.btn{
  margin-left:1450px;
    border: 0.2px solid #4CAF50;
}
hr{
	 border: 1px solid #111;
}

.btn2
{
	border-color:#F5F5F5;
	
}

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;

  overflow-x: hidden;
  padding-top: 20px;


}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #111;
  display:block;
  background-color:white;
}

.dash{
	background-color:#F5F5F5;
	pointer-events: none;
  cursor: default;
  font-weight: bold;
}


@media screen and (max-height: 350px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


.box1{
	
	margin-top:20px;
	margin-left:250px;
	background-color: white;
    width:270px;
	height:130px;
	 border-left: 5px solid blue;
}

.box2{
	
	margin-top:-130px;
	margin-left:570px;
	background-color: white;
    width:270px;
	height:130px;
	border-left: 5px solid purple;
}


.box3{
	
	margin-top:-130px;
	margin-left:890px;
	background-color: white;
    width:270px;
	height:130px;
		border-left: 5px solid indigo;
}


.box4{
	
	margin-top:-130px;
	margin-left:1210px;
	background-color: white;
    width:270px;
	height:130px;
		border-left: 5px solid green;
}

.txt1{
	padding-top:16px;
	font-size:25px;
	padding-left:20px;
}

.txt1a{

	font-size:18px;

}
.txt2{
	padding-top:16px;
	font-size:25px;
	padding-left:20px;
}

.txt2a{

	font-size:18px;

}



.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
  margin-left:10px;

}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: grey;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 92px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;

}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}


.notification {

  color: white;
  position: relative;
  float:left;

}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -1px;
  right: -5px;
  border-radius: 60%;
  background-color: red;
  color: white;
  width:28px;
  height:19px;
}
.box{
	margin-left:1380px;
}
.set{
	margin-left:48px;
}
.cov{
	margin-top:15px;
	margin-left:1350px;
	
	font-size:25px;
}

.highlighted
{
   color:lime;
}
.highlighted2
{
   color:red;
}
.txt3a{

	font-size:15px;
	margin-top:5px;

}
  </style>
 </head>
 <body>
 <div class="sidenav">
 <a href="welcome.php"><div class="btn2" ></div>
<img src="Saved/CSBS.png" style="width:70%;">
</a>
<hr>
  <a href="" class="dash" ><i class="fa fa-dashboard"></i>&nbspDashboard</a>
    <a href="bookingCalendar.php"><i class="fa fa-calendar"></i> Calendar</a>
	  <a href="services.php" ><i class="fa fa-list-alt"></i> Services</a>
	  <a href="customer.php"><i class="fa fa-user"></i>&nbsp Customer</a>
	   <a href="worker.php"><i class="fa fa-briefcase"></i> Worker</a>
	    <a href="history.php"><i class="fa fa-check"></i> Booking</a>
	   <a href="expense.php"><i class="fa fa-usd"></i>&nbsp Expenses</a>
	   <a href="voucher.php"><i class="fa fa-tag"></i> Voucher</a>
	    <a href="report.php"><i class="fa fa-bar-chart"></i> Report</a>
		<br><br><br><br><br><br><br>
		<hr>
		<div class="set">
		<a href="setting.php"><i class="fa fa-cog"></i></a>
	    </div>

</div>


<div class="navbar" style="height:50px;padding-top:0px;">

<div class="box">
  
<div id="auto"></div>
   

</div>
</div>





<script>
$(document).ready(function()
{
	setInterval(function(){
	$("#auto").load("nav.php");
	},1000);
});
</script>


	 <div class="cov">
	 
   <form method="post" action="welcome.php">
    <select name='month' id='month' onchange='if(this.value != 0) { this.form.submit(); }'>
	 
	 
	 <?php
	 if($sort=="January")
	 {
		 ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='February'>February</option>
         <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="February")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
         <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="March")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="April")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
         <option value='March'>March</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="May")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
		   <option value='March'>March</option>
         <option value='April'>April</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="June")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
		   <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="July")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
		   <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="August")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
		   <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="September")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
		   <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="October")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
		   <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="November")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
		   <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
		<option value="October">October</option>
	<option value="December">December</option>
	<?php
	 }
	 else if($sort=="December")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='January'>January</option>
		  <option value='February'>February</option>
		   <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
		<option value="October">October</option>
	<option value="November">November</option>
	<?php
	 }
	 else
	 {
		 ?>
		  <option value='January'>January</option>
		 	        <option value='February'>February</option>
         <option value='March'>March</option>
         <option value='April'>April</option>
		 <option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
	<?php
	 }
		 
	 ?>
      
    </select>
   </form>
  
	 </div>

	 
	 <div class="box1">
	 
	 <div class="txt1">
	 <?php if ($total==0)
			  {
				  ?>
				 0
				  <?php
			  }
			  else{
				  ?>
	 <?php echo $countM;
	 
			  }?>
	 
	 <br> 
	 <div class="txt1a">
	 Booking
	 </div>
	 </div>
	 
	 </div>
	 
	 
 
 	 <div class="box2">
	  <div class="txt2">
    <?php if ($total2==0)
			  {
				  ?>
			  RM 0 
				  <?php
			  }
			  else{
				  ?>
	<span class="highlighted"> RM </span><?php if($total2>1000)
	 {
		 $cut2=$total2/1000;
		 $format_number3 = number_format($cut2, 2);?><span class="highlighted">
		 <?php
		 echo $format_number3."K"; ?></span><?php
	 }
	 else{
		 ?>
		 <span class="highlighted"><?php
	 echo $total2;?></span>
	 <?php
	 }
			  }?>
	 <br> 
	 <div class="txt2a">
	 Revenue
	 </div>
	 

	 </div>
	 </div>
	 
	 
	 
	 	 <div class="box3">
		 	  <div class="txt2">
			  
			  <?php if ($total2==0&&$total3==0)
			  {
				  ?>
			  RM 0 
				  <?php
			  }
			  else{
				  ?>
	  <?php 
	  $profit=$total2-$total3;
	 if($profit>1000|| $profit<-1000)
	 {
		 $cut3=$profit/1000;
		 $format_number1 = number_format($cut3, 2);
		 
		 if($profit<0)
		 {
			 ?>
			 
			  <span class="highlighted2">
			  <?php
			   echo "RM ".$format_number1."K"; 
			   ?>
			   </span>
			   <?php
		 }
		 else
		 {
			 ?>
		    <span class="highlighted">
			<?php
		 echo "RM ".$format_number1."K"; 
		 ?>
		 </span>
		 <?php
		 }
	 }
	 else{
		 if($profit<0)
		 {
			 ?>
			 
			  <span class="highlighted2">
			  <?php
	 echo "RM ".$profit;
	 ?>
	 </span>
	 	   <?php
		 }
		 else
		 {
			 ?>
		    <span class="highlighted">
			<?php
		echo "RM ".$profit; 
		 ?>
		 </span>
		 <?php
	 }
	 }
			  }?>
	 <br> 
	 <div class="txt2a">
	 Profit
	 </div>

	 </div>
	 
	 </div>
	 
	 
	 
	 	 <div class="box4">
	 	 	  <div class="txt2">
			  
			  <?php if ($total3==0)
			  {
				  ?>
				  RM 0
				  <?php
			  }
			  else{
				  ?>
	<span class="highlighted2"> RM </span><?php if($total3>1000)
	 {
		 $cut4=$total3/1000;
		 $format_number2 = number_format($cut4, 2);
		 ?>
		 <span class="highlighted2">
		 <?php
		 echo $format_number2."K"; 
		 ?>
		 </span>
		 <?php
	 }
	 else{
	 ?>
    <span class="highlighted2">
<?php	
	 echo $total3;
	 ?>
	 </span>
	 <?php
	 }?>
	 <?php
			  }
			  ?>
	 <br> 
	 <div class="txt2a">
	 Expense
	 </div>

	 </div>
	 </div>
	 
	 <?php
	 $rr = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 1");
     $rrf = mysqli_fetch_array($rr);
	 

	 

	 if($rrf['total']=='')
	 {
		$rrfj=0;
	 }
	 else
	 {
		 $rrfj=$rrf['total']; 
	 }
	 
	$re = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 1");
     $ref = mysqli_fetch_array($re);
	 
	 if($ref['total']=='')
	 {
		$refj=0;
	 }
	 else
	 {
		 $refj=$ref['total']; 
	 }
	 
      
	 ?>
	 
	 
	 <?php
	 $rr2 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 2");
     $rrf2 = mysqli_fetch_array($rr2);

	 if($rrf2['total']=='')
	 {
		$rrfj2=0;
	 }
	 else
	 {
		 $rrfj2=$rrf2['total']; 
	 }
	 
	 $re2 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 2");
     $ref2 = mysqli_fetch_array($re2);
	 
	 if($ref2['total']=='')
	 {
		$refj2=0;
	 }
	 else
	 {
		 $refj2=$ref2['total']; 
	 }
      
	 ?>
	 	 <?php
	 $rr3 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 3");
     $rrf3 = mysqli_fetch_array($rr3);

	 if($rrf3['total']=='')
	 {
		$rrfj3=0;
	 }
	 else
	 {
		 $rrfj3=$rrf3['total']; 
	 }
      $re3 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 3");
     $ref3 = mysqli_fetch_array($re3);
	 
	 if($ref3['total']=='')
	 {
		$refj3=0;
	 }
	 else
	 {
		 $refj3=$ref3['total']; 
	 }
	 ?>
	 	 <?php
	 $rr4 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 4");
     $rrf4 = mysqli_fetch_array($rr4);

	 if($rrf4['total']=='')
	 {
		$rrfj4=0;
	 }
	 else
	 {
		 $rrfj4=$rrf4['total']; 
	 }
      
	  $re4 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 4");
     $ref4 = mysqli_fetch_array($re4);
	 
	 if($ref4['total']=='')
	 {
		$refj4=0;
	 }
	 else
	 {
		 $refj4=$ref4['total']; 
	 }
	 ?>
	 	 <?php
	 $rr5 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 5");
     $rrf5 = mysqli_fetch_array($rr5);

	 if($rrf5['total']=='')
	 {
		$rrfj5=0;
	 }
	 else
	 {
		 $rrfj5=$rrf5['total']; 
	 }
	 
	 $re5 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 5");
     $ref5 = mysqli_fetch_array($re5);
	 
	 if($ref5['total']=='')
	 {
		$refj5=0;
	 }
	 else
	 {
		 $refj5=$ref5['total']; 
	 }
      
	 ?>
	 	 <?php
	 $rr6 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 6");
     $rrf6 = mysqli_fetch_array($rr6);

	 if($rrf6['total']=='')
	 {
		$rrfj6=0;
	 }
	 else
	 {
		 $rrfj6=$rrf6['total']; 
	 }
      
	  $re6 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 6");
     $ref6 = mysqli_fetch_array($re6);
	 
	 if($ref6['total']=='')
	 {
		$refj6=0;
	 }
	 else
	 {
		 $refj6=$ref6['total']; 
	 }
	 ?>
	 	 <?php
	 $rr7 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 1");
     $rrf7 = mysqli_fetch_array($rr7);

	 if($rrf7['total']=='')
	 {
		$rrfj7=0;
	 }
	 else
	 {
		 $rrfj7=$rrf7['total']; 
	 }
	 
	 $re7 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 7");
     $ref7 = mysqli_fetch_array($re7);
	 
	 if($ref7['total']=='')
	 {
		$refj7=0;
	 }
	 else
	 {
		 $refj7=$ref7['total']; 
	 }
      
	 ?>
	 	 <?php
	 $rr8 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 8");
     $rrf8 = mysqli_fetch_array($rr8);

	 if($rrf8['total']=='')
	 {
		$rrfj8=0;
	 }
	 else
	 {
		 $rrfj8=$rrf8['total']; 
	 }
	 
	 $re8 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 8");
     $ref8 = mysqli_fetch_array($re8);
	 
	 if($ref8['total']=='')
	 {
		$refj8=0;
	 }
	 else
	 {
		 $refj8=$ref8['total']; 
	 }
      
	 ?>
	 	 <?php
	 $rr9 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 9");
     $rrf9 = mysqli_fetch_array($rr9);

	 if($rrf9['total']=='')
	 {
		$rrfj9=0;
	 }
	 else
	 {
		 $rrfj9=$rrf9['total']; 
	 }
	 
	 $re9 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 9");
     $ref9 = mysqli_fetch_array($re9);
	 
	 if($ref9['total']=='')
	 {
		$refj9=0;
	 }
	 else
	 {
		 $refj9=$ref9['total']; 
	 }
      
	 ?>
	 	 <?php
	 $rr10 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 10");
     $rrf10 = mysqli_fetch_array($rr10);

	 if($rrf10['total']=='')
	 {
		$rrfj10=0;
	 }
	 else
	 {
		 $rrfj10=$rrf10['total']; 
	 }
	 
	 $re10 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 10");
     $ref10 = mysqli_fetch_array($re10);
	 
	 if($ref10['total']=='')
	 {
		$refj10=0;
	 }
	 else
	 {
		 $refj10=$ref10['total']; 
	 }
      
	 ?>
	 	 <?php
	 $rr11 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 11");
     $rrf11 = mysqli_fetch_array($rr11);

	 if($rrf11['total']=='')
	 {
		$rrfj11=0;
	 }
	 else
	 {
		 $rrfj11=$rrf11['total']; 
	 }
	 
	 $re11 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 11");
     $ref11 = mysqli_fetch_array($re11);
	 
	 if($ref11['total']=='')
	 {
		$refj11=0;
	 }
	 else
	 {
		 $refj11=$ref11['total']; 
	 }
      
	 ?>
	 	 <?php
	 $rr12 = mysqli_query($link, "SELECT SUM(expense_amount) AS total FROM expense WHERE MONTH(created_time)<=> 12");
     $rrf12 = mysqli_fetch_array($rr12);

	 if($rrf12['total']=='')
	 {
		$rrfj12=0;
	 }
	 else
	 {
		 $rrfj12=$rrf12['total']; 
	 }
	 
	 $re12 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=> 12");
     $ref12 = mysqli_fetch_array($re12);
	 
	 if($ref12['total']=='')
	 {
		$refj12=0;
	 }
	 else
	 {
		 $refj12=$ref12['total']; 
	 }
      
	 ?>
	 
	    <div id="chart_div" style="width: 800px; height: 400px;margin-top:40px;
	margin-left:250px;"></div>
		
		  <div id="piechart" style="width: 400px; height: 400px;margin-top:-400px;margin-left:1100px;"></div>
		  
		  
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Revenue', 'Expense'],
		  ['January',  <?php echo $refj; ?>,  <?php echo $rrfj; ?>],
		  ['February',  <?php echo $refj2; ?>,      <?php echo $rrfj2; ?>],
		  ['March',  <?php echo $refj3; ?>,     <?php echo $rrfj3; ?>],
		  ['April',  <?php echo $refj4; ?>,      <?php echo $rrfj4; ?>],
		  ['May',  <?php echo $refj5; ?>,      <?php echo $rrfj5; ?>],
          ['June',  <?php echo $refj6; ?>,      <?php echo $rrfj6; ?>],
          ['July',  <?php echo $refj7; ?>,      <?php echo $rrfj7; ?>],
          ['August',  <?php echo $refj8; ?>,     <?php echo $rrfj8; ?>],
          ['September',  <?php echo $refj9; ?>,    <?php echo $rrfj9; ?>],
          ['October',  <?php echo $refj10; ?>,      <?php echo $rrfj10; ?>],
		  ['November',  <?php echo $refj11; ?>,      <?php echo $rrfj11; ?>],
		  ['December',  <?php echo $refj12; ?>,      <?php echo $rrfj12; ?>]
        ]);

        var options = {
          title : 'Monthly Revenue and Expense(RM)',
          vAxis: {title: 'RM'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
		  
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  
  
  
  
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Expense Type', 'Expense Amount'],
          ['Salary',     <?php echo $total4;?>],
          ['Tools',      <?php echo $total5;?>],
          ['Promote',<?php echo $total6;?>],
          ['Others', <?php echo $total7;?>]
        ]);

        var options = {
          title: 'Expense Distribute(2021)',

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
 


 </body>
</html>