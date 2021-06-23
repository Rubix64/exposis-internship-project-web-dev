<?php
session_start();
require_once "blogconfig.php";

$id=$username=$created_at=$recipe=$pre_time=$cooking_time=$servings=$category=$description=$ingredients=$method=$image="";
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $id=$_GET["id"];
    $sql="SELECT * FROM blogpost WHERE id='$id';";
    $result=mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $username=$row['username'];
        $created_at=$row['created_at'];
        $recipe=$row['recipe'];
        $pre_time=$row['pre_time'];
        $cooking_time=$row['cooking_time'];
        $servings=$row['servings'];
        $category=$row['category'];
        $description=$row['description'];
        $ingredients=$row['ingredients'];
        $method=$row['method'];
        $image=$row['image'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Article</title>



</head>

<body>
    <!-- this is the nav -->
    <a href="#navtarget" class="arrow_up"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
    <nav class="nav-header" id="navtarget">
        <nav class="navigation m-auto">
            <div class="nav-top ">
                <div class="nav-logo logofont"><a href="index.php">Farfait</a></div>
                <div class="nav-search">
                    <div class="nav-search-drop">
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
            <input type="text" placeholder="Search Anything... (Press 'Enter' to Submit)" name="query"
                class="form-input">
        </form>
        <hr class="hr_line">
    </nav>
    <!-- end of nav MAKKE NO CHANGES!! -->


<div class="content-article">
    <div><img id="temp_header2" src="<?php echo $image; ?>">
        <div class="container">
            <p class="image_font" id="heading"><?php echo $recipe; ?></p>
        </div>
        </div>

        <div class="article-info">
            <span>By: <?php echo $username; ?></span>
            <span>Created at: <?php echo $created_at; ?></span>
        </div>

        <div class="row">


            <div class="column">
                <div class="blocks">
                    <hr class="hr_line">

                    <div class="recipe_imp">
                        <img src="svg/clock.svg" width="30px"></img> Prep Time: <?php echo $pre_time; ?> Mins
                    </div>

                    <div class="recipe_imp">
                        <img src="svg/clock.svg" width="30px"></img> Cook Time: <?php echo $cooking_time; ?> Mins
                    </div>

                    <div class="recipe_imp">
                        <img src="svg/cutlery.svg" width="30px"></img> Serving : <?php echo $servings; ?> servings
                    </div>

                    <div class="recipe_imp">
                        <img src="svg/folder.png" width="30px"></img> Category : <?php echo $category; ?>
                    </div>



                    <hr class="hr_line">


                </div>



    <div class="para">
    
    <h3 class="image_font">DESCRIPTION<br><br></h3>
    <pre>
<?php echo $description; ?></pre>
    </div>

    <hr class="hr_line">
    <div class="para">
    <h3 class="image_font">INGREDIENTS<br><br></h3>

    <pre>
<?php echo $ingredients; ?></pre>

    </div>
    <hr class="hr_line">

    <div class="para">
                    
    <h3 class="image_font">METHOD<br><br></h3>
    <pre>
<?php echo $method; ?></pre>
    </div>

    <hr class="hr_line">


    </div>
    </div>
            <input class="button" type="button" value="Print this page" onClick="window.print()">

            <div class="comment-box">
                <form action="#">

                    <h2>Share a Comment</h2>

                    <div><strong>Have a question?</strong> Use the form below to submit your question or comment. I love
                        hearing from you and seeing what you made!<br><br></div>

                    <p><strong>Recipie Rating </strong></p>

                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>

                    <input type="text" name="fname" placeholder="Full name*">

                    <input type="email" name="email" placeholder="Email Address*">

                    <textarea name="comment" placeholder="I love this recipe so much!"></textarea>


                    <input class="button" type="submit" value="Submit">
                    <input class="button" type="reset">
                </form>
            </div>



        </div>
</div>
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