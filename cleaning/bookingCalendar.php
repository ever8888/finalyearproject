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

$a="";
date_default_timezone_set('Asia/Taipei');
$date = date('Y-m-d');
$sqla="select count('1') from booking where booking_date='$date'";

$result2=mysqli_query($link,$sqla);
$row2=mysqli_fetch_array($result2);
$tot=$row2[0];
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  
       $service = $_POST['service'];
	   $list  = $_POST['list'];
	   $phone=$_POST['telephone'];
	   $address=$_POST['address'];
	   $tools=$_POST['tools'];
	   $message=$_POST['message'];
	   $date=$_POST['date'];
	
	   $try = explode("-", $list);
		$test = substr($list, strpos($list, "-") + 1);
        $test2 = substr($list, strpos($list, "M") + 1);
		$listed=$try[0];
		
		if($tools==1)
	    {
			$test=$test+20;
		}
			
        $sql = "INSERT INTO booking (service_name,booking_phone,booking_address,booking_message,booking_tools,list_name,booking_price,booking_date,booking_time,cust_id)
        VALUES ('$service','$phone','$address','$message','$tools','$listed','$test','$date','$test2',12)";
        if (mysqli_query($link, $sql))
        {
			
			header("location:bookingCalendar.php");
			
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($link);
        }
		 
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
	
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/png" href="Saved/favicon.png"/>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
  
  
  <script>
  
   $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month'
    },
    events: 'bookingload.php',
    selectable:true,
    selectHelper:true,
	displayEventTime: false,
    select: function(start, end, allDay)
    {
 
     var start=$.fullCalendar.formatDate(start, "Y-MM-DD");
     
         var title = alert("View booking");
		 
	
     
        window.location.replace("bookingManage.php?id="+start)
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
	margin-left:300px;
	height:200px;
	width:1300px;
	float:left;
}



.form-group{
	width:300px;
	margin-left:10px;
}

