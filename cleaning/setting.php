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
$reason="";
$reason_err="";
$date="";
$date_err="";

$a="";
date_default_timezone_set('Asia/Taipei');
$date = date('Y-m-d');
$sqla="select count('1') from booking where booking_date='$date'";

$result2=mysqli_query($link,$sqla);
$row2=mysqli_fetch_array($result2);

$tot=$row2[0];


$cenvertedTime = date('Y-m-d',strtotime('+14 day'));

?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate name
    if(empty(trim($_POST["reason"]))){
        $reason_err = "Please enter a reason.";
    } 
	else{
		
        // Prepare a select statement
        $sql = "SELECT setting_id FROM setting WHERE off_reason = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_reason);
            
            // Set parameters
            $param_reason = trim($_POST["reason"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                    $reason = trim($_POST["reason"]);   
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
		
    }
    
	// Validate date
    if(empty(trim($_POST["date"]))){
        $date_err = "Please select a date.";
    } 
	else{
        // Prepare a select statement
        $sql = "SELECT setting_id FROM setting WHERE off_date= ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_date);
            
            // Set parameters
            $param_date = trim($_POST["date"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                    $date = trim($_POST["date"]);   
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    
    // Check input errors before inserting in database
    if(empty($date_err)&& empty($reason_err) ){
		
         $sql2 = "SELECT off_date FROM setting WHERE off_date='$date'";
		 $d=mysqli_query($link, $sql2);
		 $row3=mysqli_fetch_array($d);
		 
		 if($row3[0]==$date)
		 {
			  echo '<script type ="text/JavaScript">';  
             echo 'alert("Date selected is already set")';  
             echo '</script>';  
			
		 }
		 else
		 {
			 
        // Prepare an insert statement
        $sql = "INSERT INTO setting (off_reason,off_date) VALUES (?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", 
			
		    $param_reason,$param_date);
            
            // Set parameters
			$param_reason=$reason;
            $param_date=$date;
          
        
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                header("location: setting.php");
         
				 mysqli_close($link);
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
		
		 }
    }
    
    // Close connection

}
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Booking Calendar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  	<script src="http://maps.google.com/maps/api/js?key=AIzaSyAgAeZZD8a1wn5B0wecpVi8PGH29eK_ngE&libraries=places&region=us&language=en&sensor=true"></script>
	
	
	
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
  <script>
  var a;
   $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month'
    },
    events: 'settingload.php',
    selectable:true,
    selectHelper:true,
	displayEventTime: false,
    select: function(start, end, allDay)
    {
  if(confirm("Are you sure you want to remove it?"))
     {
     var start=$.fullCalendar.formatDate(start, "Y-MM-DD");
	 
         window.location.replace("settingUpdate.php?id="+start)
	 }

    },



   });
  });
   
  </script>
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

.con {
    width: 1500px;
	
	height:500px;

 
}

.container{
	margin-left:200px;
	height:200px;
	width:1300px;
	float:left;
}



.form-group{
	width:300px;
	margin-left:10px;
	font-size:16px;
}

.add{
	margin-left:-110px;
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


  </style>
 </head>
 <body>
 <div class="sidenav">
 <a href="welcome.php"><div class="btn2" ></div>
<img src="Saved/CSBS.png" style="width:70%;">
</a>
<hr>
  <a href="welcome.php"  ><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
    <a href="bookingCalendar.php"><i class="glyphicon glyphicon-calendar"></i> Calendar</a>
	  <a href="services.php"><i class="glyphicon glyphicon-list-alt"></i> Services</a>
	  <a href="customer.php"><i class="glyphicon glyphicon-user"></i> Customer</a>
	   <a href="worker.php"><i class="glyphicon glyphicon-briefcase"></i> Worker</a>
	    <a href="history.php"><i class="glyphicon glyphicon-check"></i> Booking</a>
	   <a href="expense.php"><i class="glyphicon glyphicon-usd"></i> Expenses</a>
	   <a href="voucher.php"><i class="glyphicon glyphicon-tag"></i> Voucher</a>
	    <a href="report.php"><i class="glyphicon glyphicon-indent-left"></i> Report</a>
		<br><br><br><br><br><br><br><br><br>
		<hr>
		<div class="set">
		<a href="" class="dash"><i class="glyphicon glyphicon-cog"></i></a>
	    </div>

</div>

<div class="navbar">

<div class="box">
     <a href="bookingManage.php?id=<?php echo $date;?>" class="notification">
  <i class="glyphicon glyphicon-bell"></i>
  <span class="badge"> <?php echo $tot;?></span>
   </a>

   
  <div class="dropdown">	
  
 
    <a href="logout.php">
      <i class="glyphicon glyphicon-log-out"></i>
     </a>

  </div> 


</div>


  
</div>
 
 
 <div class="add">
<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" > <span>Set Business Off Date</span></a>
</div>
<br>
  <div class="con">
  <div class="container">
   <div id="calendar"></div>
      </div>
    </div>
	
 <div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content" style="width:370px;margin-left:250px;" >
   
			 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
   <h3><b>&nbsp Set Business Off Date</b></h3>
        <div id="note">
            <p>&nbsp&nbsp&nbsp&nbsp*Set Business Off Date*</p>
        </div>
						
		<div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
			<label><i class="fa fa-calendar" style="color:#2196F3; font-size: 30px; text-shadow:1px 1px 2px #000000;"></i> Date</label>
                <input type="date" name="date" id="date" min="<?php echo $cenvertedTime;?>"
			 class="form-control" value="<?php echo $cenvertedTime; ?>">
			<br>
			 	<span class="help-block"><?php echo $date_err;?></span>
	
		</div>
			 <div class="form-group <?php echo (!empty($reason_err)) ? 'has-error' : ''; ?>">
                <label>Reason</label>
                <input type="text" name="reason" class="form-control"  value="<?php echo $reason; ?>" >
				<span class="help-block"><?php echo $reason_err; ?></span>
            </div>
			 
			<center>
		   <input type="submit" name="sub" value="Submit">
		</center>
		
		<br>
   
   </form>
   </div>
  </div>
 </div>

  <script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    
    $('#txtDate').attr('min', maxDate);
});

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

 </body>
</html>
  