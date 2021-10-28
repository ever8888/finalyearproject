<div id="workerManage4<?php echo $row2['booking_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <form method="post" action="bookingManageE4Update.php?id=<?php echo $id;?>&id2=<?php echo $row2['booking_id'];?> ">
     <div class="modal-header">      
      <h4 class="modal-title">Manage Worker</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">   
<?php
$edit=mysqli_query($link,"select * from booking where booking_id=".$row2['booking_id']);
$erow=$edit->fetch_assoc();
?>	 
      <div class="form-group">
	  
       <label>Select Worker</label>
       <select name="list" id="list" style="text-align: left;width:357px;height:30px;" >
	 <?php
  $sqlService2="SELECT * FROM worker WHERE worker_status=0";
				  $result4 = mysqli_query($link, $sqlService2);
				   while($row4 = mysqli_fetch_array($result4)) {
					?>
					    <option value="<?php echo $row4['worker_id'];?>">
						   <?php
			             echo "{$row4['worker_name']} </option>";	
						 
				   }
               ?>
			     </select>
      </div>
    
<input type="hidden" name="serv_id" id="serv_id">	  
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
  
      <input type="submit" name="insert" id="insert" class="btn btn-info" value="Save">
     </div>
    </form>
   </div>
  </div>
 </div>