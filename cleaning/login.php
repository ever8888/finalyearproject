
<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

 
// Include config file
require_once "config.php";
?>
 
 
 <?php
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
$id="";
$empass_err="";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
		 }
	else{

        $email = trim($_POST["email"]);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$email_err="Invalid email format";
	}
    }
	
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT comp_email, comp_pw FROM admin WHERE comp_email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
	
			
			$result=mysqli_query($link,"select * from admin where comp_email='$email'");
			while($row=mysqli_fetch_array($result)){

	
	 $id=$row['company_id'];

}

            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt,$email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
				
							
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $empass_err = "Email or password is invalid.";
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $empass_err = "Email or password is invalid";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSBS Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	
	
	<link rel="shortcut icon" type="image/png" href="Saved/favicon.png"/>
    <style>
        body{  
		background-image: url('../cleaning/Saved/cleaning.jpg'); 
            max-width: max-content; 
            margin: auto; 
            font: 14px sans-serif; 
            padding-top: 5%; 
            background-size: cover;
		
            background-position: center;
            background-repeat: no-repeat;
        }
        .wrapper{ 
            text-align: center; 
            height: 500px; 
            width: 450px; 
            padding: 80px; 
            border-style: solid; 
            background-color: white; 
            opacity: 75%;
        }

    </style>
</head>


<body>


    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : '';
			echo (!empty($empass_err)) ? 'has-error' : '';?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
				<span class="help-block"><?php echo $empass_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
		</div>

	
</body>

</html>