<?php
// Initialize the session
session_start();
     require_once "config.php";
	 $rsresult=mysqli_query($link,"SELECT * FROM booking_history");
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    header("location: login.php");
    exit;
}
		
?>
<?php
$count2=0;
$name_err = "";
?>
<?php


?>

<?php
$sid;

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
  width: 160px;
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
	font-size:25px;

}

.box1{
	
	margin-top:20px;
	margin-left:220px;
	background-color: white;
    width:270px;
	height:130px;
	 border-left: 5px solid blue;
}

.box2{
	
	margin-top:-130px;
	margin-left:540px;
	background-color: white;
    width:270px;
	height:130px;
	border-left: 5px solid purple;
}


.box3{
	
	margin-top:-130px;
	margin-left:860px;
	background-color: white;
    width:270px;
	height:130px;
		border-left: 5px solid indigo;
}


.box4{
	
	margin-top:-130px;
	margin-left:1180px;
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
	    <a href=""class="dash"><i class="fa fa-check"></i> Booking</a>
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
	$("#auto").load("nav2.php");
	},1000);
});
</script>
	 
	 <div class="cov">
	<h3>Booking History Data</h3>
	</div>
	<?php
	$tw = mysqli_query($link, "SELECT COUNT('1') FROM booking_history");
    $cm=mysqli_fetch_array($tw);

    $countM=$cm[0];
	?>
<div class="box1">
	 
	 <div class="txt1">
	 <?php if ($countM==0)
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
	 Done Service
	 </div>
	 </div>
	 
	 </div>
	 
	 
	<?php
	$tw2 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE rating!=0 ");
	
	$cm2=mysqli_fetch_array($tw2);

    $countM2=$cm2[0];


	?>
 
 
 	 <div class="box2">
	  <div class="txt2">
  <?php
	 echo $countM2;
	 ?>

	 <br> 
	 <div class="txt2a">
	 Total Rating
	 </div>
	 

	 </div>
	 </div>
	 

	 
	<?php
       
			$tw3 = mysqli_query($link, "SELECT COUNT('1') FROM booking_history WHERE review!='' ");
	
	$cm3=mysqli_fetch_array($tw3);

    $countM3=$cm3[0];
	?>
	 
	 	 <div class="box3">
		 	  <div class="txt2">
			  
			  <?php 
		echo $countM3; 
		 ?>
	 <br> 
	 <div class="txt2a">
	 Total Review
	 </div>

	 </div>
	 
	 </div>
	 
	 
	 <?php
	$tw4 = mysqli_query($link, "SELECT SUM(booking_price) AS total FROM booking_history");
    $cm4=mysqli_fetch_array($tw4);

    $countM4=$cm4['total'];
	?>
	 
	 
	 	 <div class="box4">
	 	 	  <div class="txt2">
			  
			  <?php if ($countM4==0)
			  {
				  ?>
				  0
				  <?php
			  }
			  else{
				  ?>
           <?php 
	 	 
 echo $countM4;
	 ?>


	 <?php
			  }
			  ?>
	 <br> 
	 <div class="txt2a">
	 Total Booking Price
	 </div>

	 </div>
	 </div>
	
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>Booking History</b></h2>
     </div>
	
     <div class="col-sm-6">
	  
		
	     <input type="text" name="search"  id="search"  onkeyup="myFunction()"  style="width:360px;height:35px;margin-left:200px;" class="form-control"placeholder="Search..by service name" /> 

	  
     </div>
     </div>
   </div>
   
   <?php
   $per_page_record = 10;
    if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        } 
   else {    
          $page=1;    
        }    
    		  $start_from = ($page-1) * $per_page_record;     
    
        $query = "SELECT * FROM booking_history LIMIT $start_from, $per_page_record";     
        $rs_result = mysqli_query ($link, $query);    
    ?>    
		
<div id="servicetable">
            <table class="table table-striped table-hover" id="employee_table" style="width: 100%;">
			

	
                <thead>
                    <tr>
					
                        <th>Service Name</th>
                        <th>Service List (Duration,No of Worker,Price)</th>
                        <th>Booking Address</th>
						<th>Booking Price</th>
                        <th>Booking Date</th>
						<th>Booking Time</th>
				
						<th>Rating</th>
						<th>Review</th>
       
						
                    </tr>
                </thead>
                <tbody>

    <?php

                while($row2 = mysqli_fetch_array($rsresult))
                {
				$bid=$row2["bhistory_id"];
                ?>
     <tr>
	  
      <td><?php echo $row2["service_name"]; ?></td>
	  <td><?php echo $row2["list_name"]; ?></td>	
<td><?php echo $row2["booking_address"]; ?></td>
<td><?php echo $row2["booking_price"]; ?></td>	
<td><?php echo $row2["booking_date"]; ?></td>  
<td><?php echo $row2["booking_time"]; ?></td>




<td><?php echo $row2["rating"]; ?></td>
<td><?php echo $row2["review"]; ?></td>

	 
	  
	   

     </tr>
                <?php 
				
			
                     
				}
				
			
                ?>
                </tbody>
            </table>
		<div class="pagination"> 	
			<?php  
        $query = "SELECT COUNT(*) FROM booking_history";     
        $rs_result = mysqli_query($link, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='history.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='history.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='history.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='history.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
			
			

            </div>
        </div>
    </div>
	</div>
 
 <script>  
  function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("employee_table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
 </script> 
</body>
</html>