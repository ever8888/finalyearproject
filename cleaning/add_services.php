<?php

session_start();
if(isset($_GET['id'])){
	$_SESSION['id']=$_GET['id'];
	
}


include("header.php");
require_once "db.php";

$flag=0;

if(isset($_POST['submit']))
{
	
	$result=mysqli_query($con,"insert into company_user(company_id,name,rating)values('$_SESSION[id]','$_POST[name]','$_POST[rating]')");
	
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
<div class="btn btn-success">Service inserted</div>

<?php }?>
<div class="panel-body">
<form action="add_services.php" method="post">

<div class="form-group">
<label for="username"> Service name</label>
<input type="text" name="name" id="name" class="form-control" required>

</div>

<div class="form-group">
<label for="username"> Rating</label>
<input type="number" name="rating" id="rating" class="form-control" required>

</div>

<div class="form-group">

<input type="submit" name="submit" value="submit" class="btn btn-primary" required>
</div>

</form>
</div>