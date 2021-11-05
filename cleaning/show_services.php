<?php



include("header.php");
require_once "db.php";

?>


<div class="panel-heading">
<h2>
<a class="btn btn-success" href="add_user.php">Add users</a>
<a class="btn btn-info pull-right" href="index.php"> Back</a>

</h2>
</div>


<table class="table table-striped">

<th> Name </th>
<th> rating</th>


<?php $result=mysqli_query($con,"select * from company_user where company_id='$_GET[id]'");

while($row=mysqli_fetch_array($result)){
	?>
	
	<tr><td><?php echo $row['name'];?></td>
	<td><?php echo $row['rating'];?></td>

	
	
	</tr>
	<?php
	
	
}
?>
</table>
