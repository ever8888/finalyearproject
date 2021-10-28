<div class="modal fade" id="edit<?php echo $row['service_id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>
<center><h4 class="modal-title" id="myModalLabel"  style="font-weight:bold;font-size:26px">Edit Services</h4></center>
</div>
<div class="modal-body">
<?php
$edit=mysqli_query($link,"select * from service where service_id=".$row['service_id']);
$erow=$edit->fetch_assoc();
?>
<div class="container-fluid">
<form method="POST" action="customerUpdate.php?id=<?php echo $erow['service_id']; ?>" 
enctype="multipart/form-data">

<div class="form-group">
<label>Service Logo</label>
   <center><img id="preimg" width="100px" height="50px" src="<?php echo $erow['service_logo']; ?>"></center><br>
<input type="file" class="form-control" name="logo" onchange="loadfile(event)"/>

   <script type="text/javascript">
	   function loadfile(event){
		   var output=document.getElementById('preimg');
		   output.src=URL.createObjectURL(event.target.files[0]);
		   
	   }
	   </script>
</div>


     <div class="form-group">
       <label>Service Name</label>
       <input type="text" name="name" id="name" class="form-control" value="<?php echo $erow['service_name']; ?>" style="font-size:18px"required>
      </div>



      <div class="form-group">
       <label>Service Price</label>
       <input type="number" name="price" id="price" class="form-control" value="<?php echo $erow['service_price']; ?>" style="font-size:18px" required>
      </div>
	  
	  
      <div class="form-group">
       <label>Service Description</label>
       <input type="text" class="form-control"  name="desc" id="desc" value="<?php echo $erow['service_desc']; ?>" style="font-size:18px" required>
      </div>  

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">
<span class="glyphicon glyphicon-remove"></button>
<button type="submit" class="btn btn-warning">
<span class="glyphicon glyphicon-check"></span> Save</button>
</div>
</form>
</div>
</div>
</div>