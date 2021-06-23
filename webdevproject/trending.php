<?php
session_start();
require_once "blogconfig.php";

$id=$username=$describe=$recipe=$time=$image=$origin="";
$sql="SELECT * FROM blogpost ORDER BY likes DESC";
    // $result=mysqli_query($link,$sql);

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
    <link rel="stylesheet" href="css/articlelink.css">
    <link rel="stylesheet" href="css/mobile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/style.css"> -->

    <title>Trending</title>
</head>

<body>
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
                            <a href="login.php" title='login' class='anav'><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                            <a href="logout.php" title='logout' class="anav"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="nav-searchothers">
                        <a href="index.php">START HERE</a>
                        <a href="newest.php">NEWEST</a>
                        <a href="trending.php">TRENDING</a>
                        <a href="login.php" title='login'><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        <a href="logout.php" title='logout' class="anav"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
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
        <hr id=navcontent>
    </nav>
    <!-- end of nav MAKKE NO CHANGES!! -->

  
    <div class="content-bloghead max-width-1 m-auto my-2">
        <div class="content-left">
            <img src="img/food.jpg" alt="pasta">

        </div>

        <div class="content-right">
            <h1>Food & Drinks</h1>
            <p>Dear diet, things just aren’t looking good for the both of us. It’s not me, it’s you. You’re too much
                work. You’re boring and I can’t stop cheating on you.The most essential part of a well-balanced diet
                is—food!</p>
        </div>

    </div>

    <div class="home-articles max-width-1 m-auto font4">
        <h1>Food Articles</h1>
        <hr class="quote-hr">
        <br>

 <?php 
//  if(mysqli_query($link,$sql)){}
//  else
//  echo $link->error;
 if($result = mysqli_query($link, $sql)){     
    //  echo $link->error; 
  if(mysqli_num_rows($result)==0)
  {
      echo "<span class='nothing'>Sorry! ,there's no content here.</span>";
  }
  else{
    while($row = mysqli_fetch_array($result)){
        $username=$row['username'];
        $recipe=$row['recipe'];
        $id=$row['id'];
        $describe=$row['description'];
        $time=$row['created_at'];
        $image=$row['image'];
    echo"<div class='home-article'>
            <div class='home-article-img'>
                <img src='$image' alt='$image'>
            </div>
            <div class='home-article-content font4'>
                <a href='article.php?id=$id'>
                    <h2>$recipe</h2>
                </a>


                <p>$describe</p>

                <span>$username |</span>

                <span> $time</span>
            </div>
        </div>
        <div class='max-width-1 m-auto'>
            <hr>
        
        </div>";
    }
  }
}
  mysqli_close($link);
  ?>

       
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