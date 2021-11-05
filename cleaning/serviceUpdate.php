<?php
require_once "config.php";
$id=$_GET['id'];

$hide=$_POST['hide'];
$name=$_POST['name'];
$desc=$_POST['desc'];
$status=$_POST['status'];
$checkbox[0]=$_POST['timePrice1'];
		$checkbox[1]=$_POST['timePrice2'];
		$checkbox[2]=$_POST['timePrice3'];
		$checkbox[3]=$_POST['timePrice4'];
		$checkbox[4]=$_POST['timePrice5'];
		$price[0]=$_POST['price1'];
		$price[1]=$_POST['price2'];
		$price[2]=$_POST['price3'];
		$price[3]=$_POST['price4'];
		$price[4]=$_POST['price5'];
		
		$val;
          $queryq="SELECT count('1') FROM list WHERE service_name='$name' AND service_name!='$hide'"; 
		  $ress=mysqli_query($link, $queryq);
			 $roww=mysqli_fetch_array($ress);

            $tots=$roww[0];
		
			if($tots!=0)
			{
		
			
			  echo "<SCRIPT>
             alert('Service Name is available!')
             window.location.replace('services.php');
                </SCRIPT>";

			}
			else
			{
		 $query7="DELETE FROM list WHERE service_name='$hide'"; 
		   if (mysqli_query($link, $query7)) {
      echo "Record deleted successfully";
      } else {
      echo "Error deleting record: " . mysqli_error($conn);
       }
			  
		
		
if($checkbox[0]==''&&$checkbox[1]==''&&$checkbox[2]==''&&$checkbox[3]==''&&$checkbox[4]=='')
		{
		
			
			$val="4 hours+1 worker";
					$rm=0;
					$start="8:00";
					$end="12:00";
					
					 $sql = "INSERT INTO list(list_name,service_name,list_price,list_start,list_end)
                       VALUES ('$val','$name','$rm','$start','$end')";
                       if (mysqli_query($link, $sql))
                       {
						  
                        }
                       else
                         {
                         echo "Error: " . $sql . " " . mysqli_error($link);
                          }
		}
		else
		{
			for($i=0;$i<5;$i++)
			{
				if($checkbox[$i]!='')
				{
					
					if($checkbox[$i]=="4 hours+1 worker")
					{						
			
					$val=$checkbox[$i];
					$rm=$price[0];
					  	$start="8:00";
					$end="12:00";
					
					 $sql = "INSERT INTO list(list_name,service_name,list_price,list_start,list_end)
                       VALUES ('$val','$name','$rm','$start','$end')";
                       if (mysqli_query($link, $sql))
                       {
						  
                        }
                       else
                         {
                         echo "Error: " . $sql . " " . mysqli_error($link);
                          }
					}
					else if($checkbox[$i]=="4 hours+2 workers")
					{
						$val=$checkbox[$i];
					$rm=$price[1];
					 	$start="8:00";
					$end="12:00";
					
					 $sql = "INSERT INTO list(list_name,service_name,list_price,list_start,list_end)
                       VALUES ('$val','$name','$rm','$start','$end')";
                       if (mysqli_query($link, $sql))
                       {
						  
                        }
                       else
                         {
                         echo "Error: " . $sql . " " . mysqli_error($link);
                          }
					}
					else if($checkbox[$i]=="6 hours+1 worker")
					{
						$val=$checkbox[$i];
					$rm=$price[2];
					 $start="14:00";
					$end="20:00";
                   $sql = "INSERT INTO list(list_name,service_name,list_price,list_start,list_end)
                       VALUES ('$val','$name','$rm','$start','$end')";
                       if (mysqli_query($link, $sql))
                       {
						  
                        }
                       else
                         {
                         echo "Error: " . $sql . " " . mysqli_error($link);
                          }
					}
					else if($checkbox[$i]=="6 hours+2 workers")
					{
						$val=$checkbox[$i];
					$rm=$price[3];
					  $start="14:00";
					$end="20:00";
                   $sql = "INSERT INTO list(list_name,service_name,list_price,list_start,list_end)
                       VALUES ('$val','$name','$rm','$start','$end')";
                       if (mysqli_query($link, $sql))
                       {
						  
                        }
                       else
                         {
                         echo "Error: " . $sql . " " . mysqli_error($link);
                          }
					}
					else if($checkbox[$i]=="8 hours+4 workers")
					{
						$val=$checkbox[$i];
					$rm=$price[4];
					     $start="8:00";
					$end="16:00";
					 $sql = "INSERT INTO list(list_name,service_name,list_price,list_start,list_end)
                       VALUES ('$val','$name','$rm','$start','$end')";
                       if (mysqli_query($link, $sql))
                       {
						  
                        }
                       else
                         {
                         echo "Error: " . $sql . " " . mysqli_error($link);
                          }
					}
				}
			}
		}
		
		
if($_FILES['logo']['name']==''){
	
	$que="Select service_logo from service where service_id=$id";
	$test=	 mysqli_query($link, $que);
	 while($row = mysqli_fetch_array($test))
      {
				
   		$file=$row["service_logo"];
					

	}
	
}
else
{
	$file="http://192.168.0.151:8080/cleaning/".$_FILES['logo']['name'];
}

if($_FILES['cover']['name']==''){
	
	$que2="Select service_cover from service where service_id=$id";
	$test2=	 mysqli_query($link, $que2);
	 while($row = mysqli_fetch_array($test2))
      {
				
   		$file2=$row["service_cover"];
					

	}
	
}
else
{
	$file2="http://192.168.0.151:8080/cleaning/".$_FILES['cover']['name'];
}
 

$query2="update booking_history set service_status='$status' where service_name='$name'"; 
mysqli_query($link, $query2);

 
$query="update service set service_logo='$file',service_cover='$file2',service_name='$name', 
service_nodolist='$desc', 
service_status='$status' where service_id=$id";

mysqli_query($link, $query);
  
 header('location:services.php');
}

 
?>