<?php

require_once "db.php";
include("recommend2.php");






$movies=mysqli_query($con,"select * from company_user");
$matrix=array();

while($movie=mysqli_fetch_array($movies))
{
	$users=mysqli_query($con,"select username from company where id='$movie[company_id]'");
	
	$username=mysqli_fetch_array($users);
	
	$matrix[$username['username']][$movie['name']]=$movie['rating'];
}
$users=mysqli_query($con,"select username from company where id='$_GET[id]'");
	
	$username=mysqli_fetch_array($users);

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


<?php

$recommend=array();
$recommend=getRecommendation($matrix,$username['username']);


foreach($recommend as $movie=>$rating)
{
	?>
	
	<tr><td><?php echo $movie;?></td>
	<td><?php echo $rating;?></td>

	
	</tr>
	<?php
	
	
}
?>
</table>

