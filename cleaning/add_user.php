<?php

include("header.php");
require_once "db.php";

$flag=0;

if(isset($_POST['submit']))
{
	
	$result=mysqli_query($con,"insert into company(username)values('$_POST[username]')");
	
	if($result)
	{
		$flag=1;
	}
}
?>



<div class="panel-heading">
<h2>
<a class="btn btn-success" href="add_user.php"> Add</a>
<a class="btn btn-info pull-right" href="index.php"> Back</a>

</h2>
</div>

<?php if($flag) {?>
<div class="btn btn-success">User inserted</div>

<?php }?>
<div class="panel-body">
<form action="add_user.php" method="post">

<div class="form-group">
<label for="username"> User name</label>
<input type="text" name="username" id="username" class="form-control" required>

</div>

<div class="form-group">

<input type="submit" name="submit" value="submit" class="btn btn-primary" required>
</div>

</form>
</div>
