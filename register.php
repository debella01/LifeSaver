<?php
include ('header_login.html');
// Include config file
require_once "link_database.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font-family: Arial, Helvetica, sans-serif; }
        form-group {border: 3px solid #f1f1f1;}

		input[type=text], input[type=password] {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 4px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		}

		.submit-button-container{
			margin-top:20px;
		}

		.submit-button-container:hover {
		  opacity: 0.8;
		}
		.submit-button{
			border-radius: 25px;
			width:200px;
			margin:auto;
			font-weight:bold;
		}
		.login-container{
			border:solid 1px black;
			min-height: 100vh;
			position:absolute;
			top:0px;
			width:100%;
			z-index:1;
			background-image:url("images/a.jpg");
			background-position: center bottom;
			background-repeat: no-repeat;
			background-size: cover;
		}

		.login-box{
			width:300px;
			box-shadow: 0px 10px 18px #888888;
			border-radius: 5px;
			opacity:0.9;
			margin-top:120px;
			margin-left:100px;
		}
		.login-box-title{
			font-weight:bold;
			font-size:xx-large;
			margin-bottom:10px;
		}
    </style>
</head>
<body>
    <div class="login-container">
		<div class="panel panel-default login-box">
		<div class="card p-4 rounded-plus bg-faded">
        <h2 class="login-box-title text-center">Sign Up</h2>
        <p align=center>Please fill this form to create an account.</p>
		
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label><b>Confirm Password</b></label>
                <input type="password" placeholder="Re-enter Password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="submit-button-container text-center">
                <input type="submit" class="btn btn-primary submit-button btn-block" value="Submit">
            </div>
            <p align=center><br>Already have an account?<br><a href="login.php">Login here</a>.</p>
        </form>
    </div>  
	
<?PHP
include ('footer.html'); 
?>
	
</body>
</html>