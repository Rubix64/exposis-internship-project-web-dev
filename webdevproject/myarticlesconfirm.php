<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["confirm"]) && $_SESSION["confirm"] === true){
    header("location: myarticles.php");
    exit;
 }
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username =$_SESSION["username"];
$password = "";
$password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    // if(empty(trim($_POST["username"]))){
    //     $username_err = "Please enter username.";
    // } else{
    //     $username = trim($_POST["username"]);
    // }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
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
                    mysqli_stmt_bind_result($stmt, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            //session_start();
                            $_SESSION["confirm"]=true;
                            // Store data in session variables 
                            // Redirect user to welcome page
                            header("location: myarticles.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Incorrect password.";
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
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="css/login.css">
    <title> Confirmation </title>
    
    

</head>
<body>
<div class="login-box">  
       
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2 id='confirm'>Confirmation:</h2>
        
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?> 

       <div class="form-group">
        <input type="text" name="username" placeholder=" Your Username..." class="form-control " value="<?php echo $username; ?>" required>
        <!-- <span class="invalid-feedback"><?php echo $username_err; ?></span> -->
       </div>


        <div class="form-group">
        <input type="password"  name="password" placeholder=" Your Password..." class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" required>
         <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>

        <input class="button2" type="submit" value="Login">    

        <!-- <div class="notify">Not a member yet? <a href="signup.php"> Sign Up</a>.
        </div> -->
        <div class="notify"> <a href="signup.html"> Forgot Password?</a>.
        </div>       
        
    </form>
</div>
</body>
</html>
