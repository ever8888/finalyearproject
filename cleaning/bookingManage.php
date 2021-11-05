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
$id=$_REQUEST["id"];




$result=mysqli_query($link,"SELECT * FROM booking WHERE booking_date='$id'");
?>

<?php
 
if(isset($_POST["insert"]))
 {  

     $wid         =$_POST["list"];  
     $servid =$_POST["serv_id"];
    
          $query = "  
          UPDATE booking  
          SET worker_id   ='$wid'  
          WHERE booking_id='$servid'";  
	
   
mysqli_query($link, $query);


			     $query3 = "  
          UPDATE worker  
          SET worker_status  =1  
          WHERE worker_id='$wid'";  
		  
		  mysqli_query($link, $query3);  

		  
		  $sqlService6="SELECT * FROM worker WHERE worker_status=1";
		   $result7 = mysqli_query($link, $sqlService6);
		     while($row7 = mysqli_fetch_array($result7)) {
				 
				 $qq=$row7['worker_id'];
				 $sqlService5="SELECT count('1') FROM booking WHERE worker_id='$qq' OR worker2_id='$qq' OR worker3_id='$qq' OR worker4_id='$qq'";
				 $result6 = mysqli_query($link, $sqlService5);
				  $row6=mysqli_fetch_array($result6);
                  $tot=$row6[0];
				  
				  if($tot==0)
				  {
					     $query2 = "  
          UPDATE worker  
          SET worker_status  =0  
          WHERE worker_id='$qq'";  
		  
		  mysqli_query($link, $query2);  
					  
				  }
				  
			 }
			 
	   header("location:bookingManage.php?id=$id");
					   
     

  
      
}  

if(isset($_POST["insert2"]))
 {  

     $wid2         =$_POST["list2"];  
     $servid2 =$_POST["serv_id2"];
    
          $queryy = "  
          UPDATE booking  
          SET worker2_id   ='$wid2'  
          WHERE booking_id='$servid2'";  
	
   
mysqli_query($link, $queryy);


			     $query3 = "  
          UPDATE worker  
          SET worker_status  =1  
          WHERE worker_id='$wid2'";  
		  
		  mysqli_query($link, $query3);  

		  
		  $sqlService6="SELECT * FROM worker WHERE worker_status=1";
		   $result7 = mysqli_query($link, $sqlService6);
		     while($row7 = mysqli_fetch_array($result7)) {
				 
				 $qq=$row7['worker_id'];
				 $sqlService5="SELECT count('1') FROM booking WHERE worker_id='$qq' OR worker2_id='$qq' OR worker3_id='$qq' OR worker4_id='$qq'";
				 $result6 = mysqli_query($link, $sqlService5);
				  $row6=mysqli_fetch_array($result6);
                  $tot=$row6[0];
				  
				  if($tot==0)
				  {
					     $query2 = "  
          UPDATE worker  
          SET worker_status  =0  
          WHERE worker_id='$qq'";  
		  
		  mysqli_query($link, $query2);  
					  
				  }
				  
			 }
			 
	   header("location:bookingManage.php?id=$id");
					   
     

  
      
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">	 
    <title>Cleaning Service Booking System(CSBS)</title>

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
::-webkit-scrollbar {
  width:0.1px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
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



 .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 10px;
		width:1250px;

  border-radius:1px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }
 .table-title {        
  padding-bottom: 15px;
     background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
  color: #fff;
  padding: 16px 30px;
  margin: -20px -25px 10px;
  border-radius: 1px 1px 0 0;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }
    .table-title h2 {
  margin: 5px 0 0;
  font-size: 24px;
 }
 .table-title .btn-group {
  float: right;
 }
 .table-title .btn {
  color: #fff;
  float: right;
  font-size: 15px;
  border: none;
  min-width: 50px;
  border-radius: 1px;
  border: none;
  outline: none !important;
  margin-left: 10px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
 }
 .table-title .btn i {
  float: left;
  font-size: 21px;
  margin-right: 5px;
 }
 .table-title .btn span {
  float: left;
  margin-top: 2px;
 }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
  padding: 12px 15px;
  vertical-align: middle;
    }
 table.table tr th:first-child {
  width: 400px;
 }
 table.table tr th:last-child {
  width: 100px;
 }
    table.table-striped tbody tr:nth-of-type(odd) {
     background-color: #fcfcfc;
 }
 table.table-striped.table-hover tbody tr:hover {
  background: #f5f5f5;
 }
    table.table th {
        font-size: 18px;
        margin: 0 5px;
        cursor: pointer;
    } 
    table.table td:last-child i {
  opacity: 0.9;
  font-size: 22px;
        margin: 0 5px;
    }
 table.table td a {
  font-weight: bold;
  color: #566787;
  display: inline-block;
  text-decoration: none;
  outline: none !important;
 }
 table.table td a:hover {
  color: #2196F3;
 }
 table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td {
        font-size: 20px;
    }
 table.table .avatar {
  border-radius: 1px;
  vertical-align: middle;
  margin-right: 10px;
 }
    .pagination {
        float: right;
        margin: 10px 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 1px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    } 
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
 .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    

 /* Modal styles */
 .modal .modal-dialog {
  max-width: 400px;
 }
 .modal .modal-header, .modal .modal-body, .modal .modal-footer {
  padding: 20px 30px;
 }
 .modal .modal-content {
  border-radius: 1px;
 }
 .modal .modal-footer {
  background: #ecf0f1;
  border-radius: 0 0 1px 1px;
 }
    .modal .modal-title {
        display: inline-block;
    }
 .modal .form-control {
  border-radius: 1px;
  box-shadow: none;
  border-color: #dddddd;

 }
 .modal textarea.form-control {
  resize: vertical;
 }
 .modal .btn {
  border-radius: 1px;
  min-width: 100px;
 } 
 .modal form label {
  font-weight: normal;

 } 
 
 
 
 .pagination {
        float: right;
        margin: 50 0 5px;
		padding-top:10px;
    }
    .pagination a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 1px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination a:hover {
        color: #666;
    } 
    .pagination a.active  {
        background: #E0E0E0;
    }
    .pagination a:hover {        
        background: #B0B0B0;
    }
 .pagination a.disabled i {
        color: #ccc;
    }
    .pagination a  {
        font-size: 16px;
        padding-top: 6px
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
	margin-left:220px;
	margin-top:10px;
	font-size:20px;
	font-color:blue;
	
	

}

