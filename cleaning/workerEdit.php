<div class="modal fade" id="edit<?php echo $row2['worker_id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<center><h4 class="modal-title" id="myModalLabel"  style="font-weight:bold;font-size:26px">Edit Worker</h4></center>
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
<?php
$edit=mysqli_query($link,"select * from worker where worker_id=".$row2['worker_id']);
$erow=$edit->fetch_assoc();
?>
<div class="container-fluid">
<form method="POST" action="workerUpdate.php?id=<?php echo $erow['worker_id']; ?>" 
enctype="multipart/form-data">

<div class="form-group">
<label>Worker Image</label>
   <center><img id="preimg" width="100px" height="80px" src="<?php echo $erow['worker_image']; ?>"></center><br>
<input type="file" class="form-control" name="wimg" onchange="loadfile(event)"/>

   <script type="text/javascript">
	   function loadfile(event){
		   var output=document.getElementById('preimg');
		   output.src=URL.createObjectURL(event.target.files[0]);
		   
	   }
	   </script>
</div>


     <div class="form-group">
       <label>Worker Name</label>
       <input type="text" name="name" id="name" class="form-control" value="<?php echo $erow['worker_name']; ?>" style="font-size:18px"required>
      </div>
	  
	  
     <div class="form-group">
       <label>Worker Email</label>
       <input type="email" name="email" id="email" class="form-control" value="<?php echo $erow['worker_email']; ?>" style="font-size:18px"required>
      </div>



      <div class="form-group">
       <label>Worker Password</label>
       <input type="text" name="pass" id="pass" class="form-control" value="<?php echo $erow['worker_pw']; ?>" style="font-size:18px" required>
      </div>
	  
	        <div class="form-group">
       <label>Worker Salary</label>
       <input type="number" name="salary" id="salary" class="form-control" value="<?php echo $erow['worker_salary']; ?>" style="font-size:18px" required>
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