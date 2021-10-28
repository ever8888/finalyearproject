 
 <div class="modal fade" id="edit<?php echo $row2['service_id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content" style="width:600px;">
<div class="modal-header">

<center><h4 class="modal-title" id="myModalLabel"  style="font-weight:bold;font-size:26px">Edit Services</h4></center>
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>

</div>
<div class="modal-body">
<?php
$edit=mysqli_query($link,"select * from service where service_id=".$row2['service_id']);
$erow=$edit->fetch_assoc();
?>
<div class="container-fluid">
<form method="POST" action="serviceUpdate.php?id=<?php echo $erow['service_id']; ?>" 
enctype="multipart/form-data">

<div class="form-group">
<label style="font-weight:bold;font-size:20px";>Service Logo</label>
   <center><img id="preimg" width="100px" height="80px" src="<?php echo $erow['service_logo']; ?>"></center><br>
<input type="file" class="form-control" name="logo" onchange="loadfile4(event)"/>

   <script type="text/javascript">
	   function loadfile4(event){
		   var output=document.getElementById('preimg');
		   output.src=URL.createObjectURL(event.target.files[0]);
		   
	   }
	   </script>
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:20px;">Service Cover</label>
   <center><img id="preimg4" width="100px" height="80px" src="<?php echo $erow['service_cover']; ?>"></center><br>
<input type="file" class="form-control" name="cover" onchange="loadfile3(event)"/>

   <script type="text/javascript">
	   function loadfile3(event){
		   var output=document.getElementById('preimg4');
		   output.src=URL.createObjectURL(event.target.files[0]);
		   
	   }
	   </script>
