 <div class="modal fade" id="edit<?php echo $row2['voucher_id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content" style="width:400px;">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>
<center><h4 class="modal-title" id="myModalLabel"  style="font-weight:bold;font-size:26px">Edit Services</h4></center>
</div>
<div class="modal-body">
<?php
$edit=mysqli_query($link,"select * from voucher where voucher_id=".$row2['voucher_id']);
$erow=$edit->fetch_assoc();
?>
<div class="container-fluid">
<form method="POST" action="voucherUpdate.php?id=<?php echo $erow['voucher_id']; ?>" 
enctype="multipart/form-data">



     <div class="form-group">
       <label style="font-weight:bold;font-size:20px";>Voucher Name</label>
       <input type="text" name="name" id="name" class="form-control" value="<?php echo $erow['voucher_name']; ?>" style="font-size:18px"required>
      </div>

	  <?php
	  if($erow['voucher_type']=="newuser")
	  {
		  ?>
		     <div class="form-group">
       <label style="font-weight:bold;font-size:20px";>Select Voucher Type</label><br>
       <select name="type" id="type" style="width:310px;height:30px;" value="<?php echo $erow['voucher_type']; ?>">
          <option value="newuser" selected>New User</option>
		  <option value="festival">Festival</option>
            </select>
      </div>
		  <?php
	  }
	  else
	  {
	  ?>
	     <div class="form-group">
       <label style="font-weight:bold;font-size:20px";>Select Voucher Type</label><br>
       <select name="type" id="type" style="width:310px;height:30px;" value="<?php echo $erow['voucher_type']; ?>">
          <option value="newuser">New User</option>
		  <option value="festival" selected>Festival</option>
            </select>
      </div>
	  <?php
	  }
	  ?>
	
	  
	  
	   <div class="form-group">
       <label style="font-weight:bold;font-size:20px";>Voucher Amount</label>
       <input type="number" name="amount" id="amount" max="80" class="form-control" value="<?php echo $erow['voucher_amount']; ?>" style="font-size:18px"required>
      </div>
	  	  <?php
			date_default_timezone_set('Asia/Taipei');
                $date2 = date('Y-m-d');
			?>
	     <div class="form-group">
       <label style="font-weight:bold;font-size:20px">Voucher Expiry Date</label>
       <input type="date" class="form-control" name="end" min="<?php echo $date2;?>" style="font-size:18px" value="<?php echo $erow['expiry_date']; ?>" required>
      </div>

	   
	  

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