.a{
	font-color:#FFF;
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
    <a href="bookingCalendar.php" class="dash"><i class="fa fa-calendar"></i> Calendar</a>
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
	<a href="bookingCalendar.php">back to booking calendar</a> 

	 </div>
	 
	 
	 <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>Manage <b>Booking</b></h2>
     </div>

                </div>
   </div>
   
<div id="servicetable">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Service Details</th>
						<th>Worker</th>
						<th>Worker2</th>
						<th>Worker3</th>
						<th>Worker4</th>
                        <th>Actions</th>
						
                    </tr>
                </thead>
                <tbody>

    <?php

                while($row2 = mysqli_fetch_array($result))
                {
					
					$test = substr($row2["list_name"], strpos($row2["list_name"], "+") + 1);
					
			
			
                ?>
     <tr>
	 
      <td><?php echo $row2["service_name"]; ?>
	  <br><br>-ListName:<?php echo $row2["list_name"]; ?>
      <br><br>-Phone: <?php echo $row2["booking_phone"]; ?>
	   <br><br>-Address:<?php echo $row2["booking_address"]; ?>
		<br><br>-Price:RM<?php echo $row2["booking_price"]; ?>
		<br><br>-Message:<?php echo $row2["booking_message"]; ?>
	    <br><br>-Time:<?php echo $row2["booking_time"]; ?>
		<?php 
		if($row2["booking_tools"]==0)
		{
			?>
		<br><br>-Service Tools:<?php echo "No"; ?></td>
		<?php
		}
		else
		{
			?>
	<br><br>-Service Tools:<?php echo "Yes"; ?></td>		
			<?php
		}
		?>
		
		<?php 
		date_default_timezone_set('Asia/Taipei');
$date = date('Y-m-d');
		if($id== $date)
		{
		if($test=="1 worker")
		{
		if($row2["worker_id"]==0)
		{
			?>
		     <td><a href="#workerManage<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			  <td><?php echo "N/A"; ?></td>
			   <td><?php echo "N/A"; ?></td>
			    <td><?php echo "N/A"; ?></td>
			 <?php
		}
		else
		{
			$j=$row2["worker_id"];
			  $sqlService7="SELECT * FROM worker WHERE worker_id='$j'";
		   $result8 = mysqli_query($link, $sqlService7);
		     while($row8 = mysqli_fetch_array($result8)) {
				 $qqq=$row8["worker_name"];
			 }
			?>
			 <td><?php echo $qqq; ?> &nbsp <a href="#workerManage<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 <td><?php echo "N/A"; ?></td>
			 <td><?php echo "N/A" ?></td>
			 <td><?php echo "N/A"; ?></td>
			 <?php
		}
		}
		
		
		if($test=="2 workers")
		{
		if($row2["worker_id"]==0&& $row2["worker2_id"]==0)
		{
			?>
		    <td><a href="#workerManage<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			
			<td><a href="#workerManage2<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			   <td><?php echo "N/A"; ?></td>
			    <td><?php echo "N/A"; ?></td>
			 <?php
		}
		else if($row2["worker_id"]!=0&& $row2["worker2_id"]==0)
		{
			$j=$row2["worker_id"];
			  $sqlService7="SELECT * FROM worker WHERE worker_id='$j'";
		   $result8 = mysqli_query($link, $sqlService7);
		     while($row8 = mysqli_fetch_array($result8)) {
				 $qqq=$row8["worker_name"];
			 }
			?>
			 <td><?php echo $qqq; ?> &nbsp <a href="#workerManage<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 
			 
			 <td><a href="#workerManage2<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 <td><?php echo "N/A" ?></td>
			 <td><?php echo "N/A"; ?></td>
			 <?php
		}
		else if($row2["worker_id"]==0&& $row2["worker2_id"]!=0)
		{
			$j=$row2["worker2_id"];
			  $sqlService7="SELECT * FROM worker WHERE worker_id='$j'";
		   $result8 = mysqli_query($link, $sqlService7);
		     while($row8 = mysqli_fetch_array($result8)) {
				 $qqq=$row8["worker_name"];
			 }
						?>
			<td><a href="#workerManage<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			
			 <td><?php echo $qqq; ?> &nbsp <a href="#workerManage2<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 <td><?php echo "N/A" ?></td>
			 <td><?php echo "N/A"; ?></td>
			 <?php
		}
		else 
		{
			$j=$row2["worker2_id"];
			  $sqlService7="SELECT * FROM worker WHERE worker_id='$j'";
		   $result8 = mysqli_query($link, $sqlService7);
		     while($row8 = mysqli_fetch_array($result8)) {
				 $qqq=$row8["worker_name"];
			 }
			 $j2=$row2["worker_id"];
			  $sqlService77="SELECT * FROM worker WHERE worker_id='$j2'";
		   $result88 = mysqli_query($link, $sqlService77);
		     while($row88 = mysqli_fetch_array($result88)) {
				 $qqq2=$row88["worker_name"];
			 }
			 
					?>
			 <td><?php echo $qqq2; ?> &nbsp <a href="#workerManage<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 <td><?php echo $qqq; ?> &nbsp <a href="#workerManage2<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 <td><?php echo "N/A" ?></td>
			 <td><?php echo "N/A"; ?></td>
			 <?php	
		}
		
		
		}
		
		
		
		
		if($test=="4 workers")
		{
			
		if($row2["worker_id"]==0)
		{
			?>
		     <td><a href="#workerManage<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 
			 <?php
		}
		else 
		{
			$j=$row2["worker_id"];
			  $sqlService7="SELECT * FROM worker WHERE worker_id='$j'";
		   $result8 = mysqli_query($link, $sqlService7);
		     while($row8 = mysqli_fetch_array($result8)) {
				 $qqq=$row8["worker_name"];
			 }
			?>
		     <td><?php echo $qqq; ?> &nbsp <a href="#workerManage<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 
			 <?php
		}
		
		if($row2["worker2_id"]==0)
		{
			?>
		     <td><a href="#workerManage2<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 
			 <?php
			
		}
		else
		{
			$jj=$row2["worker2_id"];
			  $sqlService77="SELECT * FROM worker WHERE worker_id='$jj'";
		   $result88 = mysqli_query($link, $sqlService77);
		     while($row88 = mysqli_fetch_array($result88)) {
				 $qqq2=$row88["worker_name"];
			 }
		?>
		     <td><?php echo $qqq2; ?> &nbsp <a href="#workerManage2<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 
			 <?php
		}
		
		if($row2["worker3_id"]==0)
		{
			?>
		     <td><a href="#workerManage3<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 
			 <?php
			
		}
		else
		{
			$jjj=$row2["worker3_id"];
			  $sqlService777="SELECT * FROM worker WHERE worker_id='$jjj'";
		   $result888 = mysqli_query($link, $sqlService777);
		     while($row888 = mysqli_fetch_array($result888)) {
				 $qqq3=$row888["worker_name"];
			 }
		?>
		      <td><?php echo $qqq3; ?> &nbsp <a href="#workerManage3<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 
			 <?php
		}
		
		if($row2["worker4_id"]==0)
		{
			?>
		    <td><a href="#workerManage4<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 
			 <?php
			
		}
		else
		{
			$jjjj=$row2["worker4_id"];
			  $sqlService7777="SELECT * FROM worker WHERE worker_id='$jjjj'";
		   $result8888 = mysqli_query($link, $sqlService7777);
		     while($row8888 = mysqli_fetch_array($result8888)) {
				 $qqq4=$row8888["worker_name"];
			 }
		?>
		   <td><?php echo $qqq4; ?> &nbsp <a href="#workerManage4<?php echo $row2['booking_id']; ?>" class="edit_data" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Worker Manage">&#xE254;</i></a></td>
			 
			 <?php
		}
		
	
		
		
		}
		}
		else
		{
			?>
			 <td><?php echo "N/A" ?></td>
			 <td><?php echo "N/A"; ?></td>
			  <td><?php echo "N/A" ?></td>
			 <td><?php echo "N/A"; ?></td>
			 <?php
		}
		?>

      <td>
       
	   
	    <a href='bookingDelete.php?id=<?php echo $row2["booking_id"]; ?>&id2=<?php echo $id;?>' ><i class="material-icons" data-toggle="tooltip" value="Delete">&#xE872;</i></a>
	   
          
      </td>
	  <?php include('bookingManageE1.php'); ?>
	  <?php include('bookingManageE2.php'); ?>
	  <?php include('bookingManageE3.php'); ?>
	   <?php include('bookingManageE4.php'); ?>
	  
     </tr>
             <?php 
		
                    } 
			
                ?>
                </tbody>
            </table>
		
        </div>
    </div>
	</div>


	 
	 
</body>
</html>