</div>



     <div class="form-group">
       <label style="font-weight:bold;font-size:20px";>Service Name</label>
       <input type="text" name="name" id="name" class="form-control" value="<?php echo $erow['service_name']; ?>" style="font-size:18px"required>
      </div>



      <div class="form-group">
       <label style="font-weight:bold;font-size:20px";>Service Duration , No of Worker and Price (RM)</label><br>
      
	  <?php	

	  $j=$erow['service_name'];
	  $q2="";
	 $query6="SELECT * FROM list WHERE service_name='$j'"; 
		  $res2=mysqli_query($link, $query6);
			    while($row4 = mysqli_fetch_array($res2))
                {
					
					$q2=$q2.$row4["list_name"]."-RM".$row4["list_price"]."<br>";
				
                 }  
	  
	
	$arr = explode("<br>", $q2);
	$a=count($arr)-1;

	
	if($a==1)
	{
		$first = $arr[0];
		$first2 = '';
		$first3 = '';
		$first4 = '';
		$first5 = '';
	}
	else if($a==2)
	{
		$first = $arr[0];
		$first2 = $arr[1];
		$first3 = '';
		$first4 = '';
		$first5 = '';
	}
	else if($a==3)
	{
		$first = $arr[0];
		$first2 = $arr[1];
		$first3 = $arr[2];
		$first4 = '';
		$first5 = '';
	}
	else if($a==4)
	{
		$first = $arr[0];
		$first2 = $arr[1];
		$first3 = $arr[2];
		$first4 = $arr[3];
		$first5 = '';
	}
	else if($a==5)
	{
		$first = $arr[0];
		$first2 = $arr[1];
		$first3 = $arr[2];
		$first4 = $arr[3];
		$first5 = $arr[4];
	}

	
	$try = explode("-", $first);
	$try1 = explode("-", $first2);
	$try2 = explode("-", $first3);
	$try3 = explode("-", $first4);
	$try4 = explode("-", $first5);
	
    if($try[0]=="4 hours+1 worker")
	{
	$test = substr($first, strpos($first, "-") + 1);
	
	$x="4 hours+1 worker-".$test;
	$test2 = substr($test, strpos($test, "M") + 1);
	}else if($try1[0]=="4 hours+1 worker")
	{
		$test = substr($first2, strpos($first2, "-") + 1);
		$x="4 hours+1 worker-".$test;
		
		$test2 = substr($test, strpos($test, "M") + 1);
	}else if($try2[0]=="4 hours+1 worker")
	{
		$test = substr($first3, strpos($first3, "-") + 1);
		$x="4 hours+1 worker-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else if($try3[0]=="4 hours+1 worker")
	{
		$test = substr($first4, strpos($first4, "-") + 1);
		$x="4 hours+1 worker-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else if($try4[0]=="4 hours+1 worker")
	{
		$test = substr($first5, strpos($first5, "-") + 1);
		$x="4 hours+1 worker-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else
	{
		$x='no';
	}
	
	
	




	?>
	 
	  
	  <?php
	    if($first==$x||$first2==$x||$first3==$x||$first4==$x||$first5==$x)
		{
	  ?>
	  <input type="checkbox" id="timePrice" name="timePrice1" value="4 hours+1 worker" checked>
        <label for="timePrice">4 hours+1 worker --
		Price:<input type="number"  name="price1" placeholder="Enter price" value="<?php echo $test2;?>" ></label>
		<br>
		  <?php
		}
		else
		{
	  ?>
	    <input type="checkbox" id="timePrice" name="timePrice1" value="4 hours+1 worker">
        <label for="timePrice">4 hours+1 worker --
		Price:<input type="number"  name="price1" placeholder="Enter price" value="0" ></label>
		<br>
			  <?php
		}
	  ?>
	  
	  

	  <?php
	  $try5 = explode("-", $first);
	  $try6 = explode("-", $first2);
	  	$try7 = explode("-", $first3);
			$try8 = explode("-", $first4);
		$try9 = explode("-", $first5);
    if($try5[0]=="4 hours+2 workers")
	{
	$test = substr($first, strpos($first, "-") + 1);
	
	$x="4 hours+2 workers-".$test;
	$test2 = substr($test, strpos($test, "M") + 1);
	}else if($try6[0]=="4 hours+2 workers")
	{
		$test = substr($first2, strpos($first2, "-") + 1);
		$x="4 hours+2 workers-".$test;
		
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else if($try7[0]=="4 hours+2 workers")
	{
		$test = substr($first3, strpos($first3, "-") + 1);
		$x="4 hours+2 workers-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else if($try8[0]=="4 hours+2 workers")
	{
		$test = substr($first4, strpos($first4, "-") + 1);
		$x="4 hours+2 workers-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}else 
	if($try9[0]=="4 hours+2 workers")
	{
		$test = substr($first5, strpos($first5, "-") + 1);
		$x="4 hours+2 workers-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else
	{
		$x='no';
	}

	  ?>
	  
	    <?php
	    if($first==$x||$first2==$x||$first3==$x||$first4==$x||$first5==$x)
		{
	  ?>
         <input type="checkbox" id="timePrice" name="timePrice2" value="4 hours+2 workers" checked>
        <label for="timePrice">4 hours+2 workers -
		Price:<input type="number"  name="price2" placeholder="Enter price"  value="<?php echo $test2;?>"></label>
		<br>
		  <?php
		}
		else
		{
	  ?>
	    <input type="checkbox" id="timePrice" name="timePrice2" value="4 hours+2 workers">
        <label for="timePrice">4 hours+2 workers -
		Price:<input type="number"  name="price2" placeholder="Enter price"  value="0"></label>
		<br>
	  	  <?php
		}
	  ?>
	  
	  
    <?php
	  $try10 = explode("-", $first);
	  	$try11 = explode("-", $first2);
			$try12= explode("-", $first3);
			$try13 = explode("-", $first4);
				$try14 = explode("-", $first5);
	
    if($try10[0]=="6 hours+1 worker")
	{
	$test = substr($first, strpos($first, "-") + 1);
	
	$x="6 hours+1 worker-".$test;
	$test2 = substr($test, strpos($test, "M") + 1);
	}else
	if($try11[0]=="6 hours+1 worker")
	{
		$test = substr($first2, strpos($first2, "-") + 1);
		$x="6 hours+1 worker-".$test;
		
		$test2 = substr($test, strpos($test, "M") + 1);
	}else
	if($try12[0]=="6 hours+1 worker")
	{
		$test = substr($first3, strpos($first3, "-") + 1);
		$x="6 hours+1 worker-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else	
	if($try13[0]=="6 hours+1 worker")
	{
		$test = substr($first4, strpos($first4, "-") + 1);
		$x="6 hours+1 worker-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}else
	if($try14[0]=="6 hours+1 worker")
	{
		$test = substr($first5, strpos($first5, "-") + 1);
		$x="6 hours+1 worker-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else
	{
		$x='no';
	}

	  ?>
	  
	    <?php
	    if($first==$x||$first2==$x||$first3==$x||$first4==$x||$first5==$x)
		{
	  ?>
	  
        <input type="checkbox" id="timePrice" name="timePrice3" value="6 hours+1 worker" checked >
        <label for="timePrice">6 hours+1 worker --
			Price:<input type="number"  name="price3" placeholder="Enter price" value="<?php echo $test2;?>" ></label>
		<br>
				  <?php
		}
		else
		{
	  ?>
	   <input type="checkbox" id="timePrice" name="timePrice3" value="6 hours+1 worker" >
        <label for="timePrice">6 hours+1 worker --
			Price:<input type="number"  name="price3" placeholder="Enter price" value="0" ></label>
		<br>
	    	  <?php
		}
	  ?>
	  
	   <?php
	  $try15 = explode("-", $first);
	  	$try16 = explode("-", $first2);
			$try17 = explode("-", $first3);
			$try18 = explode("-", $first4);
				$try19 = explode("-", $first5);
	
    if($try15[0]=="6 hours+2 workers")
	{
	$test = substr($first, strpos($first, "-") + 1);
	
	$x="6 hours+2 workers-".$test;
	$test2 = substr($test, strpos($test, "M") + 1);
	}else
	if($try16[0]=="6 hours+2 workers")
	{
		$test = substr($first2, strpos($first2, "-") + 1);
		$x="6 hours+2 workers-".$test;
		
		$test2 = substr($test, strpos($test, "M") + 1);
	}else
	if($try17[0]=="6 hours+2 workers")
	{
		$test = substr($first3, strpos($first3, "-") + 1);
		$x="6 hours+2 workers-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}else 
	if($try18[0]=="6 hours+2 workers")
	{
		$test = substr($first4, strpos($first4, "-") + 1);
		$x="6 hours+2 workers-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}else
	if($try19[0]=="6 hours+2 workers")
	{
		$test = substr($first5, strpos($first5, "-") + 1);
		$x="6 hours+2 workers-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else
	{
		$x='no';
	}

	  ?>
	  
	    <?php
	    if($first==$x||$first2==$x||$first3==$x||$first4==$x||$first5==$x)
		{
	  ?>
	  
		 <input type="checkbox" id="timePrice" name="timePrice4" value="6 hours+2 workers" checked>
        <label for="timePrice">6 hours+2 workers -
			Price:<input type="number"  name="price4" placeholder="Enter price" value="<?php echo $test2;?>"></label>
		<br>
		
					  <?php
		}
		else
		{
	  ?>
	  
	  	 <input type="checkbox" id="timePrice" name="timePrice4" value="6 hours+2 workers" >
        <label for="timePrice">6 hours+2 workers -
			Price:<input type="number"  name="price4" placeholder="Enter price" value="0"></label>
		<br>
		
		   	  <?php
		}
	  ?>
		
		
		  
	   <?php
	  $try20 = explode("-", $first);
	  	$try21 = explode("-", $first2);
			$try22 = explode("-", $first3);
				$try23 = explode("-", $first4);
					$try24= explode("-", $first5);
	
    if($try20[0]=="8 hours+4 workers")
	{
	$test = substr($first, strpos($first, "-") + 1);
	
	$x="8 hours+4 workers-".$test;
	$test2 = substr($test, strpos($test, "M") + 1);
	}else
	if($try21[0]=="8 hours+4 workers")
	{
		$test = substr($first2, strpos($first2, "-") + 1);
		$x="8 hours+4 workers-".$test;
		
		$test2 = substr($test, strpos($test, "M") + 1);
	}else
	if($try22[0]=="8 hours+4 workers")
	{
		$test = substr($first3, strpos($first3, "-") + 1);
		$x="8 hours+4 workers-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}else
	if($try23[0]=="8 hours+4 workers")
	{
		$test = substr($first4, strpos($first4, "-") + 1);
		$x="8 hours+4 workers-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else
	if($try24[0]=="8 hours+4 workers")
	{
		$test = substr($first5, strpos($first5, "-") + 1);
		$x="8 hours+4 workers-".$test;
		$test2 = substr($test, strpos($test, "M") + 1);
	}
	else
	{
		$x='no';
	}

	  ?>
	  
	    <?php
	    if($first==$x||$first2==$x||$first3==$x||$first4==$x||$first5==$x)
		{
	  ?>
	  
		
		 <input type="checkbox" id="timePrice" name="timePrice5" value="8 hours+4 workers" checked>
        <label for="timePrice">8 hours+4 workers -
			Price:<input type="number"  name="price5" placeholder="Enter price" value="<?php echo $test2;?>"></label>
		<br>
							  <?php
		}
		else
		{
	  ?>
	  	 <input type="checkbox" id="timePrice" name="timePrice5" value="8 hours+4 workers">
        <label for="timePrice">8 hours+4 workers -
			Price:<input type="number"  name="price5" placeholder="Enter price" value="0"></label>
		<br>
		
	  	   	  <?php
		}
	  ?>
		
      </div>
	  
	  
      <div class="form-group">
       <label style="font-weight:bold;font-size:20px";>Service no do list</label>
       <textarea class="form-control"  name="desc" id="desc" style="font-size:18px" rows="4" cols="50" required><?php echo $erow['service_nodolist']; ?></textarea>
      </div>  
	  
	    <div class="form-group">
       <label style="font-weight:bold;font-size:20px";>Service Status</label><br>
      
	   <?php
	   if($erow['service_status']==1)
	   {
		   ?>
		<input type="radio" id="status" name="status" value="1" checked>
       <label for="status">Enable</label><br>
	      <input type="radio" id="status" name="status" value="0">
        <label for="status">Disable</label><br>  
		   <?php
	   }
	   else
		{
				   ?>
		<input type="radio" id="status" name="status" value="1">
       <label for="status" >Enable</label><br>
	      <input type="radio" id="status" name="status" value="0"  checked>
        <label for="status">Disable</label><br>  
		   <?php
			
		  }
	   ?>
    
      </div>  
	  
	  <input type="hidden" id="hide" name="hide" value="<?php echo $j ?>">

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<span class="glyphicon glyphicon-remove"></span> Cancel</button>


<button type="submit" class="btn btn-warning">
<span class="glyphicon glyphicon-check" ></span> Save</button>
</div>
</form>
</div>
</div>
</div>