.add{
	margin-left:-150px;
	margin-top:20px;
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
	margin-left:250px;
	font-size:25px;

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

  </style>
 </head>
 <body>
  <div class="sidenav">
 <a href="welcome.php"><div class="btn2" ></div>
<img src="Saved/CSBS.png" style="width:70%;">
</a>
<hr>
  <a href="welcome.php"><i class="fa fa-dashboard"></i>&nbspDashboard </a>
    <a href=""class="dash"><i class="fa fa-calendar"></i> Calendar</a>
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
 
 
 <div class="add">
<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" > <span>Add New Service</span></a>
</div>
<br>
  <div class="con">
  <div class="container">
   <div id="calendar"></div>
      </div>
    </div>
	
 <div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
   
			 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
   <h3><b>&nbsp MAKE APPOINTMENT</b></h3>
        <div id="note">
	
	
            <p>&nbsp&nbsp&nbsp&nbsp*Please fill this form to make booking*</p>
        </div>
		 
			<div class="form-group">
			<label for="service">Select Service</label>
			<br>
            <select name="service" id="service" style="text-align: left;width:357px;height:30px;" >
			<?php
			
			$sqlService="SELECT * FROM service";
			if($result3 = mysqli_query($link, $sqlService)){
             if (mysqli_num_rows($result3) > 0) {
           while($row3 = mysqli_fetch_array($result3)) {
		   ?>
				   	   
          <option value="<?php echo $row3['service_name'];?>">
		   <?php
			   echo "{$row3['service_name']}  </option>";
			    	   
              }
			  
			  
			  
}
}
?>
   
            </select>
			 </div>
			 
			  <div class="form-group">
			  <label for="service">Select Service Type</label>
			<br>
			   <select name="list" id="list" style="text-align: left;width:357px;height:30px;" >
	 <?php
  $sqlService2="SELECT * FROM list";
				  $result4 = mysqli_query($link, $sqlService2);
				   while($row4 = mysqli_fetch_array($result4)) {
					?>
					    <option value="<?php echo $row4['list_name'].-$row4['list_price']."M".$row4['list_start'];?>">
						   <?php
			             echo "({$row4['service_name']}) {$row4['list_name']}-RM{$row4['list_price']}  </option>";	
						 
				   }
               ?>
			     </select>
			   </div>
			   
			 <div class="form-group">
            <label> Phone Number</label>
                <input type="telephone" name="telephone" class="form-control" style="text-align: left;width:357px;height:30px;" required>
            </div>
			
			
			<div class="form-group">

    <label> Address</label>
<input id="searchTextField" type="text" size="50" name="address" style="text-align: left;width:357px;height:30px;direction: ltr;" required>
<br><br>
		
						<div class="map">
 
	    <div id="map_canvas" style=" height: 280px ;width: 400px;"></div>
</div>	
            
		</div>
	<div class="form-group">
       <label >Include service tools</label>
	   <br>
    <input type="radio" id="tools" name="tools" value="1">
  <label for="enable">Yes(+RM20)</label><br>
  <input type="radio" id="tools" name="tools" value="0">
  <label for="disable">No</label><br>  
      </div> 
		
			 <div class="form-group">
                <label>Message</label>
				 <textarea class="form-control" name="message" placeholder="Enter message" rows="4" cols="50" style="text-align: left;width:357px;height:30px;" required></textarea>
            </div>
			<?php
			date_default_timezone_set('Asia/Taipei');
                $date2 = date('Y-m-d');
			?>
		<div class="form-group">
			<label>Date</label>
                <input type="date" name="date" id="txtDate" min="<?php echo $date2;?>" class="form-control" style="text-align: left;width:357px;height:30px;" required >
              
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
     $(function () {
         var lat = 5.343335,
             lng = 100.265488,
             latlng = new google.maps.LatLng(lat, lng),
             image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';

         //zoomControl: true,
         //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,

         var mapOptions = {
             center: new google.maps.LatLng(lat, lng),
             zoom: 13,
             mapTypeId: google.maps.MapTypeId.ROADMAP,
             panControl: true,
             panControlOptions: {
                 position: google.maps.ControlPosition.TOP_RIGHT
             },
             zoomControl: true,
             zoomControlOptions: {
                 style: google.maps.ZoomControlStyle.LARGE,
                 position: google.maps.ControlPosition.TOP_left
             }
         },
         map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
             marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 icon: image
             });

         var input = document.getElementById('searchTextField');
         var autocomplete = new google.maps.places.Autocomplete(input, {
             types: ["geocode"]
         });

         autocomplete.bindTo('bounds', map);
         var infowindow = new google.maps.InfoWindow();

         google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
             infowindow.close();
             var place = autocomplete.getPlace();
             if (place.geometry.viewport) {
                 map.fitBounds(place.geometry.viewport);
             } else {
                 map.setCenter(place.geometry.location);
                 map.setZoom(17);
             }

             moveMarker(place.name, place.geometry.location);
             $('.MapLat').val(place.geometry.location.lat());
             $('.MapLon').val(place.geometry.location.lng());
         });
         google.maps.event.addListener(map, 'click', function (event) {
             $('.MapLat').val(event.latLng.lat());
             $('.MapLon').val(event.latLng.lng());
             infowindow.close();
                     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({
                         "latLng":event.latLng
                     }, function (results, status) {
                         console.log(results, status);
                         if (status == google.maps.GeocoderStatus.OK) {
                             console.log(results);
                             var lat = results[0].geometry.location.lat(),
                                 lng = results[0].geometry.location.lng(),
                                 placeName = results[0].address_components[0].long_name,
                                 latlng = new google.maps.LatLng(lat, lng);

                             moveMarker(placeName, latlng);
                             $("#searchTextField").val(results[0].formatted_address);
                         }
                     });
         });
        
         function moveMarker(placeName, latlng) {
             marker.setIcon(image);
             marker.setPosition(latlng);
             infowindow.setContent(placeName);
             //infowindow.open(map, marker);
         }
     });
</script>	
 </body>
</html>
  