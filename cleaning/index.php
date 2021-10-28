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
<th> Add services</th>
<th> Show services</th>
<th> User recommend</th>

<?php $result=mysqli_query($con,"select * from company");

while($row=mysqli_fetch_array($result)){
	?>
	
	<tr><td><?php echo $row['username'];?></td>
	
	<td>
	<form action="add_services.php">
	
	<input type="submit" name="add_movies" class="btn btn-primary" value="Add services">
	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
	</form>
	
	</td>
	
	<td>
	<form action="show_services.php">
	
	<input type="submit" name="show_services" class="btn btn-primary" value="show services">
	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
	</form>
	
	</td>
	
	<td>
	<form action="recommend.php">
	
	<input type="submit" name="user_recommend" class="btn btn-primary" value="User recommend">
	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
	</form>
	
	</td>
	
	
	</tr>
	<?php
	
	
}
?>
</table>
