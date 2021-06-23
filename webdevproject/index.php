<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
$username=$_SESSION["username"];
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
    <link rel="stylesheet" href="css/mobile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Farfait</title>
</head>

<body>
    <a href="#navtarget" class="arrow_up"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
    <nav class="nav-header" id="navtarget">
        <nav class="navigation m-auto">
            <div class="nav-top ">
                <div class="nav-logo logofont"><a href="index.php">Farfait</a></div>
                <div class="nav-search">
                    <div class="nav-search-drop" >
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
    <div class="content m-auto max-width1">
        <h2 class="quote txtcenter font2">"A Recipe has no soul.<b>You,</b> as the <b>cook, </b>must <em><b>bring
                    soul</b></em> to the <b>recipe</b>."
            <br><br>
            <hr class="quote-hr">
        </h2>

        <div class="content-img-carausal">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active content-img">
                        <a href=''><img src="images/Grill Lightly Scorched Serving Board.jpg" alt="board"
                                style="width:100%">
                            <h3>Lorem ipsum dolor sit, amet consectetur adipisicing.</h3>
                        </a>
                    </div>

                    <div class="item content-img">
                        <a href=''><img src="images/pizza.jpg" alt="pizza" style="width:100%">
                            <h3>Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
                        </a>
                    </div>

                    <div class="item content-img">
                        <a href=''><img src="images/How to Make the Perfect Grain Bowl _ Domino.jpg" alt="herbs"
                                style="width:100%">
                            <h3>Lorem ipsum dolor sit, amet consectetur adipisicing.</h3>
                        </a>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="content-img-block m-auto">
            <div class="content-img">
                <a href=""><img src="images/Grill Lightly Scorched Serving Board.jpg" alt="board">
                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
                </a>
            </div>
            <div class="content-img">
                <a href=""><img src="images/pizza.jpg" alt="pizza">
                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
                </a>
            </div>
            <div class="content-img">
                <a href="">
                    <img src="images/How to Make the Perfect Grain Bowl _ Domino.jpg" alt="herbs">
                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing.
                    </h3>
                </a>
            </div>
        </div>
        <div class="content-welcome">
            <img src="images/herbsandspices.jpg" alt="spices">
            <div class="welcome-para">
                <hr class="quote-hr">
                <h1 class="logofont">Welcome</h1>
                <hr class="quote-hr">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe totam vitae, perspiciatis doloremque
                    praesentium quas id aliquid eos voluptatum cumque ratione obcaecati aliquam quis earum, aut odio!
                    Necessitatibus culpa sequi qui ullam!</p>
            </div>
        </div>
        <div class="picheader">
            <h2>Choose ur pick -</h2>
        </div>
        <div class="picstolinks m-auto">

            <a href="articlelink.php?origin=indian">
                <div class="imgcontainer">
                    <img src="images/indian_dish.jpg" alt="indian_dish">
                    <button type= "submit" >Indian</button>
                </div>
            </a>
            


            
            <a href="articlelink.php?origin=chinese">
                <div class="imgcontainer">
                    <img src="images/chinese_dish.jpg" alt="chinese_dish">
                    <button type= "submit" >Chinese</button>
                </div>
            </a>
            

            
            <a href="articlelink.php?origin=american">
                <div class="imgcontainer">
                    <img src="images/american_dish.jpg" alt="american_dish">
                    <button type= "submit">American</button>
                </div>
            </a>
           

            
            <a href="articlelink.php?origin=japanese">
                <div class="imgcontainer">
                    <img src="images/japanese_dish.jpg" alt="japanese_dish">
                    <button type= "submit">Japanese</button>
                </div>
            </a>
            

            
            <a href="articlelink.php?origin=thai">
                <div class="imgcontainer">
                    <img src="images/thai_dish.jpg" alt="thai_dish">
                    <button type= "submit" >Thai</button>
                </div>
            </a>
            

            <a href="articlelink.php?origin=mexican">
                <div class="imgcontainer">
                    <img src="images/mexican_dish.jpg" alt="mexican_dish">
                    <button  type= "submit">Mexican</button>
                </div>
            </a>
            

        </div>
        
        <div id="blogpost-btn">Wanna post ur own recipe? <a href="<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo 'blogpost.php';} else {echo 'login.php';}?>"> CLICK HERE!! </a></div>
    <div id="blogpost-btn"><a href="<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo 'myarticlesconfirm.php?name='. $username;} else {echo 'login.php';}?>"> My articles </a></div>
        <div class="content-footer">
            
            <h2 class="quote txtcenter font2">
                <hr class="quote-hr"><br>Anybody can make you enjoy the first bite of a dish, but only a real chef can
                make you enjoy the last.
            </h2>
            <br>
            <hr class="quote-hr">
            <div class="logo-footer">
                <h1 class="logofont m-auto">Farfait</h1>
                <h4 class="font2 m-auto">HAPPY COOKING :)</h4>
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