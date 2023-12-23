<?php
include ('header_login.html');
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	header("location: main_page.php");
    exit;
}
 
// Include config file
require_once "link_database.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
							
                            // Redirect user to main menu page
							header("location: main_page.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
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
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        
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
        <h2 class="login-box-title text-center">Login</h2>
        <p align=center>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="submit-button-container text-center">
                <input type="submit" class="btn btn-primary submit-button btn-block" value="Login">
            </div>
            <p align=center><br>Don't have an account? <br> <a href="register.php">Sign up now</a>.</p>
        </form>
</div>

<?PHP
include ('footer.html'); 
?>

</body>
</html>