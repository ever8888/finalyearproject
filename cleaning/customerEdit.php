<div class="modal fade" id="edit<?php echo $row2['cust_id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<center><h4 class="modal-title" id="myModalLabel"  style="font-weight:bold;font-size:26px">Edit Customer</h4></center>
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>


</div>
<div class="modal-body">
<?php
$edit=mysqli_query($link,"select * from customer where cust_id=".$row2['cust_id']);
$erow=$edit->fetch_assoc();
?>
<div class="container-fluid">
<form method="POST" action="customerUpdate.php?id=<?php echo $erow['cust_id']; ?>" 
enctype="multipart/form-data">



     <div class="form-group">
       <label>Customer Name</label>
       <input type="text" name="name" id="name" class="form-control" value="<?php echo $erow['cust_name']; ?>" style="font-size:18px"required>
      </div>



      <div class="form-group">
       <label>Customer Phone Number</label>
       <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $erow['cust_phoneNo']; ?>" style="font-size:18px" required>
      </div>
	  
	  
      <div class="form-group">
       <label>Customer Address</label>
       <input type="text" class="form-control"  name="addr" id="addr" class="form-control" value="<?php echo $erow['cust_address']; ?>" style="font-size:18px" required>
      </div>  
	  
	   <div class="form-group">
       <label>Customer Coins</label>
       <input type="number" class="form-control"  name="coin" id="coin"  class="form-control" value="<?php echo $erow['cust_coin']; ?>" style="font-size:18px" required>
      </div>  

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<span class="glyphicon glyphicon-remove"></span> Cancel</button>
<button type="submit" class="btn btn-warning">
<span class="glyphicon glyphicon-check"></span> Save</button>
</div>
</form>
</div>
</div>
</div>