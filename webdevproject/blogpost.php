<?php 
session_start();
require_once "blogconfig.php"; 

$username=$recipe=$pre_time=$cooking_time=$servings=$category=$origin=$describe=$ingredients=$method="";
$username_err=$image_err=$err="";
$filename="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if($username != $_SESSION["username"])
    $username_err="Username doesn't match your profile!";

    $recipe=trim($_POST["recipe"]);
    $pre_time = trim($_POST["ptime"]);
    $cooking_time = trim($_POST["ctime"]);
    $servings = trim($_POST["serve"]);
    $category = trim($_POST["category"]);
    $origin = trim($_POST["origin"]);
    $describe = trim($_POST["describe"]);
    $ingredients = trim($_POST["ingredients"]);
    $method = trim($_POST["method"]);
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        // echo "file got uploaded";
        $allowed = array("jpg" => "images/articles", "jpeg" => "images/articles", "png" => "images/articles");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) 
        $image_err= "Error: Please select a valid file format.";
        // echo "test";
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) $image_err="Error: File size is larger than the allowed limit.";
    
        // Verify MYME type of the file
        if(empty($image_err) && array_key_exists($ext, $allowed)){
            // Check whether file exists before uploading it
            //  echo "image cont.";
            if(file_exists("images/articles/" . $filename)){
                $filename=time().'_'.$filename;
                
            }
             move_uploaded_file($_FILES["photo"]["tmp_name"], "images/articles/" . $filename);
            //  echo "file";
        }  
    }
       
        else{
            $image_err="Error: There was a problem uploading your file. Please try again."; 
    }
    
    $filename="images/articles/" . $filename;
   
   
    if(empty($image_err) && empty($username_err)){
         // Prepare an insert statement
       
        
         $sql="INSERT INTO `blogpost` ( `username`, `created_at`, `recipe`, `pre_time`, `cooking_time`, `servings`, `category`, `origin`, `image`, `description`, `ingredients`, `method`, `likes`) VALUES ('$username', current_timestamp(), '$recipe', '$pre_time', '$cooking_time', '$servings', '$category', '$origin', '$filename', '$describe', '$ingredients', '$method', '0');";
       if($link->query($sql)===TRUE){
        //    echo "query successful!";
        //    if(mysqli_stmt_execute($stmt)){
               header("location:index.php");
           }else{
               $err="Oops! Something went wrong. Please try again later."."</br>".$link->error;
           }
       
        //    mysqli_stmt_close($stmt);
           
         
    }
     mysqli_close($link);
} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogpost</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blogpost.css">
    <link rel="stylesheet" href="css/mobile.css">
</head>
<body>

<img class = "blogpost_bg" src = "images/Green.jpg"></img>

<a href="#navtarget" class="arrow_up"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
<nav class="nav-header" id="navtarget">
    <nav class="navigation m-auto">
        <div class="nav-top ">
            <div class="nav-logo logofont"><a href="index.php">Farfait</a></div>
            <div class="nav-search">
                <div class="nav-search-drop" id="contact-drop">
                    <i class="fa fa-bars dropicon" aria-hidden="true"></i>
                    <div class="nav-search-drop-contents">
                        <a href="index.php" class='anav'>Start Here</a>
                        <a href="newest.php" class='anav'>Newest</a>
                        <a href="trending.php" class='anav'>Trending</a>
                        <a href="login.php" title='login' class='anav'><i class="fa fa-sign-in"
                                aria-hidden="true"></i></a>
                        <a href="logout.php" title='logout' class="anav"><i class="fa fa-sign-out"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="nav-searchothers">
                    <a href="index.php">START HERE</a>
                    <a href="newest.php">NEWEST</a>
                    <a href="trending.php">TRENDING</a>
                    <a href="login.php" title='login'><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                    <a href="logout.php" title='logout' class="anav"><i class="fa fa-sign-out"
                            aria-hidden="true"></i></a>
                </div>
                <span>
                    <i class="fa fa-search searchicon" aria-hidden="true"></i>
                </span>
            </div>
    </nav>
    <form class="search-form m-auto" action="search.php" method="GET">
        <input type="text" placeholder="Search Anything... (Press 'Enter' to Submit)" name="query" class="form-input">
    </form>
    <hr id=navcontent>
