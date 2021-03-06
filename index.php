<?php
//include auth.php file on all secure pages
//include("auth.php");
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>
            My Restaurant
        </title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet"type="text/css" href="forrestaurant.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!--used for adding social media icons-->
        <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        </script>
        <script>
            // Initialize and add the map
            function initMap() {
                // The location of Uluru
                var saykal = {lat: 41.938290, lng: -87.800070};
                // The map, centered at Saykal
                var map = new google.maps.Map(
                    document.getElementById('map'), 
                    {zoom: 16, 
                     center: saykal,
                     scrollwheel: false
                    });
                // The marker, positioned at Saykal
                var marker = new google.maps.Marker({position: saykal, map: map});
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbbczCk57uwC48GqdNdmtw9XrKVH5MzMQ&callback=initMap">
        </script>

        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-default navbar-static-top"> 
                    <div class="col-sm-8">
                        <div class="nav navbar-header navbar-right">
                            <h1 id="logo" >Saykali Samarkand</h1>
                        </div>


                    </div>
                    <div class="col-sm-4">
                        <ul class="nav navbar-nav navbar-right">
                            <?php                           /*chernovoy dlya sign in page*/
                            if(!isset($_SESSION["username"])){
                                echo  "<li><a href='login.php'><span class='glyphicon glyphicon-user'></span> Login</a></li>";
                            }
                            else{
                                echo  "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                            }
                            ?>  
                        </ul>
                    </div>
                </nav> 
            </div>

            <div class="row text-center navBar">
                <ul class="nav nav-pills nav-justified">
                    <li role="presentation" class="active"><a href="index.php">Home</a></li>
                    <li role="presentation"><a href="dashboard.php">Menu</a></li>
                    <li role="presentation"><a href="contact.php">Contact</a></li>
                    <li role="presentation"><a href="reservation.php">Reservation</a></li>
                    <li role="presentation"><a href="gallery.php">Gallery</a></li>
                    <li role="presentation"><a href="aboutus.php">About us</a></li>
                </ul>
            </div>



            <div class="row beginMain">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        <div class="item active">
                            <img src="plov3.jpg" alt="Plov" style="width:100%;">
                            <div class="carousel-caption">
                                <h3>Beloved Pulav</h3>
                                <p>Plov is always so much fun!</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="non3.jpg" alt="non" style="width:100%;">
                            <div class="carousel-caption">
                                <h3>Nan</h3>
                                <p>Delightful nan</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="kebab3.jpg" alt="kebab" style="width:100%;">
                            <div class="carousel-caption">
                                <h3>Kebab</h3>
                                <p>Fresh juicy kebab </p>
                            </div>
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
                </div> <!--end mycarousel-->
            </div> <!--end carousel row-->

            <div class="row toprow">
                <div class="col-sm-6">
                    <img src="kebab.jpg" alt="kebab" class="img-responsive center-block">
                    <a href="dashboard.php"><h1 class="imgtext">Aunthentic uzbek cuisine</h1></a>
                </div>
                <div class="col-sm-6">
                    <img src="samsa.jpg" alt="samsa" class="img-responsive center-block">
                    <a href="dashboard.php"><h1 class="imgtext">100% natural products</h1></a>
                </div>
            </div>

            <div class="row bottomrow">
                <div class="col-sm-6">
                    <img src="lagman.jpg" alt="lagman" class="img-responsive center-block">
                    <a href="dashboard.php"><h1 class="imgtext">Fresh made</h1></a>
                </div>
                <div class="col-sm-6">
                    <img src="plov.jpg" alt="plov" class="img-responsive center-block">
                    <a href="dashboard.php"><h1 class="imgtext">Tasty!</h1></a>
                </div>
            </div>

            <div class="row text-center phone">
                <h1><span class="glyphicon glyphicon-earphone"></span> Order Now <span class="glyphicon glyphicon-earphone"></span></h1>
                <a href="tel:2225557799" style="color: floralwhite;"><h1>222-555-77-99</h1></a>
            </div>
            <div class="row">
                <div id="map">
                </div>
            </div>
            <div class="row" id="bottomSection">
                <div class="col-xs-4 text-center">
                    <a href="https://www.twitter.com"><i class="fa fa-twitter fa-5x" aria-hidden="true"></i></a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="https://www.facebook.com"><i class="fa fa-facebook-official fa-5x" aria-hidden="true"></i></a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="https://www.instagram.com"><i class="fa fa-instagram fa-5x" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

    </body>
</html>