<!-- Edit Modal HTML -->
 <div class="modal fade" id="edit<?php echo $row2['expense_id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">  
	  <h4 class="modal-title">Edit Expense</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 

     </div>
     <div class="modal-body"> 
	 <?php
$edit=mysqli_query($link,"select * from expense where expense_id=".$row2['expense_id']);
$erow=$edit->fetch_assoc();
?>
<div class="container-fluid">
    <form method="post" action="expenseUpdate.php?id=<?php echo $erow['expense_id']; ?>">	
	
<?php $a=$erow['expense_type']; ?>

  <?php
  if($a=="Tools")
  {
	  ?>
      <div class="form-group">
       <label for="type" >Expense Type</label>
       <select name="type" id="type" class="form-control">
	   <option value="Tools" selected>Tools</option>
	   <option value="Promote" >Promote</option>
	   <option value="Others">Others</option>
	   </select>
      </div>
	  <?php
  }
  else if($a=="Promote")
  {
	 ?>
      <div class="form-group">
       <label for="type" >Expense Type</label>
       <select name="type" id="type" class="form-control">
	   <option value="Tools" >Tools</option>
	   <option value="Promote" selected>Promote</option>
	   <option value="Others">Others</option>
	   </select>
      </div>
<?php	 
  }else
  {
	 ?>
	      <div class="form-group">
       <label for="type" >Expense Type</label>
       <select name="type" id="type" class="form-control">
	   <option value="Tools" >Tools</option>
	   <option value="Promote" >Promote</option>
	   <option value="Others" selected>Others</option>
	   </select>
      </div> 
	<?php  
  }
	 
	 ?>
      <div class="form-group">
       <label>Expense Amount</label>
       <input type="number" name="amount" id="amount" value="<?php echo $erow['expense_amount']; ?>" class="form-control" required>
      </div>
       <div class="form-group">
       <label>Expense Description</label>
       <input type="text" name="desc" id="desc" class="form-control" value="<?php echo $erow['expense_desc']; ?>" required>
      </div>


<input type="hidden" name="serv_id" id="serv_id">	  
     </div>
	 </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
  
      <input type="submit" name="insert" id="insert" class="btn btn-info" value="Save">
     </div>
    </form>
   </div>
  </div>
 </div>