</nav>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
<div class="blog_content"> 
    <h2>Inorder to post, follow the instructions below:</h2>
    <span class="invalid"><?php echo $err; ?></span>

    <div class="blog_requirement">
        <label>Your username:</label>
        <input type = "text" name = "username" value="<?php echo $username; ?>" required>
        <span class="invalid"><?php echo $username_err; ?></span>
    </div>
    <div class="blog_requirement">
        <label>Recipe Name:</label>
        <input type="text" name="recipe" value="<?php echo $recipe; ?>"required>
    </div>

    <div class="blog_requirement">
        <label>Preparation time in minutes:</label>
        <input type="number" name="ptime" value="<?php echo $pre_time; ?>" required>
    </div>

    <div class="blog_requirement">
        <label>Cooking time in minutes:</label>
        <input type="number" name="ctime" value="<?php echo $cooking_time; ?>" required>
    </div>

    <div class="blog_requirement">
        <label>How many servings:</label>
        <input type="number" name="serve" value="<?php echo $servings; ?>" required>
    </div>
    
    <div class="blog_requirement">
    <label for="sel1">Its category(select any one):</label>
    <select class="form-control" id="sel1" name ="category"
    value="<?php echo $category; ?>" required>
        <option value="Dessert">Dessert</option>
        <option value="Main Course">Main Course</option>
        <option value="Appetizer">Appetizer</option>
        <option value="Salad">Salad</option>
    </select>
    </div>

    <div class="blog_requirement">
        <label for="sel2">Its origin(select any one):</label>
        <select class="form-control" id="sel2" name = "origin" value="<?php echo $origin; ?>" required>
            <option value="Indian">Indian</option>
            <option value="Chinese">Chinese</option>
            <option value="American">American</option>
            <option value="Japanese">Japanese</option>
            <option value="Thai">Thai</option>
            <option value="Mexican">Mexican</option>
        </select>
    </div>

    

    <div class="blog_requirement">
        <label>Description of the recipe (please don't add quotes):</label>
        <textarea name="describe" placeholder="We would love to hear a little more about this dish!" required><?php echo $describe; ?></textarea>
    </div>

    <div class="blog_requirement">
        <label>Ingredients used (please don't add quotes): </label>
        <textarea name="ingredients" placeholder="Do mention all the ingedients used including its quantity" required><?php echo $ingredients; ?></textarea>
    </div>
    
    <div class="blog_requirement">
        <label>Enter the method (please don't add quotes): </label>
        <textarea name="method" placeholder="Describe all the steps used in making this dish here..."
        required><?php echo $method; ?></textarea>
    </div>

    <div class="blog_requirement">
        <label for="myfile">Select an image to upload:(Images allowed are only of format - jpg, jpeg, png and not more than 5mb.)</label>
        <input type="file" id="myfile" name="photo" required>        
        <span class="invalid"><?php echo $image_err; ?></span>
    </div>

    <div class="blog_requirement">
    <input class="button" type="submit" value="Submit">
    </div>      
            
</div>
</form>

<div class="footer">
        <hr>
        <footer>
            <div class="footer-content">
                <h2>Farfait</h2>
                <p>The most essential part of a well-balanced diet is Food!</p>
    
                <ul class="social">
                    <li><a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                </ul>
                <div class="quick-links">
                    <ul>
                        <li class="quick-items"><a href="contactus.html#aboutus" target="_blank">About Us</a></li>
                        <li class="quick-items"><a href="index.php">Home</a></li>
                        <li class="quick-items"><a href="contactus.html" target="_blank">Contact Us</a></li>
                    </ul>
                </div>
    
                <div class="fbottom">
                    <p>Copyright &copy;2021. Designed by team <span>Farfait</span> | All rights reserved</p>
                </div>
    
            </div>
        </footer>
    
    </div>
    <script type="text/javascript" src="js/main.js"></script> 
</body>
</html>