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
	$sort="Total Booking";
}


//booking
if($sort=="Total Booking")
{
	$sortt=1;
}
if($sort=="Total Customer")
{
	$sortt=2;
}
if($sort=="Expense & Earning")
{
	$sortt=3;
}
if($sort=="Top Service")
{
	$sortt=4;
}
if($sort=="Average Rating")
{
	$sortt=5;
}


$month = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=> $sortt");
$cm=mysqli_fetch_array($month);

$countM=$cm[0];


?>



<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="UTF-8">	 
  <title>Report</title>

 
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
	margin-left:1280px;
	font-size:23px;
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
   <a href="welcome.php" ><i class="fa fa-dashboard"></i>&nbspDashboard</a>
    <a href="bookingCalendar.php"><i class="fa fa-calendar"></i> Calendar</a>
	  <a href="services.php" ><i class="fa fa-list-alt"></i> Services</a>
	  <a href="customer.php"><i class="fa fa-user"></i>&nbsp Customer</a>
	   <a href="worker.php"><i class="fa fa-briefcase"></i> Worker</a>
	    <a href="history.php"><i class="fa fa-check"></i> Booking</a>
	   <a href="expense.php"><i class="fa fa-usd"></i>&nbsp Expenses</a>
	   <a href="voucher.php"><i class="fa fa-tag"></i> Voucher</a>
	    <a href="" class="dash"><i class="fa fa-bar-chart"></i> Report</a>
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
	$("#auto").load("nav2.php");
	},1000);
});
</script>


	 <div class="cov">
	 
   <form method="post" action="report.php">
    <select name='month' id='month' onchange='if(this.value != 0) { this.form.submit(); }'>
	 
	 
	 <?php
	 if($sort=="Total Booking")
	 {
		 ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='Total Customer'>Total Customer</option>
         <option value='Expense & Earning'>Expense & Earning</option>
         <option value='Top Service'>Top Service</option>
		 <option value="Average Rating">Average Rating</option>
	<?php
	 }
	 else if($sort=="Total Customer")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='Total Booking'>Total Booking</option>
         <option value='Expense & Earning'>Expense & Earning</option>
         <option value='Top Service'>Top Service</option>
		 <option value="Average Rating">Average Rating</option>
	<?php
	 }
	 else if($sort=="Expense & Earning")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='Total Booking'>Total Booking</option>
		  <option value='Total Customer'>Total Customer</option>
         <option value='Top Service'>Top Service</option>
		 <option value="Average Rating">Average Rating</option>
	<?php
	 }
	 else if($sort=="Top Service")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='Total Booking'>Total Booking</option>
		  <option value='Total Customer'>Total Customer</option>
         <option value='Expense & Earning'>Expense & Earning</option>
		 <option value="Average Rating">Average Rating</option>
	<?php
	 }
	 else if($sort=="Average Rating")
	 {
		  ?>
		 <option value='Total'><?php echo $sort; ?></option>
		 <option value='Total Booking'>Total Booking</option>
		  <option value='Total Customer'>Total Customer</option>
		   <option value='Expense & Earning'>Expense & Earning</option>
         <option value='Top Service'>Top Service</option>
	<?php
	 }
	 else
	 {
		 ?>
		  <option value='Total Booking'>Total Booking</option>
		  <option value='Total Customer'>Total Customer</option>
		   <option value='Expense and Earning'>Expense and Earning</option>
         <option value='Top Service'>Top Service</option>
		 <option value="Average Rating">Average Rating</option>
	<?php
	 }
		 
	 ?>
      
    </select>
   </form>
  
	 </div>
	 
	 <?php
	   if($sort=="Total Booking")
        {
			$sql = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>1");
			$cm1=mysqli_fetch_array($sql);
			$count1=$cm1[0];
			
			
			$sq2 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>2");
			$cm2=mysqli_fetch_array($sq2);
			$count2=$cm2[0];
			
			$sq3 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>3");
			$cm3=mysqli_fetch_array($sq3);
			$count3=$cm3[0];
			
			$sq4 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>4");
			$cm4=mysqli_fetch_array($sq4);
			$count4=$cm4[0];
			
			$sq5 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>5");
			$cm5=mysqli_fetch_array($sq5);
			$count5=$cm5[0];
			
			$sq6 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>6");
			$cm6=mysqli_fetch_array($sq6);
			$count6=$cm6[0];
			
			$sq7 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>7");
			$cm7=mysqli_fetch_array($sq7);
			$count7=$cm7[0];
			
			$sq8 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>8");
			$cm8=mysqli_fetch_array($sq8);
			$count8=$cm8[0];
			
			$sq9 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>9");
			$cm9=mysqli_fetch_array($sq9);
			$count9=$cm9[0];
			
			$sq10 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>10");
			$cm10=mysqli_fetch_array($sq10);
			$count10=$cm10[0];
			
			$sq11 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>11");
			$cm11=mysqli_fetch_array($sq11);
			$count11=$cm11[0];
			
			$sq12 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE MONTH(booking_date)<=>12");
			$cm12=mysqli_fetch_array($sq12);
			$count12=$cm12[0];
			
		?>	   
		

	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales'],
          ['January',  <?php echo $count1;?>],
          ['February',  <?php echo $count2;?>],
          ['March',  <?php echo $count3;?>],
          ['April',  <?php echo $count4;?>],
		  ['May',  <?php echo $count5;?>],
		  ['June',  <?php echo $count6;?>],
		  ['July',  <?php echo $count7;?>],
		  ['August',  <?php echo $count8;?>],
		  ['September', <?php echo $count9;?>],
		  ['October',  <?php echo $count10;?>],
		  ['November',  <?php echo $count11;?>],
		  ['December',  <?php echo $count12;?>]
        ]);

        var options = {
          title: 'Sales Performance',
        
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
	<div id="curve_chart" style="width: 1230px; height: 500px;margin-top:50px;margin-left:250px;"></div>
	<?php
			}
	    else if($sort=="Total Customer")
		{
			$sql = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>1");
			$cm1=mysqli_fetch_array($sql);
			$count1=$cm1[0];
			
			
			$sq2 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>2");
			$cm2=mysqli_fetch_array($sq2);
			$count2=$cm2[0];
			
			$sq3 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>3");
			$cm3=mysqli_fetch_array($sq3);
			$count3=$cm3[0];
			
			$sq4 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>4");
			$cm4=mysqli_fetch_array($sq4);
			$count4=$cm4[0];
			
			$sq5 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>5");
			$cm5=mysqli_fetch_array($sq5);
			$count5=$cm5[0];
			
			$sq6 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>6");
			$cm6=mysqli_fetch_array($sq6);
			$count6=$cm6[0];
			
			$sq7 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>7");
			$cm7=mysqli_fetch_array($sq7);
			$count7=$cm7[0];
			
			$sq8 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>8");
			$cm8=mysqli_fetch_array($sq8);
			$count8=$cm8[0];
			
			$sq9 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>9");
			$cm9=mysqli_fetch_array($sq9);
			$count9=$cm9[0];
			
			$sq10 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>10");
			$cm10=mysqli_fetch_array($sq10);
			$count10=$cm10[0];
			
			$sq11 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>11");
			$cm11=mysqli_fetch_array($sq11);
			$count11=$cm11[0];
			
			$sq12 = mysqli_query($link, "SELECT COUNT('1') FROM customer WHERE MONTH(created_date)<=>12");
			$cm12=mysqli_fetch_array($sq12);
			$count12=$cm12[0];
		
	 
	  ?>
	 	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Customer'],
          ['January',  <?php echo $count1;?>],
          ['February',  <?php echo $count2;?>],
          ['March',  <?php echo $count3;?>],
          ['April',  <?php echo $count4;?>],
		  ['May',  <?php echo $count5;?>],
		  ['June',  <?php echo $count6;?>],
		  ['July',  <?php echo $count7;?>],
		  ['August',  <?php echo $count8;?>],
		  ['September', <?php echo $count9;?>],
		  ['October',  <?php echo $count10;?>],
		  ['November',  <?php echo $count11;?>],
		  ['December',  <?php echo $count12;?>]
        ]);

        var options = {
          title: 'Registered Customer',
        
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
	<div id="curve_chart" style="width: 1230px; height: 500px;margin-top:50px;margin-left:250px;"></div> 
	  
	  
	  <?php
		}
		else if($sort=="Expense & Earning")
		{
			$sql = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history WHERE MONTH(booking_date)<=>1");
			$cm1=mysqli_fetch_array($sql);
		
			
	 if($cm1['total']=='')
	 {
		$count1=0;
	 }
	 else
	 {
		 $count1=$cm1['total']; 
	 }
			
			$sql1 = mysqli_query($link, "SELECT SUM(expense_amount) AS total2 FROM expense WHERE MONTH(created_time)<=>1");
			$cm11=mysqli_fetch_array($sql1);
			
	 if($cm11['total2']=='')
	 {
		$count11=0;
	 }
	 else
	 {
		 $count11=$cm11['total2']; 
	 }			
			

			$sq2 = mysqli_query($link, "SELECT SUM(booking_price) AS total3 FROM booking_history WHERE MONTH(booking_date)<=>2");
			$cm2=mysqli_fetch_array($sq2);
		
			
	if($cm2['total3']=='')
	 {
		$count2=0;
	 }
	 else
	 {
		 $count2=$cm2['total3']; 
	 }
			
			$sq22 = mysqli_query($link, "SELECT SUM(expense_amount) AS total4 FROM expense WHERE MONTH(created_time)<=>2");
			$cm22=mysqli_fetch_array($sq22);
			
	 if($cm22['total4']=='')
	 {
		$count21=0;
	 }
	 else
	 {
		 $count21=$cm22['total4']; 
	 }		
			
			
			$sq3 = mysqli_query($link, "SELECT SUM(booking_price) AS total5 FROM booking_history WHERE MONTH(booking_date)<=>3");
			$cm3=mysqli_fetch_array($sq3);
	
			
	if($cm3['total5']=='')
	 {
		$count3=0;
	 }
	 else
	 {
		 $count3=$cm3['total5']; 
	 }
			
			$sq33 = mysqli_query($link, "SELECT SUM(expense_amount) AS total6 FROM expense WHERE MONTH(created_time)<=>3");
			$cm33=mysqli_fetch_array($sq33);
		
	 if($cm33['total6']=='')
	 {
		$count31=0;
	 }
	 else
	 {
		 $count31=$cm33['total6']; 
	 }		
			
			
			
			
			
			$sq4 = mysqli_query($link, "SELECT SUM(booking_price) AS total7 FROM booking_history WHERE MONTH(booking_date)<=>4");
			$cm4=mysqli_fetch_array($sq4);
	
			
	if($cm4['total7']=='')
	 {
		$count4=0;
	 }
	 else
	 {
		 $count4=$cm4['total7']; 
	 }
			
			$sq44 = mysqli_query($link, "SELECT SUM(expense_amount) AS total8 FROM expense WHERE MONTH(created_time)<=>4");
			$cm44=mysqli_fetch_array($sq44);
			
		 if($cm44['total8']=='')
	 {
		$count41=0;
	 }
	 else
	 {
		 $count41=$cm44['total8']; 
	 }		
			
			
			
			$sq5 = mysqli_query($link, "SELECT SUM(booking_price) AS total9 FROM booking_history WHERE MONTH(booking_date)<=>5");
			$cm5=mysqli_fetch_array($sq5);
			$count5=$cm5['total9'];
			
	if($cm5['total9']=='')
	 {
		$count5=0;
	 }
	 else
	 {
		 $count5=$cm5['total9']; 
	 }
			
			$sq55 = mysqli_query($link, "SELECT SUM(expense_amount) AS total10 FROM expense WHERE MONTH(created_time)<=>5");
			$cm55=mysqli_fetch_array($sq55);
			
			
	if($cm55['total10']=='')
	 {
		$count51=0;
	 }
	 else
	 {
		 $count51=$cm55['total10']; 
	 }
			
			
			
			
			
			$sq6 = mysqli_query($link, "SELECT SUM(booking_price) AS total11 FROM booking_history WHERE MONTH(booking_date)<=>6");
			$cm6=mysqli_fetch_array($sq6);
			
			
	if($cm6['total11']=='')
	 {
		$count6=0;
	 }
	 else
	 {
		 $count6=$cm6['total11']; 
	 }
			
			$sq66 = mysqli_query($link, "SELECT SUM(expense_amount) AS total12 FROM expense WHERE MONTH(created_time)<=>6");
			$cm66=mysqli_fetch_array($sq66);
			
	if($cm66['total12']=='')
	 {
		$count61=0;
	 }
	 else
	 {
		 $count61=$cm66['total12']; 
	 }		
			
			
			
			$sq7 = mysqli_query($link, "SELECT SUM(booking_price) AS total13 FROM booking_history WHERE MONTH(booking_date)<=>7");
			$cm7=mysqli_fetch_array($sq7);
		
			
		if($cm7['total13']=='')
	 {
		$count7=0;
	 }
	 else
	 {
		 $count7=$cm7['total13']; 
	 }
			
			$sq77 = mysqli_query($link, "SELECT SUM(expense_amount) AS total14 FROM expense WHERE MONTH(created_time)<=>7");
			$cm77=mysqli_fetch_array($sq77);
			
 if($cm77['total14']=='')
	 {
		$count71=0;
	 }
	 else
	 {
		 $count71=$cm77['total14']; 
	 }
			
			
			$sq8 = mysqli_query($link, "SELECT SUM(booking_price) AS total15 FROM booking_history WHERE MONTH(booking_date)<=>8");
			$cm8=mysqli_fetch_array($sq8);
		
			
	if($cm8['total15']=='')
	 {
		$count8=0;
	 }
	 else
	 {
		 $count8=$cm8['total15']; 
	 }
			
			$sq88 = mysqli_query($link, "SELECT SUM(expense_amount) AS total16 FROM expense WHERE MONTH(created_time)<=>8");
			$cm88=mysqli_fetch_array($sq88);
			
	if($cm88['total16']=='')
	 {
		$count81=0;
	 }
	 else
	 {
		 $count81=$cm88['total16']; 
	 }	
			
			
			$sq9 = mysqli_query($link, "SELECT SUM(booking_price) AS total17 FROM booking_history WHERE MONTH(booking_date)<=>9");
			$cm9=mysqli_fetch_array($sq9);
			
	if($cm9['total17']=='')
	 {
		$count9=0;
	 }
	 else
	 {
		 $count9=$cm9['total17']; 
	 }
			
			$sq99 = mysqli_query($link, "SELECT SUM(expense_amount) AS total18 FROM expense WHERE MONTH(created_time)<=>9");
			$cm99=mysqli_fetch_array($sq99);
			
			
 if($cm99['total18']=='')
	 {
		$count91=0;
	 }
	 else
	 {
		 $count91=$cm99['total18']; 
	 }
			
			
			$sq10 = mysqli_query($link, "SELECT SUM(booking_price) as total19 FROM booking_history WHERE MONTH(booking_date)<=>10");
			$cm10=mysqli_fetch_array($sq10);
	
if($cm10['total19']=='')
	 {
		$count10=0;
	 }
	 else
	 {
		 $count10=$cm10['total19']; 
	 }
			
			$sq101 = mysqli_query($link, "SELECT SUM(expense_amount) as total20 FROM expense WHERE MONTH(created_time)<=>10");
			$cm101=mysqli_fetch_array($sq101);
		
	if($cm101['total20']=='')
	 {
		$count101=0;
	 }
	 else
	 {
		 $count101=$cm101['total20']; 
	 }	
			
			
			$sq111 = mysqli_query($link, "SELECT SUM(booking_price) as total21 FROM booking_history WHERE MONTH(booking_date)<=>11");
			$cm111=mysqli_fetch_array($sq111);
			
if($cm111['total21']=='')
	 {
		$count111=0;
	 }
	 else
	 {
		 $count111=$cm111['total21']; 
	 }	
			$sq1111 = mysqli_query($link, "SELECT SUM(expense_amount) as total22 FROM expense WHERE MONTH(created_time)<=>11");
			$cm1111=mysqli_fetch_array($sq1111);
			
			
	if($cm1111['total22']=='')
	 {
		$count1111=0;
	 }
	 else
	 {
		 $count1111=$cm1111['total22']; 
	 }	
			
			$sq12 = mysqli_query($link, "SELECT SUM(booking_price) as total23 FROM booking_history WHERE MONTH(booking_date)<=>12");
			$cm12=mysqli_fetch_array($sq12);
			
			
	 if($cm12['total23']=='')
	 {
		$count12=0;
	 }
	 else
	 {
		 $count12=$cm12['total23']; 
	 }
			
			$sq122 = mysqli_query($link, "SELECT SUM(expense_amount) as total24 FROM expense WHERE MONTH(created_time)<=>12");
			$cm122=mysqli_fetch_array($sq122);
		
	if($cm122['total24']=='')
	 {
		$count122=0;
	 }
	 else
	 {
		 $count122=$cm122['total24']; 
	 }
		
	  ?>
	  
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Revenue','Expense'],
          ['January',  <?php echo $count1;?>, <?php echo $count11;?>],
          ['February',  <?php echo $count2;?>, <?php echo $count21;?>],
          ['March',  <?php echo $count3;?>, <?php echo $count31;?>],
          ['April',  <?php echo $count4;?>, <?php echo $count41;?>],
		  ['May',  <?php echo $count5;?>, <?php echo $count51;?>],
		  ['June',  <?php echo $count6;?>, <?php echo $count61;?>],
		  ['July',  <?php echo $count7;?>, <?php echo $count71;?>],
		  ['August',  <?php echo $count8;?>, <?php echo $count81;?>],
		  ['September', <?php echo $count9;?>, <?php echo $count91;?>],
		  ['October',  <?php echo $count10;?>, <?php echo $count101;?>],
		  ['November',  <?php echo $count111;?>, <?php echo $count1111;?>],
		  ['December',  <?php echo $count12;?>, <?php echo $count122;?>] 
        ]);

        var options = {
          title: 'Revenue & Expense',
        curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    
        chart.draw(data, options);
      }
    </script>
	<div id="curve_chart" style="width: 1230px; height: 500px;margin-top:50px;margin-left:250px;"></div>   
	  
	  
	 	  <?php
		}
		else if($sort=="Top Service")
		{
			
			
    $tw2 = mysqli_query($link, "SELECT * FROM booking_history ");
	
	$countM2a=0;
	$countM22=0;
	 
	while($row2s = mysqli_fetch_array($tw2))
    { 
   $countj=$row2s['service_name'];

	$tw2a = mysqli_query($link, "SELECT COUNT('1')  FROM booking_history WHERE service_name='$countj'");
    $cmm2=mysqli_fetch_array($tw2a);
    $countM22=$cmm2[0];
	
	  if($countM22>$countM2a)
	  {
		 $countM2a=$countM22; 
		 $countM2=$row2s['service_name'];	 
	  }
	  else if($countM22==$countM2a)
	  {
		   $countM2a=$countM22; 
		 $countM2=$row2s['service_name'];	
	  }
    }
     
	$sq1 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>1 AND service_name='$countM2'");
	$cm1=mysqli_fetch_array($sq1);
	$count1=$cm1[0];
	
	$sq2 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>2 AND service_name='$countM2'");
	$cm2=mysqli_fetch_array($sq2);
	$count2=$cm2[0];
	
	$sq3 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>3 AND service_name='$countM2'");
	$cm3=mysqli_fetch_array($sq3);
	$count3=$cm3[0];
	
	$sq4 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>4 AND service_name='$countM2'");
	$cm4=mysqli_fetch_array($sq4);
	$count4=$cm4[0];
	
	$sq5 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>5 AND service_name='$countM2'");
	$cm5=mysqli_fetch_array($sq5);
	$count5=$cm5[0];
	
	$sq6 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>6 AND service_name='$countM2'");
	$cm6=mysqli_fetch_array($sq6);
	$count6=$cm6[0];
	
	$sq7 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>7 AND service_name='$countM2'");
	$cm7=mysqli_fetch_array($sq7);
	$count7=$cm7[0];
	
$sq8 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>8 AND service_name='$countM2'");
	$cm8=mysqli_fetch_array($sq8);
	$count8=$cm8[0];
	
	$sq9 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>9 AND service_name='$countM2'");
	$cm9=mysqli_fetch_array($sq9);
	$count9=$cm9[0];
	
	
	 $sq10 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>10 AND service_name='$countM2'");
	$cm10=mysqli_fetch_array($sq10);
	$count10=$cm10[0];
	
	$sq11 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>11 AND service_name='$countM2'");
	$cm11=mysqli_fetch_array($sq11);
	$count11=$cm11[0];
	
	$sq12 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>12 AND service_name='$countM2'");
	$cm12=mysqli_fetch_array($sq12);
	$count12=$cm12[0];
			
	  ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Month');
      data.addColumn('number', '<?php echo $countM2;?>');

      data.addRows([
        ['January',  <?php echo $count1;?>],
        ['February',  <?php echo $count2;?>],
        ['March',  <?php echo $count3;?>],
        ['April',  <?php echo $count4;?>],
        ['May',  <?php echo $count5;?>],
        ['June',   <?php echo $count6;?>],
        ['July',   <?php echo $count7;?>],
        ['August',  <?php echo $count8;?>],
        ['September',  <?php echo $count9;?>],
        ['October', <?php echo $count10;?>],
        ['November',  <?php echo $count11;?>],
        ['December',  <?php echo $count12;?>]

      ]);

      var options = {
        chart: {
          title: 'Top service',
          subtitle: 'by month'
        },
        width: 1230,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
    <div id="line_top_x" style="width: 1230px; height: 500px;margin-top:50px;margin-left:250px;"></div>
	 
	  <?php
		}
		else if($sort=="Average Rating")
		{
			
	$sq1 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>1 AND rating!=0");
	$cm1=mysqli_fetch_array($sq1);
	$count1=$cm1[0];
	
   $sq11 = mysqli_query($link, "SELECT SUM(rating) as total FROM booking_history WHERE MONTH(booking_date)<=>1 AND rating!=0");
	$cm11=mysqli_fetch_array($sq11);
	$count11=$cm11['total'];
	
    if($cm11['total']=='')
	 {
		$count11=0;
		$avg1=0;
	 }
	 else
	 {
		 $count11=$cm11['total']; 
		 $avg1=$count11/$count1;
	 }   		
	 
	 
	$sq2 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>2 AND rating!=0");
	$cm2=mysqli_fetch_array($sq2);
	$count2=$cm2[0];
	
   $sq22 = mysqli_query($link, "SELECT SUM(rating) as total2 FROM booking_history WHERE MONTH(booking_date)<=>2 AND rating!=0");
	$cm22=mysqli_fetch_array($sq22);
	$count22=$cm22['total2'];
	
    if($cm22['total2']=='')
	 {
		$count22=0;
		$avg2=0;
	 }
	 else
	 {
		 $count22=$cm22['total2']; 
		 $avg2=$count22/$count2;
	 }  

	$sq3 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>3 AND rating!=0");
	$cm3=mysqli_fetch_array($sq3);
	$count3=$cm3[0];
	
   $sq33 = mysqli_query($link, "SELECT SUM(rating) as total3 FROM booking_history WHERE MONTH(booking_date)<=>3 AND rating!=0");
	$cm33=mysqli_fetch_array($sq33);
	$count33=$cm33['total3'];
	
    if($cm33['total3']=='')
	 {
		$count33=0;
		$avg3=0;
	 }
	 else
	 {
		 $count33=$cm33['total3']; 
		 $avg3=$count33/$count3;
	 }   

	$sq4 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>4 AND rating!=0");
	$cm4=mysqli_fetch_array($sq4);
	$count4=$cm4[0];
	
   $sq44 = mysqli_query($link, "SELECT SUM(rating) as total4 FROM booking_history WHERE MONTH(booking_date)<=>4 AND rating!=0");
	$cm44=mysqli_fetch_array($sq44);
	$count44=$cm44['total4'];
	
    if($cm44['total4']=='')
	 {
		$count44=0;
		$avg4=0;
	 }
	 else
	 {
		 $count44=$cm44['total4']; 
		 $avg4=$count44/$count4;
	 }   			 

	$sq5 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>5 AND rating!=0");
	$cm5=mysqli_fetch_array($sq5);
	$count5=$cm5[0];
	
   $sq55 = mysqli_query($link, "SELECT SUM(rating) as total5 FROM booking_history WHERE MONTH(booking_date)<=>5 AND rating!=0");
	$cm55=mysqli_fetch_array($sq55);
	$count55=$cm55['total5'];
	
    if($cm55['total5']=='')
	 {
		$count55=0;
		$avg5=0;
	 }
	 else
	 {
		 $count55=$cm55['total5']; 
		 $avg5=$count55/$count5;
	 }   		
	 
	 
	$sq6 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>6 AND rating!=0");
	$cm6=mysqli_fetch_array($sq6);
	$count6=$cm6[0];
	
   $sq66 = mysqli_query($link, "SELECT SUM(rating) as total6 FROM booking_history WHERE MONTH(booking_date)<=>6 AND rating!=0");
	$cm66=mysqli_fetch_array($sq66);
	$count66=$cm66['total6'];
	
    if($cm66['total6']=='')
	 {
		$count66=0;
		$avg6=0;
	 }
	 else
	 {
		 $count66=$cm66['total6']; 
		 $avg6=$count66/$count6;
	 }   

$sq7 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>7 AND rating!=0");
	$cm7=mysqli_fetch_array($sq7);
	$count7=$cm7[0];
	
   $sq77 = mysqli_query($link, "SELECT SUM(rating) as total7 FROM booking_history WHERE MONTH(booking_date)<=>7 AND rating!=0");
	$cm77=mysqli_fetch_array($sq77);
	$count77=$cm77['total7'];
	
    if($cm77['total7']=='')
	 {
		$count77=0;
		$avg7=0;
	 }
	 else
	 {
		 $count77=$cm77['total7']; 
		 $avg7=$count77/$count7;
	 }   		

	$sq8 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>8 AND rating!=0");
	$cm8=mysqli_fetch_array($sq8);
	$count8=$cm8[0];
	
   $sq88 = mysqli_query($link, "SELECT SUM(rating) as total8 FROM booking_history WHERE MONTH(booking_date)<=>8 AND rating!=0");
	$cm88=mysqli_fetch_array($sq88);
	$count88=$cm88['total8'];
	
    if($cm88['total8']=='')
	 {
		$count88=0;
		$avg8=0;
	 }
	 else
	 {
		 $count88=$cm88['total8']; 
		 $avg8=$count88/$count8;
	 }   	

	$sq9 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>9 AND rating!=0");
	$cm9=mysqli_fetch_array($sq9);
	$count9=$cm9[0];
	
   $sq99 = mysqli_query($link, "SELECT SUM(rating) as total9 FROM booking_history WHERE MONTH(booking_date)<=>9 AND rating!=0");
	$cm99=mysqli_fetch_array($sq99);
	$count99=$cm99['total9'];
	
    if($cm99['total9']=='')
	 {
		$count99=0;
		$avg9=0;
	 }
	 else
	 {
		 $count99=$cm99['total9']; 
		 $avg9=$count99/$count9;
	 }   

	$sq10 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>10 AND rating!=0");
	$cm10=mysqli_fetch_array($sq10);
	$count10=$cm10[0];
	
   $sq100 = mysqli_query($link, "SELECT SUM(rating) as total10 FROM booking_history WHERE MONTH(booking_date)<=>10 AND rating!=0");
	$cm100=mysqli_fetch_array($sq100);
	$count100=$cm100['total10'];
	
    if($cm100['total10']=='')
	 {
		$count100=0;
		$avg10=0;
	 }
	 else
	 {
		 $count100=$cm100['total10']; 
		 $avg10=$count100/$count10;
	 }   		

	$sq111 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>11 AND rating!=0");
	$cm111=mysqli_fetch_array($sq111);
	$count111=$cm111[0];
	
   $sq1111 = mysqli_query($link, "SELECT SUM(rating) as total11 FROM booking_history WHERE MONTH(booking_date)<=>11 AND rating!=0");
	$cm1111=mysqli_fetch_array($sq1111);
	$count1111=$cm1111['total11'];
	
    if($cm1111['total11']=='')
	 {
		$count1111=0;
		$avg11=0;
	 }
	 else
	 {
		 $count1111=$cm1111['total11']; 
		 $avg11=$count1111/$count111;
	 }   


	$sq122 = mysqli_query($link, "SELECT count('1')  FROM booking_history WHERE MONTH(booking_date)<=>12 AND rating!=0");
	$cm122=mysqli_fetch_array($sq122);
	$count122=$cm122[0];
	
   $sq1222 = mysqli_query($link, "SELECT SUM(rating) as total12 FROM booking_history WHERE MONTH(booking_date)<=>12 AND rating!=0");
	$cm1222=mysqli_fetch_array($sq1222);
	$count1222=$cm1222['total12'];
	
    if($cm1222['total12']=='')
	 {
		$count1222=0;
		$avg12=0;
	 }
	 else
	 {
		 $count1222=$cm1222['total12']; 
		 $avg12=$count1222/$count122;
	 }   			 
	  ?>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Month');
      data.addColumn('number', '<?php echo "Average Rating";?>');

      data.addRows([
        ['January',  <?php echo $avg1;?>],
        ['February',  <?php echo $avg2;?>],
        ['March',  <?php echo $avg3;?>],
        ['April',  <?php echo $avg4;?>],
        ['May',  <?php echo $avg5;?>],
        ['June',   <?php echo $avg6;?>],
        ['July',   <?php echo $avg7;?>],
        ['August',  <?php echo $avg8;?>],
        ['September',  <?php echo $avg9;?>],
        ['October', <?php echo $avg10;?>],
        ['November',  <?php echo $avg11;?>],
        ['December',  <?php echo $avg12;?>]

      ]);

      var options = {
        chart: {
          title: 'Average Rating',
          subtitle: 'by month'
        },
        width: 1230,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
    <div id="line_top_x" style="width: 1230px; height: 500px;margin-top:50px;margin-left:250px;"></div>  
   
	  	  <?php
		}
	  ?>
 </body>
</html>